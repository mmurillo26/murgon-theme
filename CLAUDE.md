# CLAUDE.md — Murgon Agency · Landing Page Improvements
# Proyecto: murgonagency.com · WordPress + Custom Theme (murgon-theme)
# Generado: Mayo 2026 · Basado en auditoría CRO completa

---

## CONTEXTO DEL PROYECTO

**Stack actual:**
- CMS: WordPress (Elementor 4.1.0-dev1)
- Theme: `/wp-content/themes/murgon-theme/`
- Assets: `/wp-content/themes/murgon-theme/assets/`
- Logo: `/assets/images/murgonagency_logo.png`
- Foto Mario: `/assets/images/mario-murillo.png`
- Build: CSS/JS vanilla + Elementor widgets

**Lo que NO tocar:**
- Estructura visual general (hero, secciones, colores)
- Copy existente — está bien escrito
- Lógica de la calculadora ROI existente
- Sección de precios y planes

**Objetivo de este sprint:**
Implementar 9 mejoras priorizadas por impacto en conversión.
Prioridad: P0 (hoy) → P1 (semana 1) → P2 (semana 2) → P3 (mes 2)

---

## TASK P0 — FIX INMEDIATO (< 1 hora total)

### TASK-01: Unificar número de WhatsApp

**Problema:** Hay dos números distintos en la página:
- Header: `523332512917`
- CTAs principales: `523117406927`

**Acción:** Busca en TODOS los archivos del tema y reemplaza.

```bash
# Buscar todos los archivos con el número duplicado
grep -r "523332512917" /wp-content/themes/murgon-theme/
grep -r "523332512917" /wp-content/uploads/

# El número CORRECTO y único a usar es: 523117406927
# Reemplazar en todos los archivos encontrados
```

Número final unificado: `523117406927`
Formato wa.me: `https://wa.me/523117406927`

---

### TASK-02: Fix meta description y og:locale

**Archivo a editar:** `/wp-content/themes/murgon-theme/functions.php`
o el archivo donde se definen los meta tags (puede ser header.php o un plugin SEO).

**Cambios:**

```php
// META DESCRIPTION — reemplazar el actual genérico
// ANTES: "Automatización e IA para negocios"
// DESPUÉS:
$meta_description = "Implementamos sistemas de automatización con IA en 7–14 días: WhatsApp bot, CRM automatizado y captación de leads. Sin consultores — código real, resultados medibles. Desde $8,500 MXN.";

// OG:LOCALE — cambiar de en_US a es_MX
// ANTES: <meta property="og:locale" content="en_US" />
// DESPUÉS:
// <meta property="og:locale" content="es_MX" />

// OG:DESCRIPTION — actualizar igual que meta description
// TITLE TAG sugerido:
// "Murgon Agency — Automatización con IA en 7–14 días | WhatsApp Bot + CRM | México"
```

Si usa Yoast SEO o RankMath, actualizar desde wp-admin > SEO > configuración de la página principal.

---

## TASK P1 — SEMANA 1 (Alto impacto en conversión)

### TASK-03: Mover diferenciador al Hero

**Archivo:** El template del hero en Elementor o en el theme PHP.
Buscar el bloque del hero (headline principal).

**Añadir ENCIMA del H1 principal** un badge/tag con este copy:

```html
<!-- Badge a añadir ANTES del H1 del hero -->
<div class="hero-badge">
  <span class="hero-badge__dot"></span>
  Implementado por el desarrollador — no por un consultor
</div>
```

```css
/* Añadir en /assets/css/main.css o style.css */
.hero-badge {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: rgba(255, 255, 255, 0.06);
  border: 1px solid rgba(255, 255, 255, 0.12);
  border-radius: 100px;
  padding: 6px 14px;
  font-size: 12px;
  color: rgba(255, 255, 255, 0.75);
  margin-bottom: 16px;
  font-family: 'Space Mono', monospace;
  letter-spacing: 0.3px;
}

.hero-badge__dot {
  width: 7px;
  height: 7px;
  border-radius: 50%;
  background: #00e676;
  box-shadow: 0 0 8px #00e676;
  animation: pulse-dot 2s infinite;
  flex-shrink: 0;
}

@keyframes pulse-dot {
  0%, 100% { opacity: 1; }
  50% { opacity: 0.4; }
}
```

---

### TASK-04: Lead Magnet — Diagnóstico Gratuito con captura de email

