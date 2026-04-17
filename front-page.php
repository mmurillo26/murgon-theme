<?php
/**
 * front-page.php
 * WordPress usa este archivo para el Home/Front Page.
 * Configurar en: Ajustes → Lectura → "Tu página de inicio muestra" → Página estática → Inicio
 */
get_header(); ?>

<main id="main-content">

  <!-- ══ HERO ══ -->
  <section id="hero" class="section-hero">
    <div class="grid-bg" aria-hidden="true"></div>
    <div class="container">
      <div class="hero-eyebrow">
        <span class="eyebrow-dot" aria-hidden="true"></span>
        Sistemas de Automatización con IA
      </div>
      <h1 class="fade-up">
        Tu negocio trabajando en <em>Piloto Automático.</em>
      </h1>
      <p class="hero-sub fade-up delay-1">
        Implementamos sistemas reales de automatización — WhatsApp, CRM, captación de leads e IA — en 7 a 14 días. Código propio, sin middlemen, con resultados medibles.
      </p>
      <div class="hero-ctas fade-up delay-2">
        <a href="https://wa.me/523117406927?text=Hola%2C%20quiero%20una%20consultor%C3%ADa%20gratuita"
           class="btn-primary"
           target="_blank"
           rel="noopener noreferrer">
          <span aria-hidden="true">💬</span> Agendar consulta gratuita
        </a>
        <a href="#caso" class="btn-secondary">Ver caso real →</a>
      </div>

      <!-- Stats bar -->
      <div class="social-proof fade-up delay-3">
        <div class="sp-item">
          <span class="sp-num">7<span>–14</span> <span class="sp-unit">días</span></span>
          <span class="sp-label">Tiempo promedio de implementación</span>
        </div>
        <div class="sp-item">
          <span class="sp-num">4H<span class="sp-unit"> al día</span></span>
          <span class="sp-label">Ahorradas por tareas automatizadas</span>
        </div>
        <div class="sp-item">
          <span class="sp-num">24<span class="sp-unit">/7</span></span>
          <span class="sp-label">Tu negocio respondiendo automáticamente</span>
        </div>
        <div class="sp-item">
          <span class="sp-num">0</span>
          <span class="sp-label">Dependencia de procesos manuales</span>
        </div>
      </div>

      <!-- Dashboard mockup -->
      <div class="hero-visual fade-up delay-3" aria-hidden="true">
        <div class="metric-card">
          <div class="metric-label">Leads capturados hoy</div>
          <div class="metric-value">34</div>
          <div class="metric-delta">↑ +18% vs ayer</div>
        </div>
        <div class="metric-card">
          <div class="metric-label">Tiempo de respuesta</div>
          <div class="metric-value">&lt; 1 min</div>
          <div class="metric-delta">Automático 24/7</div>
        </div>
        <div class="metric-card">
          <div class="metric-label">Tasa de conversión</div>
          <div class="metric-value">28.4%</div>
          <div class="metric-delta">↑ +11% vs manual</div>
        </div>
        <div class="metric-card metric-wide">
          <div class="metric-label">Bot WhatsApp — Conversación activa</div>
          <div class="bot-demo" id="botDemo" aria-live="polite">
            <div class="msg msg-in  msg--hidden">Hola, ¿cuánto cuesta el servicio de automatización?</div>
            <div class="msg msg-typing msg--hidden" aria-hidden="true"><span></span><span></span><span></span></div>
            <div class="msg msg-out msg--hidden">¡Hola! Gracias por contactarnos 👋 Tenemos 3 planes desde $8,500 MXN. ¿Me dices en qué área quieres automatizar?</div>
            <div class="msg msg-in  msg--hidden">En atención al cliente por WhatsApp</div>
            <div class="msg msg-typing msg--hidden" aria-hidden="true"><span></span><span></span><span></span></div>
            <div class="msg msg-out msg--hidden">Perfecto. ¿Te parece si agendamos una llamada de 20 min esta semana?</div>
          </div>
        </div>
        <div class="metric-card">
          <div class="metric-label">Prospectos calificados</div>
          <div class="metric-value">127</div>
          <div class="metric-delta">Este mes</div>
        </div>
      </div>
    </div>
  </section>

  <!-- ══ PAIN ══ -->
  <section id="pain" class="section-alt">
    <div class="container">
      <div class="section-label">El problema</div>
      <h2>Tu negocio trabaja más de lo que debería</h2>
      <p class="section-sub">La mayoría de las PyMEs pierden ventas todos los días por no tener sistemas. No por falta de clientes.</p>
      <div class="pain-grid">
        <div class="pain-item"><span class="pain-icon" aria-hidden="true">❌</span><p>Respondes mensajes de WhatsApp manualmente todo el día, incluso fines de semana</p></div>
        <div class="pain-item"><span class="pain-icon" aria-hidden="true">❌</span><p>Prospectos que preguntaron y nunca recibieron seguimiento — se fueron con tu competencia</p></div>
        <div class="pain-item"><span class="pain-icon" aria-hidden="true">❌</span><p>No sabes cuántos leads tienes, de dónde vienen ni cuáles están listos para comprar</p></div>
        <div class="pain-item"><span class="pain-icon" aria-hidden="true">❌</span><p>Tu sitio web existe pero no genera contactos ni captura información de visitantes</p></div>
        <div class="pain-item"><span class="pain-icon" aria-hidden="true">❌</span><p>Tareas repetitivas consumen horas de tu equipo cada semana</p></div>
        <div class="pain-item"><span class="pain-icon" aria-hidden="true">❌</span><p>Dependes de personas para operar — si alguien falta, el proceso se rompe</p></div>
      </div>
    </div>
  </section>

  <!-- ══ SERVICES ══ -->
  <section id="servicios">
    <div class="container">
      <div class="section-label">Servicios</div>
      <h2>Sistemas que trabajan por ti</h2>
      <p class="section-sub">Diseñamos e implementamos cada solución desde cero — con código real, integraciones reales y resultados medibles.</p>
      <div class="services-grid">

        <?php
        $services = [
          [ 'icon' => '🤖', 'title' => 'Bot de WhatsApp con IA',       'desc' => 'Asistente inteligente que responde, califica y agenda — disponible 24/7 sin intervención humana.',                 'tags' => ['WhatsApp API','GPT-4','n8n','Twilio'] ],
          [ 'icon' => '⚡', 'title' => 'Automatización de procesos',    'desc' => 'Eliminamos tareas manuales repetitivas: captura de leads, seguimiento, reportes, notificaciones.',              'tags' => ['Make','n8n','Zapier','API integrations'] ],
          [ 'icon' => '📊', 'title' => 'CRM + Pipeline automatizado',   'desc' => 'Sistema centralizado para gestionar leads, seguimientos y conversiones — sin hojas de cálculo.',                'tags' => ['CRM custom','Dashboard','Notificaciones'] ],
          [ 'icon' => '🌐', 'title' => 'Landing pages de captación',    'desc' => 'Páginas web diseñadas para convertir visitantes en leads, integradas con tu sistema de automatización.',       'tags' => ['Diseño UI','SEO','Lead capture'] ],
          [ 'icon' => '🔗', 'title' => 'Integraciones entre herramientas','desc' => 'Conectamos tu stack existente: CRM, email, WhatsApp, redes sociales, ERP — sin duplicar trabajo.',         'tags' => ['API REST','Webhooks','Node.js'] ],
          [ 'icon' => '📈', 'title' => 'Dashboard de métricas',         'desc' => 'Visibilidad en tiempo real de leads, conversiones, tiempos de respuesta y rendimiento del equipo.',           'tags' => ['Analytics','KPIs','Reportes automáticos'] ],
        ];
        foreach ( $services as $s ) : ?>
        <div class="service-card">
          <div class="service-icon" aria-hidden="true"><?php echo esc_html( $s['icon'] ); ?></div>
          <h3><?php echo esc_html( $s['title'] ); ?></h3>
          <p><?php echo esc_html( $s['desc'] ); ?></p>
          <div class="service-tags">
            <?php foreach ( $s['tags'] as $tag ) : ?>
              <span class="tag"><?php echo esc_html( $tag ); ?></span>
            <?php endforeach; ?>
          </div>
        </div>
        <?php endforeach; ?>

      </div>
    </div>
  </section>

  <!-- ══ ROI CALCULATOR ══ -->
  <section id="roi-calculator" class="section-alt">
    <div class="container">
      <div class="section-label">Calculadora</div>
      <h2 class="text-center">¿Cuánto estás dejando ir cada mes?</h2>
      <p class="section-sub text-center">Ajusta los datos de tu negocio y ve en tiempo real cuánto valor está perdiendo sin automatización.</p>

      <div class="roi-wrap">

        <!-- INPUTS -->
        <div class="roi-inputs">

          <div class="roi-field">
            <div class="roi-field-header">
              <label for="roi-msgs">Mensajes / consultas por día</label>
              <span class="roi-val" id="roi-msgs-val">30</span>
            </div>
            <input type="range" id="roi-msgs" min="5" max="200" value="30" step="1">
            <div class="roi-range-labels"><span>5</span><span>200</span></div>
          </div>

          <div class="roi-field">
            <div class="roi-field-header">
              <label for="roi-response">Tiempo de respuesta actual</label>
            </div>
            <div class="roi-radio-group" id="roi-response">
              <label class="roi-radio"><input type="radio" name="response" value="0.25"> &lt; 15 min</label>
              <label class="roi-radio"><input type="radio" name="response" value="1.5" checked> 1–2 hrs</label>
              <label class="roi-radio"><input type="radio" name="response" value="4"> 2–6 hrs</label>
              <label class="roi-radio"><input type="radio" name="response" value="12"> +6 hrs</label>
            </div>
          </div>

          <div class="roi-field">
            <div class="roi-field-header">
              <label for="roi-conv">Tasa de conversión actual</label>
              <span class="roi-val" id="roi-conv-val">15%</span>
            </div>
            <input type="range" id="roi-conv" min="1" max="60" value="15" step="1">
            <div class="roi-range-labels"><span>1%</span><span>60%</span></div>
          </div>

          <div class="roi-field">
            <div class="roi-field-header">
              <label for="roi-ticket">Valor promedio por cliente (MXN)</label>
              <span class="roi-val" id="roi-ticket-val">$1,500</span>
            </div>
            <input type="range" id="roi-ticket" min="200" max="20000" value="1500" step="100">
            <div class="roi-range-labels"><span>$200</span><span>$20k</span></div>
          </div>

          <div class="roi-field">
            <div class="roi-field-header">
              <label for="roi-hours">Horas/semana en tareas repetitivas</label>
              <span class="roi-val" id="roi-hours-val">10 hrs</span>
            </div>
            <input type="range" id="roi-hours" min="1" max="40" value="10" step="1">
            <div class="roi-range-labels"><span>1 hr</span><span>40 hrs</span></div>
          </div>

        </div><!-- /.roi-inputs -->

        <!-- RESULTS -->
        <div class="roi-results">

          <div class="roi-result-card roi-loss">
            <div class="roi-result-label">Ingresos perdidos por mes</div>
            <div class="roi-result-num" id="res-lost">$0</div>
            <div class="roi-result-sub">Leads que no convierten por respuesta lenta</div>
          </div>

          <div class="roi-result-card roi-hours-card">
            <div class="roi-result-label">Horas liberadas por mes</div>
            <div class="roi-result-num" id="res-hours">0 hrs</div>
            <div class="roi-result-sub">Con automatización de tareas repetitivas</div>
          </div>

          <div class="roi-result-card roi-gain">
            <div class="roi-result-label">Ingresos recuperables / mes</div>
            <div class="roi-result-num" id="res-gain">$0</div>
            <div class="roi-result-sub">Estimado con tiempo de respuesta &lt; 1 min</div>
          </div>

          <div class="roi-result-card roi-payback">
            <div class="roi-result-label">Meses para recuperar la inversión</div>
            <div class="roi-result-num" id="res-payback">— </div>
            <div class="roi-result-sub">Plan Starter desde $8,500 MXN</div>
          </div>

          <div class="roi-cta">
            <p>Estos números son tuyos. La automatización no es un gasto — es la diferencia entre crecer o seguir igual.</p>
            <a href="https://wa.me/523117406927?text=Hola%2C%20vi%20la%20calculadora%20de%20ROI%20y%20quiero%20una%20consulta%20gratuita"
               class="btn-primary" target="_blank" rel="noopener noreferrer">
              <span aria-hidden="true">💬</span> Quiero estos resultados
            </a>
          </div>

        </div><!-- /.roi-results -->

      </div><!-- /.roi-wrap -->
    </div>
  </section>

  <!-- ══ CASE STUDY ══ -->
  <section id="caso" class="section-alt">
    <div class="container">
      <div class="section-label">Caso Real</div>
      <h2>Resultados con un cliente real</h2>
      <p class="section-sub">No prometemos — demostramos. Aquí lo que implementamos para un Salón de Belleza local.</p>
      <div class="case-wrapper">
        <div class="case-header">
          <div>
            <span class="case-tag">Caso de éxito</span>
            <h3 class="case-client-title">Salón de Belleza, Tepic Nayarit</h3>
            <p class="case-client-sub">Automatización completa de atención al cliente y captación de citas vía WhatsApp</p>
          </div>
          <div class="case-days">
            <div class="case-days-label">Implementación completada en</div>
            <div class="case-days-value">8 días</div>
          </div>
        </div>
        <div class="case-body">
          <div class="case-metrics">
            <div class="cm"><div class="cm-val">4h→2min</div><div class="cm-label">Tiempo de respuesta promedio</div></div>
            <div class="cm"><div class="cm-val">+60%</div><div class="cm-label">Leads capturados fuera de horario</div></div>
            <div class="cm"><div class="cm-val">0</div><div class="cm-label">Mensajes sin responder en 24h</div></div>
            <div class="cm"><div class="cm-val">100%</div><div class="cm-label">Citas confirmadas automáticamente</div></div>
          </div>
          <div class="case-story">
            <h3>El problema</h3>
            <p>Rocío, dueña de un Salón de Belleza, respondía mensajes de Instagram y WhatsApp manualmente durante todo el día — mientras atendía clientes. Los mensajes fuera de horario quedaban sin respuesta.</p>
            <h3>La solución</h3>
            <p>Implementamos un bot de WhatsApp con IA que responde automáticamente, califica el tipo de servicio solicitado, y agenda citas directamente en su calendario.</p>
            <blockquote class="case-quote">
              "Antes perdía clientes porque no podía responder a tiempo. Ahora el sistema trabaja solo y yo me enfoco en atender a quien ya está en el salón."
              <cite>— Rocío, Salón de Belleza</cite>
            </blockquote>
            <div>
              <div class="stack-label">STACK IMPLEMENTADO</div>
              <div class="tech-stack">
                <span class="stack-tag">WhatsApp Business API</span>
                <span class="stack-tag">Twilio</span>
                <span class="stack-tag">GPT-4o</span>
                <span class="stack-tag">n8n</span>
                <span class="stack-tag">Google Calendar</span>
                <span class="stack-tag">Node.js</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ══ HOW IT WORKS ══ -->
  <section id="como-funciona">
    <div class="container">
      <div class="section-label">Proceso</div>
      <h2 class="text-center">De cero a sistema automatizado</h2>
      <p class="section-sub text-center">Sin entregas a medias. Sin procesos de meses. Un sprint enfocado con entregables claros en cada etapa.</p>
      <div class="steps">
        <?php
        $steps = [
          ['num'=>'01','title'=>'Discovery',              'desc'=>'Mapeamos tus procesos actuales e identificamos los 3 puntos de mayor impacto para automatizar.',                       'time'=>'Día 1–2'],
          ['num'=>'02','title'=>'Diseño del sistema',     'desc'=>'Definimos arquitectura, herramientas y flujos. Entregamos diagrama completo antes de construir.',                       'time'=>'Día 2–4'],
          ['num'=>'03','title'=>'Implementación',         'desc'=>'Construimos e integramos todo: bot, automatizaciones, CRM, landing. Pruebas en entorno staging.',                      'time'=>'Día 4–12'],
          ['num'=>'04','title'=>'Lanzamiento',            'desc'=>'Go live, capacitación de 1h y monitoreo los primeros 7 días. Sistema entregado y funcionando.',                        'time'=>'Día 12–14'],
        ];
        foreach ( $steps as $step ) : ?>
        <div class="step">
          <div class="step-num"><?php echo esc_html( $step['num'] ); ?></div>
          <h3><?php echo esc_html( $step['title'] ); ?></h3>
          <p><?php echo esc_html( $step['desc'] ); ?></p>
          <span class="step-time"><?php echo esc_html( $step['time'] ); ?></span>
        </div>
        <?php endforeach; ?>
      </div>
      <div class="text-center" style="margin-top:48px">
        <a href="https://wa.me/523117406927?text=Hola%2C%20quiero%20una%20consultor%C3%ADa%20gratuita"
           class="btn-primary"
           target="_blank" rel="noopener noreferrer">
          Empieza el proceso →
        </a>
      </div>
    </div>
  </section>

  <!-- ══ ABOUT ══ -->
  <section id="nosotros" class="section-alt">
    <div class="container">
      <div class="section-label">Quién lo construye</div>
      <div class="about-grid">
        <div class="about-photo">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/mario-murillo.png' ); ?>"
               onerror="this.src='https://murgonagency.com/wp-content/uploads/2026/03/IMG_6795-2.png'"
               alt="Mario Murillo — Fundador Murgon Agency"
               loading="lazy" />
          <div class="about-photo-overlay">
            <div class="about-name">Mario Murillo</div>
            <div class="about-role">Fundador · Full Stack Developer</div>
          </div>
        </div>
        <div class="about-content">
          <h2>No soy un consultor.<br>Soy el que construye.</h2>
          <p>Soy desarrollador full stack con 6 años de experiencia en desarrollo de software y comercio digital. Construí Murgon Agency porque vi que muchos negocios pagaban por "consultoría de IA" a personas que nunca habían escrito una línea de código.</p>
          <p>La diferencia: yo implemento. Cada sistema que propongo, lo construyo yo mismo — con herramientas reales, integraciones funcionales y código que puedes auditar.</p>
          <div class="credentials">
            <div class="cred"><span class="cred-icon" aria-hidden="true">⚡</span>Full Stack Developer (Node.js, JS)</div>
            <div class="cred"><span class="cred-icon" aria-hidden="true">🤖</span>AI Systems Builder</div>
            <div class="cred"><span class="cred-icon" aria-hidden="true">🔗</span>Automation Architect</div>
            <div class="cred"><span class="cred-icon" aria-hidden="true">📦</span>E-commerce &amp; SFCC Dev</div>
          </div>
          <div class="tools-section">
            <div class="tools-title">STACK QUE USO EN PRODUCCIÓN</div>
            <div class="tools-list">
              <?php
              $tools = ['n8n','Make','Node.js','GPT-4o','Claude API','Twilio','WhatsApp API','ElevenLabs'];
              foreach ( $tools as $t ) echo '<span class="tool">' . esc_html($t) . '</span>';
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ══ USE CASES ══ -->
  <section id="industrias">
    <div class="container">
      <div class="section-label">Industrias</div>
      <h2>¿Para qué tipo de negocios?</h2>
      <div class="industries-grid">
        <?php
        $industries = [
          ['icon'=>'🏡','title'=>'Agencias Inmobiliarias','desc'=>'Calificación y seguimiento automático de compradores desde el primer contacto.'],
          ['icon'=>'🏥','title'=>'Clínicas y Estética',   'desc'=>'Agendamiento automático, recordatorios y captación de pacientes 24/7.'],
          ['icon'=>'🛒','title'=>'E-commerce',            'desc'=>'Automatización de consultas, pedidos, recuperación de carritos y postventa.'],
          ['icon'=>'📣','title'=>'Agencias de Marketing', 'desc'=>'Reportes automáticos, onboarding y seguimiento de clientes sin fricción.'],
          ['icon'=>'🏪','title'=>'Negocios Locales',      'desc'=>'Respuesta en WhatsApp, embudo de ventas y calificación de prospectos automática.'],
        ];
        foreach ( $industries as $ind ) : ?>
        <div class="service-card industry-card">
          <div class="industry-icon" aria-hidden="true"><?php echo esc_html( $ind['icon'] ); ?></div>
          <h3><?php echo esc_html( $ind['title'] ); ?></h3>
          <p><?php echo esc_html( $ind['desc'] ); ?></p>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ══ PRICING ══ -->
  <section id="precios" class="section-alt">
    <div class="container">
      <div class="section-label">Inversión</div>
      <h2 class="text-center">Planes claros, sin sorpresas</h2>
      <p class="section-sub text-center">Todos los planes incluyen implementación completa, no solo consultoría. Precios en MXN.</p>
      <div class="pricing-grid">

        <div class="price-card">
          <div class="price-tier">STARTER</div>
          <div class="price-amount">$8,500 <span>MXN</span></div>
          <div class="price-desc">Para negocios que quieren automatizar su primer punto de contacto.</div>
          <ul class="price-features">
            <li>Bot de WhatsApp con IA (respuestas + calificación)</li>
            <li>Integración con 1 herramienta (CRM o calendario)</li>
            <li>Landing page de captación</li>
            <li>Flujo de seguimiento automático</li>
            <li>Capacitación y documentación</li>
          </ul>
          <a href="https://wa.me/523117406927?text=Hola%2C%20me%20interesa%20el%20plan%20Starter" class="price-btn" target="_blank" rel="noopener">Empezar con Starter →</a>
        </div>

        <div class="price-card featured">
          <div class="price-tier">SISTEMA COMPLETO</div>
          <div class="price-amount">$18,500 <span>MXN</span></div>
          <div class="price-desc">El sistema completo para captar, calificar y cerrar más clientes automáticamente.</div>
          <ul class="price-features">
            <li>Todo lo del plan Starter</li>
            <li>CRM con pipeline automatizado</li>
            <li>Dashboard de métricas en tiempo real</li>
            <li>Integraciones ilimitadas entre herramientas</li>
            <li>Automatizaciones de seguimiento multi-canal</li>
            <li>30 días de soporte post-lanzamiento</li>
          </ul>
          <a href="https://wa.me/523117406927?text=Hola%2C%20me%20interesa%20el%20plan%20Sistema%20Completo" class="price-btn" target="_blank" rel="noopener">El más popular →</a>
        </div>

        <div class="price-card">
          <div class="price-tier">ENTERPRISE</div>
          <div class="price-amount">A medida</div>
          <div class="price-desc">Para empresas con procesos complejos o múltiples áreas a automatizar.</div>
          <ul class="price-features">
            <li>Auditoría completa de procesos</li>
            <li>Arquitectura de automatización a medida</li>
            <li>Integraciones con sistemas internos (ERP, etc.)</li>
            <li>Equipo dedicado de desarrollo</li>
            <li>Mantenimiento y evolución continua</li>
          </ul>
          <a href="https://wa.me/523117406927?text=Hola%2C%20quiero%20informaci%C3%B3n%20del%20plan%20Enterprise" class="price-btn" target="_blank" rel="noopener">Agendar llamada →</a>
        </div>

      </div>
    </div>
  </section>

  <!-- ══ FAQ ══ -->
  <section id="faq">
    <div class="container">
      <div class="section-label">FAQ</div>
      <h2 class="text-center">Preguntas frecuentes</h2>
      <div class="faq-list">
        <?php
        $faqs = [
          ['q'=>'¿Cuánto tiempo tarda la implementación?',             'a'=>'La mayoría de proyectos quedan listos en 7 a 14 días hábiles, dependiendo de la complejidad. El plan Starter puede estar en producción en menos de una semana. Antes de empezar te entregamos un timeline exacto con fechas de entrega.'],
          ['q'=>'¿Necesito conocimientos técnicos para usar el sistema?','a'=>'No. Diseñamos los sistemas para que cualquier persona pueda operarlos sin saber programación. Incluimos capacitación en video y documentación escrita.'],
          ['q'=>'¿Qué diferencia a Murgon de otras agencias de "IA"?',  'a'=>'La mayoría vende consultoría — te dicen qué hacer pero no lo construyen. Nosotros somos desarrolladores: implementamos, integramos APIs reales, escribimos el código y lo ponemos en producción.'],
          ['q'=>'¿La automatización reemplaza a mi equipo?',            'a'=>'No. Automatiza las tareas repetitivas para que tu equipo se enfoque en cerrar ventas y atender bien a los clientes. Los sistemas se encargan de responder, filtrar y organizar.'],
          ['q'=>'¿Puedo ver el sistema antes de pagar?',               'a'=>'Sí. Antes de que pagues un peso, tendrás una consulta gratuita donde mostramos ejemplos reales funcionando — incluyendo el caso del Salón de Belleza.'],
          ['q'=>'¿Qué pasa después de la implementación?',             'a'=>'Incluimos 7–30 días de soporte post-lanzamiento según el plan. Monitoreamos que todo funcione, ajustamos lo necesario y entregamos documentación completa.'],
        ];
        foreach ( $faqs as $i => $faq ) : ?>
        <div class="faq-item <?php echo $i === 0 ? 'open' : ''; ?>">
          <button class="faq-q" aria-expanded="<?php echo $i === 0 ? 'true' : 'false'; ?>">
            <?php echo esc_html( $faq['q'] ); ?>
            <span class="faq-icon" aria-hidden="true">+</span>
          </button>
          <div class="faq-a" <?php echo $i !== 0 ? 'hidden' : ''; ?>>
            <div class="faq-a-inner"><?php echo esc_html( $faq['a'] ); ?></div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ══ ACADEMY TEASER ══ -->
  <section id="academia" class="section-alt">
    <div class="container">
      <div class="academy-teaser">
        <div class="section-label">Murgon Academy</div>
        <h2>¿Prefieres aprender a<br>implementarlo tú mismo?</h2>
        <p class="section-sub">Curso práctico de automatización con IA. Sin código, desde cero, con casos reales de negocios en México. Empieza con el tutorial gratuito interactivo.</p>
        <div class="academy-meta">
          <span class="academy-badge">5 módulos</span>
          <span class="academy-badge">Acceso de por vida</span>
          <span class="academy-badge">Sin experiencia previa</span>
        </div>
        <a href="<?php echo esc_url( home_url('/murgon-academy') ); ?>" class="btn-primary academy-cta">
          Quiero aprender a hacerlo →
        </a>
      </div>
    </div>
  </section>

  <!-- ══ CTA FINAL ══ -->
  <section id="cta" class="section-cta">
    <div class="container">
      <div class="section-label text-center">¿Listo?</div>
      <h2 class="text-center">Tu negocio puede operar<br>de forma inteligente</h2>
      <p class="section-sub text-center">Agenda una llamada de 20 minutos. Sin compromiso. Analizamos tu negocio y te decimos exactamente qué automatizar primero y qué ROI puedes esperar.</p>
      <div class="cta-actions">
        <a href="https://wa.me/523117406927?text=Hola%2C%20quiero%20una%20consultor%C3%ADa%20gratuita"
           class="btn-primary"
           target="_blank" rel="noopener noreferrer">
          <span aria-hidden="true">💬</span> Agendar consulta gratuita
        </a>
        <a href="mailto:contacto@murgonagency.com" class="btn-secondary">
          ✉ contacto@murgonagency.com
        </a>
      </div>
    </div>
  </section>

