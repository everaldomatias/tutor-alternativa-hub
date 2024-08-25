<?php

namespace alternativa_hub;

function redirect_non_logged_users() {

    if ( ! class_exists( '\PeepSo' ) ) {
        return;
    }

    if ( ! method_exists( '\PeepSo', 'get_page' ) ) {
        return;
    }

    $peepso_pages = [
        \PeepSo::get_page( 'activity' ),
        \PeepSo::get_page( 'profile' ),
        \PeepSo::get_page( 'members' ),
        \PeepSo::get_page( 'notifications' ),
        \PeepSo::get_page( 'messages' ),
        \PeepSo::get_page( 'friends' ),
        \PeepSo::get_page( 'recover' ),
        \PeepSo::get_page( 'register' ),
        \PeepSo::get_page( 'reset' ),
        \PeepSo::get_page( 'groups' ),
        \PeepSo::get_page( 'photos' )
    ];

    $current_url = home_url(add_query_arg(null, null));

    foreach ( $peepso_pages as $peepso_page ) {
        if ( $peepso_page === home_url( '/' ) ) {
            continue;
        }

        if ( strpos( $current_url, $peepso_page ) !== false ) {
            if ( ! is_user_logged_in() ) {
                wp_redirect( home_url( 'painel' ) );
                exit;
            }
            break;
        }
    }
}
add_action( 'template_redirect', 'alternativa_hub\redirect_non_logged_users' );
