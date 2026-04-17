<?php
/* Template Name: Murgon Academy */
header('X-Robots-Tag: index, follow');
?><!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Murgon Academy — Aprende a Automatizar tu Negocio con IA</title>
<meta name="description" content="Curso práctico de automatización con IA para negocios. Sin código. Aprende a implementar WhatsApp con IA, CRM automatizado y flujos inteligentes desde cero.">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@700;800&family=DM+Sans:wght@400;500;600&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
*{margin:0;padding:0;box-sizing:border-box}
:root{
  --bg:      #070910;
  --surface: #0c0f1a;
  --surface2:#101425;
  --surface3:#161b2e;
  --accent:  #00c8ff;
  --accent-dim: rgba(0,200,255,0.12);
  --accent-rim: rgba(0,200,255,0.05);
  --accent2: #0057ff;
  --text:    #e8eaf2;
  --muted:   #7a7f9a;
  --border:  rgba(255,255,255,0.07);
  --green:   #00e5a0;
  --green-dim: rgba(0,229,160,0.12);
  --blue:    #4A90D9;
  --blue-dim:rgba(74,144,217,0.12);
  --red:     #ff4d6d;
  --font-display: 'Syne', sans-serif;
  --font-body:    'DM Sans', sans-serif;
  --font-mono:    'DM Mono', monospace;
}
html{scroll-behavior:smooth}
body{background:var(--bg);color:var(--text);font-family:var(--font-body);min-height:100vh;overflow-x:hidden}

/* ── PROGRESS ── */
.progress-bar{position:fixed;top:0;left:0;right:0;height:3px;background:var(--border);z-index:200}
.progress-fill{height:100%;background:var(--accent);transition:width .5s cubic-bezier(.4,0,.2,1)}

/* ── TOP NAV ── */
.top-nav{position:fixed;top:0;left:0;right:0;height:52px;background:rgba(7,9,16,0.92);backdrop-filter:blur(12px);border-bottom:1px solid var(--border);display:flex;align-items:center;justify-content:space-between;padding:0 24px;z-index:150}
.top-nav-logo{font-family:var(--font-display);font-size:.95rem;font-weight:800;color:var(--text);text-decoration:none;letter-spacing:-.02em}
.top-nav-logo span{color:var(--accent)}

/* ── STEP DOTS ── */
.step-nav{position:fixed;top:14px;left:50%;transform:translateX(-50%);display:flex;align-items:center;gap:6px;z-index:200;background:rgba(7,9,16,.85);padding:7px 14px;border-radius:20px;border:1px solid var(--border);backdrop-filter:blur(8px)}
.dot{width:7px;height:7px;border-radius:50%;background:var(--border);transition:all .3s;border:1px solid rgba(255,255,255,.1)}
.dot.done{background:var(--accent);opacity:.45;border-color:var(--accent)}
.dot.active{background:var(--accent);transform:scale(1.4);border-color:var(--accent)}
.step-count{font-family:var(--font-mono);font-size:10px;color:var(--muted);letter-spacing:1px;margin-left:4px}

/* ── LAYOUT ── */
.wrap{max-width:640px;margin:0 auto;padding:88px 24px 120px}

/* ── STEPS ── */
.step{display:none;animation:fadeUp .4s ease}
.step.active{display:block}
@keyframes fadeUp{from{opacity:0;transform:translateY(18px)}to{opacity:1;transform:translateY(0)}}

/* ── TYPOGRAPHY ── */
.label{font-family:var(--font-mono);font-size:11px;letter-spacing:2.5px;text-transform:uppercase;color:var(--accent);margin-bottom:14px}
h1{font-family:var(--font-display);font-size:clamp(52px,11vw,80px);line-height:.92;letter-spacing:-.01em;margin-bottom:20px;font-weight:800}
h2{font-family:var(--font-display);font-size:clamp(36px,8vw,56px);line-height:.94;letter-spacing:-.01em;margin-bottom:16px;font-weight:800}
.hl{color:var(--accent)}
.sub{font-size:15px;color:var(--muted);line-height:1.65;margin-bottom:28px}

/* ── BUTTONS ── */
.btn-main{display:inline-flex;align-items:center;gap:10px;background:var(--accent);color:var(--bg);font-family:var(--font-mono);font-size:13px;letter-spacing:.5px;padding:14px 28px;border-radius:6px;border:none;cursor:pointer;transition:all .2s;font-weight:500;text-decoration:none}
.btn-main:hover{filter:brightness(1.1);transform:translateY(-1px)}
.btn-main:active{transform:translateY(0)}
.btn-main.full{width:100%;justify-content:center;font-size:14px;padding:16px}
.btn-ghost{display:inline-flex;align-items:center;gap:6px;background:transparent;color:var(--muted);font-family:var(--font-mono);font-size:12px;padding:10px 0;border:none;cursor:pointer;transition:color .2s}
.btn-ghost:hover{color:var(--text)}