</main><!-- /#main-content -->

<!-- ── WHATSAPP FLOAT BUTTON ── -->
<a
  class="whatsapp-float"
  href="https://wa.me/523117406927?text=Hola%2C%20me%20interesa%20saber%20m%C3%A1s%20sobre%20automatizaci%C3%B3n"
  target="_blank"
  rel="noopener"
  aria-label="Chatea con nosotros por WhatsApp"
>
  <span class="whatsapp-float__bubble">¿Hablamos? 💬</span>
  <span class="whatsapp-float__btn">
    <svg width="28" height="28" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path fill="#fff" d="M16 2C8.268 2 2 8.268 2 16c0 2.47.664 4.785 1.82 6.775L2 30l7.418-1.793A13.927 13.927 0 0016 30c7.732 0 14-6.268 14-14S23.732 2 16 2zm0 25.5a11.44 11.44 0 01-5.83-1.594l-.418-.248-4.402 1.064 1.1-4.285-.272-.44A11.46 11.46 0 014.5 16C4.5 9.648 9.648 4.5 16 4.5S27.5 9.648 27.5 16 22.352 27.5 16 27.5zm6.29-8.61c-.344-.172-2.035-1.003-2.35-1.118-.316-.115-.546-.172-.776.172-.23.344-.89 1.118-1.09 1.348-.2.23-.4.258-.744.086-.344-.172-1.452-.535-2.767-1.707-1.022-.912-1.712-2.038-1.912-2.382-.2-.344-.021-.53.15-.701.155-.155.344-.4.516-.602.172-.2.23-.344.344-.573.115-.23.058-.43-.029-.602-.086-.172-.776-1.87-1.063-2.562-.28-.672-.564-.58-.776-.59l-.66-.012c-.23 0-.602.086-.917.43s-1.205 1.176-1.205 2.867 1.234 3.325 1.406 3.555c.172.23 2.43 3.71 5.888 5.204.823.355 1.465.567 1.966.726.826.263 1.578.226 2.172.137.663-.1 2.035-.831 2.322-1.634.287-.803.287-1.49.2-1.634-.086-.143-.315-.23-.66-.4z"/>
    </svg>
  </span>
</a>

<?php get_footer(); ?>
