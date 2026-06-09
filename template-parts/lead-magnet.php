<?php
/**
 * Lead Magnet Section — Diagnóstico Gratuito
 * Insertar antes de la sección #precios en front-page.php
 * TASK-04 — CRO Sprint Mayo 2026
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

    <!-- PASO 1: Formulario inicial -->
    <div class="lm-form-wrap" id="lmStep1">
      <form class="lm-form" id="leadMagnetForm" novalidate>

        <div class="lm-field-row">
          <div class="lm-field">
            <label class="lm-label" for="lm-industria">¿Cuál es tu industria?</label>
            <select class="lm-input" id="lm-industria" name="industria" required>
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
            <label class="lm-label" for="lm-volumen">¿Cuántos mensajes/consultas reciben por día?</label>
            <select class="lm-input" id="lm-volumen" name="volumen" required>
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
            <label class="lm-label" for="lm-nombre">Tu nombre</label>
            <input class="lm-input" id="lm-nombre" type="text" name="nombre" placeholder="Mario Murillo" required>
          </div>
          <div class="lm-field">
            <label class="lm-label" for="lm-email">Tu email</label>
            <input class="lm-input" id="lm-email" type="email" name="email" placeholder="tu@empresa.com" required>
          </div>
        </div>

        <div class="lm-field-row">
          <div class="lm-field">
            <label class="lm-label" for="lm-whatsapp">WhatsApp (para enviarte el diagnóstico también)</label>
            <input class="lm-input" id="lm-whatsapp" type="tel" name="whatsapp" placeholder="+52 333 123 4567">
            <span class="lm-hint">Opcional — te enviamos el PDF por ambos canales</span>
          </div>
          <div class="lm-field">
            <label class="lm-label">¿Usas alguna herramienta para gestionar tu negocio?</label>
            <div class="lm-radio-group" role="radiogroup" aria-label="¿Usas herramienta?">
              <label class="lm-radio-label">
                <input type="radio" name="usa_herramienta" value="si" id="lm-herramienta-si">
                <span class="lm-radio-check" aria-hidden="true"></span>
                Sí, ya usamos algo
              </label>
              <label class="lm-radio-label">
                <input type="radio" name="usa_herramienta" value="no" id="lm-herramienta-no">
                <span class="lm-radio-check" aria-hidden="true"></span>
                No, todo es manual
              </label>
            </div>
          </div>
        </div>

        <div class="lm-field" id="lmHerramientaCual" style="display:none" aria-live="polite">
          <label class="lm-label" for="lm-cual">¿Cuál herramienta usan?</label>
          <input class="lm-input" id="lm-cual" type="text" name="herramienta_cual"
                 placeholder="Ej: HubSpot, Zoho, Excel, WhatsApp Business, Notion...">
          <span class="lm-hint">CRM, hoja de cálculo, app de gestión, calendario — lo que sea</span>
        </div>

        <!-- Honeypot — oculto para humanos, los bots lo llenan -->
        <div class="lm-hp" aria-hidden="true">
          <label for="lm-hp-website">Website</label>
          <input type="text" id="lm-hp-website" name="website" tabindex="-1" autocomplete="off" value="">
        </div>

        <!-- Consentimiento de datos (obligatorio) -->
        <div class="lm-consent-wrap" id="lmConsentWrap">
          <label class="lm-consent-label" for="lm-consent">
            <input type="checkbox" id="lm-consent" name="consent" value="1" required aria-required="true">
            <span class="lm-consent-check" aria-hidden="true"></span>
            <span class="lm-consent-text">
              Acepto el uso y tratamiento de mis datos personales conforme a la
              <a href="/politica-de-privacidad" target="_blank" rel="noopener" class="lm-consent-link">Política de Privacidad</a>.
            </span>
          </label>
          <p class="lm-consent-error" id="lmConsentError" style="display:none" role="alert">
            Debes aceptar la política de privacidad para continuar.
          </p>
        </div>

        <button type="submit" class="lm-btn" id="lmSubmitBtn">
          <span class="lm-btn-text">Quiero mi diagnóstico gratuito →</span>
          <span class="lm-btn-loading" style="display:none" aria-hidden="true">Enviando...</span>
        </button>

        <p class="lm-privacy">Sin spam. Solo tu diagnóstico personalizado. Cancela cuando quieras.</p>
      </form>
    </div>

    <!-- PASO 2: Confirmación (oculto hasta submit) -->
    <div class="lm-success" id="lmStep2" style="display:none" aria-live="polite">
      <div class="lm-success-icon" aria-hidden="true">✓</div>
      <h3>¡Diagnóstico en camino!</h3>
      <p>Revisaremos tu perfil y te enviaremos el análisis personalizado en las próximas 24 horas a tu email.</p>
      <p class="lm-success-wa">¿Quieres resultados inmediatos?
        <a href="https://wa.me/523117406927?text=Hola%2C%20acabo%20de%20pedir%20mi%20diagn%C3%B3stico%20gratuito" target="_blank" rel="noopener">
          Escríbenos por WhatsApp ahora →
        </a>
      </p>
    </div>

  </div>

  <script>
    (function() {
      var form = document.getElementById('leadMagnetForm');
      if (!form) return;

      // Toggle del input "¿cuál herramienta?"
      var herramientaWrap = document.getElementById('lmHerramientaCual');
      document.querySelectorAll('input[name="usa_herramienta"]').forEach(function(r) {
        r.addEventListener('change', function() {
          herramientaWrap.style.display = r.value === 'si' && r.checked ? '' : 'none';
        });
      });

      var INDUSTRY_LABELS = {
        clinica: 'Clínica / Estética / Salud',
        inmobiliaria: 'Agencia Inmobiliaria',
        ecommerce: 'E-commerce / Tienda online',
        agencia: 'Agencia de Marketing',
        negocio_local: 'Negocio Local / Restaurante',
        educacion: 'Educación / Cursos',
        otro: 'Otro'
      };
      var VOLUME_LABELS = {
        '1-10': '1 a 10 mensajes/consultas al día',
        '11-50': '11 a 50 mensajes/consultas al día',
        '51-200': '51 a 200 mensajes/consultas al día',
        '200+': 'Más de 200 mensajes/consultas al día'
      };

      var ENDPOINT = 'https://vercel.murgonagency.com/api/leads/web';

      form.addEventListener('submit', async function(e) {
        e.preventDefault();

        var consentBox = document.getElementById('lm-consent');
        var consentError = document.getElementById('lmConsentError');
        if (!consentBox.checked) {
          consentError.style.display = '';
          return;
        }
        consentError.style.display = 'none';

        var fd = new FormData(form);

        // Honeypot — si el campo está relleno es un bot; fingir éxito para no alertar
        if ((fd.get('website') || '').toString().trim() !== '') {
          document.getElementById('lmStep1').style.display = 'none';
          document.getElementById('lmStep2').style.display = '';
          return;
        }

        var usaHerramienta = fd.get('usa_herramienta');
        var herramientaCual = (fd.get('herramienta_cual') || '').toString().trim();
        var currentTool = '';
        if (usaHerramienta === 'si') {
          currentTool = herramientaCual || 'Sí (no especificó cuál)';
        }

        var payload = {
          name: (fd.get('nombre') || '').toString().trim(),
          email: (fd.get('email') || '').toString().trim(),
          whatsapp: (fd.get('whatsapp') || '').toString().trim(),
          industry: INDUSTRY_LABELS[fd.get('industria')] || fd.get('industria') || '',
          volume: VOLUME_LABELS[fd.get('volumen')] || fd.get('volumen') || '',
          currentTool: currentTool
        };

        var btn = document.getElementById('lmSubmitBtn');
        btn.disabled = true;
        btn.querySelector('.lm-btn-text').style.display = 'none';
        btn.querySelector('.lm-btn-loading').style.display = '';

        try {
          var res = await fetch(ENDPOINT, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(payload)
          });
          if (!res.ok) throw new Error('HTTP ' + res.status);
          document.getElementById('lmStep1').style.display = 'none';
          document.getElementById('lmStep2').style.display = '';
          document.getElementById('lmStep2').scrollIntoView({ behavior: 'smooth', block: 'center' });
        } catch (err) {
          console.error('Lead magnet submit error:', err);
          alert('Ocurrió un error al enviar tu solicitud. Por favor intenta de nuevo o escríbenos por WhatsApp.');
          btn.disabled = false;
          btn.querySelector('.lm-btn-text').style.display = '';
          btn.querySelector('.lm-btn-loading').style.display = 'none';
        }
      });
    })();
  </script>

</section>
