<?php
/**
 * front-page.php
 * WordPress usa este archivo para el Home/Front Page.
 * Configurar en: Ajustes → Lectura → "Tu página de inicio muestra" → Página estática → Inicio
 */
get_header(); ?>

<?php
if ( ! function_exists( 'murgon_whatsapp_icon' ) ) {
  function murgon_whatsapp_icon() {
    return '<svg class="whatsapp-icon" width="24" height="24" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false"><path fill="#ffffff" d="M22.29 18.89c-.34-.17-2.04-1-2.35-1.12-.32-.11-.55-.17-.78.17-.23.35-.89 1.12-1.09 1.35-.2.23-.4.26-.74.09-.35-.17-1.45-.54-2.77-1.71-1.02-.91-1.71-2.04-1.91-2.38-.2-.35-.02-.53.15-.7.15-.16.34-.4.52-.6.17-.2.23-.35.34-.57.12-.23.06-.43-.03-.6-.08-.17-.77-1.87-1.06-2.56-.28-.67-.56-.58-.78-.59l-.66-.01c-.23 0-.6.09-.92.43-.31.35-1.2 1.18-1.2 2.87 0 1.69 1.23 3.33 1.4 3.56.18.23 2.43 3.71 5.89 5.2.82.36 1.47.57 1.97.73.82.26 1.57.23 2.17.14.66-.1 2.03-.83 2.32-1.63.29-.81.29-1.49.2-1.64-.09-.14-.32-.23-.67-.4ZM16.03 5.33c-5.9 0-10.7 4.8-10.7 10.7 0 2.02.57 3.92 1.55 5.54L5.33 27l5.59-1.47a10.66 10.66 0 0 0 5.11 1.3c5.9 0 10.7-4.8 10.7-10.7s-4.8-10.8-10.7-10.8Zm0 19.67c-1.73 0-3.34-.5-4.7-1.36l-.34-.21-3.31.87.89-3.23-.22-.35a8.87 8.87 0 0 1-1.35-4.69c0-4.98 4.05-9.03 9.03-9.03 2.41 0 4.67.94 6.38 2.65a8.96 8.96 0 0 1 2.65 6.38c0 4.92-4.05 8.97-9.03 8.97Z"/></svg>';
  }
}
?>

