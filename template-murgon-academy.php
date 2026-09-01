<?php
/* Template Name: Murgon Academy */
header('X-Robots-Tag: index, follow');
?><!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Starter Kit · Murgon Academy — Tu recepcionista de WhatsApp con IA en 7 días</title>
<meta name="description" content="Monta tu recepcionista de WhatsApp con IA en 7 días, sin saber programar. Blueprints importables, prompts listos y videos paso a paso. Preventa a precio de fundadores.">
<link rel="icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/murgonagency_logo.png">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@600;700;800&family=Familjen+Grotesk:wght@400;500;600&display=swap" rel="stylesheet">
<style>
:root{
  --bg:#08080a;
  --bg-2:#101015;
  --bg-3:#16161c;
  --fg:#f5f5f7;
  --fg-dim:rgba(245,245,247,.82);
  --muted:rgba(245,245,247,.55);
  --faint:rgba(245,245,247,.30);
  --line:rgba(245,245,247,.12);
  --line-2:rgba(245,245,247,.07);
  --green:#37D67A;
  --display:'Syne',sans-serif;
  --body:'Familjen Grotesk',sans-serif;
  --wa-bg:#0B141A; --wa-header:#202C33; --wa-sent:#005C4B; --wa-recv:#1F2C34;
  --wa-text-s:#E7F8F0; --wa-text-r:#E9EFF2; --wa-green:#25D366; --wa-muted:#8696A0;
}
*{margin:0;padding:0;box-sizing:border-box}
html{scroll-behavior:smooth}
body{background:var(--bg);color:var(--fg);font-family:var(--body);font-size:15px;line-height:1.7;-webkit-font-smoothing:antialiased;position:relative;overflow-x:hidden}
a{color:inherit}
img{max-width:100%}
svg{display:block}

#net{position:fixed;inset:0;z-index:0;display:block}
.vignette{position:fixed;inset:0;z-index:1;pointer-events:none;
  background:radial-gradient(120% 90% at 50% 20%, transparent 0%, transparent 34%, rgba(8,8,10,.6) 70%, rgba(8,8,10,.94) 100%);}