**Descripción:** Añadir una nueva sección ANTES de la sección de precios (#precios).
Esta sección captura email + WhatsApp de visitantes que no están listos para comprar.

**Crear archivo:** `/wp-content/themes/murgon-theme/template-parts/lead-magnet.php`

```php
<?php
/**
 * Lead Magnet Section — Diagnóstico Gratuito
 * Insertar antes de la sección #precios en el template principal
 */
?>
<section id="diagnostico" class="lead-magnet-section">
  <div class="lm-container">
    
    <div class="lm-badge">GRATIS · Sin compromiso</div>
    
    <h2 class="lm-title">
      ¿No sabes por dónde empezar?<br>
      <em>Descubre qué automatizar primero</em>
    </h2>
    
    <p class="lm-subtitle">
      Responde 5 preguntas sobre tu negocio y te enviamos un diagnóstico personalizado 
      con los 3 procesos de mayor impacto para automatizar — y el ROI estimado de cada uno.
    </p>

    <div class="lm-features">
      <span class="lm-feat">⚡ Resultado en 24h</span>
      <span class="lm-feat">🎯 Personalizado para tu industria</span>
      <span class="lm-feat">💰 ROI estimado incluido</span>
      <span class="lm-feat">📋 PDF descargable</span>
    </div>

    <!-- PASO 1: Formulario inicial (visible por defecto) -->
    <div class="lm-form-wrap" id="lmStep1">
      <form class="lm-form" id="leadMagnetForm" novalidate>
        
        <div class="lm-field-row">
          <div class="lm-field">
            <label class="lm-label">¿Cuál es tu industria?</label>
            <select class="lm-input" name="industria" required>
              <option value="">Selecciona...</option>
              <option value="clinica">Clínica / Estética / Salud</option>
              <option value="inmobiliaria">Agencia Inmobiliaria</option>
              <option value="ecommerce">E-commerce / Tienda online</option>
              <option value="agencia">Agencia de Marketing</option>
              <option value="negocio_local">Negocio Local / Restaurante</option>
              <option value="educacion">Educación / Cursos</option>
              <option value="otro">Otro</option>
            </select>
          </div>
          <div class="lm-field">
            <label class="lm-label">¿Cuántos mensajes/consultas reciben por día?</label>
            <select class="lm-input" name="volumen" required>
              <option value="">Selecciona...</option>
              <option value="1-10">1 a 10 mensajes</option>
              <option value="11-50">11 a 50 mensajes</option>
              <option value="51-200">51 a 200 mensajes</option>
              <option value="200+">Más de 200</option>
            </select>
          </div>
        </div>

        <div class="lm-field-row">
          <div class="lm-field">
            <label class="lm-label">Tu nombre</label>
            <input class="lm-input" type="text" name="nombre" placeholder="Mario Murillo" required>
          </div>
          <div class="lm-field">
            <label class="lm-label">Tu email</label>
            <input class="lm-input" type="email" name="email" placeholder="tu@empresa.com" required>
          </div>
        </div>

        <div class="lm-field">
          <label class="lm-label">WhatsApp (para enviarte el diagnóstico también)</label>
          <input class="lm-input" type="tel" name="whatsapp" placeholder="+52 333 123 4567">
          <span class="lm-hint">Opcional — te enviamos el PDF por ambos canales</span>
        </div>

        <button type="submit" class="lm-btn" id="lmSubmitBtn">
          <span class="lm-btn-text">Quiero mi diagnóstico gratuito →</span>
          <span class="lm-btn-loading" style="display:none">Enviando...</span>
        </button>

        <p class="lm-privacy">Sin spam. Solo tu diagnóstico personalizado. Cancela cuando quieras.</p>
      </form>
    </div>

    <!-- PASO 2: Confirmación (oculto hasta submit) -->
    <div class="lm-success" id="lmStep2" style="display:none">
      <div class="lm-success-icon">✓</div>
      <h3>¡Diagnóstico en camino!</h3>
      <p>Revisaremos tu perfil y te enviaremos el análisis personalizado en las próximas 24 horas a tu email.</p>
      <p class="lm-success-wa">¿Quieres resultados inmediatos? 
        <a href="https://wa.me/523117406927?text=Hola%2C%20acabo%20de%20pedir%20mi%20diagnóstico%20gratuito" target="_blank">
          Escríbenos por WhatsApp ahora →
        </a>
      </p>
    </div>

  </div>
</section>
```

**CSS para el lead magnet** — añadir en style.css o archivo de estilos principal:

```css
/* ===== LEAD MAGNET SECTION ===== */
.lead-magnet-section {
  padding: 80px 20px;
  background: linear-gradient(135deg, rgba(0, 230, 118, 0.04) 0%, rgba(0, 180, 255, 0.03) 100%);
  border-top: 1px solid rgba(255,255,255,0.06);
  border-bottom: 1px solid rgba(255,255,255,0.06);
}

.lm-container {
  max-width: 680px;
  margin: 0 auto;
  text-align: center;
}

.lm-badge {
  display: inline-block;
  background: rgba(0, 230, 118, 0.1);
  border: 1px solid rgba(0, 230, 118, 0.25);
  color: #00e676;
  font-size: 11px;
  font-weight: 700;
  letter-spacing: 2px;
  padding: 4px 14px;
  border-radius: 100px;
  margin-bottom: 20px;
  font-family: 'Space Mono', monospace;
  text-transform: uppercase;
}

.lm-title {
  font-size: clamp(24px, 4vw, 36px);
  font-weight: 800;
  line-height: 1.2;
  margin-bottom: 16px;
  color: #eef0f5;
}

.lm-title em {
  color: #00e676;
  font-style: normal;
}

.lm-subtitle {
  font-size: 15px;
  color: rgba(238, 240, 245, 0.65);
  line-height: 1.6;
  margin-bottom: 24px;
  max-width: 560px;
  margin-left: auto;
  margin-right: auto;
}

.lm-features {
  display: flex;
  gap: 10px;
  justify-content: center;
  flex-wrap: wrap;
  margin-bottom: 36px;
}

.lm-feat {
  font-size: 12px;
  color: rgba(238, 240, 245, 0.7);
  background: rgba(255, 255, 255, 0.05);
  border: 1px solid rgba(255, 255, 255, 0.08);
  padding: 5px 12px;
  border-radius: 100px;
}

.lm-form-wrap {
  background: rgba(255, 255, 255, 0.03);
  border: 1px solid rgba(255, 255, 255, 0.08);
  border-radius: 12px;
  padding: 28px;
  text-align: left;
}

.lm-field-row {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 14px;
  margin-bottom: 14px;
}

@media (max-width: 600px) {
  .lm-field-row { grid-template-columns: 1fr; }
}

.lm-field {
  display: flex;
  flex-direction: column;
  gap: 5px;
  margin-bottom: 14px;
}

.lm-field:last-child { margin-bottom: 0; }

.lm-label {
  font-size: 12px;
  color: rgba(238, 240, 245, 0.6);
  font-weight: 600;
  letter-spacing: 0.3px;
}

.lm-input {
  background: rgba(255, 255, 255, 0.05);
  border: 1px solid rgba(255, 255, 255, 0.1);
  border-radius: 6px;
  padding: 11px 14px;
  font-size: 14px;
  color: #eef0f5;
  transition: border-color 0.2s;
  font-family: inherit;
  width: 100%;
  outline: none;
  appearance: none;
}

.lm-input:focus {
  border-color: rgba(0, 230, 118, 0.4);
  background: rgba(0, 230, 118, 0.03);
}

.lm-input option { background: #151820; }

.lm-hint {
  font-size: 11px;
  color: rgba(238, 240, 245, 0.35);
}

.lm-btn {
  width: 100%;
  background: linear-gradient(135deg, #00c853, #00e676);
  border: none;
  border-radius: 8px;
  padding: 15px 24px;
  font-size: 15px;
  font-weight: 700;
  color: #000;
  cursor: pointer;
  margin-top: 20px;
  transition: opacity 0.2s, transform 0.1s;
  font-family: inherit;
}

.lm-btn:hover { opacity: 0.9; }
.lm-btn:active { transform: scale(0.99); }
.lm-btn:disabled { opacity: 0.6; cursor: not-allowed; }

.lm-privacy {
  font-size: 11px;
  color: rgba(238, 240, 245, 0.3);
  text-align: center;
  margin-top: 12px;
}

.lm-success {
  padding: 40px 20px;
  text-align: center;
}

.lm-success-icon {
  width: 56px; height: 56px;
  background: rgba(0, 230, 118, 0.12);
  border: 2px solid rgba(0, 230, 118, 0.3);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 22px;
  color: #00e676;
  margin: 0 auto 16px;
}

.lm-success h3 {
  font-size: 22px;
  font-weight: 700;
  margin-bottom: 10px;
  color: #eef0f5;
}

.lm-success p {
  font-size: 14px;
  color: rgba(238, 240, 245, 0.65);
  line-height: 1.6;
  margin-bottom: 10px;
}

.lm-success-wa a {
  color: #00e676;
  text-decoration: none;
  font-weight: 600;
}
```

**JavaScript para el formulario** — añadir en `/assets/js/main.js` o archivo JS principal:

```javascript
// ===== LEAD MAGNET FORM =====
(function() {
  const form = document.getElementById('leadMagnetForm');
  if (!form) return;

  form.addEventListener('submit', async function(e) {
    e.preventDefault();

    const btn = document.getElementById('lmSubmitBtn');
    const btnText = btn.querySelector('.lm-btn-text');
    const btnLoading = btn.querySelector('.lm-btn-loading');

    // Validación básica
    const email = form.querySelector('[name="email"]').value;
    const nombre = form.querySelector('[name="nombre"]').value;
    const industria = form.querySelector('[name="industria"]').value;
    const volumen = form.querySelector('[name="volumen"]').value;

    if (!email || !nombre || !industria || !volumen) {
      alert('Por favor completa todos los campos requeridos.');
      return;
    }

    // UI loading state
    btn.disabled = true;
    btnText.style.display = 'none';
    btnLoading.style.display = 'inline';

    const payload = {
      nombre,
      email,
      whatsapp: form.querySelector('[name="whatsapp"]').value,
      industria,
      volumen,
      source: 'lead-magnet-diagnostico',
      timestamp: new Date().toISOString(),
      page_url: window.location.href
    };

    try {
      // OPCIÓN A: Webhook n8n (reemplaza con tu URL de webhook n8n)
      const WEBHOOK_URL = 'https://TU_N8N_INSTANCE/webhook/murgon-lead-magnet';
      
      await fetch(WEBHOOK_URL, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(payload)
      });

      // Mostrar confirmación
      document.getElementById('lmStep1').style.display = 'none';
      document.getElementById('lmStep2').style.display = 'block';

      // Analytics event (si tienes GA4)
      if (typeof gtag !== 'undefined') {
        gtag('event', 'lead_magnet_submit', {
          event_category: 'Lead',
          event_label: industria,
          value: 1
        });
      }

    } catch (error) {
      console.error('Lead magnet error:', error);
      // Fallback: abrir WhatsApp con datos pre-llenados
      const waMsg = encodeURIComponent(
        `Hola, quiero el diagnóstico gratuito.\nNombre: ${nombre}\nIndustria: ${industria}\nEmail: ${email}`
      );
      window.open(`https://wa.me/523117406927?text=${waMsg}`, '_blank');
      
      // Mostrar confirmación igual
      document.getElementById('lmStep1').style.display = 'none';
      document.getElementById('lmStep2').style.display = 'block';
    }
  });
})();
```

**Nota sobre el webhook n8n:** El flujo de n8n debe:
1. Recibir el payload del formulario
2. Enviar email de confirmación al lead (con Mailtrap o Resend)
3. Notificar a Mario por WhatsApp (Twilio)
4. Guardar en Google Sheets o Airtable
5. Iniciar secuencia de nurture: día 1, día 3, día 7

---

### TASK-05: Calculadora ROI → Captura email antes de mostrar resultados

**Archivo:** Buscar el JavaScript de la calculadora en el tema.
```bash
grep -r "calculadora\|calculator\|ROI\|ingresos_perdidos" /wp-content/themes/murgon-theme/assets/js/
```

**Modificación:** Interceptar el momento en que se muestran los resultados.
Añadir un modal/overlay ANTES de revelar los números.

```javascript
// Añadir esta función al archivo JS de la calculadora