/* ── BOTTOM NAV ── */
.nav-bot{position:fixed;bottom:0;left:0;right:0;background:linear-gradient(to top,var(--bg) 60%,transparent);padding:24px 24px 28px;display:flex;justify-content:center;align-items:center;gap:14px;z-index:100}

/* ── S0: HERO ── */
.hero-flow{display:flex;align-items:center;gap:10px;margin:32px 0 36px}
.h-node{flex:1;background:var(--surface);border:1px solid var(--border);border-radius:10px;padding:16px 10px;text-align:center}
.h-node .ic{font-size:22px;display:block;margin-bottom:6px}
.h-node .nl{font-family:var(--font-mono);font-size:9px;color:var(--muted);text-transform:uppercase;letter-spacing:1px;line-height:1.3}
.arrow-anim{display:flex;align-items:center;flex-shrink:0}
.arrow-line{width:32px;height:2px;background:var(--accent);position:relative;animation:pulse 1.6s ease infinite}
.arrow-line::after{content:'';position:absolute;right:-7px;top:-4px;border-left:8px solid var(--accent);border-top:5px solid transparent;border-bottom:5px solid transparent}
@keyframes pulse{0%,100%{opacity:1}50%{opacity:.2}}

.stats{display:grid;grid-template-columns:1fr 1fr 1fr;gap:10px;margin:24px 0 32px}
.stat{background:var(--surface);border:1px solid var(--border);border-radius:10px;padding:16px 10px;text-align:center}
.stat .n{font-family:var(--font-display);font-size:30px;color:var(--accent);display:block;font-weight:800}
.stat .d{font-size:11px;color:var(--muted);line-height:1.3}

/* ── S1: PAIRS ── */
.pairs{display:flex;flex-direction:column;gap:10px;margin:28px 0}
.pair{display:grid;grid-template-columns:1fr 48px 1fr;align-items:center;gap:8px}
.pbox{background:var(--surface);border:1px solid var(--border);border-radius:10px;padding:14px}
.pbox.t{border-color:rgba(74,144,217,.4)}
.pbox.a{border-color:rgba(0,229,160,.4)}
.pbox .pt{font-family:var(--font-mono);font-size:9px;letter-spacing:2px;text-transform:uppercase;margin-bottom:5px}
.pbox.t .pt{color:var(--blue)}
.pbox.a .pt{color:var(--green)}
.pbox .px{font-size:12px;color:var(--text);line-height:1.4}
.mid{display:flex;flex-direction:column;align-items:center;gap:3px}
.mid-lbl{font-family:var(--font-mono);font-size:12px;color:var(--accent)}
.mid-line{width:2px;height:16px;background:var(--accent);opacity:.4}

.demo-box{background:var(--surface);border:1px solid var(--border);border-radius:10px;overflow:hidden;margin:20px 0}
.demo-top{background:var(--surface2);padding:11px 16px;display:flex;align-items:center;gap:8px;border-bottom:1px solid var(--border)}
.demo-blink{width:9px;height:9px;border-radius:50%;background:var(--accent);animation:pulse 2s ease infinite}
.demo-ttl{font-family:var(--font-mono);font-size:10px;color:var(--muted);letter-spacing:1px}
.demo-msgs{padding:16px;display:flex;flex-direction:column;gap:8px}
.msg-in{background:var(--surface2);border-radius:12px 12px 12px 4px;padding:10px 14px;font-size:13px;align-self:flex-start;max-width:80%}
.msg-out{background:var(--accent-dim);border:1px solid rgba(0,200,255,.25);border-radius:12px 12px 4px 12px;padding:10px 14px;font-size:13px;align-self:flex-end;max-width:85%;opacity:0;transition:opacity .5s .9s;text-align:right}
.msg-out.vis{opacity:1}
.msg-time{font-family:var(--font-mono);font-size:10px;color:var(--accent);align-self:flex-end;opacity:0;transition:opacity .3s 1.6s}
.msg-time.vis{opacity:1}

/* ── S2: BLOCKS ── */
.blocks{display:flex;flex-direction:column;gap:10px;margin:28px 0}
.blk{border:1px solid var(--border);border-radius:10px;overflow:hidden;cursor:pointer;transition:border-color .25s}
.blk:hover,.blk.open{border-color:var(--accent)}
.blk-head{display:flex;align-items:center;gap:12px;padding:15px 18px;background:var(--surface)}
.blk-ic{width:38px;height:38px;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:17px;flex-shrink:0}
.ic-t{background:var(--blue-dim)}
.ic-c{background:var(--accent-dim)}
.ic-a{background:var(--green-dim)}
.blk-name{font-family:var(--font-display);font-size:20px;letter-spacing:-.01em;line-height:1;margin-bottom:1px;font-weight:700}
.blk-tag{font-size:12px;color:var(--muted)}
.blk-arr{margin-left:auto;color:var(--muted);font-size:13px;transition:transform .3s}
.blk.open .blk-arr{transform:rotate(180deg)}
.blk-body{display:none;padding:14px 18px;background:var(--surface2);border-top:1px solid var(--border);animation:fadeUp .3s ease}
.blk.open .blk-body{display:block}
.blk-body p{font-size:13px;color:var(--muted);line-height:1.6;margin-bottom:12px}
.pills{display:flex;flex-wrap:wrap;gap:7px}
.pill{background:var(--surface3);border:1px solid var(--border);border-radius:20px;padding:5px 12px;font-family:var(--font-mono);font-size:10px;color:var(--muted)}

