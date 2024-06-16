<?php

namespace alternativa_hub;

add_action( 'wp_enqueue_scripts', 'alternativa_hub\\enqueue_theme_styles' );
function enqueue_theme_styles() {
    wp_enqueue_style(
        'tutor-alternativa-hub-style',
        get_stylesheet_directory_uri() . '/dist/style.css',
        ['main'],
        filemtime( get_stylesheet_directory() . '/dist/style.css' ) );
}
