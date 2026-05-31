<?php
// Soporte para imágenes destacadas
add_theme_support( 'post-thumbnails' );

// Registrar un menú
register_nav_menus( array(
    'menu_principal' => 'Menú Principal',
) );

// Agregar estilos y scripts básicos
function mi_tema_scripts() {
    wp_enqueue_style( 'mi-estilo', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'mi_tema_scripts' );
?>