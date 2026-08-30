/**
 * Murgon Agency — murgon.js
 * Interactions: nav, FAQ accordion, scroll reveal, mobile menu
 */

(function () {
  'use strict';

  /* ── NAV: Scroll behavior ── */
  const navbar = document.getElementById('navbar');
  if (navbar) {
    window.addEventListener('scroll', () => {
      const y = window.scrollY;
      if (y > 80) {
        navbar.style.background = 'rgba(7,9,16,0.97)';
      } else {
        navbar.style.background = 'rgba(7,9,16,0.85)';
      }
    }, { passive: true });
  }

  /* ── MOBILE NAV TOGGLE ── */
  const navToggle = document.getElementById('navToggle');
  const navMenu   = document.getElementById('navMenu');
  if (navToggle && navMenu) {
    navToggle.addEventListener('click', () => {
      const isOpen = navMenu.classList.toggle('open');
      navToggle.classList.toggle('active', isOpen);
      navToggle.setAttribute('aria-expanded', String(isOpen));
    });

    // Close on nav link click
    navMenu.querySelectorAll('a').forEach(link => {
      link.addEventListener('click', () => {
        navMenu.classList.remove('open');
        navToggle.classList.remove('active');
        navToggle.setAttribute('aria-expanded', 'false');
      });
    });

    // Close on outside click
    document.addEventListener('click', (e) => {
      if (!navbar.contains(e.target)) {
        navMenu.classList.remove('open');
        navToggle.classList.remove('active');
        navToggle.setAttribute('aria-expanded', 'false');
      }
    });
  }

  /* ── FAQ ACCORDION ── */
  document.querySelectorAll('.faq-q').forEach(btn => {
    btn.addEventListener('click', () => {
      const item = btn.closest('.faq-item');
      const answer = item.querySelector('.faq-a');
      const isOpen = item.classList.contains('open');

      // Close all others
      document.querySelectorAll('.faq-item.open').forEach(openItem => {
        openItem.classList.remove('open');
        const a = openItem.querySelector('.faq-a');
        a.setAttribute('hidden', '');
        openItem.querySelector('.faq-q').setAttribute('aria-expanded', 'false');
      });

      // Toggle current
      if (!isOpen) {
        item.classList.add('open');
        answer.removeAttribute('hidden');
        btn.setAttribute('aria-expanded', 'true');
      }
    });
  });

  /* ── SCROLL REVEAL ── */
  if ('IntersectionObserver' in window) {
    const revealObs = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          revealObs.unobserve(entry.target);
        }
      });
    }, { threshold: 0.08, rootMargin: '0px 0px -40px 0px' });

    const revealTargets = document.querySelectorAll(
      '.service-card, .pain-item, .step, .price-card, .industry-card, .faq-item, .cases-slider-wrap'
    );

    revealTargets.forEach((el, i) => {
      el.classList.add('reveal');
      el.style.transitionDelay = `${(i % 4) * 0.07}s`;
      revealObs.observe(el);
    });
  }

  /* ── SMOOTH SCROLL for anchor links ── */
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        e.preventDefault();
        const offset = 72; // nav height
        const top = target.getBoundingClientRect().top + window.scrollY - offset;
        window.scrollTo({ top, behavior: 'smooth' });
      }
    });
  });

  /* ── ACTIVE NAV LINK on scroll ── */
  const sections = document.querySelectorAll('section[id]');
  const navLinks  = document.querySelectorAll('.nav-links a[href^="#"]');

  if (sections.length && navLinks.length) {
    const sectionObs = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          navLinks.forEach(link => {
            link.style.color = '';
            if (link.getAttribute('href') === '#' + entry.target.id) {
              link.style.color = 'var(--accent)';
            }
          });
        }
      });
    }, { threshold: 0.4 });
    sections.forEach(s => sectionObs.observe(s));
  }

  /* ── METRIC COUNTER ANIMATION ── */
  function animateCounter(el) {
    const text = el.textContent.trim();
    const match = text.match(/^(\d[\d,.]*)(.*)$/);
    if (!match) return;
    const num   = parseFloat(match[1].replace(/,/g, ''));
    const suffix = match[2] || '';
    const duration = 1200;
    const start = performance.now();
    const update = (now) => {
      const elapsed  = now - start;
      const progress = Math.min(elapsed / duration, 1);
      const ease = 1 - Math.pow(1 - progress, 3); // cubic ease-out
      const current = Math.round(num * ease);
      el.textContent = current.toLocaleString('es-MX') + suffix;
      if (progress < 1) requestAnimationFrame(update);
    };
    requestAnimationFrame(update);
  }

  if ('IntersectionObserver' in window) {
    const counterObs = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          animateCounter(entry.target);
          counterObs.unobserve(entry.target);
        }
      });
    }, { threshold: 0.5 });

    document.querySelectorAll('.cm-val, .sp-num').forEach(el => {
      counterObs.observe(el);
    });
  }

  /* ── ROI CALCULATOR ── */
  (function () {
    const sliders = {
      msgs:   document.getElementById('roi-msgs'),
      conv:   document.getElementById('roi-conv'),
      ticket: document.getElementById('roi-ticket'),
      hours:  document.getElementById('roi-hours'),
    };
    const vals = {
      msgs:   document.getElementById('roi-msgs-val'),
      conv:   document.getElementById('roi-conv-val'),
      ticket: document.getElementById('roi-ticket-val'),
      hours:  document.getElementById('roi-hours-val'),
    };

    if (!sliders.msgs) return; // no está en esta página

    // TASK-05: ¿El usuario ya desbloqueó los resultados en esta sesión?
    let calcRevealed = !!sessionStorage.getItem('murgon_calc_revealed');
    let calcGateEl   = null;

    function fmt(n) {
      return '$' + Math.round(n).toLocaleString('es-MX');
    }

    function updateSliderFill(input) {
      const min = +input.min, max = +input.max, val = +input.value;
      const pct = ((val - min) / (max - min)) * 100;
      input.style.backgroundSize = pct + '% 100%';
    }

    function getResponseHours() {
      const checked = document.querySelector('input[name="response"]:checked');
      return checked ? +checked.value : 1.5;
    }

    // Renderiza los resultados en el DOM (se llama SIEMPRE después de desbloquear)
    function renderResults(data) {
      document.getElementById('res-lost').textContent    = fmt(data.revLost);
      document.getElementById('res-hours').textContent   = Math.round(data.hoursFreed) + ' hrs';
      document.getElementById('res-gain').textContent    = fmt(data.revGain);
      document.getElementById('res-payback').textContent = data.payback
        ? (data.payback < 1 ? '< 1 mes' : data.payback.toFixed(1) + ' meses')
        : '—';
    }

    function calculate() {
      const msgsDay    = +sliders.msgs.value;
      const convRate   = +sliders.conv.value / 100;
      const ticket     = +sliders.ticket.value;
      const hoursWeek  = +sliders.hours.value;
      const respHours  = getResponseHours();

      const daysMonth  = 22;
      const msgsMonth  = msgsDay * daysMonth;

      const lostFactor    = Math.min(0.60, respHours * 0.05);
      const leadsLost     = msgsMonth * convRate * lostFactor;
      const revLost       = leadsLost * ticket;
      const leadsRecovered = msgsMonth * convRate * (lostFactor - 0.005);
      const revGain       = Math.max(0, leadsRecovered * ticket);
      const hoursFreed    = hoursWeek * 4 * 0.70;
      const totalGain     = revGain + (hoursFreed * 150);
      const payback       = totalGain > 0 ? (9500 / totalGain) : null;

      const data = { revLost, revGain, hoursFreed, payback };

      if (calcRevealed) {
        renderResults(data);
      } else {
        // Primera vez: mostrar gate overlay (TASK-05)
        renderResults(data); // renderizar en background
        if (!calcGateEl) showCalcGate(data);
      }
    }

    // TASK-05: Overlay de captura de email antes de revelar resultados
    function showCalcGate(data) {
      const resultsEl = document.querySelector('.roi-results');
      if (!resultsEl) return;

      calcGateEl = document.createElement('div');
      calcGateEl.className = 'roi-gate';
      calcGateEl.setAttribute('role', 'dialog');
      calcGateEl.setAttribute('aria-label', 'Ver resultados de la calculadora');
      calcGateEl.innerHTML = `
        <div class="roi-gate-box">
          <div class="roi-gate-icon" aria-hidden="true">📊</div>
          <h3>Tu análisis está listo</h3>
          <p>Deja tu email y te enviamos el reporte completo con el plan de automatización para tu negocio.</p>
          <div class="roi-gate-preview" aria-hidden="true">
            <span>Tu negocio pierde <strong>$???,??? MXN/mes</strong></span>
            <span>Recuperables con IA: <strong>$???,??? MXN/mes</strong></span>
          </div>
          <form class="roi-gate-form" id="roiGateForm" novalidate>
            <input type="text"  name="nombre" placeholder="Tu nombre"        required class="roi-gate-input" aria-label="Tu nombre">
            <input type="email" name="email"  placeholder="tu@empresa.com"   required class="roi-gate-input" aria-label="Tu email">
            <button type="submit" class="roi-gate-btn">Ver mi análisis completo →</button>
            <button type="button" class="roi-gate-skip" id="roiGateSkip">Prefiero verlo sin guardar</button>
          </form>
        </div>
      `;
      // resultsEl.appendChild(calcGateEl); *** CalcGate Pausado
      const roiGateForm = document.getElementById('roiGateForm');
      const roiGateSkip = document.getElementById('roiGateSkip');
      if (!roiGateForm || !roiGateSkip) return;

      // Submit: guardar email y revelar
      roiGateForm.addEventListener('submit', function (e) {
        e.preventDefault();
        const email  = this.querySelector('[name="email"]').value.trim();
        const nombre = this.querySelector('[name="nombre"]').value.trim();
        if (!email || !nombre) return;

        sessionStorage.setItem('murgon_calc_revealed', '1');
        sessionStorage.setItem('murgon_calc_email',    email);
        sessionStorage.setItem('murgon_calc_nombre',   nombre);
        calcRevealed = true;

        // Fire-and-forget al webhook n8n
        // TODO: Reemplaza con tu URL de n8n
        fetch('https://TU_N8N_INSTANCE/webhook/murgon-calc-capture', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({
            email, nombre,
            resultados: data,
            source: 'calculadora-roi',
            timestamp: new Date().toISOString(),
            page_url: window.location.href,
          }),
        }).catch(() => {});

        // GA4 event
        if (typeof gtag !== 'undefined') {
          gtag('event', 'calc_gate_submit', { event_category: 'Lead', value: 1 });
        }

        removeGate();
        calculate(); // re-render sin gate
      });

      // Skip
      roiGateSkip.addEventListener('click', () => {
        sessionStorage.setItem('murgon_calc_revealed', '1');
        calcRevealed = true;
        removeGate();
        calculate();
      });
    }

    function removeGate() {
      if (calcGateEl) {
        calcGateEl.remove();
        calcGateEl = null;
      }
    }

    // Sliders
    Object.entries(sliders).forEach(([key, input]) => {
      updateSliderFill(input);
      input.addEventListener('input', () => {
        updateSliderFill(input);
        if (key === 'msgs')   vals.msgs.textContent   = input.value;
        if (key === 'conv')   vals.conv.textContent   = input.value + '%';
        if (key === 'ticket') vals.ticket.textContent = '$' + (+input.value).toLocaleString('es-MX');
        if (key === 'hours')  vals.hours.textContent  = input.value + ' hrs';
        calculate();
      });
    });

    // Radio buttons
    document.querySelectorAll('input[name="response"]').forEach(r => {
      r.addEventListener('change', calculate);
    });

    calculate(); // render inicial
  })();

  /* ── BOT DEMO: conversación animada (una sola vez al entrar en viewport) ── */
  const botDemo = document.getElementById('botDemo');
  if (botDemo && 'IntersectionObserver' in window) {
    // Secuencia: [índice del elemento, delay en ms desde el inicio]
    // Orden: msg-in → typing → msg-out → msg-in → typing → msg-out
    const sequence = [
      { index: 0, delay: 300  },   // msg-in  #1
      { index: 1, delay: 900  },   // typing  #1 aparece
      { index: 2, delay: 1800 },   // msg-out #1 + typing #1 desaparece
      { index: 3, delay: 2500 },   // msg-in  #2
      { index: 4, delay: 3100 },   // typing  #2 aparece
      { index: 5, delay: 4000 },   // msg-out #2 + typing #2 desaparece
    ];

    function show(el) {
      el.classList.remove('msg--hidden');
    }
    function hide(el) {
      el.classList.add('msg--hidden');
    }

    function runBotAnimation() {
      const msgs = botDemo.querySelectorAll('.msg');
      sequence.forEach(({ index, delay }) => {
        setTimeout(() => {
          const el = msgs[index];
          if (!el) return;
          show(el);
          // Si es un typing indicator, ocultarlo cuando llegue el mensaje siguiente
          if (el.classList.contains('msg-typing')) {
            const nextDelay = (sequence.find(s => s.index === index + 1)?.delay ?? delay + 900) - delay;
            setTimeout(() => hide(el), nextDelay);
          }
        }, delay);
      });
    }

    const botObs = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          runBotAnimation();
          botObs.unobserve(botDemo); // solo una vez
        }
      });
    }, { threshold: 0.5 });

    botObs.observe(botDemo);
  }

  /* ── CASE STUDY SLIDER ── */
  (function () {
    const sliderWrap = document.getElementById('casesSlider');
    if (!sliderWrap) return;

    const track = document.getElementById('casesTrack');
    const dots  = sliderWrap.querySelectorAll('.cases-dot');
    const prev  = document.getElementById('casesPrev');
    const next  = document.getElementById('casesNext');

    const total = track.querySelectorAll('.case-slide').length;
    let current = 0;

    function goTo(idx) {
      current = (idx + total) % total;
      track.style.transform = `translateX(-${current * 100}%)`;
      dots.forEach((d, i) => {
        d.classList.toggle('active', i === current);
        d.setAttribute('aria-selected', String(i === current));
      });
    }

    if (prev) prev.addEventListener('click', () => goTo(current - 1));
    if (next) next.addEventListener('click', () => goTo(current + 1));

    dots.forEach(dot => {
      dot.addEventListener('click', () => goTo(+dot.dataset.idx));
    });

    let touchX = 0;
    sliderWrap.addEventListener('touchstart', e => { touchX = e.touches[0].clientX; }, { passive: true });
    sliderWrap.addEventListener('touchend', e => {
      const diff = touchX - e.changedTouches[0].clientX;
      if (Math.abs(diff) > 40) goTo(diff > 0 ? current + 1 : current - 1);
    });
  })();

})();