function showCalcResults(resultados) {
  // Si el usuario ya dio su email en esta sesión, mostrar directo
  if (sessionStorage.getItem('murgon_calc_email')) {
    renderResults(resultados);
    return;
  }

  // Mostrar modal de captura
  const modal = document.createElement('div');
  modal.id = 'calcCaptureModal';
  modal.innerHTML = `
    <div class="calc-modal-overlay">
      <div class="calc-modal-box">
        <div class="calc-modal-icon">📊</div>
        <h3>Tu análisis está listo</h3>
        <p>Deja tu email y te enviamos el reporte completo con el plan de automatización recomendado para tu negocio.</p>
        <div class="calc-modal-preview">
          <span class="calc-preview-blur">Tu negocio pierde <strong>$???,??? MXN/mes</strong></span>
          <span class="calc-preview-blur">Recuperables: <strong>$???,??? MXN/mes</strong></span>
        </div>
        <form class="calc-capture-form" id="calcCaptureForm">
          <input type="text" name="nombre" placeholder="Tu nombre" required class="calc-capture-input">
          <input type="email" name="email" placeholder="tu@empresa.com" required class="calc-capture-input">
          <button type="submit" class="calc-capture-btn">Ver mi análisis completo →</button>
          <button type="button" class="calc-skip-btn" id="calcSkipBtn">Prefiero verlo sin guardar</button>
        </form>
      </div>
    </div>
  `;
  document.body.appendChild(modal);

  // Submit del modal
  document.getElementById('calcCaptureForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const email = this.querySelector('[name="email"]').value;
    const nombre = this.querySelector('[name="nombre"]').value;

    sessionStorage.setItem('murgon_calc_email', email);
    sessionStorage.setItem('murgon_calc_nombre', nombre);

    // Enviar a n8n
    fetch('https://TU_N8N_INSTANCE/webhook/murgon-calc-capture', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ email, nombre, resultados, source: 'calculadora-roi', timestamp: new Date().toISOString() })
    }).catch(() => {}); // Fire and forget

    modal.remove();
    renderResults(resultados);
  });

  // Skip
  document.getElementById('calcSkipBtn').addEventListener('click', function() {
    modal.remove();
    renderResults(resultados);
  });
}
```

```css
/* Modal calculadora */
.calc-modal-overlay {
  position: fixed;
  inset: 0;
  background: rgba(0, 0, 0, 0.85);
  backdrop-filter: blur(4px);
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 9999;
  padding: 20px;
}

