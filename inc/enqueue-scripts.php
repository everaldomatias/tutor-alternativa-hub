<?php

namespace alternativa_hub;

add_action( 'wp_enqueue_scripts', 'alternativa_hub\\enqueue_styles' );

function enqueue_styles() {
    wp_enqueue_style( 
        'tutor-alternativa-hub-style', 
        get_stylesheet_uri()
    );
}
