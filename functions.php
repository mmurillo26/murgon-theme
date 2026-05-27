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