.calc-modal-box {
  background: #0f1117;
  border: 1px solid rgba(255,255,255,0.1);
  border-radius: 12px;
  padding: 32px;
  max-width: 420px;
  width: 100%;
  text-align: center;
}

.calc-modal-icon {
  font-size: 36px;
  margin-bottom: 12px;
}

.calc-modal-box h3 {
  font-size: 22px;
  font-weight: 700;
  margin-bottom: 8px;
  color: #eef0f5;
}

.calc-modal-box p {
  font-size: 14px;
  color: rgba(238,240,245,0.65);
  line-height: 1.6;
  margin-bottom: 20px;
}

.calc-modal-preview {
  display: flex;
  flex-direction: column;
  gap: 6px;
  margin-bottom: 20px;
  padding: 12px;
  background: rgba(255,255,255,0.03);
  border-radius: 8px;
}

.calc-preview-blur {
  font-size: 13px;
  color: rgba(238,240,245,0.5);
  filter: blur(4px);
  user-select: none;
}

.calc-capture-input {
  width: 100%;
  background: rgba(255,255,255,0.05);
  border: 1px solid rgba(255,255,255,0.1);
  border-radius: 6px;
  padding: 11px 14px;
  font-size: 14px;
  color: #eef0f5;
  margin-bottom: 10px;
  outline: none;
  font-family: inherit;
}