/* ── S3: BUILDER ── */
.builder{margin:20px 0}
.bnode{background:var(--surface);border:1px solid var(--border);border-radius:10px;overflow:hidden;transition:border-color .25s}
.bnode.sel{border-color:var(--accent)}
.bnode-head{display:flex;align-items:center;gap:11px;padding:13px 16px;cursor:pointer}
.bnum{width:24px;height:24px;border-radius:50%;border:1px solid var(--border);display:flex;align-items:center;justify-content:center;font-family:var(--font-mono);font-size:10px;color:var(--muted);flex-shrink:0;transition:all .25s}
.bnode.sel .bnum{background:var(--accent);border-color:var(--accent);color:var(--bg)}
.btype{font-family:var(--font-mono);font-size:9px;letter-spacing:2px;text-transform:uppercase;color:var(--muted);flex:1}
.bval{font-size:12px;color:var(--text);font-weight:500;text-align:right;max-width:58%}
.bopts{display:none;padding:0 14px 12px;flex-direction:column;gap:7px}
.bnode.open .bopts{display:flex}
.opt{display:flex;align-items:center;gap:10px;padding:10px 12px;border-radius:8px;border:1px solid var(--border);background:var(--surface2);cursor:pointer;transition:all .2s;text-align:left;width:100%}
.opt:hover{border-color:var(--accent);background:var(--accent-rim)}
.opt.on{border-color:var(--accent);background:var(--accent-dim)}
.opt-ic{font-size:15px;flex-shrink:0}
.opt-tx{font-size:13px;color:var(--text);flex:1}
.opt-mt{font-family:var(--font-mono);font-size:10px;color:var(--muted)}

.conn{display:flex;justify-content:center;padding:3px 0}
.cline{width:2px;height:22px;background:var(--border);transition:background .4s}
.cline.on{background:var(--accent)}
.carrow{width:0;height:0;border-left:5px solid transparent;border-right:5px solid transparent;border-top:6px solid rgba(255,255,255,.07);margin-top:-1px;transition:border-top-color .4s}
.carrow.on{border-top-color:var(--accent)}

.preview{margin-top:18px;padding:16px;background:var(--accent-rim);border:1px solid rgba(0,200,255,.3);border-radius:10px;display:none;animation:fadeUp .4s ease}
.preview.vis{display:block}
.prev-lbl{font-family:var(--font-mono);font-size:10px;letter-spacing:2px;text-transform:uppercase;color:var(--accent);margin-bottom:8px}
.prev-tx{font-size:14px;color:var(--text);line-height:1.65}
.prev-tx strong{color:var(--accent)}

/* ── S4: EXECUTION ── */
.enode{display:flex;align-items:center;gap:13px;padding:14px 16px;background:var(--surface);border:1px solid var(--border);border-radius:10px;transition:all .35s;position:relative;overflow:hidden}
.enode.run{border-color:var(--accent);background:var(--accent-rim)}
.enode.ok{border-color:var(--green);background:var(--green-dim)}
.en-ic{font-size:19px;flex-shrink:0}
.en-tx{flex:1}
.en-name{font-size:13px;font-weight:500;margin-bottom:2px}
.en-detail{font-family:var(--font-mono);font-size:10px;color:var(--muted)}
.en-status{font-family:var(--font-mono);font-size:11px;padding:4px 10px;border-radius:12px;background:var(--surface2);color:var(--muted);white-space:nowrap;transition:all .3s}
.enode.run .en-status{background:var(--accent-dim);color:var(--accent)}
.enode.ok .en-status{background:var(--green-dim);color:var(--green)}
.enode-bar{position:absolute;bottom:0;left:0;height:2px;background:var(--accent);width:0;transition:width .9s ease}
.enode.ok .enode-bar{background:var(--green);width:100%}
@keyframes scan{0%{transform:translateX(-100%)}100%{transform:translateX(300%)}}
.enode.run::after{content:'';position:absolute;inset:0;width:35%;background:linear-gradient(90deg,transparent,rgba(0,200,255,.08),transparent);animation:scan 1.1s ease infinite}

.result{margin-top:18px;padding:20px;background:var(--green-dim);border:1px solid rgba(0,229,160,.4);border-radius:10px;display:none;animation:fadeUp .5s ease}
.result.vis{display:block}
.res-title{font-family:var(--font-display);font-size:30px;color:var(--green);margin-bottom:6px;font-weight:800}
.res-sub{font-size:13px;color:var(--muted);line-height:1.55;margin-bottom:14px}
.res-grid{display:grid;grid-template-columns:1fr 1fr;gap:10px}
.res-stat{text-align:center;padding:12px;background:rgba(0,0,0,.25);border-radius:8px}
.rs-n{font-family:var(--font-display);font-size:34px;color:var(--green);display:block;font-weight:800}
.rs-l{font-family:var(--font-mono);font-size:10px;color:var(--muted);text-transform:uppercase;letter-spacing:1px}

