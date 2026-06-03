<?php
/**
 * Chatbot Widget — Calificador AI en página
 * Incluido en footer.php antes de wp_footer()
 * TASK-06 — CRO Sprint Mayo 2026
 * Conecta a Claude API via n8n (sin exponer API keys en frontend)
 */
?>

<!-- CHAT WIDGET TRIGGER — botón circular estilo Intercom/Crisp -->
<div id="chatTrigger" class="chat-trigger" role="button" tabindex="0"
     aria-label="Abrir chat con asistente de Murgon"
     aria-expanded="false"
     aria-controls="chatWindow">
  <span class="chat-trigger__avatar" aria-hidden="true">M</span>
  <span class="chat-trigger__dot" aria-hidden="true"></span>
</div>

<!-- GREETING CARD — aparece automáticamente e invita a chatear -->
<div id="chatGreeting" class="chat-greeting" style="display:none" aria-hidden="true">
  <button class="chat-greeting__dismiss" id="greetingDismiss" aria-label="Cerrar saludo">
    <svg width="11" height="11" viewBox="0 0 11 11" fill="none">
      <path d="M1 1l9 9M10 1L1 10" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
    </svg>
  </button>
  <div class="chat-greeting__avatar" aria-hidden="true">M</div>
  <div class="chat-greeting__body">
    <div class="chat-greeting__meta">
      <span class="chat-greeting__name">Murgon AI</span>
      <span class="chat-greeting__tag">IA</span>
    </div>
    <p class="chat-greeting__text">Hola 👋 ¿En qué proceso de tu negocio puedo ayudarte hoy?</p>
    <button class="chat-greeting__cta" id="greetingCta">Iniciar conversación →</button>
  </div>
</div>

<!-- CHAT WINDOW -->
<div id="chatWindow" class="chat-window" style="display:none" role="dialog" aria-label="Chat con Murgon AI" aria-modal="true">
  <div class="chat-header">
    <div class="chat-header__avatar" aria-hidden="true">M</div>
    <div class="chat-header__info">
      <div class="chat-header__name">Murgon AI</div>
      <div class="chat-header__status">
        <span class="status-dot" aria-hidden="true"></span>
        <span>En línea — responde en segundos</span>
      </div>
    </div>
    <button class="chat-header__x" id="chatX" aria-label="Cerrar chat">✕</button>
  </div>

  <div class="chat-messages" id="chatMessages" role="log" aria-live="polite">
    <!-- Mensaje inicial del bot -->
    <div class="chat-msg chat-msg--bot">
      <div class="chat-msg__bubble">
        Hola 👋 Soy el asistente de Murgon Agency. Cuéntame: ¿en qué tipo de negocio trabajas y qué proceso te está quitando más tiempo?
      </div>
      <div class="chat-msg__time">Ahora</div>
    </div>
  </div>

  <div class="chat-input-row">
    <input
      type="text"
      id="chatInput"
      class="chat-input"
      placeholder="Escribe tu pregunta..."
      maxlength="500"
      autocomplete="off"
      aria-label="Escribe tu mensaje"
    >
    <button id="chatSend" class="chat-send-btn" aria-label="Enviar mensaje">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
        <path d="M2 21l21-9L2 3v7l15 2-15 2v7z" fill="currentColor"/>
      </svg>
    </button>
  </div>

  <div class="chat-footer-note">
    Impulsado por IA ·
    <a href="https://wa.me/523117406927" target="_blank" rel="noopener">
      Hablar por WhatsApp →
    </a>
  </div>
</div>
