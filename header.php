<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- ══ NAV ══ -->
<nav id="navbar" role="navigation" aria-label="Navegación principal">
  <div class="nav-inner">

    <a href="<?php echo esc_url( home_url('/') ); ?>" class="nav-logo" aria-label="Murgon Agency - Inicio">
      <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/murgonagency_logo.png' ); ?>"
           alt="Murgon Agency"
           class="nav-logo__img"
           width="36" height="36">
      <span class="nav-logo__text">M<span>·</span>Agency</span>
    </a>

    <button class="nav-toggle" id="navToggle" aria-label="Abrir menú" aria-expanded="false" aria-controls="navMenu">
      <span></span><span></span><span></span>
    </button>

    <div class="nav-links" id="navMenu">
      <a href="#servicios">Servicios</a>
      <a href="#caso">Caso Real</a>
      <a href="#como-funciona">Cómo Funciona</a>
      <a href="#nosotros">Nosotros</a>
      <a href="#precios">Precios</a>
    </div>

    <a href="https://wa.me/523332512917?text=Hola%2C%20quiero%20una%20consultor%C3%ADa%20gratuita"
       class="nav-cta"
       target="_blank"
       rel="noopener noreferrer">
      Consulta Gratis →
    </a>

  </div>
</nav>