<main id="main-content">

  <!-- ══ HERO ══ -->
  <section id="hero" class="section-hero">
    <div class="grid-bg" aria-hidden="true"></div>
    <div class="container">
      <h1 class="fade-up">
        Tu negocio trabajando en <em>Piloto Automático.</em>
      </h1>
      <p class="hero-sub fade-up delay-1">
        Convierto tu WhatsApp en una máquina que agenda, da seguimiento y reactiva clientes sola — sin que tu equipo conteste lo mismo 50 veces al día. Integraciones reales, código propio, entregado en 7 a 14 días.
      </p>
      <div class="hero-ctas fade-up delay-2">
        <a href="https://wa.me/523117406927?text=Hola%2C%20quiero%20una%20consultor%C3%ADa%20gratuita"
           class="btn-primary"
           target="_blank"
           rel="noopener noreferrer">
          <?php echo murgon_whatsapp_icon(); ?> Agendar consulta gratuita
        </a>
        <a href="#industrias" class="btn-secondary">Ver demo →</a>
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
        <div class="hero-dashboard">
          <div class="dashboard-topbar">
            <div>
              <span class="dashboard-eyebrow">Panel de automatización</span>
              <strong>WhatsApp conectado a tu operación</strong>
            </div>
            <span class="dashboard-status">En vivo</span>
          </div>

          <div class="dashboard-metrics">
            <div class="metric-card">
              <div class="metric-label">Conversaciones hoy</div>
              <div class="metric-value">34</div>
              <div class="metric-delta">12 listas para seguimiento</div>
            </div>
            <div class="metric-card">
              <div class="metric-label">Respuesta inicial</div>
              <div class="metric-value">18 seg</div>
              <div class="metric-delta">Sin esperar a tu equipo</div>
            </div>
            <div class="metric-card">
              <div class="metric-label">Citas agendadas</div>
              <div class="metric-value">8</div>
              <div class="metric-delta">Confirmadas en calendario</div>
            </div>
          </div>

          <div class="pipeline-panel">
            <div class="pipeline-head">
              <span>Pipeline de hoy</span>
              <small>Actualizado hace 1 min</small>
            </div>
            <div class="pipeline-row">
              <span>Nuevo lead</span>
              <div class="pipeline-bar"><span style="width:72%"></span></div>
              <strong>18</strong>
            </div>
            <div class="pipeline-row">
              <span>Calificado</span>
              <div class="pipeline-bar"><span style="width:48%"></span></div>
              <strong>12</strong>
            </div>
            <div class="pipeline-row">
              <span>Cita enviada</span>
              <div class="pipeline-bar"><span style="width:32%"></span></div>
              <strong>8</strong>
            </div>
          </div>

          <div class="next-actions">
            <div class="action-item">
              <span class="action-dot"></span>
              <div>
                <strong>Juan</strong>
                <small>Cita programada para jueves 5:00 pm</small>
              </div>
            </div>
            <div class="action-item">
              <span class="action-dot action-dot--soft"></span>
              <div>
                <strong>Carlos G.</strong>
                <small>Enviar recordatorio automático en 24 h</small>
              </div>
            </div>
          </div>
        </div>

        <div class="phone-wrap whatsapp-mockup">
          <div class="live-badge">DEMO WHATSAPP</div>
          <div class="phone">
            <div class="phone-di"></div>
            <div class="phone-screen">
              <div class="wa-screen">
                <div class="sb-dark">
                  <span class="sb-time">21:40</span>
                  <div class="sb-icons">
                    <svg width="17" height="12" viewBox="0 0 17 12" fill="currentColor"><rect x="0" y="8" width="3.5" height="4" rx=".6"/><rect x="4.5" y="5.5" width="3.5" height="6.5" rx=".6"/><rect x="9" y="2.5" width="3.5" height="9.5" rx=".6"/><rect x="13.5" y="0" width="3.5" height="12" rx=".6" opacity=".25"/></svg>
                    <svg width="16" height="11" viewBox="0 0 16 11" fill="currentColor"><circle cx="8" cy="10" r="1.5"/><path d="M5 7.5a4.2 4.2 0 016 0" stroke="currentColor" stroke-width="1.4" fill="none" stroke-linecap="round"/><path d="M2 4.5a9 9 0 0112 0" stroke="currentColor" stroke-width="1.4" fill="none" stroke-linecap="round" opacity=".6"/></svg>
                    <span class="sb-battery"><span></span></span>
                  </div>
                </div>
                <div class="wa-header">
                  <span class="wa-back">‹</span>
                  <div class="wa-avatar">M<div class="wa-online"></div></div>
                  <div class="wa-info">
                    <div class="wa-name">Murgon Assistant</div>
                    <div class="wa-status">en línea</div>
                  </div>
                </div>
                <div class="wa-body bot-demo" id="botDemo" aria-live="polite">
                  <div class="dc msg msg--hidden">Hoy</div>
                  <div class="bw r msg msg--hidden"><div class="b r">Hola, ¿tienen disponibilidad esta semana?<span class="bt">21:40</span></div></div>
                  <div class="bw s msg msg-typing msg--hidden" aria-hidden="true"><div class="b s typ"><span></span><span></span><span></span></div></div>
                  <div class="bw s msg msg--hidden"><div class="b s">¡Hola! Sí, tenemos estos horarios disponibles:<br><br>Martes 11:30 am<br>Jueves 5:00 pm<br>Viernes de 9:00 am a 3:00 pm<span class="bt">21:40</span></div></div>
                  <div class="bw r msg msg--hidden"><div class="b r">Jueves a las 5:00 está perfecto.<span class="bt">21:41</span></div></div>
                  <div class="bw s msg msg-typing msg--hidden" aria-hidden="true"><div class="b s typ"><span></span><span></span><span></span></div></div>
                  <div class="bw s msg msg--hidden"><div class="b s">Perfecto. ¿A nombre de quién programo la cita?<span class="bt">21:41</span></div></div>
                  <div class="bw r msg msg--hidden"><div class="b r">A nombre de Juan.<span class="bt">21:42</span></div></div>
                  <div class="bw s msg msg-typing msg--hidden" aria-hidden="true"><div class="b s typ"><span></span><span></span><span></span></div></div>
                  <div class="bw s msg msg--hidden"><div class="b s">✅ CITA PROGRAMADA<br><br>👤 Juan<br>🗓️ Jueves<br>⏰ 5:00 pm<br><br>Te enviaremos un recordatorio 24 h antes.<span class="bt">21:42</span></div></div>
                </div>
                <div class="wa-input"><input class="wa-input-field" placeholder="Escribe un mensaje…" readonly></div>
              </div>
            </div>
          </div>
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
      <div class="section-label">El Motor</div>
      <h2>Un solo sistema. Seis piezas que trabajan juntas.</h2>
      <p class="section-sub">Meta ya da un bot que contesta preguntas. Esto es diferente: seis componentes integrados que convierten tu negocio en una operación autónoma — desde la primera consulta hasta el cierre y el seguimiento.</p>
      <div class="services-grid">

        <?php
        $services = [
          [ 'icon' => '🤖', 'title' => 'Bot de WhatsApp con IA',       'desc' => 'Asistente inteligente que responde, califica y agenda — disponible 24/7 sin intervención humana.',                 'tags' => ['WhatsApp API','OpenAI','n8n','Twilio'] ],
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
            <div class="roi-result-sub">Plan Starter desde $9,500 MXN</div>
          </div>

          <div class="roi-cta">
            <p>Estos números son tuyos. La automatización no es un gasto — es la diferencia entre crecer o seguir igual.</p>
            <a href="https://wa.me/523117406927?text=Hola%2C%20vi%20la%20calculadora%20de%20ROI%20y%20quiero%20una%20consulta%20gratuita"
               class="btn-primary" target="_blank" rel="noopener noreferrer">
              <?php echo murgon_whatsapp_icon(); ?> Quiero estos resultados
            </a>
          </div>

        </div><!-- /.roi-results -->

      </div><!-- /.roi-wrap -->
    </div>
  </section>

  <!-- ══ CASE STUDY ══ -->
  <section id="caso" class="section-alt">
    <div class="container">
      <div class="section-label">Casos Reales</div>
      <h2>Lo que construimos, funciona</h2>
      <p class="section-sub">No prometemos — demostramos. Resultados reales de negocios que ya automatizan sus ventas.</p>

      <div class="cases-slider-wrap" id="casesSlider">
        <div class="cases-track" id="casesTrack">

          <!-- SLIDE 1: Clínica de Fisioterapia -->
          <div class="case-slide">
            <div class="case-wrapper">
              <div class="case-header">
                <div>
                  <span class="case-tag">Caso de éxito · Sistema a medida</span>
                  <h3 class="case-client-title">Clínica de Fisioterapia — Tepic, Nayarit</h3>
                  <p class="case-client-sub">Motor de ventas completo: atención 24/7, agendamiento en CRM personalizado, seguimiento y reactivación de pacientes vía WhatsApp con IA</p>
                </div>
                <div class="case-days">
                  <div class="case-days-label">Sistema entregado en</div>
                  <div class="case-days-value">6 sem</div>
                </div>
              </div>
              <div class="case-body">
                <div class="case-metrics">
                  <div class="cm">
                    <div class="cm-val">&lt; 10 seg</div>
                    <div class="cm-label">Tiempo de respuesta · antes 15–30 min</div>
                  </div>
                  <div class="cm">
                    <div class="cm-val">100%</div>
                    <div class="cm-label">Leads fuera de horario atendidos</div>
                  </div>
                  <div class="cm">
                    <div class="cm-val">0</div>
                    <div class="cm-label">Mensajes sin responder en 24h</div>
                  </div>
                  <div class="cm">
                    <div class="cm-val">0</div>
                    <div class="cm-label">Fricción en la adopción del equipo</div>
                  </div>
                </div>
                <div class="case-story">
                  <h3>El problema</h3>
                  <p>La clínica gestionaba citas y consultas manualmente — solo en horario laboral. Los prospectos que escribían fuera de ese horario no recibían respuesta. Los pacientes que dejaban de asistir nunca eran contactados de nuevo.</p>
                  <h3>La solución</h3>
                  <p>Motor de ventas integrado: atención automática 24/7 vía WhatsApp con IA, agendamiento en CRM personalizado, reactivación de pacientes inactivos y seguimiento automatizado de prospectos. El equipo adoptó el sistema sin cambios forzados — y conserva control total ante cualquier situación fuera del flujo.</p>
                  <div>
                    <div class="stack-label">STACK IMPLEMENTADO</div>
                    <div class="tech-stack">
                      <span class="stack-tag">WhatsApp Business API</span>
                      <span class="stack-tag">OpenAI</span>
                      <span class="stack-tag">n8n</span>
                      <span class="stack-tag">Node.js</span>
                      <span class="stack-tag">CRM con agenda personalizada</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- /slide 1 -->

          <!-- SLIDE 2: Salón de Belleza -->
          <div class="case-slide">
            <div class="case-wrapper">
              <div class="case-header">
                <div>
                  <span class="case-tag">Caso de éxito · 8 días</span>
                  <h3 class="case-client-title">Salón de Belleza — Tepic, Nayarit</h3>
                  <p class="case-client-sub">Atención y agendamiento automático 24/7: citas en Google Calendar, recordatorios, seguimiento post-servicio y reactivación de clientes dormidos</p>
                </div>
                <div class="case-days">
                  <div class="case-days-label">Sistema entregado en</div>
                  <div class="case-days-value">8 días</div>
                </div>
              </div>
              <div class="case-body">
                <div class="case-metrics">
                  <div class="cm">
                    <div class="cm-val">&lt; 30 seg</div>
                    <div class="cm-label">Tiempo de respuesta · antes +2 horas</div>
                  </div>
                  <div class="cm">
                    <div class="cm-val">100%</div>
                    <div class="cm-label">Leads fuera de horario atendidos</div>
                  </div>
                  <div class="cm">
                    <div class="cm-val">0</div>
                    <div class="cm-label">Mensajes sin responder en 24h</div>
                  </div>
                  <div class="cm">
                    <div class="cm-val">100%</div>
                    <div class="cm-label">Citas con recordatorio automático</div>
                  </div>
                </div>
                <div class="case-story">
                  <h3>El problema</h3>
                  <p>El salón perdía clientes porque las consultas llegaban fuera de horario y nadie podía responder. Los clientes que no regresaban no recibían ningún contacto. Las citas se confirmaban por mensaje manual — un proceso lento y propenso a olvidos.</p>
                  <h3>La solución</h3>
                  <p>Sistema que atiende y agenda automáticamente vía WhatsApp las 24 horas: confirma la cita directo en Google Calendar, envía recordatorios antes del servicio, da seguimiento post-visita y reactiva clientes que dejaron de asistir — todo sin intervención del equipo.</p>
                  <div>
                    <div class="stack-label">STACK IMPLEMENTADO</div>
                    <div class="tech-stack">
                      <span class="stack-tag">WhatsApp Business API</span>
                      <span class="stack-tag">n8n</span>
                      <span class="stack-tag">Node.js</span>
                      <span class="stack-tag">Google Calendar</span>
                      <span class="stack-tag">OpenAI</span>
                    </div>
                  </div>
                  <blockquote class="case-quote">
                    "Antes perdía clientes porque no podía responder a tiempo. Ahora el sistema trabaja solo y yo me enfoco en atender a quien ya está en el salón."
                    <cite>— Rocío, Salón de Belleza</cite>
                  </blockquote>
                </div>
              </div>
            </div>
          </div><!-- /slide 2 -->

        </div><!-- /cases-track -->

        <div class="cases-controls">
          <button class="cases-arrow cases-prev" id="casesPrev" aria-label="Caso anterior">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M15 18l-6-6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </button>
          <div class="cases-dots" role="tablist">
            <button class="cases-dot active" data-idx="0" role="tab" aria-selected="true" aria-label="Clínica de Fisioterapia"></button>
            <button class="cases-dot" data-idx="1" role="tab" aria-selected="false" aria-label="Salón de Belleza"></button>
          </div>
          <button class="cases-arrow cases-next" id="casesNext" aria-label="Siguiente caso">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M9 18l6-6-6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </button>
        </div>

      </div><!-- /cases-slider-wrap -->
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
          <?php echo murgon_whatsapp_icon(); ?> Empieza el proceso →
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
          <h2>Estrategia clara.<br>Implementación real.</h2>
          <p>Soy desarrollador full stack con 6 años de experiencia en desarrollo de software y comercio digital. Construí Murgon Agency para ayudar a negocios a convertir ideas de automatización en sistemas concretos, medibles y listos para operar.</p>
          <p>Mi diferenciador es que acompaño la estrategia con ejecución técnica: diseño el flujo, conecto las herramientas, construyo el sistema y dejo integraciones funcionales que puedes revisar, usar y mejorar con el tiempo.</p>
          <div class="credentials">
            <div class="cred"><span class="cred-icon" aria-hidden="true">⚡</span>Full Stack Developer (Backend, Frontend)</div>
            <div class="cred"><span class="cred-icon" aria-hidden="true">🤖</span>AI Systems Builder</div>
            <div class="cred"><span class="cred-icon" aria-hidden="true">🔗</span>Automation Architect</div>
            <div class="cred"><span class="cred-icon" aria-hidden="true">📦</span>E-commerce &amp; SFCC Dev</div>
          </div>
          <div class="tools-section">
            <div class="tools-title">STACK QUE USO EN PRODUCCIÓN</div>
            <div class="tools-list">
              <?php
              $tools = ['n8n','Make','Node.js','OpenAI','Claude API','Twilio','WhatsApp API','ElevenLabs'];
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
          ['icon'=>'🏥','title'=>'Clínicas', 'desc'=>'Agendamiento automático, recordatorios y captación de pacientes 24/7.', 'demo_url'=>'https://demo.murgonagency.com/demo-clinica'],
          ['icon'=>'🏡','title'=>'Agencias Inmobiliarias', 'desc'=>'Calificación y seguimiento automático de compradores desde el primer contacto.', 'demo_url'=>'https://demo.murgonagency.com/demo-inmobiliaria'],
          ['icon'=>'📣','title'=>'Agencias de Marketing', 'desc'=>'Reportes automáticos, onboarding y seguimiento de clientes sin fricción.', 'demo_url'=>'https://demo.murgonagency.com/demo-marketing'],
          ['icon'=>'💇🏻‍♀️ 🧖🏼‍♀️','title'=>'Salones de Belleza y SPA', 'desc'=>'Agendamiento automático, recordatorios y reactivación de clientes dormidos/perdidos.', 'demo_url'=>'https://demo.murgonagency.com/demo-beauty'],
          ['icon'=>'🛒','title'=>'E-commerce', 'desc'=>'Automatización de consultas, pedidos, recuperación de carritos y postventa.', 'demo_url'=>'https://demo.murgonagency.com/demo-ecommerce'],
        ];
        foreach ( $industries as $ind ) : ?>
        <div class="service-card industry-card">
          <div class="industry-icon" aria-hidden="true"><?php echo esc_html( $ind['icon'] ); ?></div>
          <h3><?php echo esc_html( $ind['title'] ); ?></h3>
          <p><?php echo esc_html( $ind['desc'] ); ?></p>
          <?php if ( ! empty( $ind['demo_url'] ) ) : ?>
            <a class="industry-demo-btn" href="<?php echo esc_url( $ind['demo_url'] ); ?>" target="_blank" rel="noopener noreferrer">Ver demo</a>
          <?php endif; ?>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ══ LEAD MAGNET — Diagnóstico gratuito (TASK-04) ══ -->
  <?php get_template_part('template-parts/lead-magnet'); ?>

  <!-- ══ PRICING ══ -->
  <section id="precios" class="section-alt">
    <div class="container">
      <div class="section-label">Inversión</div>
      <h2 class="text-center">Planes claros, sin sorpresas</h2>
      <p class="section-sub text-center">Todos los planes incluyen implementación completa, no solo consultoría. Precios en MXN.</p>
      <div class="pricing-grid">

        <div class="price-card">
          <div class="price-tier">STARTER</div>
          <div class="price-amount">$9,500 <span>MXN</span> <span class="price-usd">~$470 USD</span></div>
          <div class="price-desc">Para negocios que quieren automatizar su primer punto de contacto.</div>
          <ul class="price-features">
            <li>Bot de WhatsApp con IA (respuestas + calificación)</li>
            <li>Integración con 1 herramienta (CRM o calendario)</li>
            <li>Landing page de captación</li>
            <li>Flujo de seguimiento automático</li>
            <li>Capacitación y documentación</li>
          </ul>
          <a href="https://wa.me/523117406927?text=Hola%2C%20me%20interesa%20el%20plan%20Starter%20%249%2C500" class="price-btn" target="_blank" rel="noopener"><?php echo murgon_whatsapp_icon(); ?> Empezar con Starter →</a>
        </div>

        <div class="price-card featured">
          <div class="price-tier">SISTEMA COMPLETO</div>
          <div class="price-amount">$18,500 <span>MXN</span> <span class="price-usd">~$920 USD</span></div>
          <div class="price-desc">El sistema completo para captar, calificar y cerrar más clientes automáticamente.</div>
          <ul class="price-features">
            <li>Todo lo del plan Starter</li>
            <li>CRM con pipeline automatizado</li>
            <li>Dashboard de métricas en tiempo real</li>
            <li>Integraciones ilimitadas entre herramientas</li>
            <li>Automatizaciones de seguimiento multi-canal</li>
            <li>30 días de soporte post-lanzamiento</li>
          </ul>
          <a href="https://wa.me/523117406927?text=Hola%2C%20me%20interesa%20el%20plan%20Sistema%20Completo" class="price-btn" target="_blank" rel="noopener"><?php echo murgon_whatsapp_icon(); ?> El más popular →</a>
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
          <a href="https://wa.me/523117406927?text=Hola%2C%20quiero%20informaci%C3%B3n%20del%20plan%20Enterprise" class="price-btn" target="_blank" rel="noopener"><?php echo murgon_whatsapp_icon(); ?> Agendar llamada →</a>
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
          ['q'=>'¿Qué diferencia a Murgon de otras agencias de "IA"?',  'a'=>'Nuestro enfoque une diagnóstico, estrategia e implementación técnica. Diseñamos los flujos contigo, integramos APIs reales, escribimos el código necesario y dejamos el sistema funcionando en producción.'],
          ['q'=>'¿En qué se diferencia esto del bot nativo de WhatsApp de Meta?', 'a'=>'Meta te da un bot que contesta preguntas frecuentes dentro de WhatsApp Business. Útil, pero limitado. Lo que construimos va mucho más allá: conectamos WhatsApp con tu CRM, agenda, seguimiento y reactivación de prospectos para que todo opere coordinado. No solo contestamos mensajes — automatizamos el ciclo completo desde la primera consulta hasta el cierre.'],
          ['q'=>'¿La automatización reemplaza a mi equipo?',            'a'=>'No. Automatiza las tareas repetitivas para que tu equipo se enfoque en cerrar ventas y atender bien a los clientes. Los sistemas se encargan de responder, filtrar y organizar — y siempre se prioriza el control humano ante cualquier situación fuera de lo normal.'],
          ['q'=>'¿Puedo ver el sistema antes de pagar?',               'a'=>'Sí. Antes de que pagues un peso, tendrás una consulta gratuita donde mostramos ejemplos reales funcionando — incluyendo casos de clínicas y negocios locales.'],
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
          <?php echo murgon_whatsapp_icon(); ?> Agendar consulta gratuita
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
  style="display:none;"
  class="whatsapp-float"
  href="https://wa.me/523117406927?text=Hola%2C%20me%20interesa%20saber%20m%C3%A1s%20sobre%20automatizaci%C3%B3n"
  target="_blank"
  rel="noopener"
  aria-label="Chatea con nosotros por WhatsApp"
