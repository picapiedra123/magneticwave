<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header>
        <h1><?php bloginfo( 'name' ); ?></h1>
        <p><?php bloginfo( 'description' ); ?></p>
        <?php
        wp_nav_menu( array(
            'theme_location' => 'menu_principal',
            'container'      => 'nav',
            'menu_class'     => 'menu-principal',
            'fallback_cb'    => false,
        ) );
        ?>
    </header>