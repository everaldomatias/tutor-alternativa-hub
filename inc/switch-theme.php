<?php

namespace alternativa_hub;

function check_tutor_lms_active() {
    if ( ! function_exists( 'is_plugin_active' ) ) {
        require_once ABSPATH . 'wp-admin/includes/plugin.php';
    }

    if ( ! is_plugin_active( 'tutor/tutor.php' ) ) {
        add_action( 'admin_notices', 'alternativa_hub\tutor_lms_inactive_notice' );
        switch_theme( WP_DEFAULT_THEME );
        return false;
    }

    return true;
}


add_action( 'after_switch_theme', 'alternativa_hub\check_tutor_lms_active' );

function tutor_lms_inactive_notice() {
    ?>
    <div class="notice notice-error is-dismissible">
        <p><?php _e( 'O tema não pôde ser ativado porque o plugin Tutor LMS não está ativo. Ative-o e tente novamente.', 'alternativa-hub' ); ?></p>
    </div>
    <?php
}