>
  <span class="whatsapp-float__bubble">¿Hablamos?</span>
  <span class="whatsapp-float__btn">
    <svg width="28" height="28" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path fill="#fff" d="M16 2C8.268 2 2 8.268 2 16c0 2.47.664 4.785 1.82 6.775L2 30l7.418-1.793A13.927 13.927 0 0016 30c7.732 0 14-6.268 14-14S23.732 2 16 2zm0 25.5a11.44 11.44 0 01-5.83-1.594l-.418-.248-4.402 1.064 1.1-4.285-.272-.44A11.46 11.46 0 014.5 16C4.5 9.648 9.648 4.5 16 4.5S27.5 9.648 27.5 16 22.352 27.5 16 27.5zm6.29-8.61c-.344-.172-2.035-1.003-2.35-1.118-.316-.115-.546-.172-.776.172-.23.344-.89 1.118-1.09 1.348-.2.23-.4.258-.744.086-.344-.172-1.452-.535-2.767-1.707-1.022-.912-1.712-2.038-1.912-2.382-.2-.344-.021-.53.15-.701.155-.155.344-.4.516-.602.172-.2.23-.344.344-.573.115-.23.058-.43-.029-.602-.086-.172-.776-1.87-1.063-2.562-.28-.672-.564-.58-.776-.59l-.66-.012c-.23 0-.602.086-.917.43s-1.205 1.176-1.205 2.867 1.234 3.325 1.406 3.555c.172.23 2.43 3.71 5.888 5.204.823.355 1.465.567 1.966.726.826.263 1.578.226 2.172.137.663-.1 2.035-.831 2.322-1.634.287-.803.287-1.49.2-1.634-.086-.143-.315-.23-.66-.4z"/>
    </svg>
  </span>
</a>

<?php get_footer(); ?>
