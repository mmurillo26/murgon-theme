# Murgon Agency — WordPress Theme

Tema custom de Murgon Agency. Dark, premium, orientado a conversión.

## Estructura del tema

```
murgon-agency/
├── style.css          ← Header del tema (requerido por WordPress)
├── functions.php      ← Setup, enqueue de assets, SEO básico
├── index.php          ← Template fallback
├── front-page.php     ← Landing page principal ← ARCHIVO CLAVE
├── header.php         ← HTML head + navegación
├── footer.php         ← Footer + wp_footer()
├── assets/
│   ├── css/
│   │   └── murgon.css ← Todos los estilos
│   ├── js/
│   │   └── murgon.js  ← Nav, FAQ, reveal, counters
│   └── images/
│       ├── mario-murillo.png  ← Foto del fundador (agregar manualmente)
│       └── og-image.png       ← Imagen para redes sociales (1200x630)
└── README.md
```

## Instalación

### Opción A — Subir directo a WordPress
1. Comprimir la carpeta `murgon-agency/` en un `.zip`
2. WordPress Admin → Apariencia → Temas → Subir tema
3. Activar el tema
4. Ir a Ajustes → Lectura → "Página de inicio" → seleccionar página estática → "Inicio"
5. WordPress usará automáticamente `front-page.php`

### Opción B — Deploy via GitHub (WordPress.com Business)
1. Crear repo en GitHub con esta estructura en la raíz
2. WordPress.com → tu sitio → Deployments → Connect to GitHub
3. Seleccionar el repo y branch (`main`)
4. Cada `git push` hace deploy automático

**Recomendado:** usar branch `develop` para staging y `main` para producción.

```
develop → deploy a staging.murgonagency.com
main    → deploy a murgonagency.com
```

## Personalización

### Cambiar colores
Editar las CSS variables en `assets/css/murgon.css`:
```css
:root {
  --accent:  #00c8ff;  /* Color principal (azul eléctrico) */
  --green:   #00e5a0;  /* Acento verde (métricas, caso de éxito) */
  --bg:      #070910;  /* Fondo oscuro base */
}
```

### Cambiar precios
En `front-page.php`, buscar la sección `<!-- ══ PRICING ══ -->` y editar los valores directamente.

### Agregar imagen del fundador
Colocar la foto en `assets/images/mario-murillo.png`.
El template tiene fallback a la URL actual de WordPress si no existe el archivo local.

### Agregar caso de éxito nuevo
En `front-page.php`, buscar la sección `<!-- ══ CASE STUDY ══ -->` y duplicar/editar el `case-wrapper`.

## Variables PHP → JS disponibles

Desde `wp_localize_script` en `functions.php`:
```javascript
murgonVars.ajaxUrl   // URL para AJAX requests
murgonVars.nonce     // Nonce para seguridad
murgonVars.themeUri  // URL del directorio del tema
```

## Notas técnicas

- **No depende de ningún plugin** — funciona con WordPress bare metal
- Compatible con WordPress 6.x + PHP 8.x
- Fuentes: Syne (display) + DM Sans (body) — cargadas desde Google Fonts
- No incluye jQuery — JS vanilla puro
- SEO básico incluido (meta description dinámica + OG tags)
- Lazy loading activado en imágenes

## TODO / Próximas iteraciones

- [ ] Agregar página de blog (`archive.php`, `single.php`)
- [ ] Formulario de contacto nativo (sin plugin) vía AJAX
- [ ] Modo de edición de precios desde WordPress Admin (Custom Fields)
- [ ] Testimoniales dinámicos (Custom Post Type)
- [ ] Integración con ReCAPTCHA para el formulario