.calc-capture-btn {
  width: 100%;
  background: linear-gradient(135deg, #00c853, #00e676);
  border: none;
  border-radius: 8px;
  padding: 13px;
  font-size: 15px;
  font-weight: 700;
  color: #000;
  cursor: pointer;
  margin-bottom: 10px;
  font-family: inherit;
}

.calc-skip-btn {
  background: none;
  border: none;
  color: rgba(238,240,245,0.3);
  font-size: 12px;
  cursor: pointer;
  text-decoration: underline;
  font-family: inherit;
}
```

---

## TASK P2 — SEMANA 2

### TASK-06: Chatbot AI calificador en página

**Crear archivo:** `/wp-content/themes/murgon-theme/template-parts/chatbot-widget.php`

Este chatbot se conecta a la Claude API (o OpenAI) y califica al lead automáticamente.

```php
<?php
/**
 * Chatbot Widget — Calificador AI en página
 * Incluir en footer.php antes de </body>
 */
?>

<!-- CHAT WIDGET TRIGGER -->
<div id="chatTrigger" class="chat-trigger" role="button" aria-label="Hablar con AI de Murgon">
  <div class="chat-trigger__icon">
    <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
      <path d="M12 2C6.48 2 2 6.48 2 12c0 1.85.5 3.58 1.37 5.07L2 22l5.12-1.34A9.93 9.93 0 0012 22c5.52 0 10-4.48 10-10S17.52 2 12 2z" fill="currentColor"/>
    </svg>
  </div>
  <div class="chat-trigger__label">¿Tienes dudas? Pregúntame</div>
  <div class="chat-trigger__close" id="chatClose" style="display:none">✕</div>
</div>

<!-- CHAT WINDOW -->
<div id="chatWindow" class="chat-window" style="display:none" role="dialog" aria-label="Chat con Murgon AI">
  <div class="chat-header">
    <div class="chat-header__avatar">M</div>
    <div class="chat-header__info">
      <div class="chat-header__name">Murgon AI</div>
      <div class="chat-header__status">
        <span class="status-dot"></span> En línea — responde en segundos
      </div>
    </div>
    <button class="chat-header__x" id="chatX">✕</button>
  </div>
  <div class="chat-messages" id="chatMessages">
    <!-- Mensaje inicial -->
    <div class="msg msg--bot">
      <div class="msg__bubble">
        Hola 👋 Soy el asistente de Murgon Agency. Cuéntame: ¿en qué tipo de negocio trabajas y qué proceso te está quitando más tiempo?
      </div>
      <div class="msg__time">Ahora</div>
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
    >
    <button id="chatSend" class="chat-send-btn" aria-label="Enviar">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
        <path d="M2 21l21-9L2 3v7l15 2-15 2v7z" fill="currentColor"/>
      </svg>
    </button>
  </div>
  <div class="chat-footer-note">
    Impulsado por IA · <a href="https://wa.me/523117406927" target="_blank">Hablar con Mario directamente →</a>
  </div>
</div>
```

```javascript
// ===== CHATBOT AI WIDGET =====
// Añadir en /assets/js/chatbot.js (nuevo archivo, incluir en footer)

(function() {
  // ---- CONFIGURACIÓN ----
  const WEBHOOK_URL = 'https://TU_N8N_INSTANCE/webhook/murgon-chatbot';
  // El webhook de n8n recibe el mensaje y llama a Claude API,
  // devuelve la respuesta. Esto evita exponer API keys en frontend.
  
  const SYSTEM_PROMPT = `Eres el asistente de ventas de Murgon Agency, una agencia de automatización con IA fundada por Mario Murillo, desarrollador full stack.

OBJETIVO: Calificar al prospecto y dirigirlo a agendar una consulta gratuita.

PERSONALIDAD: Amigable, experto técnico, directo. No uses frases genéricas de ventas. Habla como un developer que entiende el negocio.

FLUJO DE CALIFICACIÓN:
1. Pregunta tipo de negocio e industria
2. Pregunta cuál es el proceso que más tiempo les consume
3. Pregunta si tienen WhatsApp Business activo
4. Explica brevemente cómo Murgon lo resolvería (específico a su industria)
5. Invita a agendar consulta gratuita de 20 min

INFORMACIÓN DE PRECIOS:
- Plan Starter: $8,500 MXN (~$420 USD) — bot WhatsApp + integración + landing
- Sistema Completo: $18,500 MXN (~$920 USD) — todo incluyendo CRM + dashboard
- Tiempo implementación: 7–14 días
- Enterprise: a medida, agendar llamada

NUNCA des información de competidores. Si preguntan, di que Mario puede hacer una comparativa personalizada en la consulta.
SIEMPRE en español. Respuestas cortas (máx 3 párrafos). Sin markdown ni asteriscos.`;

  // ---- STATE ----
  const state = {
    isOpen: false,
    messages: [],
    isLoading: false,
    leadEmail: null
  };

  // ---- ELEMENTOS ----
  const trigger = document.getElementById('chatTrigger');
  const window_ = document.getElementById('chatWindow');
  const messagesEl = document.getElementById('chatMessages');
  const input = document.getElementById('chatInput');
  const sendBtn = document.getElementById('chatSend');
  const closeBtn = document.getElementById('chatX');

  if (!trigger) return; // Widget no presente

  // ---- TOGGLE ----
  trigger.addEventListener('click', () => toggleChat());
  closeBtn.addEventListener('click', () => toggleChat(false));

  function toggleChat(force) {
    state.isOpen = force !== undefined ? force : !state.isOpen;
    window_.style.display = state.isOpen ? 'flex' : 'none';
    if (state.isOpen) input.focus();
  }

  // ---- SEND MESSAGE ----
  sendBtn.addEventListener('click', sendMessage);
  input.addEventListener('keydown', (e) => {
    if (e.key === 'Enter' && !e.shiftKey) sendMessage();
  });

  async function sendMessage() {
    const text = input.value.trim();
    if (!text || state.isLoading) return;

    input.value = '';
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
            timestamp: new Date().toISOString()
          }
        })
      });

      const data = await response.json();
      const reply = data.reply || data.content || 'Hubo un problema. ¿Puedes escribirnos directamente por WhatsApp?';

      hideTyping();
      addMessage('bot', reply);
      state.messages.push({ role: 'assistant', content: reply });

      // Detectar si el lead está calificado (n8n puede marcar esto)
      if (data.qualified && !state.leadEmail) {
        setTimeout(() => showEmailCapture(), 1000);
      }

    } catch (err) {
      hideTyping();
      addMessage('bot', 'Tuve un problema técnico. ¿Me contactas por WhatsApp? 👉 wa.me/523117406927');
    }

    state.isLoading = false;
  }

  function addMessage(role, text) {
    const div = document.createElement('div');
    div.className = `msg msg--${role}`;
    
    // Convertir links de WhatsApp en anchor tags
    const safeText = text
      .replace(/</g, '&lt;')
      .replace(/wa\.me\/\S+/g, url => `<a href="https://${url}" target="_blank">${url}</a>`);
    
    div.innerHTML = `
      <div class="msg__bubble">${safeText}</div>
      <div class="msg__time">${new Date().toLocaleTimeString('es-MX', {hour:'2-digit',minute:'2-digit'})}</div>
    `;
    messagesEl.appendChild(div);
    messagesEl.scrollTop = messagesEl.scrollHeight;
  }

  function showTyping() {
    const div = document.createElement('div');
    div.className = 'msg msg--bot msg--typing';
    div.id = 'typingIndicator';
    div.innerHTML = '<div class="msg__bubble"><span class="typing-dot"></span><span class="typing-dot"></span><span class="typing-dot"></span></div>';
    messagesEl.appendChild(div);
    messagesEl.scrollTop = messagesEl.scrollHeight;
  }

  function hideTyping() {
    const t = document.getElementById('typingIndicator');
    if (t) t.remove();
  }

  function showEmailCapture() {
    const div = document.createElement('div');
    div.className = 'msg msg--bot';
    div.innerHTML = `
      <div class="msg__bubble">
        ¿Quieres que te envíe un resumen de lo que hablamos + el plan de automatización para tu negocio?
        <div class="chat-email-capture">
          <input type="email" id="chatEmailInput" placeholder="tu@email.com" class="chat-capture-input">
          <button id="chatEmailSend" class="chat-capture-btn">Envíame el resumen</button>
        </div>
      </div>
    `;
    messagesEl.appendChild(div);
    messagesEl.scrollTop = messagesEl.scrollHeight;

    document.getElementById('chatEmailSend').addEventListener('click', () => {
      const email = document.getElementById('chatEmailInput').value;
      if (!email) return;
      state.leadEmail = email;
      
      fetch(WEBHOOK_URL.replace('chatbot', 'chatbot-email'), {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ email, messages: state.messages, timestamp: new Date().toISOString() })
      }).catch(() => {});

      div.querySelector('.chat-email-capture').innerHTML = '✓ Perfecto, te lo envío ahora mismo.';
    });
  }

})();
```

**Registrar el script en functions.php:**

```php
// En functions.php — añadir al wp_enqueue_scripts existente
function murgon_enqueue_chatbot() {
    wp_enqueue_script(
        'murgon-chatbot',
        get_template_directory_uri() . '/assets/js/chatbot.js',
        array(),
        '1.0.0',
        true // en footer
    );
}
add_action('wp_enqueue_scripts', 'murgon_enqueue_chatbot');
```

```css
/* ===== CHAT WIDGET STYLES ===== */
/* Añadir en style.css */

