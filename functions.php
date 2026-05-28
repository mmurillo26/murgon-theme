<?php
/**
 * Murgon Agency — functions.php
 * Setup del tema, scripts, estilos y helpers
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/* ──────────────────────────────────────────
   THEME SETUP
────────────────────────────────────────── */
function murgon_theme_setup() {
    load_theme_textdomain( 'murgon-agency', get_template_directory() . '/languages' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ] );
    add_theme_support( 'custom-logo', [
        'height'      => 60,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ]);
    add_theme_support( 'menus' );
    register_nav_menus([
        'primary' => __( 'Menú Principal', 'murgon-agency' ),
    ]);
}
add_action( 'after_setup_theme', 'murgon_theme_setup' );

/* ──────────────────────────────────────────
   ENQUEUE STYLES & SCRIPTS
────────────────────────────────────────── */
function murgon_enqueue_assets() {
    $ver = '1.0.0';
    $uri = get_template_directory_uri();

    // Google Fonts (incluye Space Mono para badges y código)
    wp_enqueue_style(
        'murgon-fonts',
        'https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,400&family=Space+Mono:wght@400;700&display=swap',
        [],
        null
    );

    // Main stylesheet
    wp_enqueue_style(
        'murgon-style',
        $uri . '/assets/css/murgon.css',
        [ 'murgon-fonts' ],
        $ver
    );

    // Main JS
    wp_enqueue_script(
        'murgon-main',
        $uri . '/assets/js/murgon.js',
        [],
        $ver,
        true // footer
    );

    // Pasar variables PHP → JS
    wp_localize_script( 'murgon-main', 'murgonVars', [
        'ajaxUrl'  => admin_url( 'admin-ajax.php' ),
        'nonce'    => wp_create_nonce( 'murgon_nonce' ),
        'themeUri' => $uri,
    ]);
}
add_action( 'wp_enqueue_scripts', 'murgon_enqueue_assets' );

/* ──────────────────────────────────────────
   CHATBOT AI WIDGET — TASK-06
────────────────────────────────────────── */
function murgon_enqueue_chatbot() {
    wp_enqueue_script(
        'murgon-chatbot',
        get_template_directory_uri() . '/assets/js/chatbot.js',
        [], // sin dependencias
        '1.0.0',
        true // cargar en footer
    );
}
add_action( 'wp_enqueue_scripts', 'murgon_enqueue_chatbot' );

/* ──────────────────────────────────────────
   REMOVE WORDPRESS BLOAT
────────────────────────────────────────── */
function murgon_clean_head() {
    remove_action( 'wp_head', 'wp_generator' );
    remove_action( 'wp_head', 'wlwmanifest_link' );
    remove_action( 'wp_head', 'rsd_link' );
    remove_action( 'wp_head', 'wp_shortlink_wp_head' );
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
}
add_action( 'init', 'murgon_clean_head' );

/* ──────────────────────────────────────────
   SEO — META DESCRIPTION DINÁMICA
────────────────────────────────────────── */
function murgon_meta_description() {
    if ( is_front_page() ) {
        echo '<meta name="description" content="Implementamos sistemas de automatización con IA en 7–14 días: WhatsApp bot, CRM automatizado y captación de leads. Sin consultores — código real, resultados medibles. Desde $8,500 MXN.">' . "\n";
        echo '<meta name="robots" content="index, follow">' . "\n";
    } elseif ( is_singular() ) {
        global $post;
        $desc = wp_trim_words( get_the_excerpt( $post ), 25 );
        if ( $desc ) {
            echo '<meta name="description" content="' . esc_attr( $desc ) . '">' . "\n";
        }
    }
}
add_action( 'wp_head', 'murgon_meta_description' );

