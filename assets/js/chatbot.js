/**
 * Murgon Agency — chatbot.js
 * Chatbot AI calificador en página
 * TASK-06 — CRO Sprint Mayo 2026
 *
 * Arquitectura: El frontend envía el historial a un webhook n8n.
 * n8n llama a Claude API (claude-sonnet-4-5) y devuelve la respuesta.
 * Las API keys NUNCA se exponen en el frontend.
 *
 * Para configurar: reemplaza WEBHOOK_URL con tu endpoint de n8n.
 */

(function () {
  'use strict';

  /* ── CONFIGURACIÓN ── */
  // TODO: Reemplazar con tu URL de webhook n8n real
  const WEBHOOK_URL = 'https://TU_N8N_INSTANCE/webhook/murgon-chatbot';

  const SYSTEM_PROMPT = `Eres el asistente de ventas de Murgon Agency, una agencia de automatización con IA fundada por Mario Murillo, desarrollador full stack.

OBJETIVO: Calificar al prospecto y dirigirlo a agendar una consulta gratuita de 20 minutos.

PERSONALIDAD: Amigable, experto técnico, directo. No uses frases genéricas de ventas. Habla como un developer que entiende el negocio del cliente.

FLUJO DE CALIFICACIÓN:
1. Pregunta tipo de negocio e industria
2. Pregunta cuál es el proceso que más tiempo les consume
3. Pregunta si tienen WhatsApp Business activo
4. Explica brevemente cómo Murgon lo resolvería (específico a su industria)
5. Invita a agendar consulta gratuita de 20 min vía WhatsApp: wa.me/523117406927

INFORMACIÓN DE PRECIOS:
- Plan Starter: $8,500 MXN (~$420 USD) — bot WhatsApp + integración + landing
- Sistema Completo: $18,500 MXN (~$920 USD) — todo incluyendo CRM + dashboard
- Tiempo de implementación: 7 a 14 días
- Enterprise: a medida, requiere llamada de descubrimiento

NUNCA menciones a competidores. Si preguntan, di que Mario puede hacer una comparativa personalizada en la consulta.
SIEMPRE responde en español. Respuestas cortas (máximo 3 párrafos). Sin markdown ni asteriscos en las respuestas.`;

  /* ── ESTADO ── */
  const state = {
    isOpen: false,
    messages: [],
    isLoading: false,
    leadEmail: null,
    badgeDismissed: false,
  };

  /* ── ELEMENTOS ── */
  const trigger    = document.getElementById('chatTrigger');
  const chatWindow = document.getElementById('chatWindow');
  const messagesEl = document.getElementById('chatMessages');
  const inputEl    = document.getElementById('chatInput');
  const sendBtn    = document.getElementById('chatSend');
  const closeBtn   = document.getElementById('chatX');
  const badge      = trigger ? trigger.querySelector('.chat-trigger__badge') : null;

  if (!trigger || !chatWindow) return; // Widget no presente en esta página

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
      // Ocultar badge de notificación
      if (badge && !state.badgeDismissed) {
        badge.style.display = 'none';
        state.badgeDismissed = true;
      }
      inputEl.focus();
    }
  }

  // Badge de notificación: pulsa por 5s al cargar la página, luego desaparece si no abrieron
  if (badge) {
    setTimeout(() => {
      if (!state.isOpen && !state.badgeDismissed) {
        badge.style.display = 'none';
        state.badgeDismissed = true;
      }
    }, 8000);
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
    if (!text || state.isLoading) return;

    inputEl.value = '';
    addMessage('user', text);
    state.messages.push({ role: 'user', content: text });

    showTyping();
    state.isLoading = true;

    try {
      const response = await fetch(WEBHOOK_URL, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
          messages: state.messages,
          system: SYSTEM_PROMPT,
          metadata: {
            page: window.location.href,
            timestamp: new Date().toISOString(),
            userAgent: navigator.userAgent.substring(0, 80),
          },
        }),
      });

      if (!response.ok) throw new Error('HTTP ' + response.status);

      const data = await response.json();
      const reply = data.reply || data.content || data.message
        || '¿Me contactas directo por WhatsApp? Respondo en minutos: wa.me/523117406927';

      hideTyping();
      addMessage('bot', reply);
      state.messages.push({ role: 'assistant', content: reply });

      // Si n8n marca el lead como calificado, ofrecer captura de email
      if (data.qualified && !state.leadEmail) {
        setTimeout(() => showEmailCapture(), 1200);
      }

    } catch (err) {
      console.warn('[Murgon Chatbot] Error:', err.message);
      hideTyping();
      // Fallback graceful: siempre redirige a WhatsApp
      addMessage('bot', 'Tuve un problema técnico 😅 ¿Me contactas directo por WhatsApp? Respondo en minutos →');

      // Después del mensaje de error, mostrar link directo
      setTimeout(() => {
        const div = document.createElement('div');
        div.className = 'chat-msg chat-msg--bot';
        div.innerHTML = `
          <div class="chat-msg__bubble">
            <a href="https://wa.me/523117406927?text=Hola%2C%20tengo%20una%20pregunta%20sobre%20automatizaci%C3%B3n"
               target="_blank" rel="noopener" class="chat-wa-link">
              💬 Abrir WhatsApp →
            </a>
          </div>`;
        messagesEl.appendChild(div);
        messagesEl.scrollTop = messagesEl.scrollHeight;
      }, 400);
    }

    state.isLoading = false;
  }

  /* ── AÑADIR MENSAJE AL DOM ── */
  function addMessage(role, text) {
    const div = document.createElement('div');
    div.className = `chat-msg chat-msg--${role}`;

    // Escapar HTML básico y convertir URLs de wa.me en links
    const safeText = text
      .replace(/&/g, '&amp;')
      .replace(/</g, '&lt;')
      .replace(/>/g, '&gt;')
      .replace(/(wa\.me\/[\w?=%&]+)/g, (url) =>
        `<a href="https://${url}" target="_blank" rel="noopener">${url}</a>`
      );

    const now = new Date().toLocaleTimeString('es-MX', { hour: '2-digit', minute: '2-digit' });

    div.innerHTML = `
      <div class="chat-msg__bubble">${safeText}</div>
      <div class="chat-msg__time">${now}</div>
    `;
    messagesEl.appendChild(div);
    messagesEl.scrollTop = messagesEl.scrollHeight;
  }

  /* ── INDICADOR DE ESCRITURA ── */
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

  /* ── CAPTURA DE EMAIL (post-calificación) ── */
  function showEmailCapture() {
    const div = document.createElement('div');
    div.className = 'chat-msg chat-msg--bot';
    div.innerHTML = `
      <div class="chat-msg__bubble">
        ¿Quieres que te envíe un resumen de lo que hablamos + el plan de automatización para tu negocio?
        <div class="chat-email-capture">
          <input type="email" id="chatEmailInput" placeholder="tu@email.com" class="chat-capture-input" aria-label="Tu email">
          <button id="chatEmailSend" class="chat-capture-btn">Envíame el resumen</button>
        </div>
      </div>
    `;
    messagesEl.appendChild(div);
    messagesEl.scrollTop = messagesEl.scrollHeight;

    document.getElementById('chatEmailSend').addEventListener('click', () => {
      const emailInput = document.getElementById('chatEmailInput');
      const email = emailInput ? emailInput.value.trim() : '';
      if (!email || !email.includes('@')) {
        emailInput && emailInput.focus();
        return;
      }
      state.leadEmail = email;

      // Enviar a n8n (fire and forget)
      fetch(WEBHOOK_URL.replace('/murgon-chatbot', '/murgon-chatbot-email'), {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
          email,
          messages: state.messages,
          source: 'chatbot-email-capture',
          timestamp: new Date().toISOString(),
        }),
      }).catch(() => {});

      const capture = div.querySelector('.chat-email-capture');
      if (capture) capture.innerHTML = '<span style="color:#00e676">✓ Perfecto, te lo envío ahora mismo.</span>';
    });
  }

})();
