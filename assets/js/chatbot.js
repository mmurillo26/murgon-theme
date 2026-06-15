/**
 * Murgon Agency — chatbot.js
 * Bot calificador en página, integrado con automation-dashboard
 *
 * Arquitectura: el frontend envía cada mensaje + sessionId al endpoint
 * `/api/chat/web` del dashboard. El backend mantiene el historial,
 * califica al lead, recopila el WhatsApp, y devuelve los links de
 * Calendly cuando llega el momento de agendar.
 *
 * Persistencia: sessionId y mensajes guardados en localStorage para
 * que la conversación sobreviva reloads.
 */

(function () {
  'use strict';

  /* ── CONFIGURACIÓN ── */
  const API_URL = 'https://automation-dashboard-seven-blush.vercel.app/api/chat/web';
  const STORAGE_SESSION_KEY = 'murgon_chat_session_id';
  const STORAGE_MESSAGES_KEY = 'murgon_chat_messages';
  const WHATSAPP_FALLBACK = 'https://wa.me/523117406927?text=Hola%2C%20tengo%20una%20pregunta%20sobre%20automatizaci%C3%B3n';

  /* ── SESSION ID ── */
  function getOrCreateSessionId() {
    let id;
    try {
      id = localStorage.getItem(STORAGE_SESSION_KEY);
    } catch (_e) {
      // localStorage blocked (private mode, etc.) — fall back to in-memory
    }
    if (!id) {
      id = (window.crypto && typeof window.crypto.randomUUID === 'function')
        ? window.crypto.randomUUID()
        : 'web-' + Date.now().toString(36) + '-' + Math.random().toString(36).slice(2, 10);
      try { localStorage.setItem(STORAGE_SESSION_KEY, id); } catch (_e) {}
    }
    return id;
  }

  function loadStoredMessages() {
    try {
      const raw = localStorage.getItem(STORAGE_MESSAGES_KEY);
      if (!raw) return [];
      const parsed = JSON.parse(raw);
      return Array.isArray(parsed) ? parsed : [];
    } catch (_e) {
      return [];
    }
  }

  function persistMessages(msgs) {
    try {
      // Keep only last 50 to avoid bloating localStorage
      const trimmed = msgs.slice(-50);
      localStorage.setItem(STORAGE_MESSAGES_KEY, JSON.stringify(trimmed));
    } catch (_e) {}
  }

  /* ── ESTADO ── */
  const state = {
    isOpen: false,
    sessionId: getOrCreateSessionId(),
    messages: loadStoredMessages(),
    isLoading: false,
    callConfirmed: false,
  };

  /* ── ELEMENTOS ── */
  const trigger         = document.getElementById('chatTrigger');
  const chatWindow      = document.getElementById('chatWindow');
  const messagesEl      = document.getElementById('chatMessages');
  const inputEl         = document.getElementById('chatInput');
  const sendBtn         = document.getElementById('chatSend');
  const closeBtn        = document.getElementById('chatX');
  const greeting        = document.getElementById('chatGreeting');
  const greetingDismiss = document.getElementById('greetingDismiss');
  const greetingCta     = document.getElementById('greetingCta');

  if (!trigger || !chatWindow) return; // Widget no presente en esta página

  /* ── RENDER MENSAJES PERSISTIDOS ── */
  for (const m of state.messages) {
    addMessage(m.role === 'user' ? 'user' : 'bot', m.content, m.time);
  }

  /* ── TOGGLE ── */
  trigger.addEventListener('click', () => toggleChat());
  trigger.addEventListener('keydown', (e) => {
    if (e.key === 'Enter' || e.key === ' ') {
      e.preventDefault();
      toggleChat();
    }
  });
  closeBtn.addEventListener('click', () => toggleChat(false));

  function toggleChat(force) {
    state.isOpen = (force !== undefined) ? force : !state.isOpen;
    chatWindow.style.display = state.isOpen ? 'flex' : 'none';
    trigger.setAttribute('aria-expanded', String(state.isOpen));

    if (state.isOpen) {
      // Ocultar greeting card al abrir el chat
      if (greeting) greeting.style.display = 'none';
      inputEl.focus();
    }
  }

  /* ── GREETING CARD ── */
  // Auto-show después de 4 s si el usuario no ha chateado antes
  if (greeting) {
    const alreadyGreeted = sessionStorage.getItem('murgon_chat_greeted');
    if (!alreadyGreeted && !state.messages.length) {
      setTimeout(() => {
        if (!state.isOpen) {
          greeting.style.display = 'flex';
          greeting.removeAttribute('aria-hidden');
          sessionStorage.setItem('murgon_chat_greeted', '1');
        }
      }, 4000);
    }

    // Botón X — cerrar sin abrir chat
    if (greetingDismiss) {
      greetingDismiss.addEventListener('click', (e) => {
        e.stopPropagation();
        greeting.style.display = 'none';
      });
    }

    // CTA "Iniciar conversación →" — abrir chat directamente
    if (greetingCta) {
      greetingCta.addEventListener('click', () => {
        greeting.style.display = 'none';
        toggleChat(true);
      });
    }
  }

  /* ── ENVIAR MENSAJE ── */
  sendBtn.addEventListener('click', sendMessage);
  inputEl.addEventListener('keydown', (e) => {
    if (e.key === 'Enter' && !e.shiftKey) {
      e.preventDefault();
      sendMessage();
    }
  });

  async function sendMessage() {
    const text = inputEl.value.trim();
    if (!text || state.isLoading || state.callConfirmed) return;

    inputEl.value = '';
    const userTime = nowLabel();
    addMessage('user', text, userTime);
    state.messages.push({ role: 'user', content: text, time: userTime });
    persistMessages(state.messages);

    showTyping();
    state.isLoading = true;

    try {
      const response = await fetch(API_URL, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
          sessionId: state.sessionId,
          message: text,
        }),
      });

      const data = await response.json().catch(() => ({}));
      hideTyping();

      const reply = (data && data.reply) || fallbackReply(data);
      const botTime = nowLabel();
      addMessage('bot', reply, botTime);
      state.messages.push({ role: 'assistant', content: reply, time: botTime });
      persistMessages(state.messages);

      if (data && data.callConfirmed && !state.callConfirmed) {
        state.callConfirmed = true;
        // No más mensajes — la llamada ya está agendada
      }

      if (!response.ok) {
        showWhatsappFallbackLink();
      }
    } catch (err) {
      console.warn('[Murgon Chatbot] Error:', err && err.message);
      hideTyping();
      const t = nowLabel();
      const reply = 'Tuve un problema técnico. ¿Me contactas directo por WhatsApp? Respondo en minutos.';
      addMessage('bot', reply, t);
      state.messages.push({ role: 'assistant', content: reply, time: t });
      persistMessages(state.messages);
      showWhatsappFallbackLink();
    }

    state.isLoading = false;
  }

  function fallbackReply(data) {
    if (data.suppressed || !data.reply) {
      return ''; // el bot se queda en silencio
    }
    return '¿Me contactas directo por WhatsApp? Respondo en minutos: wa.me/523117406927';
  }

  /* ── DOM HELPERS ── */
  function nowLabel() {
    return new Date().toLocaleTimeString('es-MX', { hour: '2-digit', minute: '2-digit' });
  }

  function addMessage(role, text, timeLabel) {
    const div = document.createElement('div');
    div.className = `chat-msg chat-msg--${role}`;

    const safeText = String(text)
      .replace(/&/g, '&amp;')
      .replace(/</g, '&lt;')
      .replace(/>/g, '&gt;')
      .replace(/(https?:\/\/[^\s<]+)/g, (url) =>
        `<a href="${url}" target="_blank" rel="noopener">${url}</a>`
      )
      .replace(/(wa\.me\/[\w?=%&]+)/g, (url) =>
        `<a href="https://${url}" target="_blank" rel="noopener">${url}</a>`
      );

    div.innerHTML = `
      <div class="chat-msg__bubble">${safeText}</div>
      <div class="chat-msg__time">${timeLabel || nowLabel()}</div>
    `;
    messagesEl.appendChild(div);
    messagesEl.scrollTop = messagesEl.scrollHeight;
  }

  function showTyping() {
    const div = document.createElement('div');
    div.className = 'chat-msg chat-msg--bot chat-msg--typing';
    div.id = 'chatTyping';
    div.setAttribute('aria-label', 'Escribiendo...');
    div.innerHTML = `<div class="chat-msg__bubble">
      <span class="chat-typing-dot"></span>
      <span class="chat-typing-dot"></span>
      <span class="chat-typing-dot"></span>
    </div>`;
    messagesEl.appendChild(div);
    messagesEl.scrollTop = messagesEl.scrollHeight;
  }

  function hideTyping() {
    const t = document.getElementById('chatTyping');
    if (t) t.remove();
  }

  function showWhatsappFallbackLink() {
    setTimeout(() => {
      const div = document.createElement('div');
      div.className = 'chat-msg chat-msg--bot';
      div.innerHTML = `
        <div class="chat-msg__bubble">
          <a href="${WHATSAPP_FALLBACK}"
             target="_blank" rel="noopener" class="chat-wa-link">
            Abrir WhatsApp →
          </a>
        </div>`;
      messagesEl.appendChild(div);
      messagesEl.scrollTop = messagesEl.scrollHeight;
    }, 400);
  }

})();
