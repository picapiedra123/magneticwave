# MagneticWave

Tema de WordPress desarrollado **desde cero** como proyecto de aprendizaje y demostración de habilidades en desarrollo de temas personalizados. No parte de un tema hijo ni de un starter comercial: es una base mínima y clara sobre la que puedes ir añadiendo plantillas, bloques y estilos.

---

## Descripción

**MagneticWave** es un tema clásico de WordPress (PHP + plantillas) pensado para sitios de contenido sencillos: blog, portfolio o landing con entradas. Incluye la estructura mínima que WordPress exige para reconocer y activar un tema, más soporte para imágenes destacadas, un menú registrado y estilos responsivos básicos.

| Detalle        | Valor                          |
|----------------|--------------------------------|
| Nombre del tema | MagneticWave                  |
| Versión        | 1.0                            |
| Tipo           | Tema clásico (no block theme)  |
| Licencia       | Por definir (ver más abajo)    |

---

## Tecnologías

- **[WordPress](https://wordpress.org/)** — CMS y motor del sitio (plantillas, bucles, hooks).
- **PHP** — Lógica del tema (`functions.php`, plantillas).
- **HTML5** — Marcado semántico en `header.php`, `index.php`, `footer.php`.
- **CSS** — Estilos en `style.css` (cabecera del tema + reglas globales).
- **API de temas de WordPress** — `add_theme_support`, `register_nav_menus`, `wp_enqueue_style`, `wp_head` / `wp_footer`.

### Requisitos del servidor

- PHP **7.4+** (recomendado **8.0+**)
- MySQL **5.7+** o MariaDB **10.3+**
- WordPress **6.0+** (probado en entornos recientes con temas por defecto Twenty Twenty-*)

### Desarrollo local (recomendado)

- **[XAMPP](https://www.apachefriends.org/)** (Apache + MySQL + PHP), u otro stack equivalente: Local, WAMP, Laragon, Docker con WordPress.

---

## Características actuales

- Plantilla principal **`index.php`** con el bucle estándar de WordPress (listado de entradas).
- **`header.php`** y **`footer.php`** con `language_attributes`, charset, viewport y hooks `wp_head` / `wp_footer`.
- Soporte para **imágenes destacadas** (`post-thumbnails`).
- **Menú principal** registrado (`menu_principal` → etiqueta «Menú Principal» en el admin).
- Encolado del **stylesheet** del tema vía `wp_enqueue_style`.
- CSS base: reset de márgenes en `body`, tipografía sans-serif, imágenes fluidas y **media query** para pantallas ≤ 600px.

### Próximos pasos sugeridos (no implementados aún)

- `front-page.php`, `single.php`, `page.php`, `archive.php`
- `screenshot.png` (880×660 px) para la vista previa en Apariencia → Temas
- Integración del menú en `header.php` con `wp_nav_menu()`
- `theme.json` o estilos ampliados si migras a enfoque híbrido / bloques

---

## Estructura del proyecto

```
magneticwave/
├── style.css      # Metadatos del tema (obligatorio) + estilos globales
├── functions.php  # Soporte del tema, menús, encolado de assets
├── index.php      # Plantilla por defecto (bucle de entradas)
├── header.php     # Apertura HTML, cabecera del sitio
├── footer.php     # Pie y cierre de documento
└── README.md      # Este archivo
```

### Archivos obligatorios en WordPress

| Archivo        | Función |
|----------------|---------|
| `style.css`    | Debe incluir la cabecera `Theme Name`, etc. Sin esto WordPress no lista el tema. |
| `index.php`    | Plantilla de respaldo; siempre debe existir. |

El resto de archivos amplían comportamiento y presentación; WordPress los carga según la jerarquía de plantillas.

---

## Instalación

### Opción A — Copiar solo el tema (producción o otro WordPress)

1. Descarga o clona este repositorio.
2. Copia la carpeta `magneticwave` dentro de:
   ```
   wp-content/themes/magneticwave/
   ```
3. En el panel de WordPress: **Apariencia → Temas → Activar «MagneticWave»**.
4. Opcional: **Apariencia → Menús** — crea un menú y asígnalo a **Menú Principal** (cuando lo muestres en `header.php`).

### Opción B — Entorno local con XAMPP (este repositorio de desarrollo)

Si trabajas con una instalación completa de WordPress en `htdocs`:

1. Asegúrate de que Apache y MySQL estén en ejecución en XAMPP.
2. Crea la base de datos y configura `wp-config.php` (nombre de BD, usuario, contraseña, prefijo de tablas).
3. Completa la instalación de WordPress en el navegador (`http://localhost/...`).
4. El tema ya debe estar en:
   ```
   wp-content/themes/magneticwave/
   ```
5. Activa **MagneticWave** en el administrador.

### Clonar desde GitHub

```bash
git clone https://github.com/picapiedra123/magneticwave.git
```

Si el repositorio contiene **solo** el tema, copia el contenido clonado a `wp-content/themes/magneticwave/`. Si el clone incluye la raíz del monorepo, ajusta la ruta según cómo esté organizado el remoto.

---

## Configuración en WordPress

1. **Ajustes → Generales** — Título del sitio y descripción (se muestran en `header.php` vía `bloginfo()`).
2. **Entradas** — Crea contenido de prueba para ver el bucle en `index.php`.
3. **Apariencia → Menús** — Registra ítems en el menú asignado a **Menú Principal** (el slug interno es `menu_principal`).
4. **Entradas → Imagen destacada** — Disponible gracias a `add_theme_support( 'post-thumbnails' )`.

---

## Desarrollo

### Flujo de trabajo habitual

1. Edita plantillas PHP o `style.css` en el editor o IDE.
2. Recarga el front del sitio (y limpia caché si usas plugins de caché).
3. Para cambios solo en CSS, a veces basta con recarga forzada del navegador (Ctrl+F5).

### Personalizar metadatos del tema

Edita la cabecera en `style.css`:

```css
/*
Theme Name: MagneticWave
Author: Tu nombre
Description: Tema personalizado para demostración de habilidades.
Version: 1.0
*/
```

Incrementa `Version` cuando publiques releases en GitHub para invalidar cachés de estilos si enlazas la versión en `wp_enqueue_style`.

### Añadir el menú al header (ejemplo)

En `header.php`, después del título:

```php
<?php
wp_nav_menu( array(
    'theme_location' => 'menu_principal',
    'container'      => 'nav',
    'container_class'=> 'menu-principal',
) );
?>
```

### Buenas prácticas

- Escapa salida en plantillas: `esc_html()`, `esc_url()`, `the_title()` ya escapa en muchos casos.
- No subas `wp-config.php`, `.env` ni credenciales al repositorio del tema.
- Mantén el tema en su propia carpeta; el core de WordPress suele actualizarse aparte.

---

## Jerarquía de plantillas (referencia)

WordPress elige la primera plantilla que exista en este orden (simplificado):

| Contexto        | Plantillas típicas (orden aproximado) |
|-----------------|----------------------------------------|
| Entrada single  | `single-{slug}.php` → `single.php` → `singular.php` → `index.php` |
| Página          | `page-{slug}.php` → `page.php` → `singular.php` → `index.php` |
| Archivo / blog  | `archive.php` → `index.php` |
| Inicio          | `front-page.php` → `home.php` → `index.php` |

Hoy solo está implementado **`index.php`**, que actúa como comodín para la mayoría de vistas.

---

## Repositorio

- **Remoto:** [https://github.com/picapiedra123/magneticwave](https://github.com/picapiedra123/magneticwave)

Comandos útiles:

```bash
git add .
git commit -m "Descripción del cambio"
git push -u origin main
```

---

## Licencia

Indica aquí la licencia del tema (por ejemplo **GPLv2 or later**, alineada con WordPress, si distribuyes el tema públicamente). Hasta entonces, todos los derechos reservados salvo que el autor publique otra licencia en el repositorio.

---

## Autor y contacto

- **Autor:** Tu nombre (actualizar en `style.css` y en este README)
- **Repositorio:** [picapiedra123/magneticwave](https://github.com/picapiedra123/magneticwave)

---

## Recursos

- [Theme Handbook (WordPress)](https://developer.wordpress.org/themes/)
- [Template Hierarchy](https://developer.wordpress.org/themes/basics/template-hierarchy/)
- [Plugin API / Hooks](https://developer.wordpress.org/plugins/hooks/)