.chat-trigger {
  position: fixed;
  bottom: 24px;
  right: 24px;
  background: linear-gradient(135deg, #0d1f2d, #162535);
  border: 1px solid rgba(0, 230, 118, 0.3);
  border-radius: 100px;
  padding: 12px 18px;
  display: flex;
  align-items: center;
  gap: 10px;
  cursor: pointer;
  z-index: 9998;
  box-shadow: 0 4px 24px rgba(0, 0, 0, 0.4), 0 0 0 1px rgba(0,230,118,0.1);
  transition: transform 0.2s, box-shadow 0.2s;
  color: #eef0f5;
}

.chat-trigger:hover {
  transform: translateY(-2px);
  box-shadow: 0 8px 32px rgba(0, 0, 0, 0.5), 0 0 0 1px rgba(0,230,118,0.2);
}

.chat-trigger__icon { color: #00e676; }
.chat-trigger__label { font-size: 13px; font-weight: 600; }

.chat-window {
  position: fixed;
  bottom: 90px;
  right: 24px;
  width: 360px;
  max-width: calc(100vw - 32px);
  height: 500px;
  max-height: calc(100vh - 120px);
  background: #0a0d12;
  border: 1px solid rgba(255,255,255,0.1);
  border-radius: 16px;
  box-shadow: 0 16px 64px rgba(0,0,0,0.6);
  z-index: 9999;
  display: flex;
  flex-direction: column;
  overflow: hidden;
}

.chat-header {
  background: #0f1520;
  border-bottom: 1px solid rgba(255,255,255,0.06);
  padding: 14px 16px;
  display: flex;
  align-items: center;
  gap: 10px;
  flex-shrink: 0;
}

.chat-header__avatar {
  width: 36px; height: 36px;
  background: linear-gradient(135deg, #00c853, #00b4ff);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: 700;
  font-size: 14px;
  color: #000;
  flex-shrink: 0;
}

.chat-header__info { flex: 1; }
.chat-header__name { font-size: 13px; font-weight: 700; color: #eef0f5; }
.chat-header__status { font-size: 11px; color: rgba(238,240,245,0.5); display: flex; align-items: center; gap: 5px; }
.status-dot { width: 6px; height: 6px; border-radius: 50%; background: #00e676; animation: pulse-dot 2s infinite; }

.chat-header__x {
  background: none;
  border: none;
  color: rgba(238,240,245,0.4);
  font-size: 16px;
  cursor: pointer;
  padding: 4px;
}

.chat-messages {
  flex: 1;
  overflow-y: auto;
  padding: 16px;
  display: flex;
  flex-direction: column;
  gap: 12px;
}

.msg { display: flex; flex-direction: column; gap: 3px; max-width: 85%; }
.msg--user { align-self: flex-end; align-items: flex-end; }
.msg--bot { align-self: flex-start; }

.msg__bubble {
  padding: 10px 13px;
  border-radius: 12px;
  font-size: 13px;
  line-height: 1.5;
  color: #eef0f5;
}

.msg--bot .msg__bubble {
  background: rgba(255,255,255,0.06);
  border: 1px solid rgba(255,255,255,0.06);
  border-bottom-left-radius: 3px;
}

.msg--user .msg__bubble {
  background: linear-gradient(135deg, #00c853, #009688);
  color: #000;
  border-bottom-right-radius: 3px;
}

.msg__time { font-size: 10px; color: rgba(238,240,245,0.25); }

.typing-dot {
  display: inline-block;
  width: 6px; height: 6px;
  border-radius: 50%;
  background: rgba(238,240,245,0.4);
  margin: 0 2px;
  animation: typing-bounce 1.2s infinite;
}
.typing-dot:nth-child(2) { animation-delay: 0.2s; }
.typing-dot:nth-child(3) { animation-delay: 0.4s; }

@keyframes typing-bounce {
  0%, 60%, 100% { transform: translateY(0); }
  30% { transform: translateY(-6px); }
}

.chat-input-row {
  display: flex;
  gap: 8px;
  padding: 12px 16px;
  border-top: 1px solid rgba(255,255,255,0.06);
  flex-shrink: 0;
}

.chat-input {
  flex: 1;
  background: rgba(255,255,255,0.05);
  border: 1px solid rgba(255,255,255,0.1);
  border-radius: 8px;
  padding: 10px 13px;
  font-size: 13px;
  color: #eef0f5;
  outline: none;
  font-family: inherit;
}

.chat-input:focus { border-color: rgba(0,230,118,0.3); }

.chat-send-btn {
  background: linear-gradient(135deg, #00c853, #009688);
  border: none;
  border-radius: 8px;
  width: 40px;
  height: 40px;
  cursor: pointer;
  color: #000;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}

.chat-footer-note {
  font-size: 10px;
  color: rgba(238,240,245,0.25);
  text-align: center;
  padding: 6px 16px 10px;
  flex-shrink: 0;
}

.chat-footer-note a { color: rgba(0,230,118,0.6); text-decoration: none; }

.chat-email-capture { margin-top: 10px; display: flex; flex-direction: column; gap: 6px; }
.chat-capture-input {
  background: rgba(255,255,255,0.08);
  border: 1px solid rgba(255,255,255,0.15);
  border-radius: 6px;
  padding: 8px 11px;
  font-size: 12px;
  color: #eef0f5;
  outline: none;
  font-family: inherit;
}

.chat-capture-btn {
  background: linear-gradient(135deg, #00c853, #00e676);
  border: none;
  border-radius: 6px;
  padding: 8px 12px;
  font-size: 12px;
  font-weight: 700;
  color: #000;
  cursor: pointer;
  font-family: inherit;
}
```

**Incluir en footer.php:**
```php
<?php get_template_part('template-parts/chatbot-widget'); ?>
```

---

## TASK P3 — MES 2 (Crecimiento orgánico)

### TASK-07: 5 Landing Pages por Nicho (Programmatic SEO)

**Crear estructura de páginas:**

```bash
# Páginas a crear en WordPress (Pages > Add New)
# Slug y título para cada una:

/para-clinicas          → "Automatización con IA para Clínicas y Estética | Murgon"
/para-inmobiliarias     → "Automatización para Agencias Inmobiliarias | Murgon"  
/para-ecommerce         → "Automatización IA para E-commerce | Murgon"
/para-agencias          → "Automatización para Agencias de Marketing | Murgon"
/para-negocios-locales  → "Automatización WhatsApp para Negocios Locales | Murgon"
```

**Template PHP para páginas de nicho:**
Crear: `/wp-content/themes/murgon-theme/page-nicho.php`

Cada página nicho debe incluir:
1. Hero con el pain point específico del nicho
2. Caso de éxito del mismo nicho (o el más cercano)
3. Los 3 automatizaciones más relevantes para el nicho
4. Calculadora ROI pre-configurada con valores del nicho
5. CTA con mensaje pre-llenado de WhatsApp específico al nicho

---

### TASK-08: Equivalencia USD en precios

**En la sección de precios (#precios), modificar:**

```html
<!-- STARTER -->
<!-- ANTES: $8,500 MXN -->
<!-- DESPUÉS: -->
<div class="plan-price">
  $8,500 <span class="price-currency">MXN</span>
  <span class="price-usd">~$420 USD</span>
</div>

<!-- SISTEMA COMPLETO -->
<div class="plan-price">
  $18,500 <span class="price-currency">MXN</span>
  <span class="price-usd">~$920 USD</span>
</div>
```

```css
.price-usd {
  display: block;
  font-size: 13px;
  color: rgba(238,240,245,0.4);
  font-family: 'Space Mono', monospace;
  font-weight: 400;
  margin-top: 2px;
}
```

---

## FLUJO N8N — Estructura del workflow principal

```
WEBHOOK recibe lead (formulario / calculadora / chat)
  ↓
SWITCH por fuente (lead-magnet / calculadora / chatbot)
  ↓
SET: enriquecer datos (industria → mensaje personalizado)
  ↓
HTTP REQUEST: enviar email via Resend/Mailtrap
  → Al lead: confirmación + recurso prometido
  → A Mario: notificación WhatsApp via Twilio
  ↓
Google Sheets APPEND: guardar en CRM básico
  ↓
WAIT 24 horas
  ↓
IF: ¿abrió email? (webhook de tracking)
  YES → enviar follow-up 2 (contenido de valor)
  NO  → enviar follow-up 2 con asunto diferente
  ↓
WAIT 3 días
  ↓
HTTP REQUEST: enviar mensaje WhatsApp via Twilio
  → "Hola [nombre], ¿pudiste revisar el diagnóstico?"
  ↓
WAIT 7 días → último follow-up con CTA directo
```

---

## CHECKLIST DE IMPLEMENTACIÓN

### P0 — HOY (< 1 hora)
- [ ] TASK-01: Unificar WhatsApp a `523117406927` en todos los archivos
- [ ] TASK-02: Fix meta description y `og:locale` a `es_MX`

### P1 — SEMANA 1
- [ ] TASK-03: Badge "No soy consultor" en el hero
- [ ] TASK-04: Sección lead magnet con form + webhook n8n
- [ ] TASK-05: Modal de captura en calculadora ROI
- [ ] Configurar workflow n8n para leads entrantes

### P2 — SEMANA 2
- [ ] TASK-06: Chatbot AI widget en página
- [ ] TASK-08: Equivalencia USD en precios

### P3 — MES 2
- [ ] TASK-07: 5 landing pages de nicho
- [ ] Configurar GA4 + eventos de conversión
- [ ] A/B test hero copy

---

## NOTAS TÉCNICAS

**Theme path:** `/wp-content/themes/murgon-theme/`
**WA número unificado:** `523117406927`
**n8n webhooks base:** `https://TU_N8N_INSTANCE/webhook/murgon-`
**Email remitente:** `contacto@murgonagency.com`
**Cal.com booking:** Integrar en flujo de chatbot cuando lead es calificado
**API AI para chatbot:** Preferir Claude API (claude-sonnet-4-5) via n8n — no exponer keys en frontend
