<?php
/**
 * Chatbot Widget — Calificador AI en página
 * Incluido en footer.php antes de wp_footer()
 * TASK-06 — CRO Sprint Mayo 2026
 * Conecta a Claude API via n8n (sin exponer API keys en frontend)
 */
?>

<!-- CHAT WIDGET TRIGGER -->
<div id="chatTrigger" class="chat-trigger" role="button" tabindex="0" aria-label="Hablar con AI de Murgon" aria-expanded="false" aria-controls="chatWindow">
  <div class="chat-trigger__icon" aria-hidden="true">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
      <path d="M12 2C6.48 2 2 6.48 2 12c0 1.85.5 3.58 1.37 5.07L2 22l5.12-1.34A9.93 9.93 0 0012 22c5.52 0 10-4.48 10-10S17.52 2 12 2z" fill="currentColor"/>
    </svg>
  </div>
  <span class="chat-trigger__label">¿Tienes dudas? Pregúntame</span>
  <span class="chat-trigger__badge" aria-hidden="true">1</span>
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
      Hablar con Mario directamente →
    </a>
  </div>
</div>