/* ──────────────────────────────────────────
   OG TAGS (Open Graph básico)
────────────────────────────────────────── */
function murgon_og_tags() {
    if ( is_front_page() ) : ?>
<meta property="og:type" content="website">
<meta property="og:locale" content="es_MX">
<meta property="og:title" content="Murgon Agency — Automatización con IA en 7–14 días | WhatsApp Bot + CRM | México">
<meta property="og:description" content="Implementamos sistemas de automatización con IA en 7–14 días: WhatsApp bot, CRM automatizado y captación de leads. Sin consultores — código real, resultados medibles. Desde $8,500 MXN.">
<meta property="og:url" content="<?php echo esc_url( home_url('/') ); ?>">
<meta property="og:image" content="<?php echo esc_url( get_template_directory_uri() . '/assets/images/og-image.png' ); ?>">
<meta property="og:site_name" content="Murgon Agency">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Murgon Agency — Automatización con IA en 7–14 días">
<meta name="twitter:description" content="WhatsApp bot, CRM automatizado y captación de leads. Sin consultores — código real, resultados medibles. Desde $8,500 MXN.">
    <?php endif;
}
add_action( 'wp_head', 'murgon_og_tags' );

/* ──────────────────────────────────────────
   CUSTOM BODY CLASS
────────────────────────────────────────── */
function murgon_body_classes( $classes ) {
    if ( is_front_page() ) $classes[] = 'is-front-page';
    return $classes;
}
add_filter( 'body_class', 'murgon_body_classes' );

/* ──────────────────────────────────────────
   DISABLE COMMENTS (opcional)
────────────────────────────────────────── */
function murgon_disable_comments_status() { return false; }
add_filter( 'comments_open', 'murgon_disable_comments_status', 20, 2 );
add_filter( 'pings_open',    'murgon_disable_comments_status', 20, 2 );

/* ──────────────────────────────────────────
   EXCERPT LENGTH
────────────────────────────────────────── */
function murgon_excerpt_length() { return 25; }
add_filter( 'excerpt_length', 'murgon_excerpt_length' );

/* ──────────────────────────────────────────
   DASHBOARD WIDGET — Info del tema
────────────────────────────────────────── */
function murgon_dashboard_widget() {
    wp_add_dashboard_widget(
        'murgon_info',
        'Murgon Agency — Tema Custom',
        function() {
            echo '<p><strong>Versión:</strong> 1.0.0</p>';
            echo '<p><strong>Autor:</strong> Mario Murillo</p>';
            echo '<p><strong>Para editar:</strong> modifica los archivos en <code>/wp-content/themes/murgon-agency/</code></p>';
            echo '<p><a href="' . esc_url( home_url('/') ) . '" target="_blank">Ver sitio →</a></p>';
        }
    );
}
add_action( 'wp_dashboard_setup', 'murgon_dashboard_widget' );

