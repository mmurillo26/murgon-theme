<?php
/**
 * Template Name: Propuesta Fisioterapia Volaré
 * Template Post Type: page
 *
 * Standalone page — no theme header/footer.
 * Create a WordPress page with this template and a private slug.
 */

// Prevent indexing by search engines
header('X-Robots-Tag: noindex, nofollow');
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="noindex, nofollow">
<title>Propuesta — Fisioterapia Volaré</title>
<link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
<style>
  :root {
    --cream: #FAF8F4;
    --cream2: #F2EEE6;
    --ink: #1C1C1A;
    --ink2: #4A4A45;
    --ink3: #8A8A82;
    --accent: #2D6A4F;
    --accent-light: #E8F4EE;
    --accent2: #B7935A;
    --accent2-light: #FBF4E8;
    --border: rgba(28,28,26,0.1);
    --serif: 'DM Serif Display', Georgia, serif;
    --sans: 'DM Sans', sans-serif;
  }

  * { margin: 0; padding: 0; box-sizing: border-box; }

  body {
    background: var(--cream);
    color: var(--ink);
    font-family: var(--sans);
    font-size: 15px;
    line-height: 1.7;
    -webkit-font-smoothing: antialiased;
  }

  .page {
    max-width: 720px;
    margin: 0 auto;
    padding: 60px 40px 80px;
  }

  /* HEADER */
  .header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 56px;
    padding-bottom: 32px;
    border-bottom: 1px solid var(--border);
  }

  .brand {
    display: flex;
    flex-direction: column;
    gap: 4px;
  }

  .brand-name {
    font-family: var(--serif);
    font-size: 18px;
    color: var(--accent);
    letter-spacing: 0.01em;
  }

  .brand-tagline {
    font-size: 11px;
    color: var(--ink3);
    letter-spacing: 0.08em;
    text-transform: uppercase;
  }

  .doc-meta {
    text-align: right;
    font-size: 12px;
    color: var(--ink3);
    line-height: 1.8;
  }

  .doc-meta strong {
    color: var(--ink);
    font-weight: 500;
  }

  /* HERO */
  .hero {
    margin-bottom: 56px;
  }

  .hero-label {
    font-size: 11px;
    font-weight: 500;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: var(--accent);
    margin-bottom: 14px;
  }

  .hero-title {
    font-family: var(--serif);
    font-size: 40px;
    line-height: 1.15;
    color: var(--ink);
    margin-bottom: 20px;
    max-width: 520px;
  }

  .hero-title em {
    font-style: italic;
    color: var(--accent);
  }

  .hero-desc {
    font-size: 15px;
    color: var(--ink2);
    max-width: 480px;
    line-height: 1.75;
  }

  /* SECTION */
  .section {
    margin-bottom: 48px;
  }

  .section-label {
    font-size: 10px;
    font-weight: 500;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--ink3);
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .section-label::after {
    content: '';
    flex: 1;
    height: 1px;
    background: var(--border);
  }

  .section-title {
    font-family: var(--serif);
    font-size: 24px;
    color: var(--ink);
    margin-bottom: 12px;
  }

  p {
    color: var(--ink2);
    margin-bottom: 14px;
    font-size: 14px;
  }

  /* DOLOR CARDS */
  .dolor-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
    margin: 20px 0;
  }

  .dolor-card {
    background: var(--cream2);
    border: 1px solid var(--border);
    border-radius: 12px;
    padding: 18px;
  }

  .dolor-card-num {
    font-family: var(--serif);
    font-size: 32px;
    color: var(--border);
    line-height: 1;
    margin-bottom: 8px;
  }

  .dolor-card-title {
    font-size: 13px;
    font-weight: 500;
    color: var(--ink);
    margin-bottom: 4px;
  }

  .dolor-card-body {
    font-size: 12px;
    color: var(--ink3);
    line-height: 1.5;
    margin: 0;
  }

  /* FLUJO */
  .flow-container {
    background: white;
    border: 1px solid var(--border);
    border-radius: 16px;
    padding: 28px;
    margin: 20px 0;
  }

  .flow-steps {
    display: flex;
    flex-direction: column;
    gap: 0;
  }

  .flow-step {
    display: flex;
    gap: 16px;
    position: relative;
  }

  .flow-step:not(:last-child)::after {
    content: '';
    position: absolute;
    left: 19px;
    top: 40px;
    bottom: -8px;
    width: 1px;
    background: var(--border);
  }

  .flow-icon {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    flex-shrink: 0;
    position: relative;
    z-index: 1;
    margin-bottom: 20px;
  }

  .icon-trigger { background: var(--cream2); border: 1px solid var(--border); }
  .icon-send { background: #E8F4EE; border: 1px solid rgba(45,106,79,0.2); }
  .icon-yes { background: #E8F4EE; border: 1px solid rgba(45,106,79,0.2); }
  .icon-no { background: #FEF0EF; border: 1px solid rgba(220,80,60,0.2); }

  .flow-body {
    padding-top: 8px;
    padding-bottom: 20px;
    flex: 1;
  }

  .flow-title {
    font-size: 14px;
    font-weight: 500;
    color: var(--ink);
    margin-bottom: 3px;
  }

  .flow-desc {
    font-size: 12px;
    color: var(--ink3);
    line-height: 1.5;
    margin: 0;
  }

  .flow-msg {
    background: var(--cream2);
    border-left: 3px solid var(--accent);
    border-radius: 0 8px 8px 0;
    padding: 10px 14px;
    margin-top: 8px;
    font-size: 12px;
    color: var(--ink2);
    font-style: italic;
    line-height: 1.6;
  }

  .flow-branch {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
    margin-top: 8px;
  }

  .branch-card {
    border-radius: 10px;
    padding: 12px 14px;
  }

  .branch-yes {
    background: var(--accent-light);
    border: 1px solid rgba(45,106,79,0.2);
  }

  .branch-no {
    background: #FEF0EF;
    border: 1px solid rgba(220,80,60,0.15);
  }

  .branch-tag {
    font-size: 9px;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    margin-bottom: 4px;
  }

  .branch-yes .branch-tag { color: var(--accent); }
  .branch-no .branch-tag { color: #C0392B; }

  .branch-title {
    font-size: 12px;
    font-weight: 500;
    color: var(--ink);
    margin-bottom: 3px;
  }

  .branch-body {
    font-size: 11px;
    color: var(--ink3);
    line-height: 1.5;
    margin: 0;
  }

  /* PRICING */
  .pricing-wrap {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
    margin: 20px 0;
  }

  .pricing-card {
    border-radius: 16px;
    padding: 24px;
    border: 1px solid var(--border);
  }

  .pricing-main {
    background: var(--accent);
    border-color: var(--accent);
  }

  .pricing-secondary {
    background: white;
  }

  .pricing-tag {
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    margin-bottom: 12px;
  }

  .pricing-main .pricing-tag { color: rgba(255,255,255,0.6); }
  .pricing-secondary .pricing-tag { color: var(--ink3); }

  .pricing-amount {
    font-family: var(--serif);
    font-size: 34px;
    line-height: 1;
    margin-bottom: 4px;
  }

  .pricing-main .pricing-amount { color: white; }
  .pricing-secondary .pricing-amount { color: var(--ink); }

  .pricing-period {
    font-size: 12px;
    margin-bottom: 16px;
  }

  .pricing-main .pricing-period { color: rgba(255,255,255,0.6); }
  .pricing-secondary .pricing-period { color: var(--ink3); }

  .pricing-features {
    list-style: none;
    display: flex;
    flex-direction: column;
    gap: 7px;
  }

  .pricing-features li {
    font-size: 12px;
    display: flex;
    gap: 8px;
    align-items: flex-start;
    line-height: 1.4;
  }

  .pricing-main .pricing-features li { color: rgba(255,255,255,0.85); }
  .pricing-secondary .pricing-features li { color: var(--ink2); }

  .pricing-features li::before {
    content: '→';
    flex-shrink: 0;
    margin-top: 1px;
  }

  .pricing-main .pricing-features li::before { color: rgba(255,255,255,0.4); }
  .pricing-secondary .pricing-features li::before { color: var(--ink3); }

  /* ROI */
  .roi-intro {
    font-size: 14px;
    color: var(--ink2);
    margin-bottom: 20px;
  }

  .roi-metric {
    border: 1px solid var(--border);
    border-radius: 14px;
    overflow: hidden;
    margin-bottom: 12px;
    background: white;
  }

  .roi-metric-header {
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 16px 20px;
    border-bottom: 1px solid var(--border);
    background: var(--cream2);
  }

  .roi-metric-icon {
    width: 36px;
    height: 36px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    flex-shrink: 0;
    background: white;
    border: 1px solid var(--border);
  }

  .roi-metric-label {
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 0.09em;
    text-transform: uppercase;
    color: var(--ink3);
    margin-bottom: 2px;
  }

  .roi-metric-title {
    font-size: 14px;
    font-weight: 500;
    color: var(--ink);
  }

  .roi-metric-body {
    padding: 16px 20px;
    display: grid;
    grid-template-columns: 1fr auto;
    gap: 16px;
    align-items: center;
  }

  .roi-metric-calc {
    font-size: 12px;
    color: var(--ink3);
    line-height: 1.7;
  }

  .roi-metric-calc strong {
    color: var(--ink2);
    font-weight: 500;
  }

  .roi-metric-result {
    text-align: right;
    flex-shrink: 0;
  }

  .roi-metric-num {
    font-family: var(--serif);
    font-size: 28px;
    color: var(--accent);
    line-height: 1;
    white-space: nowrap;
  }

  .roi-metric-num.amber { color: var(--accent2); }
  .roi-metric-num.red { color: #C0392B; }

  .roi-metric-sublabel {
    font-size: 11px;
    color: var(--ink3);
    margin-top: 3px;
    white-space: nowrap;
  }

  .roi-summary {
    background: var(--ink);
    border-radius: 14px;
    padding: 22px 24px;
    margin-top: 20px;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
  }

  .roi-sum-item { text-align: center; }

  .roi-sum-num {
    font-family: var(--serif);
    font-size: 26px;
    color: white;
    line-height: 1;
    margin-bottom: 5px;
  }

  .roi-sum-label {
    font-size: 11px;
    color: rgba(255,255,255,0.45);
    line-height: 1.4;
  }

  .roi-sum-divider {
    width: 1px;
    background: rgba(255,255,255,0.1);
    margin: auto;
  }

  /* INCLUYE */
  .includes-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px;
    margin: 16px 0;
  }

  .include-item {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    font-size: 13px;
    color: var(--ink2);
    padding: 12px 14px;
    background: white;
    border: 1px solid var(--border);
    border-radius: 10px;
  }

  .include-check {
    width: 18px;
    height: 18px;
    border-radius: 50%;
    background: var(--accent-light);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    margin-top: 1px;
  }

  .include-check::after {
    content: '✓';
    font-size: 10px;
    color: var(--accent);
    font-weight: 700;
  }

  /* TIMELINE */
  .timeline {
    display: flex;
    flex-direction: column;
    gap: 0;
    margin: 16px 0;
  }

  .tl-item {
    display: flex;
    gap: 16px;
    position: relative;
  }

  .tl-item:not(:last-child)::after {
    content: '';
    position: absolute;
    left: 15px;
    top: 32px;
    bottom: 0;
    width: 1px;
    background: var(--border);
  }

  .tl-dot {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: var(--cream2);
    border: 1px solid var(--border);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 11px;
    font-weight: 500;
    color: var(--ink3);
    flex-shrink: 0;
    position: relative;
    z-index: 1;
  }

  .tl-body {
    padding: 5px 0 24px;
    flex: 1;
  }

  .tl-title {
    font-size: 13px;
    font-weight: 500;
    color: var(--ink);
    margin-bottom: 2px;
  }

  .tl-desc {
    font-size: 12px;
    color: var(--ink3);
    margin: 0;
  }

  /* CTA */
  .cta-box {
    background: var(--ink);
    border-radius: 20px;
    padding: 36px;
    margin-top: 48px;
    text-align: center;
  }

  .cta-title {
    font-family: var(--serif);
    font-size: 26px;
    color: white;
    margin-bottom: 10px;
    line-height: 1.3;
  }

  .cta-desc {
    font-size: 13px;
    color: rgba(255,255,255,0.55);
    margin-bottom: 24px;
    max-width: 360px;
    margin-left: auto;
    margin-right: auto;
  }

  .cta-steps {
    display: flex;
    justify-content: center;
    gap: 8px;
    flex-wrap: wrap;
    margin-bottom: 28px;
  }

  .cta-step {
    background: rgba(255,255,255,0.08);
    border: 1px solid rgba(255,255,255,0.12);
    border-radius: 8px;
    padding: 8px 14px;
    font-size: 12px;
    color: rgba(255,255,255,0.7);
    display: flex;
    align-items: center;
    gap: 6px;
  }

  .cta-step-num {
    width: 18px;
    height: 18px;
    border-radius: 50%;
    background: rgba(255,255,255,0.15);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 10px;
    color: white;
    font-weight: 600;
    flex-shrink: 0;
  }

  .cta-contact {
    font-size: 12px;
    color: rgba(255,255,255,0.4);
    line-height: 1.8;
  }

  .cta-contact strong {
    color: rgba(255,255,255,0.7);
    font-weight: 500;
  }

  /* FOOTER */
  .footer {
    margin-top: 48px;
    padding-top: 24px;
    border-top: 1px solid var(--border);
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 11px;
    color: var(--ink3);
  }

  .footer-brand {
    font-family: var(--serif);
    font-size: 13px;
    color: var(--accent);
  }

  /* ANIMATIONS */
  @keyframes fadeUp {
    from { opacity: 0; transform: translateY(16px); }
    to { opacity: 1; transform: translateY(0); }
  }

  .hero, .section, .pricing-wrap, .roi-box, .cta-box {
    animation: fadeUp 0.5s ease both;
  }

  .section:nth-child(2) { animation-delay: 0.05s; }
  .section:nth-child(3) { animation-delay: 0.1s; }
  .section:nth-child(4) { animation-delay: 0.15s; }

  @media (max-width: 600px) {
    .page { padding: 40px 20px 60px; }
    .hero-title { font-size: 30px; }
    .dolor-grid, .pricing-wrap, .includes-grid, .roi-grid { grid-template-columns: 1fr; }
    .flow-branch { grid-template-columns: 1fr; }
    .header { flex-direction: column; gap: 12px; }
    .doc-meta { text-align: left; }
  }
</style>
</head>
<body>
<div class="page">

  <!-- HEADER -->
  <div class="header">
    <div class="brand">
      <div class="brand-name">Murgon Agency</div>
      <div class="brand-tagline">Automatización · IA · Sistemas</div>
    </div>
    <div class="doc-meta">
      <strong>Propuesta comercial</strong><br>
      Para: Fisioterapia Volaré<br>
      Fecha: Abril 2026<br>
      Validez - Abril 2026
    </div>
  </div>

  <!-- HERO -->
  <div class="hero">
    <div class="hero-label">Propuesta · Piloto de automatización</div>
    <h1 class="hero-title">Hasta 57 pacientes al día.<br><em>Cero seguimiento manual.</em></h1>
    <p class="hero-desc">Un sistema automático que convierte cada cita completada en una reseña positiva en Google y en datos reales de satisfacción — sin cambiar cómo trabaja tu equipo ni tocar AgendaPro.</p>
  </div>

  <!-- CONTEXTO -->
  <div class="section">
    <div class="section-label">El punto de partida</div>
    <div class="section-title">Lo que identificamos juntos</div>
    <p>Fisioterapia Volaré atiende entre 25 y 57 pacientes diarios con un equipo de 6 personas, todos usando AgendaPro con roles definidos. Más de 10 años construyendo reputación con captación 100% orgánica — sin pagar un solo peso en publicidad.</p>
    <p>El área de oportunidad no está en lo que hacen, sino en lo que no se captura: pacientes satisfechos que se van sin dejar rastro, y una operación que todavía depende de llamadas, Excel y procesos manuales para cosas que podrían ocurrir solas.</p>

    <div class="dolor-grid">
      <div class="dolor-card">
        <div class="dolor-card-num">01</div>
        <div class="dolor-card-title">Reseñas que dependen del azar</div>
        <p class="dolor-card-body">Los fisioterapeutas se olvidan de pedirlas. Nayary no sabe cuántas tiene — solo se entera de las negativas.</p>
      </div>
      <div class="dolor-card">
        <div class="dolor-card-num">02</div>
        <div class="dolor-card-title">Sin medición de satisfacción</div>
        <p class="dolor-card-body">No hay forma de saber si un paciente quedó bien. El buzón de quejas y las encuestas quedaron en el pasado.</p>
      </div>
      <div class="dolor-card">
        <div class="dolor-card-num">03</div>
        <div class="dolor-card-title">20% de cancelaciones sin sistema</div>
        <p class="dolor-card-body">1 de cada 5 pacientes cancela. Sin seguimiento automático, esos horarios se pierden y no se reactivan.</p>
      </div>
      <div class="dolor-card">
        <div class="dolor-card-num">04</div>
        <div class="dolor-card-title">Nayary como cuello de botella</div>
        <p class="dolor-card-body">Las recepcionistas la llaman diario por temas repetitivos: facturas, reportes, validación de expedientes — todo a mano.</p>
      </div>
    </div>
  </div>

  <!-- SOLUCIÓN -->
  <div class="section">
    <div class="section-label">La solución</div>
    <div class="section-title">Flujo de seguimiento automático post-cita</div>
    <p>Un sistema que se activa solo cuando termina cada cita, envía un mensaje personalizado por WhatsApp y enruta la respuesta de forma inteligente — sin que tú hagas nada.</p>

    <div class="flow-container">
      <div class="flow-steps">

        <div class="flow-step">
          <div class="flow-icon icon-trigger">📅</div>
          <div class="flow-body">
            <div class="flow-title">Cita completada en AgendaPro</div>
            <p class="flow-desc">El sistema detecta automáticamente cuando una cita se marca como completada. No requiere ningún cambio en tu flujo actual.</p>
          </div>
        </div>

        <div class="flow-step">
          <div class="flow-icon icon-send">💬</div>
          <div class="flow-body">
            <div class="flow-title">WhatsApp automático al paciente — 24 hrs después</div>
            <p class="flow-desc">El paciente recibe un mensaje personalizado preguntando por su experiencia.</p>
            <div class="flow-msg">"Hola [Nombre], ¿cómo te has sentido después de tu sesión de hoy con Nayary? Nos gustaría saber si tu experiencia fue lo que esperabas 🙂"</div>
          </div>
        </div>

        <div class="flow-step">
          <div class="flow-icon" style="background:#F5F5F5;border:1px solid var(--border);font-size:14px">↔️</div>
          <div class="flow-body">
            <div class="flow-title">El sistema detecta la respuesta y enruta</div>
            <div class="flow-branch">
              <div class="branch-card branch-yes">
                <div class="branch-tag">Respuesta positiva</div>
                <div class="branch-title">→ Invitación a dejar reseña</div>
                <p class="branch-body">"¡Qué gusto saberlo! ¿Nos ayudarías dejando tu opinión aquí? 👉 [link Google Maps directo]"</p>
              </div>
              <div class="branch-card branch-no">
                <div class="branch-tag">Duda o queja</div>
                <div class="branch-title">→ Alerta a Nayary</div>
                <p class="branch-body">Recibes el mensaje del paciente para atenderlo personalmente antes de que escale.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="flow-step">
          <div class="flow-icon icon-yes">⭐</div>
          <div class="flow-body">
            <div class="flow-title">Nueva reseña en Google Maps</div>
            <p class="flow-desc">El paciente llega al link con un solo clic. Sin fricción, sin buscar la clínica manualmente. La tasa de conversión a reseña sube de forma significativa.</p>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- INVERSIÓN -->
  <div class="section">
    <div class="section-label">Inversión</div>
    <div class="section-title">Dos opciones — elige con la que quieres arrancar</div>
    <p>Un piloto enfocado para cerrar rápido y demostrar valor, o un alcance más completo que resuelve los dolores que identificamos en la reunión.</p>

    <div class="pricing-wrap">
      <div class="pricing-card pricing-main">
        <div class="pricing-tag">Opción 1 · Piloto reseñas</div>
        <div class="pricing-amount">$5,500</div>
        <div class="pricing-period">MXN · Setup único</div>
        <ul class="pricing-features">
          <li>Flujo post-cita automático vía WhatsApp</li>
          <li>Análisis de satisfacción con IA</li>
          <li>Link directo a reseña Google Maps</li>
          <li>Alerta a Nayary si hay queja</li>
          <li>Compatible con AgendaPro sin cambios</li>
          <li>Video walkthrough del sistema</li>
        </ul>
        <div style="margin-top:16px;padding-top:14px;border-top:1px solid rgba(255,255,255,0.15);font-size:12px;color:rgba(255,255,255,0.6);">
          + $2,500 MXN/mes retainer
        </div>
      </div>
      <div class="pricing-card pricing-secondary">
        <div class="pricing-tag">Opción 2 · Operación completa</div>
        <div class="pricing-amount">$12,000</div>
        <div class="pricing-period">MXN · Setup único</div>
        <ul class="pricing-features">
          <li>Todo lo de la Opción 1</li>
          <li>Flujo de reactivación de cancelaciones (20%)</li>
          <li>Notificaciones internas para reducir llamadas a Nayary</li>
          <li>Reporte automático semanal de fisioterapeutas</li>
          <li>Encuesta de satisfacción post-tratamiento completo</li>
          <li>Dashboard de métricas mensual</li>
        </ul>
        <div style="margin-top:16px;padding-top:14px;border-top:1px solid var(--border);font-size:12px;color:var(--ink3);">
          + $4,500 MXN/mes retainer
        </div>
      </div>
    </div>

    <div style="background:var(--accent-light);border:1px solid rgba(45,106,79,0.2);border-radius:12px;padding:16px 20px;margin-top:16px;font-size:13px;color:var(--accent);line-height:1.6;">
      <strong style="display:block;margin-bottom:4px;">Recomendación</strong>
      Arrancar con la Opción 1 permite validar el sistema en 7 días con riesgo mínimo. Una vez activo y con resultados documentados, la Opción 2 se justifica sola con los números.
    </div>
  </div>

  <!-- ROI -->
  <div class="section">
    <div class="section-label">Retorno sobre la inversión</div>
    <div class="section-title">¿Cuánto vale este sistema en números reales?</div>
    <p class="roi-intro">Basado en los datos reales de Fisioterapia Volaré: mínimo 25 pacientes/día · 20% de cancelaciones · sesión promedio $350 MXN.</p>

    <div class="roi-metric">
      <div class="roi-metric-header">
        <div class="roi-metric-icon">⏱️</div>
        <div>
          <div class="roi-metric-label">Métrica 01</div>
          <div class="roi-metric-title">Tiempo liberado en seguimiento manual</div>
        </div>
      </div>
      <div class="roi-metric-body">
        <div class="roi-metric-calc">
          <strong>25 pacientes/día mínimo</strong> × 22 días hábiles = <strong>550 pacientes/mes</strong>.<br>
          5 min por seguimiento manual que hoy nadie hace = <strong>45+ horas perdidas al mes</strong>.<br>
          Con el sistema ese tiempo baja a <strong>0 minutos</strong>.
        </div>
        <div class="roi-metric-result">
          <div class="roi-metric-num">45 hrs</div>
          <div class="roi-metric-sublabel">liberadas al mes</div>
        </div>
      </div>
    </div>

    <div class="roi-metric">
      <div class="roi-metric-header">
        <div class="roi-metric-icon">⭐</div>
        <div>
          <div class="roi-metric-label">Métrica 02</div>
          <div class="roi-metric-title">Reseñas nuevas en Google Maps</div>
        </div>
      </div>
      <div class="roi-metric-body">
        <div class="roi-metric-calc">
          550 pacientes/mes × 20% tasa de respuesta = <strong>110 interacciones automáticas</strong>.<br>
          40% de respuestas positivas convierten en reseña = <strong>~44 reseñas nuevas/mes</strong>.<br>
          Cada 10 reseñas nuevas atrae ~1 paciente = <strong>+$1,050 MXN mínimo adicionales al mes</strong>.
        </div>
        <div class="roi-metric-result">
          <div class="roi-metric-num amber">+44</div>
          <div class="roi-metric-sublabel">reseñas/mes estimadas</div>
        </div>
      </div>
    </div>

    <div class="roi-metric">
      <div class="roi-metric-header">
        <div class="roi-metric-icon">🔄</div>
        <div>
          <div class="roi-metric-label">Métrica 03</div>
          <div class="roi-metric-title">Cancelaciones recuperadas (20% actual)</div>
        </div>
      </div>
      <div class="roi-metric-body">
        <div class="roi-metric-calc">
          20% de 550 pacientes/mes = <strong>110 cancelaciones al mes</strong> que hoy se pierden.<br>
          Recuperar el 15% con seguimiento automático = <strong>~16 pacientes reactivados</strong>.<br>
          16 × $350 por sesión = <strong>$5,600 MXN recuperados al mes</strong>.
        </div>
        <div class="roi-metric-result">
          <div class="roi-metric-num">$5,600</div>
          <div class="roi-metric-sublabel">MXN/mes recuperables</div>
        </div>
      </div>
    </div>

    <div class="roi-metric">
      <div class="roi-metric-header">
        <div class="roi-metric-icon">📉</div>
        <div>
          <div class="roi-metric-label">Métrica 04</div>
          <div class="roi-metric-title">Costo de no hacer nada</div>
        </div>
      </div>
      <div class="roi-metric-body">
        <div class="roi-metric-calc">
          Cada mes sin el sistema: <strong>~440 pacientes satisfechos</strong> sin reseña, <strong>110 cancelaciones</strong> no reactivadas, <strong>45 horas</strong> operativas que nadie recupera.<br>
          Todo ocurre silenciosamente — sin que aparezca en ningún reporte.
        </div>
        <div class="roi-metric-result">
          <div class="roi-metric-num red">$6,650+</div>
          <div class="roi-metric-sublabel">MXN/mes en oportunidad perdida</div>
        </div>
      </div>
    </div>

    <div class="roi-metric">
      <div class="roi-metric-header">
        <div class="roi-metric-icon">📆</div>
        <div>
          <div class="roi-metric-label">Métrica 05</div>
          <div class="roi-metric-title">Meses para recuperar el setup fee</div>
        </div>
      </div>
      <div class="roi-metric-body">
        <div class="roi-metric-calc">
          Valor mensual generado: $1,050 (reseñas) + $5,600 (cancelaciones) = <strong>$6,650 MXN/mes</strong>.<br>
          Setup Opción 1: $5,500 ÷ $6,650 = <strong>menos de 1 mes</strong> para recuperar la inversión.<br>
          A partir del mes 2, el sistema genera valor neto positivo de forma indefinida.
        </div>
        <div class="roi-metric-result">
          <div class="roi-metric-num amber">&lt; 1</div>
          <div class="roi-metric-sublabel">mes para recuperar setup</div>
        </div>
      </div>
    </div>

    <div class="roi-summary">
      <div class="roi-sum-item">
        <div class="roi-sum-num">$6,650+</div>
        <div class="roi-sum-label">MXN de valor generado<br>cada mes</div>
      </div>
      <div class="roi-sum-item">
        <div class="roi-sum-num">2.7x</div>
        <div class="roi-sum-label">Retorno mensual vs<br>costo del retainer</div>
      </div>
      <div class="roi-sum-item">
        <div class="roi-sum-num">&lt; 1</div>
        <div class="roi-sum-label">Mes para recuperar<br>el setup completo</div>
      </div>
    </div>
  </div>

  <!-- INCLUYE -->
  <div class="section">
    <div class="section-label">Lo que incluye</div>
    <div class="includes-grid">
      <div class="include-item"><div class="include-check"></div>Flujo automático de seguimiento post-cita</div>
      <div class="include-item"><div class="include-check"></div>Mensajes personalizados con el nombre del paciente</div>
      <div class="include-item"><div class="include-check"></div>Detección inteligente de respuesta positiva/negativa</div>
      <div class="include-item"><div class="include-check"></div>Link directo a tu perfil de Google Maps</div>
      <div class="include-item"><div class="include-check"></div>Alerta en tiempo real si hay queja o duda</div>
      <div class="include-item"><div class="include-check"></div>Compatible con tu flujo actual en AgendaPro</div>
      <div class="include-item"><div class="include-check"></div>Sin aplicaciones nuevas que aprender a usar</div>
      <div class="include-item"><div class="include-check"></div>Reporte mensual de reseñas generadas</div>
    </div>
  </div>

  <!-- TIMELINE -->
  <div class="section">
    <div class="section-label">Implementación</div>
    <div class="section-title">Del acuerdo al sistema activo en 7 días</div>
    <div class="timeline">
      <div class="tl-item">
        <div class="tl-dot">D1</div>
        <div class="tl-body">
          <div class="tl-title">Kickoff y accesos</div>
          <p class="tl-desc">Sesión de 30 min para definir mensajes, horario de envío y configurar accesos necesarios.</p>
        </div>
      </div>
      <div class="tl-item">
        <div class="tl-dot">D3</div>
        <div class="tl-body">
          <div class="tl-title">Construcción y pruebas internas</div>
          <p class="tl-desc">El flujo se configura y se prueba completamente antes de activar con pacientes reales.</p>
        </div>
      </div>
      <div class="tl-item">
        <div class="tl-dot">D5</div>
        <div class="tl-body">
          <div class="tl-title">Demo con Nayary</div>
          <p class="tl-desc">Revisión del flujo completo juntos. Ajustes finales de tono y contenido de mensajes.</p>
        </div>
      </div>
      <div class="tl-item">
        <div class="tl-dot">D7</div>
        <div class="tl-body">
          <div class="tl-title">Sistema activo</div>
          <p class="tl-desc">El flujo se activa con pacientes reales. Tú recibes un video explicando cómo funciona todo.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- CTA -->
  <div class="cta-box">
    <div class="cta-title">¿Con cuál opción arrancamos?</div>
    <p class="cta-desc">Sin contrato de largo plazo. Si en los primeros 30 días no ves valor real, cancelamos sin costo adicional.</p>
    <div class="cta-steps">
      <div class="cta-step"><div class="cta-step-num">1</div>Confirmas la opción por WhatsApp</div>
      <div class="cta-step"><div class="cta-step-num">2</div>Kickoff en 24 hrs</div>
      <div class="cta-step"><div class="cta-step-num">3</div>Sistema activo en 7 días</div>
    </div>
    <div class="cta-contact">
      <strong>Mario Murillo · Murgon Agency</strong><br>
      WhatsApp · 333 251 2917<br>
      Tepic, Nayarit · murgonagency.com
    </div>
  </div>

  <!-- FOOTER -->
  <div class="footer">
    <div class="footer-brand">Murgon Agency</div>
    <div>Documento confidencial · Uso exclusivo de Fisioterapia Volaré</div>
  </div>

</div>
</body>
</html>