.grain{position:fixed;inset:0;z-index:2;pointer-events:none;opacity:.045;mix-blend-mode:overlay;
  background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='160' height='160'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.85' numOctaves='2'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");}
.page{position:relative;z-index:3}

.wrap{max-width:1060px;margin:0 auto;padding:0 24px}
section{padding:96px 0;position:relative}
.eyebrow{font-family:var(--body);font-size:11px;letter-spacing:.32em;text-transform:uppercase;color:var(--faint);font-weight:600;margin-bottom:20px}
h1,h2{font-family:var(--display);font-weight:800;letter-spacing:-.02em;line-height:1.0}
h1{font-size:clamp(40px,7vw,74px)}
h2{font-size:clamp(30px,4.6vw,52px);margin-bottom:18px}
.sub{color:var(--muted);max-width:600px}
.hl{color:var(--fg);position:relative}
.hl::after{content:"";position:absolute;left:0;right:0;bottom:.08em;height:2px;background:rgba(245,245,247,.35)}

.btn{display:inline-flex;align-items:center;gap:9px;font-family:var(--body);font-size:14px;font-weight:600;letter-spacing:.01em;text-decoration:none;padding:15px 28px;border-radius:100px;transition:transform .25s cubic-bezier(.2,.7,.2,1),background .25s,border-color .25s,box-shadow .25s}
.btn svg{width:16px;height:16px}
.btn-solid{background:var(--fg);color:#0a0a0c;box-shadow:0 10px 30px rgba(0,0,0,.35)}
.btn-solid:hover{transform:translateY(-2px);box-shadow:0 16px 40px rgba(255,255,255,.12)}
.btn-ghost{border:1px solid var(--line);color:var(--fg)}
.btn-ghost:hover{transform:translateY(-2px);border-color:rgba(245,245,247,.4);background:rgba(255,255,255,.03)}
.tag{display:inline-block;font-size:11px;letter-spacing:.18em;text-transform:uppercase;color:var(--muted);border:1px solid var(--line);border-radius:100px;padding:7px 15px}

.surface{background:rgba(8,8,10,.82);border-top:1px solid var(--line-2);border-bottom:1px solid var(--line-2)}
.surface-2{background:rgba(16,16,21,.78);border-top:1px solid var(--line-2);border-bottom:1px solid var(--line-2)}

/* TOP BAR */
.topbar{position:sticky;top:0;z-index:50;background:rgba(8,8,10,.72);backdrop-filter:blur(14px);border-bottom:1px solid var(--line-2)}
.topbar .wrap{display:flex;align-items:center;justify-content:space-between;padding-top:14px;padding-bottom:14px}
.brand{font-family:var(--display);font-size:19px;font-weight:800;letter-spacing:-.01em;text-decoration:none;color:var(--fg)}
.brand span{color:var(--muted)}
.topbar .btn{padding:10px 20px;font-size:12.5px}

/* HERO */
.hero{padding:92px 0 84px}
.hero-badges{display:flex;gap:10px;flex-wrap:wrap;margin-bottom:32px}
.hero .sub{font-size:16px;margin:26px 0 12px;color:var(--fg-dim)}
.hero-anchor{color:var(--muted);font-size:13.5px;margin-bottom:34px}
.hero-anchor b{color:var(--fg);font-weight:600}
.hero-cta{display:flex;gap:14px;flex-wrap:wrap;align-items:center;margin-bottom:18px}
.hero-note{display:flex;align-items:center;gap:9px;font-size:12.5px;color:var(--muted);letter-spacing:.04em}
.hero-note .dot{width:7px;height:7px;border-radius:50%;background:var(--green);box-shadow:0 0 10px rgba(55,214,122,.7)}
.hero-grid{display:grid;grid-template-columns:1.2fr .8fr;gap:56px;align-items:center}
.hero-value{border:1px solid var(--line);background:rgba(16,16,21,.62);border-radius:18px;padding:18px;margin:28px 0 28px;max-width:650px}
.hero-value-top{display:flex;align-items:center;justify-content:space-between;gap:14px;padding-bottom:14px;border-bottom:1px solid var(--line-2)}
.hero-value-top strong{font-family:var(--display);font-size:18px;line-height:1.15}
.hero-value-top span{font-size:12px;color:var(--green);border:1px solid rgba(55,214,122,.25);border-radius:100px;padding:5px 10px;white-space:nowrap}
.hero-checks{display:grid;grid-template-columns:repeat(3,1fr);gap:1px;background:var(--line-2);margin-top:14px;border:1px solid var(--line-2);border-radius:12px;overflow:hidden}
.hero-check{background:rgba(8,8,10,.7);padding:15px 14px}
.hero-check b{display:block;font-size:13.5px;color:var(--fg);line-height:1.25;margin-bottom:5px}
.hero-check p{font-size:12.5px;line-height:1.45;color:var(--muted)}
.hero-route{display:grid;grid-template-columns:repeat(3,1fr);gap:10px;margin:14px 0 2px}
.hero-route-item{border:1px solid var(--line-2);border-radius:12px;padding:13px 14px;background:rgba(255,255,255,.025)}
.hero-route-item span{display:block;font-size:10px;letter-spacing:.16em;text-transform:uppercase;color:var(--faint);margin-bottom:5px}
.hero-route-item b{font-size:13px;color:var(--fg);line-height:1.25}
@media(max-width:880px){.hero-grid{grid-template-columns:1fr;gap:56px}.hero{padding-top:64px}.hero-checks,.hero-route{grid-template-columns:1fr}}
@media(max-width:520px){.hero-value{padding:14px;border-radius:14px}.hero-value-top{align-items:flex-start;flex-direction:column}.hero-value-top span{white-space:normal}.hero-check{padding:14px 12px}.hero-route-item{padding:12px}}

/* PHONE MOCK */
.phone-wrap{display:flex;justify-content:center}
.phone{width:280px;height:570px;background:#1D1D1F;border-radius:52px;border:1.5px solid #3A3A3C;box-shadow:0 0 0 .8px #000,inset 0 0 0 1.5px #2C2C2E,0 40px 90px rgba(0,0,0,.7),0 0 90px rgba(0,0,0,.4);position:relative;overflow:hidden;flex-shrink:0}
.phone-di{position:absolute;top:14px;left:50%;transform:translateX(-50%);width:74px;height:23px;background:#000;border-radius:20px;z-index:20}
.phone-screen{position:absolute;inset:11px;border-radius:43px;overflow:hidden}
.wa-screen{display:flex;flex-direction:column;height:100%;background:var(--wa-bg)}
.sb-dark{height:22px;padding:2px 22px 0;display:flex;align-items:center;justify-content:space-between;background:var(--wa-header);flex-shrink:0}
.sb-time{font-size:10px;font-weight:700;color:#fff}
.sb-icons{display:flex;align-items:center;gap:5px}
.wa-header{height:52px;background:var(--wa-header);display:flex;align-items:center;padding:0 10px;gap:9px;border-bottom:.5px solid rgba(255,255,255,0.05);flex-shrink:0}
.wa-back{color:#53BDEB;font-size:22px;font-weight:300;padding-right:2px}
.wa-avatar{width:28px;height:28px;border-radius:50%;background:linear-gradient(135deg,#2f6b5a,rgba(0,0,0,.5));display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:700;color:#fff;flex-shrink:0;font-family:var(--display)}
.wa-info{flex:1}
.wa-name{font-size:11px;font-weight:600;color:#fff}
.wa-status{font-size:8.5px;color:var(--wa-green);margin-top:1px}
.wa-hicons{display:flex;gap:14px;color:var(--wa-muted)}
.wa-body{flex:1;min-height:0;overflow-y:scroll;padding:10px 8px;display:flex;flex-direction:column;gap:4px;scrollbar-width:none;background-color:var(--wa-bg);background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='80' height='80'%3E%3Cpath d='M10 10 Q20 5 30 10 L28 25 Q18 30 10 25Z' fill='none' stroke='%23162028' stroke-width='.6'/%3E%3C/svg%3E");scroll-behavior:auto;overscroll-behavior:contain}
.wa-body::-webkit-scrollbar{display:none}
.bw{display:flex;flex-direction:column;max-width:84%}
.bw.r{align-self:flex-end;align-items:flex-end}
.bw.s{align-self:flex-start;align-items:flex-start}
.b{padding:7px 10px 18px;border-radius:10px;font-size:11.5px;line-height:1.45;position:relative}
.b.r{background:var(--wa-sent);color:var(--wa-text-s);border-radius:10px 3px 10px 10px}
.b.s{background:var(--wa-recv);color:var(--wa-text-r);border-radius:3px 10px 10px 10px}
.b .ct{font-weight:700;letter-spacing:.02em;display:block;margin-bottom:2px}
.b .cline{display:block}
.bt{position:absolute;bottom:4px;right:8px;font-size:9px;color:rgba(255,255,255,.42);display:flex;align-items:center;gap:2px}
.b.r .bt::after{content:'✔✔';color:#53BDEB;font-size:9px;letter-spacing:-5px}
.dc{align-self:center;background:rgba(0,0,0,.3);backdrop-filter:blur(4px);border-radius:8px;padding:4px 12px;font-size:9px;color:rgba(255,255,255,.55);margin:4px 0}
.typ{padding:9px 12px;display:flex;gap:4px;align-items:center;min-width:50px}
.typ span{width:6px;height:6px;border-radius:50%;background:#8696A0;display:block;animation:typingDot 1.1s ease infinite}
.typ span:nth-child(2){animation-delay:.18s}
.typ span:nth-child(3){animation-delay:.36s}
.wa-input{height:50px;background:var(--wa-header);border-top:.5px solid rgba(255,255,255,.05);display:flex;align-items:center;padding:2px 9px 8px;gap:7px;flex-shrink:0}
.wa-input-field{flex:1;background:#2A3942;border-radius:22px;min-height:28px;padding:0 10px;font-size:11px;color:var(--wa-muted);display:flex;align-items:center;justify-content:space-between;gap:6px}
.wa-ic{flex-shrink:0;color:var(--wa-muted);display:block}
@keyframes msgIn{from{opacity:0;transform:translateY(8px)}to{opacity:1;transform:none}}
@keyframes typingDot{0%,60%,100%{transform:translateY(0);opacity:.4}30%{transform:translateY(-5px);opacity:1}}

/* PAIN STRIP */
.pain-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1px;background:var(--line-2);border:1px solid var(--line-2)}
.pain-item{background:rgba(16,16,21,.6);padding:38px 30px}
.pain-item .n{font-family:var(--display);font-size:46px;font-weight:800;color:var(--fg);line-height:1;letter-spacing:-.02em}
.pain-item p{color:var(--muted);font-size:13.5px;margin-top:12px}
@media(max-width:760px){.pain-grid{grid-template-columns:1fr}}

/* FLOW */
.flow-list{margin-top:54px;position:relative}
.flow-list::before{content:"";position:absolute;left:31px;top:36px;bottom:36px;width:1px;background:linear-gradient(var(--line-2),var(--line),var(--line-2))}
.node{display:grid;grid-template-columns:64px 1fr;gap:28px;padding:26px 0;position:relative}
.node-dot{width:64px;height:64px;border-radius:50%;background:var(--bg-2);border:1px solid var(--line);display:flex;align-items:center;justify-content:center;font-family:var(--display);font-weight:800;font-size:22px;color:var(--fg);position:relative;z-index:2}
.node.done .node-dot{border-color:rgba(245,245,247,.45);background:var(--bg-3)}
.node h3{font-family:var(--display);font-size:20px;font-weight:700;letter-spacing:-.01em;margin-bottom:6px}
.node .day{font-size:11px;letter-spacing:.2em;text-transform:uppercase;color:var(--faint);font-weight:600;margin-bottom:8px}
.node p{color:var(--muted);font-size:13.5px;max-width:560px}
.check{display:inline-flex;align-items:center;gap:7px;margin-top:14px;font-size:12px;color:var(--green);border:1px solid rgba(55,214,122,.28);border-radius:100px;padding:6px 13px}
.check svg{width:13px;height:13px}
@media(max-width:600px){.node{grid-template-columns:48px 1fr;gap:18px}.node-dot{width:48px;height:48px;font-size:18px}.flow-list::before{left:23px}}

/* DELIVERABLES */
.dl-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:18px;margin-top:50px}
.dl-card{background:rgba(16,16,21,.6);border:1px solid var(--line-2);border-radius:14px;padding:30px 26px;transition:border-color .25s,transform .25s}
.dl-card:hover{border-color:var(--line);transform:translateY(-3px)}
.dl-ic{width:42px;height:42px;border-radius:11px;border:1px solid var(--line);display:flex;align-items:center;justify-content:center;margin-bottom:18px;color:var(--fg)}
.dl-ic svg{width:20px;height:20px}
.dl-card h4{font-family:var(--display);font-size:17px;font-weight:700;letter-spacing:-.01em;margin-bottom:8px}
.dl-card p{color:var(--muted);font-size:13px}
@media(max-width:820px){.dl-grid{grid-template-columns:1fr 1fr}}
@media(max-width:560px){.dl-grid{grid-template-columns:1fr}}

/* PROOF */
.proof-grid{display:grid;grid-template-columns:1fr 1fr;gap:18px;margin-top:50px}
.proof-card{border:1px solid var(--line-2);border-radius:14px;background:rgba(16,16,21,.6);padding:32px 28px}
.proof-card .q{font-size:14.5px;line-height:1.8;color:var(--fg-dim)}
.proof-card .who{margin-top:18px;font-size:12px;letter-spacing:.16em;text-transform:uppercase;color:var(--faint)}
.proof-card .who b{color:var(--fg);font-weight:600}
@media(max-width:720px){.proof-grid{grid-template-columns:1fr}}

/* PRICING */
.price-card{max-width:640px;margin:54px auto 0;border:1px solid var(--line);border-radius:20px;background:rgba(16,16,21,.85);padding:52px 44px;position:relative;box-shadow:0 30px 80px rgba(0,0,0,.5)}
.price-card .ribbon{position:absolute;top:-13px;left:50%;transform:translateX(-50%);background:var(--fg);color:#0a0a0c;font-size:11px;letter-spacing:.16em;text-transform:uppercase;font-weight:600;padding:7px 18px;border-radius:100px;white-space:nowrap}
.price-old{color:var(--faint);text-decoration:line-through;font-size:17px}
.price-now{font-family:var(--display);font-weight:800;font-size:clamp(58px,10vw,88px);line-height:1;color:var(--fg);margin:6px 0 2px;letter-spacing:-.03em}
.price-now small{font-size:.32em;color:var(--muted);letter-spacing:.06em;font-weight:600}
.price-note{color:var(--muted);font-size:13px;margin-bottom:30px}
.price-list{list-style:none;margin:0 0 32px;padding:0;text-align:left}
.price-list li{display:flex;align-items:flex-start;gap:11px;padding:11px 0;border-bottom:1px solid var(--line-2);font-size:13.5px;color:var(--fg-dim)}
.price-list li:last-child{border-bottom:none}
.price-list li svg{width:16px;height:16px;flex-shrink:0;margin-top:3px;color:var(--fg)}
.price-card .btn{width:100%;justify-content:center}
.guarantee{margin-top:24px;font-size:12.5px;color:var(--muted);line-height:1.7}
.guarantee b{color:var(--fg);font-weight:600}

/* COUNTDOWN */
.count{display:flex;gap:12px;justify-content:center;margin:26px 0 8px}
.count .cbox{border:1px solid var(--line-2);border-radius:12px;background:rgba(16,16,21,.6);min-width:74px;padding:14px 10px}
.count .cnum{font-family:var(--display);font-weight:800;font-size:34px;line-height:1;color:var(--fg)}
.count .clab{font-size:10px;letter-spacing:.18em;text-transform:uppercase;color:var(--faint);margin-top:6px}
.spots{font-size:12px;letter-spacing:.12em;text-transform:uppercase;color:var(--muted);margin-bottom:8px}
.spots b{color:var(--fg);font-weight:600}
.bar{height:6px;background:var(--line);border-radius:100px;max-width:320px;margin:10px auto 0;overflow:hidden}
.bar i{display:block;height:100%;width:35%;background:var(--fg);border-radius:100px}

/* FOR WHO */
.who-grid{display:grid;grid-template-columns:1fr 1fr;gap:18px;margin-top:50px}
.who-col{border:1px solid var(--line-2);border-radius:14px;padding:34px 30px;background:rgba(16,16,21,.6)}
.who-col.yes{border-color:rgba(55,214,122,.28)}
.who-col h4{font-family:var(--display);font-size:20px;font-weight:700;margin-bottom:20px}
.who-col.yes h4{color:var(--green)}
.who-col ul{list-style:none}
.who-col li{display:flex;align-items:flex-start;gap:11px;padding:11px 0;font-size:13.5px;color:var(--muted);border-bottom:1px solid var(--line-2)}
.who-col li:last-child{border:none}
.who-col li svg{width:16px;height:16px;flex-shrink:0;margin-top:3px}
.who-col.yes li svg{color:var(--green)}
.who-col.no li svg{color:var(--faint)}
@media(max-width:720px){.who-grid{grid-template-columns:1fr}}

/* FAQ */
.faq-item{border-bottom:1px solid var(--line-2)}
.faq-item summary{cursor:pointer;list-style:none;padding:22px 0;font-size:15px;font-weight:500;display:flex;justify-content:space-between;align-items:center;gap:20px}
.faq-item summary::-webkit-details-marker{display:none}
.faq-item summary .fq-ic{flex-shrink:0;width:18px;height:18px;color:var(--muted);transition:transform .25s}
.faq-item[open] summary .fq-ic{transform:rotate(45deg);color:var(--fg)}
.faq-item .a{padding:0 0 22px;color:var(--muted);font-size:13.5px;max-width:700px}
.faq-list{margin-top:44px}

/* FINAL CTA */
.final{text-align:center;padding:120px 0}
.final h2{font-size:clamp(38px,6vw,72px)}
.final .sub{margin:22px auto 40px}

/* FOOTER */
footer{border-top:1px solid var(--line-2);padding:40px 0;text-align:center;color:var(--faint);font-size:12px;letter-spacing:.1em}
footer .brand{font-size:17px;display:block;margin-bottom:10px;color:var(--fg)}
footer a{color:var(--muted)}

/* REVEAL */
.rv{opacity:0;transform:translateY(20px);transition:opacity .6s ease,transform .6s ease}
.rv.on{opacity:1;transform:none}
@media(prefers-reduced-motion:reduce){
  .rv{opacity:1!important;transform:none!important;transition:none!important}
  html{scroll-behavior:auto}
}
</style>
</head>
<body>
<canvas id="net"></canvas>
<div class="vignette"></div>
<div class="grain"></div>

<div class="page">

<!-- TOP BAR -->
<div class="topbar">
  <div class="wrap">
    <a class="brand" href="<?php echo esc_url( home_url('/') ); ?>">MURGON <span>ACADEMY</span></a>
    <a class="btn btn-solid" href="#preventa">Reservar mi lugar</a>
  </div>
</div>

<!-- HERO -->
<section class="hero">
  <div class="wrap hero-grid">
    <div>
      <div class="hero-badges">
        <span class="tag">Starter Kit guiado</span>
        <span class="tag">WhatsApp + agenda</span>
        <span class="tag">Sin programar</span>
      </div>
      <h1>Deja armado el primer filtro de <span class="hl">WhatsApp con IA</span> en 7 días</h1>
      <p class="sub">Un kit práctico para negocios que reciben mensajes, cotizaciones o citas por WhatsApp y quieren responder más rápido sin depender de estar pegados al teléfono.</p>

      <div class="hero-value" aria-label="Diagnóstico rápido del sistema">
        <div class="hero-value-top">
          <strong>Entra sabiendo exactamente qué vas a montar</strong>
          <span>Diagnóstico express</span>
        </div>
        <div class="hero-checks">
          <div class="hero-check">
            <b>Si te escriben fuera de horario</b>
            <p>El bot recibe, saluda y pide los datos básicos para no perder el lead.</p>
          </div>
          <div class="hero-check">
            <b>Si repites la misma respuesta</b>
            <p>Centralizas precios, servicios, horarios y preguntas frecuentes en un prompt.</p>
          </div>
          <div class="hero-check">
            <b>Si se te caen citas</b>
            <p>Conectas agenda y recordatorios para confirmar antes de que quede un hueco.</p>
          </div>
        </div>
        <div class="hero-route">
          <div class="hero-route-item"><span>Días 1-2</span><b>WhatsApp responde solo</b></div>
          <div class="hero-route-item"><span>Días 3-5</span><b>IA + agenda conectada</b></div>
          <div class="hero-route-item"><span>Días 6-7</span><b>Recordatorios y pruebas</b></div>
        </div>
      </div>

      <p class="hero-anchor">No compras teoría: recibes blueprints importables, prompts listos y una ruta diaria para terminar con una versión starter funcionando en tu propio negocio.</p>
      <div class="hero-cta">
        <a class="btn btn-solid" href="#preventa">Reservar mi lugar
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
        </a>
        <a class="btn btn-ghost" href="#temario">Ver ruta de 7 días</a>
      </div>
      <p class="hero-note"><span class="dot"></span> Preventa abierta · Para dueños, asistentes y equipos que atienden por WhatsApp</p>
    </div>

    <!-- WhatsApp phone mock -->
    <div class="phone-wrap">
      <div class="phone">
        <div class="phone-di"></div>
        <div class="phone-screen">
          <div class="wa-screen">
            <div class="sb-dark">
              <span class="sb-time">11:47</span>
              <div class="sb-icons">
                <svg width="14" height="10" viewBox="0 0 14 10" fill="white"><rect x="0" y="7" width="2.5" height="3" rx=".5"/><rect x="3.5" y="4.5" width="2.5" height="5.5" rx=".5"/><rect x="7" y="2" width="2.5" height="8" rx=".5"/><rect x="10.5" y="0" width="2.5" height="10" rx=".5"/></svg>
                <svg width="13" height="10" viewBox="0 0 13 10" fill="none"><circle cx="6.5" cy="9.2" r="1.2" fill="white"/><path d="M3 6.2Q6.5 2.8 10 6.2" stroke="white" stroke-width="1.3" stroke-linecap="round"/><path d="M.5 3.5Q6.5-1.2 12.5 3.5" stroke="white" stroke-width="1.3" stroke-linecap="round"/></svg>
                <svg width="20" height="10" viewBox="0 0 20 10" fill="none"><rect x=".5" y=".5" width="17" height="9" rx="1.5" stroke="white" stroke-width="1"/><path d="M18 3.5v3q1.5-1.5 0-3z" fill="white"/><rect x="2" y="2" width="11" height="6" rx=".8" fill="white"/></svg>
              </div>
            </div>
            <div class="wa-header">
              <span class="wa-back">‹</span>
              <div class="wa-avatar">TN</div>
              <div class="wa-info">
                <div class="wa-name">Tu Negocio</div>
                <div class="wa-status">● en línea</div>
              </div>
              <div class="wa-hicons">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"><circle cx="12" cy="5" r="1.4"/><circle cx="12" cy="12" r="1.4"/><circle cx="12" cy="19" r="1.4"/></svg>
              </div>
            </div>
            <div class="wa-body" id="chatBody"></div>
            <div class="wa-input">
              <svg class="wa-ic" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round"><path d="M12 6.5v11M6.5 12h11"/></svg>
              <div class="wa-input-field">
                <span>Mensaje</span>
                <svg class="wa-ic" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><circle cx="12" cy="12" r="9"/><path d="M8.5 14q3.5 2.5 7 0" stroke-linecap="round"/><circle cx="9" cy="10" r=".6" fill="currentColor" stroke="none"/><circle cx="15" cy="10" r=".6" fill="currentColor" stroke="none"/></svg>
              </div>
              <svg class="wa-ic" width="23" height="23" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M3 9a2 2 0 012-2h1.6l1.1-1.6A1 1 0 019.5 5h5a1 1 0 01.8.4L16.4 7H18a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" stroke-linejoin="round"/><circle cx="12" cy="12.5" r="3.3"/></svg>
              <svg class="wa-ic" width="23" height="23" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"><rect x="9" y="3" width="6" height="11" rx="3"/><path d="M6 11.5a6 6 0 0012 0M12 17.5V20.5"/></svg>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- PAIN -->
<section class="surface">
  <div class="wrap">
    <p class="eyebrow rv">El costo de contestar a mano</p>
    <div class="pain-grid rv">
      <div class="pain-item">
        <div class="n">78%</div>
        <p>de los clientes le compra al primero que responde. Si tardas horas, ya compraron en otro lado.</p>
      </div>
      <div class="pain-item">
        <div class="n">40%</div>
        <p>de los mensajes llegan fuera de horario: noches, domingos, días festivos. Nadie los contesta.</p>
      </div>
      <div class="pain-item">
        <div class="n">30%</div>
        <p>de las citas se pierden por no confirmar ni recordar. Sillas vacías que ya estaban vendidas.</p>
      </div>
    </div>
  </div>
</section>

<!-- TEMARIO -->
<section class="flow" id="temario">
  <div class="wrap">
    <p class="eyebrow rv">El plan de 7 días</p>
    <h2 class="rv">Un módulo al día.<br>Un sistema <span class="hl">funcionando</span> al final.</h2>
    <p class="sub rv">Cada módulo termina con una verificación: si la pasas, avanzas. Sin teoría de relleno. Tú solo copias, pegas y conectas — las plantillas ya están construidas.</p>

    <div class="flow-list">
      <div class="node rv done">
        <div class="node-dot">00</div>
        <div>
          <div class="day">Día 1 · 35 min</div>
          <h3>Auditoría express de tu WhatsApp</h3>
          <p>Identificas las 10 preguntas que más repites, los datos que necesitas pedir antes de agendar y el punto exacto donde debe entrar una persona de tu equipo.</p>
          <span class="check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>Verificación: mapa de respuestas listo</span>
        </div>
      </div>
      <div class="node rv">
        <div class="node-dot">01</div>
        <div>
          <div class="day">Día 2</div>
          <h3>Tu primer bot que responde solo</h3>
          <p>Conectas WhatsApp e importas el Blueprint #1: respuestas automáticas a las preguntas que te hacen todos los días. Personalizas los mensajes rellenando campos, no escribiendo desde cero.</p>
          <span class="check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>Verificación: le escribes y el bot responde</span>
        </div>
      </div>
      <div class="node rv">
        <div class="node-dot">02</div>
        <div>
          <div class="day">Días 3–4</div>
          <h3>Dale inteligencia con IA</h3>
          <p>Importas el Blueprint #2 y pegas el prompt maestro pre-escrito con los datos de tu negocio: horarios, servicios, precios. Tu bot ahora responde preguntas abiertas como si fueras tú.</p>
          <span class="check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>Verificación: responde preguntas reales de tu negocio</span>
        </div>
      </div>
      <div class="node rv">
        <div class="node-dot">03</div>
        <div>
          <div class="day">Día 5</div>
          <h3>Agenda citas en automático</h3>
          <p>Blueprint #3: conexión con tu calendario. Configuras horarios, duración y confirmación automática. Las conversaciones terminan en citas agendadas — sin que toques el teléfono.</p>
          <span class="check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>Verificación: cita de prueba en tu calendario</span>
        </div>
      </div>
      <div class="node rv">
        <div class="node-dot">04</div>
        <div>
          <div class="day">Día 6</div>
          <h3>Recordatorios que eliminan el "no llegó"</h3>
          <p>Blueprint #4: recordatorio 24 horas y 2 horas antes de cada cita, con plantilla de confirmación y reagendado incluida.</p>
          <span class="check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>Verificación: recordatorio de prueba recibido</span>
        </div>
      </div>
      <div class="node rv">
        <div class="node-dot">05</div>
        <div>
          <div class="day">Día 7</div>
          <h3>Ponlo a trabajar de verdad</h3>
          <p>Checklist de lanzamiento, los 10 errores más comunes resueltos y la ruta de escalado a humano para cuando el bot no sepa responder.</p>
          <span class="check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>Verificación: sistema activo con clientes reales</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- DELIVERABLES -->
<section class="surface-2">
  <div class="wrap">
    <p class="eyebrow rv">Lo que recibes</p>
    <h2 class="rv">No es un curso.<br>Es un sistema <span class="hl">para armar</span>.</h2>
    <div class="dl-grid">
      <div class="dl-card rv">
        <div class="dl-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"><rect x="2" y="6" width="13" height="12" rx="2"/><path d="M15 10l6-3.5v11L15 14z" stroke-linecap="round"/></svg></div>
        <h4>6 videos paso a paso</h4><p>Pantalla grabada, 5–15 min cada uno. Sigues exactamente lo que ves. Acceso de por vida.</p>
      </div>
      <div class="dl-card rv">
        <div class="dl-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="6" cy="6" r="2.5"/><circle cx="18" cy="6" r="2.5"/><circle cx="12" cy="18" r="2.5"/><path d="M6 8.5v2a2 2 0 002 2h8a2 2 0 002-2v-2M12 12.5v3"/></svg></div>
        <h4>4 blueprints importables</h4><p>Los flujos ya construidos. Los importas con un clic y solo conectas tus cuentas.</p>
      </div>
      <div class="dl-card rv">
        <div class="dl-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"><rect x="6" y="6" width="12" height="12" rx="2"/><rect x="9.5" y="9.5" width="5" height="5" rx="1"/><path d="M9 3v3M15 3v3M9 18v3M15 18v3M3 9h3M3 15h3M18 9h3M18 15h3" stroke-linecap="round"/></svg></div>
        <h4>Prompt maestro + pack por nicho</h4><p>El cerebro de tu bot, pre-escrito. Variantes para estética, dental, coaching e inmobiliaria.</p>
      </div>
      <div class="dl-card rv">
        <div class="dl-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"><path d="M4 5a1 1 0 011-1h14a1 1 0 011 1v10a1 1 0 01-1 1H9l-4 4z"/><path d="M8 9h8M8 12h5" stroke-linecap="round"/></svg></div>
        <h4>Plantillas de mensajes</h4><p>Los copys de WhatsApp listos para rellenar: bienvenida, citas, recordatorios, reagendado.</p>
      </div>
      <div class="dl-card rv">
        <div class="dl-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a4 4 0 00-5.3 5.1l-5.1 5.1a1.6 1.6 0 002.2 2.2l5.1-5.1a4 4 0 005.1-5.3l-2.5 2.5-2-.5-.5-2z"/></svg></div>
        <h4>Troubleshooting de 10 errores</h4><p>Los problemas que van a salir (siempre salen) con su solución exacta, sin buscar en foros.</p>
      </div>
      <div class="dl-card rv">
        <div class="dl-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 7v10M14.5 9.3a2.4 2.4 0 00-2.3-1.3h-.4a2 2 0 000 4h.9a2 2 0 010 4h-.4a2.4 2.4 0 01-2.3-1.3"/></svg></div>
        <h4>Bonus: "Cóbralo"</h4><p>Guión + propuesta simple para instalarle el sistema a otro negocio y cobrar tu primera implementación.</p>
      </div>
    </div>
  </div>
</section>

<!-- PROOF -->
<section>
  <div class="wrap">
    <p class="eyebrow rv">De dónde salen estas plantillas</p>
    <h2 class="rv">Sistemas que ya operan<br>en negocios <span class="hl">reales</span></h2>
    <p class="sub rv">Estos blueprints no son teoría de curso: son versiones simplificadas de los sistemas que Murgon Agency instala y opera para clientes que pagan por ellos cada mes.</p>
    <div class="proof-grid">
      <div class="proof-card rv">
        <p class="q">"Clínicas y estudios de belleza que atendían WhatsApp a mano hoy responden en segundos, agendan solas y confirman cada cita — incluso a las 11 de la noche."</p>
        <p class="who">Sistemas activos en <b>clínicas y estética</b> · México</p>
      </div>
      <div class="proof-card rv">
        <p class="q">"El mismo flujo de captación, agenda y recordatorios que instalamos como agencia — reducido a 4 plantillas que cualquier persona puede importar y conectar."</p>
        <p class="who">Metodología <b>Murgon Agency</b> · desde 2024</p>
      </div>
    </div>
  </div>
</section>

<!-- PRICING -->
<section class="pricing surface-2" id="preventa">
  <div class="wrap" style="text-align:center">
    <p class="eyebrow rv">Preventa · Precio de fundadores</p>
    <h2 class="rv">Reserva tu lugar</h2>
    <p class="sub rv" style="margin:0 auto">El kit se libera el <b id="launchDateLabel" style="color:var(--fg)">—</b>. Los primeros lugares entran a precio de fundadores y participan dando feedback directo sobre el contenido.</p>

    <div class="count rv" id="countdown" aria-label="Tiempo restante de la preventa">
      <div class="cbox"><div class="cnum" id="cd-d">00</div><div class="clab">Días</div></div>
      <div class="cbox"><div class="cnum" id="cd-h">00</div><div class="clab">Horas</div></div>
      <div class="cbox"><div class="cnum" id="cd-m">00</div><div class="clab">Min</div></div>
      <div class="cbox"><div class="cnum" id="cd-s">00</div><div class="clab">Seg</div></div>
    </div>

    <div class="price-card rv">
      <div class="ribbon">Solo 20 lugares de fundadores</div>
      <p class="spots"><b id="spotsLeft">13</b> lugares disponibles</p>
      <div class="bar"><i id="spotsBar"></i></div>
      <p class="price-old" style="margin-top:28px">Precio regular: $114 USD</p>
      <div class="price-now">$57 <small>USD</small></div>
      <p class="price-note">Pago único · Acceso de por vida · Actualizaciones incluidas</p>
      <ul class="price-list">
        <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>Los 6 módulos en video con verificación diaria</li>
        <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>4 blueprints importables listos para conectar</li>
        <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>Prompt maestro + pack de prompts por nicho</li>
        <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>Plantillas de mensajes y troubleshooting completo</li>
        <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>Bonus "Cóbralo": tu primera implementación pagada</li>
        <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>Precio de fundador: nunca vuelve a estar a este precio</li>
      </ul>
      <a class="btn btn-solid" href="#" id="checkoutBtn">Reservar mi lugar por $57 USD
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
      </a>
      <p class="guarantee"><b>Garantía de 7 días:</b> si sigues el Módulo 1 y tu bot no responde, te devolvemos el 100%. Sin preguntas.</p>
    </div>
  </div>
</section>

<!-- FOR WHO -->
<section>
  <div class="wrap">
    <p class="eyebrow rv">Antes de comprar</p>
    <h2 class="rv">¿Es para ti?</h2>
    <div class="who-grid">
      <div class="who-col yes rv">
        <h4>Sí, si tú…</h4>
        <ul>
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>Tienes un negocio de servicios y WhatsApp te come el día</li>
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>Pierdes clientes por contestar tarde o fuera de horario</li>
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>Quieres el sistema funcionando, no un diploma</li>
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>Puedes dedicar 30–60 min al día durante 7 días</li>
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>Quieres aprender automatización con un caso real, no teoría</li>
        </ul>
      </div>
      <div class="who-col no rv">
        <h4>No, si tú…</h4>
        <ul>
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18M6 6l12 12"/></svg>Buscas un negocio "automático" sin invertir ni una hora</li>
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18M6 6l12 12"/></svg>Quieres aprender a programar desde cero (esto es sin código)</li>
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18M6 6l12 12"/></svg>Necesitas un sistema enterprise con la API oficial de Meta — eso es el Pro Kit</li>
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18M6 6l12 12"/></svg>Esperas que alguien lo instale por ti — para eso está la agencia</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- FAQ -->
<section class="faq surface">
  <div class="wrap">
    <p class="eyebrow rv">Preguntas frecuentes</p>
    <h2 class="rv">Lo que seguro<br>te estás preguntando</h2>
    <div class="faq-list rv">
      <details class="faq-item">
        <summary>¿De verdad no necesito saber programar?<svg class="fq-ic" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M12 5v14M5 12h14"/></svg></summary>
        <div class="a">No. Todo el kit está diseñado con la regla de cero decisiones técnicas: las herramientas ya están elegidas, los flujos ya están construidos y los prompts ya están escritos. Tu trabajo es importar, rellenar tus datos y conectar tus cuentas siguiendo el video.</div>
      </details>
      <details class="faq-item">
        <summary>¿Qué necesito para empezar?<svg class="fq-ic" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M12 5v14M5 12h14"/></svg></summary>
        <div class="a">Un número de WhatsApp para tu negocio, una computadora y las cuentas gratuitas que creas en el Módulo 0 (te damos el checklist exacto). No necesitas pagar herramientas para completar el kit.</div>
      </details>
      <details class="faq-item">
        <summary>¿Cuánto tiempo me toma al día?<svg class="fq-ic" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M12 5v14M5 12h14"/></svg></summary>
        <div class="a">Entre 30 y 60 minutos al día durante 7 días. Cada módulo es un video corto más una acción concreta con verificación. Si un día no puedes, el acceso es tuyo de por vida — pero la secuencia de 7 días está diseñada para que termines.</div>
      </details>
      <details class="faq-item">
        <summary>¿Funciona para mi tipo de negocio?<svg class="fq-ic" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M12 5v14M5 12h14"/></svg></summary>
        <div class="a">Si tu negocio agenda citas o responde clientes por WhatsApp — estética, clínicas, coaching, servicios locales, inmobiliaria — sí. El pack de prompts incluye variantes por nicho para que el bot hable el idioma de tu industria.</div>
      </details>
      <details class="faq-item">
        <summary>¿Qué pasa si me atoro?<svg class="fq-ic" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M12 5v14M5 12h14"/></svg></summary>
        <div class="a">Incluye el documento de troubleshooting con los 10 errores más comunes y su solución exacta. Además, los fundadores tienen canal directo de feedback durante la primera cohorte.</div>
      </details>
      <details class="faq-item">
        <summary>¿Por qué está en preventa?<svg class="fq-ic" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M12 5v14M5 12h14"/></svg></summary>
        <div class="a">Porque los primeros 20 lugares definen el producto: entras a precio de fundador, recibes el contenido conforme se libera en la fecha indicada y tu feedback ajusta la versión final. Ese es el intercambio — precio y acceso prioritario por retroalimentación real.</div>
      </details>
      <details class="faq-item">
        <summary>¿Esto reemplaza contratar a una agencia?<svg class="fq-ic" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M12 5v14M5 12h14"/></svg></summary>
        <div class="a">Para empezar, sí: montas la versión starter tú mismo. Cuando tu negocio crezca y necesites la API oficial de Meta, integraciones avanzadas o que alguien lo opere por ti, ahí entran el Pro Kit o el servicio de agencia. Este kit es el primer escalón.</div>
      </details>
    </div>
  </div>
</section>

<!-- FINAL CTA -->
<section class="final">
  <div class="wrap">
    <p class="eyebrow rv">Última llamada</p>
    <h2 class="rv">Tu negocio puede<br>responder <span class="hl">solo</span>.</h2>
    <p class="sub rv">Cada día que WhatsApp se contesta a mano, hay clientes que se van con el que sí respondió. En 7 días eso deja de pasar.</p>
    <a class="btn btn-solid rv" href="#preventa">Reservar mi lugar de fundador
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
    </a>
  </div>
</section>

<!-- FOOTER -->
<footer>
  <div class="wrap">
    <span class="brand">MURGON <span style="color:var(--muted)">ACADEMY</span></span>
    Un producto de Murgon Agency · Tepic, Nayarit, México © 2026<br>
    <a href="<?php echo esc_url( home_url('/') ); ?>">murgonagency.com</a> · <a href="https://wa.me/523117406927" target="_blank" rel="noopener">WhatsApp</a>
  </div>
</footer>

</div><!-- /.page -->

<script>
/* ===== CONFIG — ajusta estos valores ===== */
const CONFIG = {
  launchDate:  "2026-07-20T20:00:00-06:00",
  totalSpots:  20,
  spotsLeft:   13, // actualiza manualmente conforme vendas
  checkoutUrl: "https://pay.hotmart.com/TU_CHECKOUT_AQUI"
};
/* ========================================= */

document.getElementById('checkoutBtn').href = CONFIG.checkoutUrl;
document.getElementById('spotsLeft').textContent = CONFIG.spotsLeft;
document.getElementById('spotsBar').style.width = (CONFIG.spotsLeft / CONFIG.totalSpots * 100) + '%';

const ld = new Date(CONFIG.launchDate);
document.getElementById('launchDateLabel').textContent = ld.toLocaleDateString('es-MX', { day: 'numeric', month: 'long' });

function tick() {
  const diff = ld - new Date();
  if (diff <= 0) { document.getElementById('countdown').style.display = 'none'; return; }
  const d = Math.floor(diff / 864e5),
        h = Math.floor(diff % 864e5 / 36e5),
        m = Math.floor(diff % 36e5 / 6e4),
        s = Math.floor(diff % 6e4 / 1e3);
  const pad = n => String(n).padStart(2, '0');
  document.getElementById('cd-d').textContent = pad(d);
  document.getElementById('cd-h').textContent = pad(h);
  document.getElementById('cd-m').textContent = pad(m);
  document.getElementById('cd-s').textContent = pad(s);
}
tick();
setInterval(tick, 1000);

// Scroll reveal
const io = new IntersectionObserver(es => es.forEach(e => {
  if (e.isIntersecting) { e.target.classList.add('on'); io.unobserve(e.target); }
}), { threshold: .12 });
document.querySelectorAll('.rv').forEach(el => io.observe(el));

/* ===== WHATSAPP CHAT ENGINE ===== */
function chatSequence(chatBodyEl, messages, options) {
  options = options || {};
  chatBodyEl.innerHTML = '';
  var delay = 0;

  function scrollToBottom() { chatBodyEl.scrollTop = chatBodyEl.scrollHeight; }

  function addTypingIndicator() {
    var typ = document.createElement('div');
    typ.className = 'bw s';
    typ.innerHTML = '<div class="b s typ"><span></span><span></span><span></span></div>';
    typ.style.opacity = '0';
    chatBodyEl.appendChild(typ);
    setTimeout(function() { typ.style.animation = 'msgIn .2s ease forwards'; scrollToBottom(); }, 50);
    return typ;
  }

  messages.forEach(function(msg) {
    var msgDelay = delay + (msg.delay || 0);

    if (msg.type === 'divider') {
      var dc = document.createElement('div');
      dc.className = 'dc'; dc.textContent = msg.text;
      setTimeout(function() {
        dc.style.opacity = '0'; chatBodyEl.appendChild(dc);
        requestAnimationFrame(function() { dc.style.animation = 'msgIn .3s ease forwards'; scrollToBottom(); });
      }, msgDelay);
      delay = msgDelay + 300; return;
    }

    if (msg.type === 'sent') {
      var bw = document.createElement('div');
      bw.className = 'bw r';
      bw.innerHTML = '<div class="b r">' + msg.text + '<span class="bt">' + (msg.time || '') + '</span></div>';
      setTimeout(function() {
        bw.style.opacity = '0'; chatBodyEl.appendChild(bw);
        requestAnimationFrame(function() { bw.style.animation = 'msgIn .3s ease forwards'; scrollToBottom(); });
      }, msgDelay);
      delay = msgDelay + 550; return;
    }

    if (msg.type === 'recv' || msg.type === 'card') {
      var typDelay    = delay;
      var typDuration = msg.typingMs || (msg.type === 'card' ? 1200 : 900);
      var typEl       = null;
      setTimeout(function() { typEl = addTypingIndicator(); }, typDelay);
      var showAt = typDelay + typDuration;
      var bw2 = document.createElement('div');
      bw2.className = 'bw s';
      bw2.innerHTML = '<div class="b s">' + msg.text + '<span class="bt">' + (msg.time || '') + '</span></div>';
      setTimeout(function() {
        if (typEl) typEl.remove();
        bw2.style.opacity = '0'; chatBodyEl.appendChild(bw2);
        requestAnimationFrame(function() { bw2.style.animation = 'msgIn .3s ease forwards'; scrollToBottom(); });
      }, showAt);
      delay = showAt + (msg.type === 'card' ? 850 : 700); return;
    }
  });

  if (options.onComplete) setTimeout(options.onComplete, delay + 400);
}

var CHAT_MESSAGES = [
  { type: 'divider', text: 'Hoy · 11:47 PM' },
  { type: 'sent',    text: 'Hola, ¿tienen cita para mañana? 🙏',                           time: '23:47' },
  { type: 'recv',    text: '¡Hola! 👋 Claro que sí. ¿Prefieres un horario en la mañana o en la tarde?', time: '23:47', typingMs: 900 },
  { type: 'sent',    text: 'En la tarde estaría perfecto',                                  time: '23:48' },
  { type: 'recv',    text: 'Genial, estos son los espacios que tengo libres para mañana en la tarde:', time: '23:48', typingMs: 1000 },
  { type: 'card',    text: '<span class="ct">📅 Mañana · Disponibles</span><span class="cline">12:30 PM</span><span class="cline">4:00 PM</span><span class="cline">6:00 PM</span>', time: '23:48', typingMs: 1200 },
  { type: 'sent',    text: 'La de 12:30 me queda 😊',                                       time: '23:49' },
  { type: 'card',    text: '<span class="ct">✓ Cita confirmada</span><span class="cline">Mañana · 12:30 PM</span><span class="cline">Te mando recordatorio 2 h antes.</span>', time: '23:49', typingMs: 1100 },
];

function runChatLoop() {
  var chatBody = document.getElementById('chatBody');
  if (!chatBody) return;
  chatSequence(chatBody, CHAT_MESSAGES, { onComplete: function() { setTimeout(runChatLoop, 5000); } });
}

var phone = document.querySelector('.phone');
if (phone) {
  var chatIO = new IntersectionObserver(function(es) {
    if (es[0].isIntersecting) { runChatLoop(); chatIO.disconnect(); }
  }, { threshold: .35 });
  chatIO.observe(phone);
}

/* ===== RED DE NODOS (fondo animado) ===== */
(function() {
  var c = document.getElementById('net'), x = c.getContext('2d');
  var reduce = window.matchMedia('(prefers-reduced-motion:reduce)').matches;
  var w, h, dpr, nodes, pulses, LINK, COUNT;

  function size() {
    dpr = Math.min(window.devicePixelRatio || 1, 2);
    w = c.width = innerWidth * dpr; h = c.height = innerHeight * dpr;
    c.style.width = innerWidth + 'px'; c.style.height = innerHeight + 'px';
    var area = innerWidth * innerHeight;
    COUNT = Math.max(24, Math.min(56, Math.round(area / 30000)));
    LINK = Math.min(w, h) * 0.18;
    build();
  }

  function build() {
    nodes = []; pulses = [];
    for (var i = 0; i < COUNT; i++) {
      nodes.push({
        x: Math.random() * w, y: Math.random() * h,
        vx: (Math.random() - .5) * 0.14 * dpr,
        vy: (Math.random() - .5) * 0.14 * dpr,
        r: (Math.random() * 1.5 + 1) * dpr
      });
    }
  }

  function spawnPulse() {
    if (pulses.length > 5) return;
    var a = nodes[(Math.random() * nodes.length) | 0];
    var best = null, bd = LINK;
    for (var i = 0; i < nodes.length; i++) {
      var b = nodes[i]; if (b === a) continue;
      var d = Math.hypot(a.x - b.x, a.y - b.y);
      if (d < bd) { bd = d; best = b; }
    }
    if (best) pulses.push({ a: a, b: best, t: 0, sp: 0.012 + Math.random() * 0.012 });
  }

  var tick = 0;
  function frame() {
    x.clearRect(0, 0, w, h);
    for (var i = 0; i < nodes.length; i++) {
      var n = nodes[i];
      n.x += n.vx; n.y += n.vy;
      if (n.x < 0 || n.x > w) n.vx *= -1;
      if (n.y < 0 || n.y > h) n.vy *= -1;
    }
    for (var i = 0; i < nodes.length; i++) {
      for (var j = i + 1; j < nodes.length; j++) {
        var a = nodes[i], b = nodes[j];
        var d = Math.hypot(a.x - b.x, a.y - b.y);
        if (d < LINK) {
          var o = (1 - d / LINK) * 0.13;
          x.strokeStyle = 'rgba(245,245,247,' + o + ')';
          x.lineWidth = 1 * dpr;
          x.beginPath(); x.moveTo(a.x, a.y); x.lineTo(b.x, b.y); x.stroke();
        }
      }
    }
    for (var i = 0; i < nodes.length; i++) {
      var n = nodes[i];
      x.fillStyle = 'rgba(245,245,247,.38)';
      x.beginPath(); x.arc(n.x, n.y, n.r, 0, 6.283); x.fill();
    }
    for (var i = pulses.length - 1; i >= 0; i--) {
      var p = pulses[i]; p.t += p.sp;
      if (p.t >= 1) { pulses.splice(i, 1); continue; }
      var px = p.a.x + (p.b.x - p.a.x) * p.t, py = p.a.y + (p.b.y - p.a.y) * p.t;
      var g = x.createRadialGradient(px, py, 0, px, py, 5 * dpr);
      g.addColorStop(0, 'rgba(255,255,255,.85)'); g.addColorStop(1, 'rgba(255,255,255,0)');
      x.fillStyle = g; x.beginPath(); x.arc(px, py, 5 * dpr, 0, 6.283); x.fill();
    }
    tick++; if (tick % 70 === 0) spawnPulse();
    if (!reduce) requestAnimationFrame(frame);
  }

  addEventListener('resize', size);
  size();
  if (reduce) { frame(); } else { requestAnimationFrame(frame); }
})();
</script>
</body>
</html>