/* ──────────────────────────────────────────
   LEAD MAGNET — AJAX Handler (TASK-04)
   Envía email a contacto@murgonagency.com
   con todos los datos del prospecto
────────────────────────────────────────── */
function murgon_lead_magnet_handler() {

    // 1. Verificar nonce
    if ( ! check_ajax_referer( 'murgon_nonce', 'nonce', false ) ) {
        wp_send_json_error( [ 'message' => 'Nonce inválido' ], 403 );
        return;
    }

    // 2. Sanitizar campos
    $nombre           = sanitize_text_field( $_POST['nombre']           ?? '' );
    $email            = sanitize_email(      $_POST['email']            ?? '' );
    $whatsapp         = sanitize_text_field( $_POST['whatsapp']         ?? '' );
    $industria        = sanitize_text_field( $_POST['industria']        ?? '' );
    $volumen          = sanitize_text_field( $_POST['volumen']          ?? '' );
    $usa_herramienta  = sanitize_text_field( $_POST['usa_herramienta']  ?? '' );
    $herramienta_cual = sanitize_text_field( $_POST['herramienta_cual'] ?? '' );
    $page_url         = esc_url_raw(         $_POST['page_url']         ?? '' );
    $timestamp        = sanitize_text_field( $_POST['timestamp']        ?? '' );

    // 3. Validar campos requeridos
    if ( ! $nombre || ! is_email( $email ) || ! $industria || ! $volumen ) {
        wp_send_json_error( [ 'message' => 'Campos requeridos faltantes' ], 400 );
        return;
    }

    // 4. Etiquetas legibles
    $industria_labels = [
        'clinica'       => 'Clínica / Estética / Salud',
        'inmobiliaria'  => 'Agencia Inmobiliaria',
        'ecommerce'     => 'E-commerce / Tienda online',
        'agencia'       => 'Agencia de Marketing',
        'negocio_local' => 'Negocio Local / Restaurante',
        'educacion'     => 'Educación / Cursos',
        'otro'          => 'Otro',
    ];
    $industria_label = $industria_labels[ $industria ] ?? $industria;

    $herramienta_info = 'No — todo manual';
    if ( $usa_herramienta === 'si' ) {
        $herramienta_info = 'Sí' . ( $herramienta_cual ? ' — <strong>' . esc_html( $herramienta_cual ) . '</strong>' : ' (no especificó cuál)' );
    }

    // WA link para el botón de respuesta rápida
    $wa_msg_encoded = rawurlencode(
        "Hola {$nombre}, vi que pediste el diagnóstico gratuito de Murgon Agency. ¿Tienes 5 minutos para contarme más sobre tu negocio?"
    );
    $wa_number = preg_replace( '/[^0-9]/', '', $whatsapp );
    $wa_link   = $wa_number
        ? "https://wa.me/{$wa_number}?text={$wa_msg_encoded}"
        : "https://wa.me/523117406927?text={$wa_msg_encoded}";

    // 5. Construir email HTML
    $to      = 'contacto@murgonagency.com';
    $subject = "\xF0\x9F\x8E\xAF Nuevo diagnóstico gratuito — {$nombre} ({$industria_label})";
    $headers = [
        'Content-Type: text/html; charset=UTF-8',
        "Reply-To: {$nombre} <{$email}>",
    ];

    $body = '<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
</head>
<body style="margin:0;padding:0;background:#f0f2f5;font-family:Arial,Helvetica,sans-serif;">
<div style="max-width:580px;margin:32px auto;background:#ffffff;border-radius:10px;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.10);">

  <!-- HEADER -->
  <div style="background:#070910;padding:30px 36px;text-align:center;">
    <p style="margin:0;font-size:20px;font-weight:700;color:#ffffff;letter-spacing:-0.3px;">Murgon Agency</p>
    <p style="margin:6px 0 0;font-size:12px;color:rgba(255,255,255,0.45);letter-spacing:1px;text-transform:uppercase;">Nuevo lead · Diagnóstico gratuito</p>
  </div>

  <!-- ALERTA VERDE -->
  <div style="background:#00e676;padding:13px 36px;">
    <p style="margin:0;font-size:13px;font-weight:700;color:#000;">&#x1F3AF; NUEVO DIAGNÓSTICO SOLICITADO — Responde antes de 24h</p>
  </div>

  <!-- DATOS DEL PROSPECTO -->
  <div style="padding:32px 36px 20px;">
    <p style="margin:0 0 20px;font-size:13px;font-weight:700;color:#999;text-transform:uppercase;letter-spacing:1.5px;">Datos del prospecto</p>

    <table style="width:100%;border-collapse:collapse;">
      <tr>
        <td style="padding:11px 0;border-bottom:1px solid #f0f0f0;font-size:11px;font-weight:700;color:#aaa;text-transform:uppercase;letter-spacing:0.8px;width:38%;vertical-align:top;">Nombre</td>
        <td style="padding:11px 0;border-bottom:1px solid #f0f0f0;font-size:15px;font-weight:600;color:#111;">' . esc_html( $nombre ) . '</td>
      </tr>
      <tr>
        <td style="padding:11px 0;border-bottom:1px solid #f0f0f0;font-size:11px;font-weight:700;color:#aaa;text-transform:uppercase;letter-spacing:0.8px;vertical-align:top;">Email</td>
        <td style="padding:11px 0;border-bottom:1px solid #f0f0f0;font-size:15px;"><a href="mailto:' . esc_attr( $email ) . '" style="color:#00c853;text-decoration:none;font-weight:600;">' . esc_html( $email ) . '</a></td>
      </tr>
      <tr>
        <td style="padding:11px 0;border-bottom:1px solid #f0f0f0;font-size:11px;font-weight:700;color:#aaa;text-transform:uppercase;letter-spacing:0.8px;vertical-align:top;">WhatsApp</td>
        <td style="padding:11px 0;border-bottom:1px solid #f0f0f0;font-size:15px;">' . ( $wa_number ? '<a href="https://wa.me/' . esc_attr( $wa_number ) . '" style="color:#25d366;text-decoration:none;font-weight:600;">' . esc_html( $whatsapp ) . '</a>' : '<span style="color:#ccc;font-size:13px;">No proporcionado</span>' ) . '</td>
      </tr>
      <tr>
        <td style="padding:11px 0;border-bottom:1px solid #f0f0f0;font-size:11px;font-weight:700;color:#aaa;text-transform:uppercase;letter-spacing:0.8px;vertical-align:top;">Industria</td>
        <td style="padding:11px 0;border-bottom:1px solid #f0f0f0;font-size:15px;color:#111;font-weight:600;">' . esc_html( $industria_label ) . '</td>
      </tr>
      <tr>
        <td style="padding:11px 0;border-bottom:1px solid #f0f0f0;font-size:11px;font-weight:700;color:#aaa;text-transform:uppercase;letter-spacing:0.8px;vertical-align:top;">Volumen diario</td>
        <td style="padding:11px 0;border-bottom:1px solid #f0f0f0;font-size:15px;color:#111;">' . esc_html( $volumen ) . ' mensajes/consultas al día</td>
      </tr>
      <tr>
        <td style="padding:11px 0;font-size:11px;font-weight:700;color:#aaa;text-transform:uppercase;letter-spacing:0.8px;vertical-align:top;">Herramienta actual</td>
        <td style="padding:11px 0;font-size:15px;color:#111;">' . $herramienta_info . '</td>
      </tr>
    </table>
  </div>

  <!-- BOTONES DE RESPUESTA -->
  <div style="padding:8px 36px 32px;text-align:center;">
    <a href="' . $wa_link . '"
       style="display:inline-block;background:#25d366;color:#fff;text-decoration:none;padding:13px 22px;border-radius:8px;font-weight:700;font-size:14px;margin:6px 5px;">
      &#x1F4AC; Responder por WhatsApp
    </a>
    <a href="mailto:' . esc_attr( $email ) . '?subject=' . rawurlencode( "Re: Tu diagnóstico gratuito — Murgon Agency" ) . '"
       style="display:inline-block;background:#f4f4f4;color:#333;text-decoration:none;padding:13px 22px;border-radius:8px;font-weight:700;font-size:14px;border:1px solid #ddd;margin:6px 5px;">
      &#x2709;&#xFE0F; Responder por Email
    </a>
  </div>

  <!-- FOOTER -->
  <div style="background:#f9f9f9;padding:16px 36px;border-top:1px solid #eee;text-align:center;">
    <p style="margin:0;font-size:11px;color:#bbb;line-height:1.6;">
      Recibido desde: <a href="' . esc_attr( $page_url ) . '" style="color:#bbb;">' . esc_html( $page_url ) . '</a><br>
      ' . ( $timestamp ? 'Fecha: ' . esc_html( $timestamp ) . '<br>' : '' ) . '
      Murgon Agency · contacto@murgonagency.com
    </p>
  </div>

</div>
</body>
</html>';

    $sent = wp_mail( $to, $subject, $body, $headers );

    // Respondemos éxito siempre para no bloquear el UX del usuario
    wp_send_json_success( [
        'message' => $sent ? 'Email enviado correctamente' : 'Recibido (revisar configuración SMTP)',
        'sent'    => $sent,
    ] );
}
add_action( 'wp_ajax_murgon_lead_magnet',        'murgon_lead_magnet_handler' );
add_action( 'wp_ajax_nopriv_murgon_lead_magnet', 'murgon_lead_magnet_handler' );