/* ── S5: COURSE CTA ── */
.congrats-strip{background:var(--accent-dim);border:1px solid rgba(0,200,255,.3);border-radius:10px;padding:16px 20px;margin-bottom:20px}
.congrats-strip p{font-size:13px;color:var(--text);line-height:1.6}
.congrats-strip strong{color:var(--accent)}

.course{background:var(--surface);border:1px solid var(--border);border-radius:10px;overflow:hidden;margin:24px 0}
.course-head{background:linear-gradient(135deg,var(--accent2),var(--accent));padding:20px;position:relative;overflow:hidden}
.course-head::before{content:'MURGON';position:absolute;right:12px;bottom:-8px;font-family:var(--font-display);font-size:56px;color:rgba(0,0,0,.15);letter-spacing:3px;font-weight:800}
.c-badge{font-family:var(--font-mono);font-size:10px;letter-spacing:1.5px;background:rgba(0,0,0,.2);padding:4px 10px;border-radius:20px;display:inline-block;margin-bottom:8px;color:#fff}
.c-title{font-family:var(--font-display);font-size:26px;line-height:1.05;color:#fff;letter-spacing:-.01em;font-weight:800}
.modules{padding:4px 0}
.mod{display:flex;align-items:center;gap:12px;padding:13px 18px;border-bottom:1px solid var(--border)}
.mod:last-child{border-bottom:none}
.mod-n{font-family:var(--font-mono);font-size:11px;color:var(--muted);width:24px;flex-shrink:0}
.mod-name{font-size:13px;color:var(--text);flex:1;line-height:1.35}
.tag{font-family:var(--font-mono);font-size:10px;padding:3px 9px;border-radius:3px;white-space:nowrap}
.tag.free{background:var(--green-dim);color:var(--green)}
.tag.locked{background:var(--surface2);color:var(--muted)}
.tag.new{background:var(--accent-dim);color:var(--accent)}

.cta-box{margin-top:20px;padding:28px 24px;background:var(--surface);border:1px solid var(--border);border-radius:10px;text-align:center}
.cta-label{font-family:var(--font-mono);font-size:11px;color:var(--muted);letter-spacing:1.5px}
.price-wrap{display:flex;align-items:baseline;justify-content:center;gap:12px;margin:14px 0 20px}
.cta-price-old{font-family:var(--font-display);font-size:30px;color:var(--muted);text-decoration:line-through;opacity:.6;font-weight:700}
.cta-price{font-family:var(--font-display);font-size:58px;color:var(--accent);line-height:1;font-weight:800}
.cta-price span{font-size:20px;color:var(--muted);font-family:var(--font-mono)}
.launch-badge{display:inline-block;background:var(--accent-dim);border:1px solid rgba(0,200,255,.35);color:var(--accent);font-family:var(--font-mono);font-size:10px;letter-spacing:1.5px;padding:4px 12px;border-radius:20px;margin-bottom:4px;text-transform:uppercase}
.cta-note{font-family:var(--font-mono);font-size:10px;color:var(--muted);margin-top:14px;line-height:1.6}

.divider{height:1px;background:var(--border);margin:28px 0}
</style>
</head>
<body>

<div class="progress-bar"><div class="progress-fill" id="pFill"></div></div>

<!-- Top nav -->
<nav class="top-nav">
  <a href="<?php echo esc_url( home_url('/') ); ?>" class="top-nav-logo">M<span>·</span>Agency</a>
  <div class="step-nav" style="position:static;transform:none;background:transparent;border:none;padding:0">
    <div class="dot active" id="d0"></div>
    <div class="dot" id="d1"></div>
    <div class="dot" id="d2"></div>
    <div class="dot" id="d3"></div>
    <div class="dot" id="d4"></div>
    <span class="step-count" id="stepCount">1 / 5</span>
  </div>
</nav>

<div class="wrap">

  <!-- ── S0: Bienvenida ── -->
  <div class="step active" id="s0">
    <div class="label">Tutorial gratuito · Murgon Academy</div>
    <h1>AUTOMATIZA TU <span class="hl">NEGOCIO</span></h1>
    <p class="sub">En los próximos 5 minutos vas a entender cómo funciona la automatización real — y vas a construir tu primer flujo desde cero, sin escribir código.</p>

    <div class="hero-flow">
      <div class="h-node">
        <span class="ic">💬</span>
        <span class="nl">Evento<br>ocurre</span>
      </div>
      <div class="arrow-anim"><div class="arrow-line"></div></div>
      <div class="h-node">
        <span class="ic">🧠</span>
        <span class="nl">Sistema<br>decide</span>
      </div>
      <div class="arrow-anim"><div class="arrow-line"></div></div>
      <div class="h-node">
        <span class="ic">⚡</span>
        <span class="nl">Acción<br>automática</span>
      </div>
    </div>

    <div class="stats">
      <div class="stat"><span class="n">5</span><span class="d">minutos para entenderlo</span></div>
      <div class="stat"><span class="n">0</span><span class="d">código necesario</span></div>
      <div class="stat"><span class="n">∞</span><span class="d">posibilidades reales</span></div>
    </div>

    <button class="btn-main" onclick="goTo(1)">Comenzar →</button>
  </div>

  <!-- ── S1: El concepto ── -->
  <div class="step" id="s1">
    <div class="label">Paso 01 · El concepto</div>
    <h2>SI ESTO PASA,<br>HAZ <span class="hl">ESTO</span></h2>
    <p class="sub">Toda automatización — sin importar qué tan sofisticada sea — siempre se reduce a esta idea.</p>

    <div class="pairs">
      <div class="pair">
        <div class="pbox t"><div class="pt">Disparador</div><div class="px">Un cliente escribe a las 11pm</div></div>
        <div class="mid"><div class="mid-lbl">→</div><div class="mid-line"></div></div>
        <div class="pbox a"><div class="pt">Acción</div><div class="px">El sistema responde en 2 segundos</div></div>
      </div>
      <div class="pair">
        <div class="pbox t"><div class="pt">Disparador</div><div class="px">Termina una cita médica</div></div>
        <div class="mid"><div class="mid-lbl">→</div><div class="mid-line"></div></div>
        <div class="pbox a"><div class="pt">Acción</div><div class="px">Se solicita reseña de Google</div></div>
      </div>
    </div>

    <div class="demo-box">
      <div class="demo-top">
        <div class="demo-blink"></div>
        <span class="demo-ttl">Demo · WhatsApp Business</span>
      </div>
      <div class="demo-msgs">
        <div class="msg-in">Hola, ¿tienen cita disponible mañana?</div>
        <div class="msg-out" id="msgOut">¡Hola! 👋 Claro, tenemos disponibilidad mañana. ¿A qué hora te viene mejor? Estamos de 9am a 7pm 😊</div>
        <div class="msg-time" id="msgTime">⚡ Respuesta automática en 1.4 segundos</div>
      </div>
    </div>

    <p class="sub" style="margin-top:4px">Eso que acaba de pasar <strong style="color:var(--text)">es</strong> una automatización real. Sin que nadie haya tocado el teléfono.</p>
  </div>

  <!-- ── S2: Los 3 bloques ── -->
  <div class="step" id="s2">
    <div class="label">Paso 02 · Los bloques</div>
    <h2>LOS 3 BLOQUES DE TODA <span class="hl">AUTOMATIZACIÓN</span></h2>
    <p class="sub">Todo flujo tiene exactamente estos tres componentes. Toca cada uno para entender su función.</p>

    <div class="blocks">
      <div class="blk" onclick="toggleBlk(this)">
        <div class="blk-head">
          <div class="blk-ic ic-t">⚡</div>
          <div><div class="blk-name">Disparador</div><div class="blk-tag">El evento que activa todo</div></div>
          <div class="blk-arr">▾</div>
        </div>
        <div class="blk-body">
          <p>Es la condición que hace que la automatización despierte. Sin disparador no pasa nada — es el interruptor que lo enciende todo.</p>
          <div class="pills">
            <span class="pill">Mensaje de WhatsApp</span><span class="pill">Formulario enviado</span>
            <span class="pill">Nuevo lead en CRM</span><span class="pill">Hora programada</span><span class="pill">Email recibido</span>
          </div>
        </div>
      </div>

      <div class="blk" onclick="toggleBlk(this)">
        <div class="blk-head">
          <div class="blk-ic ic-c">🔀</div>
          <div><div class="blk-name">Condición</div><div class="blk-tag">El filtro inteligente</div></div>
          <div class="blk-arr">▾</div>
        </div>
        <div class="blk-body">
          <p>No todo disparo termina igual. La condición evalúa el contexto y decide qué camino seguir — es el cerebro del flujo.</p>
          <div class="pills">
            <span class="pill">¿Es cliente nuevo?</span><span class="pill">¿Fuera de horario?</span>
            <span class="pill">¿Palabra clave detectada?</span><span class="pill">¿Monto mayor a X?</span>
          </div>
        </div>
      </div>

      <div class="blk" onclick="toggleBlk(this)">
        <div class="blk-head">
          <div class="blk-ic ic-a">🎯</div>
          <div><div class="blk-name">Acción</div><div class="blk-tag">Lo que sucede automáticamente</div></div>
          <div class="blk-arr">▾</div>
        </div>
        <div class="blk-body">
          <p>El resultado final. Lo que el sistema hace por ti sin que intervengas — puede ser simple o encadenar múltiples pasos.</p>
          <div class="pills">
            <span class="pill">Responder mensaje</span><span class="pill">Crear registro</span>
            <span class="pill">Enviar email</span><span class="pill">Notificar al equipo</span><span class="pill">Agendar cita</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ── S3: Construye ── -->
  <div class="step" id="s3">
    <div class="label">Paso 03 · Construye</div>
    <h2>ARMA TU PRIMER <span class="hl">FLUJO</span></h2>
    <p class="sub">Elige las 3 piezas. Tú decides qué va a automatizar tu sistema.</p>

    <div class="builder">
      <div class="bnode" id="bn-trigger" onclick="toggleBnode('trigger')">
        <div class="bnode-head">
          <div class="bnum">1</div>
          <span class="btype">Disparador</span>
          <span class="bval" id="v-trigger">Elige...</span>
        </div>
        <div class="bopts" id="opts-trigger">
          <button class="opt" onclick="pick(event,'trigger',0,'Cliente manda WhatsApp','💬')">
            <span class="opt-ic">💬</span><span class="opt-tx">Cliente manda un mensaje de WhatsApp</span><span class="opt-mt">popular</span>
          </button>
          <button class="opt" onclick="pick(event,'trigger',1,'Formulario web enviado','📋')">
            <span class="opt-ic">📋</span><span class="opt-tx">Formulario de contacto enviado en la web</span>
          </button>
          <button class="opt" onclick="pick(event,'trigger',2,'Nuevo cliente registrado','🤝')">
            <span class="opt-ic">🤝</span><span class="opt-tx">Se registra un nuevo cliente en el CRM</span>
          </button>
        </div>
      </div>

      <div class="conn"><div style="display:flex;flex-direction:column;align-items:center">
        <div class="cline" id="c1"></div><div class="carrow" id="a1"></div>
      </div></div>

      <div class="bnode" id="bn-condicion" onclick="toggleBnode('condicion')">
        <div class="bnode-head">
          <div class="bnum">2</div>
          <span class="btype">Condición</span>
          <span class="bval" id="v-condicion">Elige...</span>
        </div>
        <div class="bopts" id="opts-condicion">
          <button class="opt" onclick="pick(event,'condicion',0,'Fuera de horario laboral','🌙')">
            <span class="opt-ic">🌙</span><span class="opt-tx">El mensaje llegó fuera del horario de atención</span>
          </button>
          <button class="opt" onclick="pick(event,'condicion',1,'Es contacto nuevo','✨')">
            <span class="opt-ic">✨</span><span class="opt-tx">El contacto no existe aún en el sistema</span>
          </button>
          <button class="opt" onclick="pick(event,'condicion',2,'Contiene palabra clave','🔍')">
            <span class="opt-ic">🔍</span><span class="opt-tx">El mensaje contiene una palabra clave definida</span>
          </button>
        </div>
      </div>

      <div class="conn"><div style="display:flex;flex-direction:column;align-items:center">
        <div class="cline" id="c2"></div><div class="carrow" id="a2"></div>
      </div></div>

      <div class="bnode" id="bn-accion" onclick="toggleBnode('accion')">
        <div class="bnode-head">
          <div class="bnum">3</div>
          <span class="btype">Acción</span>
          <span class="bval" id="v-accion">Elige...</span>
        </div>
        <div class="bopts" id="opts-accion">
          <button class="opt" onclick="pick(event,'accion',0,'Respuesta automática con IA','🤖')">
            <span class="opt-ic">🤖</span><span class="opt-tx">Enviar respuesta automática generada por IA</span><span class="opt-mt">recomendado</span>
          </button>
          <button class="opt" onclick="pick(event,'accion',1,'Notificar al encargado','🔔')">
            <span class="opt-ic">🔔</span><span class="opt-tx">Enviar alerta al dueño o encargado del negocio</span>
          </button>
          <button class="opt" onclick="pick(event,'accion',2,'Guardar y crear tarea en CRM','💾')">
            <span class="opt-ic">💾</span><span class="opt-tx">Registrar contacto y crear tarea de seguimiento</span>
          </button>
        </div>
      </div>
    </div>

    <div class="preview" id="prevBox">
      <div class="prev-lbl">Tu automatización dice:</div>
      <div class="prev-tx" id="prevTx"></div>
    </div>
  </div>

  <!-- ── S4: Ejecutar ── -->
  <div class="step" id="s4">
    <div class="label">Paso 04 · En vivo</div>
    <h2>MÍRALO <span class="hl">FUNCIONAR</span></h2>
    <p class="sub">Así se ve tu flujo ejecutándose en tiempo real. Presiona el botón y observa.</p>

    <div style="display:flex;flex-direction:column;gap:4px;margin:20px 0" id="execWrap">
      <div class="enode" id="en0">
        <div class="en-ic">⚡</div>
        <div class="en-tx">
          <div class="en-name" id="en0-name">Disparador</div>
          <div class="en-detail" id="en0-detail">En espera...</div>
        </div>
        <div class="en-status" id="en0-st">en espera</div>
        <div class="enode-bar"></div>
      </div>
      <div class="conn"><div style="display:flex;flex-direction:column;align-items:center">
        <div class="cline" id="ec1"></div><div class="carrow" id="ea1"></div>
      </div></div>
      <div class="enode" id="en1">
        <div class="en-ic">🔀</div>
        <div class="en-tx">
          <div class="en-name" id="en1-name">Condición</div>
          <div class="en-detail" id="en1-detail">En espera...</div>
        </div>
        <div class="en-status" id="en1-st">en espera</div>
        <div class="enode-bar"></div>
      </div>
      <div class="conn"><div style="display:flex;flex-direction:column;align-items:center">
        <div class="cline" id="ec2"></div><div class="carrow" id="ea2"></div>
      </div></div>
      <div class="enode" id="en2">
        <div class="en-ic">🎯</div>
        <div class="en-tx">
          <div class="en-name" id="en2-name">Acción</div>
          <div class="en-detail" id="en2-detail">En espera...</div>
        </div>
        <div class="en-status" id="en2-st">en espera</div>
        <div class="enode-bar"></div>
      </div>
    </div>

    <button class="btn-main full" id="runBtn" onclick="runFlow()">▶ Ejecutar mi flujo</button>

    <div class="result" id="resCard">
      <div class="res-title">✓ FLUJO COMPLETADO</div>
      <p class="res-sub">Eso que acabas de ver sucede en segundos, 24/7, sin que nadie lo supervise. Eso es lo que vale la automatización.</p>
      <div class="res-grid">
        <div class="res-stat"><span class="rs-n">0</span><span class="rs-l">intervención humana</span></div>
        <div class="res-stat"><span class="rs-n">2s</span><span class="rs-l">tiempo total</span></div>
      </div>
    </div>
  </div>

  <!-- ── S5: CTA ── -->
  <div class="step" id="s5">
    <div class="label">Esto fue el 5%</div>
    <h2>¿Y AHORA <span class="hl">QUÉ?</span></h2>

    <div class="congrats-strip">
      <p>Acabas de entender el fundamento de toda automatización. Ahora imagina esto corriendo en WhatsApp, conectado a tu CRM, respondiendo con IA entrenada en tu negocio — <strong>funcionando mientras tú duermes.</strong></p>
    </div>

    <div class="course">
      <div class="course-head">
        <div class="c-badge">MURGON ACADEMY</div>
        <div class="c-title">Automatización con IA para tu Negocio</div>
      </div>
      <div class="modules">
        <div class="mod">
          <span class="mod-n">01</span>
          <span class="mod-name">Tu primer flujo completo (lo que acabas de aprender)</span>
          <span class="tag free">gratis ✓</span>
        </div>
        <div class="mod">
          <span class="mod-n">02</span>
          <span class="mod-name">Conectar WhatsApp Business API desde cero</span>
          <span class="tag locked">avanzado</span>
        </div>
        <div class="mod">
          <span class="mod-n">03</span>
          <span class="mod-name">Integrar IA para respuestas inteligentes (n8n + OpenAI)</span>
          <span class="tag locked">avanzado</span>
        </div>
        <div class="mod">
          <span class="mod-n">04</span>
          <span class="mod-name">Captura y seguimiento automático de leads</span>
          <span class="tag locked">avanzado</span>
        </div>
        <div class="mod">
          <span class="mod-n">05</span>
          <span class="mod-name">Caso real: chatbot 24/7 para negocio físico desde cero</span>
          <span class="tag new">nuevo</span>
        </div>
      </div>
    </div>

    <div class="cta-box">
      <div class="launch-badge">Precio de lanzamiento</div>
      <div class="cta-label" style="margin-top:6px">Inversión única · Acceso de por vida</div>
      <div class="price-wrap">
        <div class="cta-price-old">$1,497</div>
        <div class="cta-price"><span>$</span>797<span> MXN</span></div>
      </div>
      <a href="https://wa.me/523117406927?text=Hola%2C%20quiero%20acceder%20a%20Murgon%20Academy"
         class="btn-main full"
         style="font-size:15px;padding:18px"
         target="_blank" rel="noopener">
        Quiero implementarlo yo mismo →
      </a>
      <div class="cta-note">✓ Aprende a hacerlo tú mismo · Sin experiencia previa necesaria<br>Disponible para negocio propio o para implementar donde trabajas</div>
    </div>
  </div>

</div><!-- /.wrap -->

<!-- Bottom nav -->
<div class="nav-bot">
  <button class="btn-ghost" id="btnBack" onclick="goBack()" style="display:none">← Atrás</button>
  <button class="btn-main" id="btnNext" onclick="goNext()" style="display:none">Continuar →</button>
</div>

<script>
var cur=0, executed=false;
var sel={trigger:null,condicion:null,accion:null};

function goTo(n){
  document.getElementById('s'+cur).classList.remove('active');
  cur=n;
  document.getElementById('s'+cur).classList.add('active');
  upNav(); upProg(); upDots();
  if(n===1){initS1();}
  if(n===4){initS4();}
  window.scrollTo({top:0,behavior:'smooth'});
}
function goNext(){
  if(cur===3){
    if(!sel.trigger||!sel.condicion||!sel.accion){
      alert('Elige las 3 piezas para continuar 👆');return;
    }
  }
  goTo(cur+1);
}
function goBack(){goTo(cur-1);}

function upNav(){
  var b=document.getElementById('btnBack'),n=document.getElementById('btnNext');
  b.style.display=cur>0?'inline-flex':'none';
  if(cur===0||cur===5){n.style.display='none';}
  else if(cur===4&&!executed){n.style.display='none';}
  else{n.style.display='inline-flex';n.textContent=cur===4?'Ver qué sigue →':'Continuar →';}
}
function upProg(){document.getElementById('pFill').style.width=(cur/5*100)+'%';}
function upDots(){
  for(var i=0;i<5;i++){
    var d=document.getElementById('d'+i);
    d.className='dot';
    if(i<cur)d.classList.add('done');
    else if(i===cur)d.classList.add('active');
  }
  document.getElementById('stepCount').textContent=(cur+1)+' / 5';
}

function initS1(){
  setTimeout(function(){
    document.getElementById('msgOut').classList.add('vis');
    document.getElementById('msgTime').classList.add('vis');
  },500);
}

function toggleBlk(el){el.classList.toggle('open');}

function toggleBnode(id){
  var el=document.getElementById('bn-'+id);
  var wasOpen=el.classList.contains('open');
  ['trigger','condicion','accion'].forEach(function(t){
    document.getElementById('bn-'+t).classList.remove('open');
  });
  if(!wasOpen)el.classList.add('open');
}

function pick(ev,type,idx,label,icon){
  ev.stopPropagation();
  sel[type]={idx:idx,label:label,icon:icon};
  document.getElementById('v-'+type).textContent=icon+' '+label;
  var bn=document.getElementById('bn-'+type);
  bn.classList.add('sel');bn.classList.remove('open');
  document.querySelectorAll('#opts-'+type+' .opt').forEach(function(b,i){
    b.classList.toggle('on',i===idx);
  });
  updConn(); updPreview();
}

function updConn(){
  var ht=!!sel.trigger,hc=!!sel.condicion;
  ['c1','a1'].forEach(function(id){document.getElementById(id).classList.toggle('on',ht);});
  ['c2','a2'].forEach(function(id){document.getElementById(id).classList.toggle('on',hc);});
}

function updPreview(){
  var t=sel.trigger,c=sel.condicion,a=sel.accion;
  if(!t||!c||!a)return;
  document.getElementById('prevBox').classList.add('vis');
  document.getElementById('prevTx').innerHTML=
    'Cuando <strong>'+t.label+'</strong>, y se detecta que <strong>'+c.label+'</strong>, '+
    'el sistema ejecuta automáticamente: <strong>'+a.label+'</strong>.';
}

function initS4(){
  executed=false;
  document.getElementById('resCard').classList.remove('vis');
  document.getElementById('runBtn').style.display='block';
  ['en0','en1','en2'].forEach(function(id){
    var el=document.getElementById(id);
    el.classList.remove('run','ok');
    document.getElementById(id+'-st').textContent='en espera';
  });
  ['ec1','ea1','ec2','ea2'].forEach(function(id){
    document.getElementById(id).classList.remove('on');
  });
  if(sel.trigger){document.getElementById('en0-name').textContent=sel.trigger.label;document.getElementById('en0-detail').textContent='Listo para activar';}
  if(sel.condicion){document.getElementById('en1-name').textContent=sel.condicion.label;document.getElementById('en1-detail').textContent='Listo para evaluar';}
  if(sel.accion){document.getElementById('en2-name').textContent=sel.accion.label;document.getElementById('en2-detail').textContent='Listo para ejecutar';}
  upNav();
}

function runFlow(){
  document.getElementById('runBtn').style.display='none';
  var steps=[
    {id:'en0',st:'procesando...',detail:'Evento recibido — leyendo datos del trigger'},
    {id:'en1',st:'evaluando...',detail:'Condición verificada — ✓ se cumple'},
    {id:'en2',st:'ejecutando...',detail:'Acción en curso...'}
  ];
  function exec(i){
    if(i>=steps.length){
      setTimeout(function(){
        steps.forEach(function(s){
          document.getElementById(s.id).classList.remove('run');
          document.getElementById(s.id).classList.add('ok');
          document.getElementById(s.id+'-st').textContent='✓ completado';
        });
        ['ec1','ea1','ec2','ea2'].forEach(function(id){
          document.getElementById(id).classList.add('on');
        });
        setTimeout(function(){
          document.getElementById('resCard').classList.add('vis');
          executed=true;
          document.getElementById('btnNext').style.display='inline-flex';
          document.getElementById('btnNext').textContent='Ver qué sigue →';
        },400);
      },300);
      return;
    }
    var s=steps[i];
    var el=document.getElementById(s.id);
    el.classList.add('run');
    document.getElementById(s.id+'-st').textContent=s.st;
    document.getElementById(s.id+'-detail').textContent=s.detail;
    setTimeout(function(){exec(i+1);},1500);
  }
  exec(0);
}

upNav();
</script>
</body>
</html>
