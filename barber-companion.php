<?php
/*
 * Plugin Name:       Barber Companion
 * Plugin URI:        https://colorlib.com/wp/themes/barber/
 * Description:       Barber Companion is a companion for Barber theme.
 * Version:           1.0.1
 * Author:            Colorlib
 * Author URI:        https://colorlib.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       barber-companion
 * Domain Path:       /languages
 */


if( !defined( 'WPINC' ) ){
    die;
}

/*************************
    Define Constant
*************************/

// Define version constant
if( !defined( 'BARBER_COMPANION_VERSION' ) ){
    define( 'BARBER_COMPANION_VERSION', '1.1' );
}

// Define dir path constant
if( !defined( 'BARBER_COMPANION_DIR_PATH' ) ){
    define( 'BARBER_COMPANION_DIR_PATH', plugin_dir_path( __FILE__ ) );
}

// Define inc dir path constant
if( !defined( 'BARBER_COMPANION_INC_DIR_PATH' ) ){
    define( 'BARBER_COMPANION_INC_DIR_PATH', BARBER_COMPANION_DIR_PATH.'inc/' );
}

// Define sidebar widgets dir path constant
if( !defined( 'BARBER_COMPANION_SW_DIR_PATH' ) ){
    define( 'BARBER_COMPANION_SW_DIR_PATH', BARBER_COMPANION_INC_DIR_PATH.'sidebar-widgets/' );
}

// Define elementor widgets dir path constant
if( !defined( 'BARBER_COMPANION_EW_DIR_PATH' ) ){
    define( 'BARBER_COMPANION_EW_DIR_PATH', BARBER_COMPANION_INC_DIR_PATH.'elementor-widgets/' );
}

// Define demo data dir path constant
if( !defined( 'BARBER_COMPANION_DEMO_DIR_PATH' ) ){
    define( 'BARBER_COMPANION_DEMO_DIR_PATH', BARBER_COMPANION_INC_DIR_PATH.'demo-data/' );
}


$current_theme = wp_get_theme();

$is_parent = $current_theme->parent();



if( ( 'Barber' ==  $current_theme->get( 'Name' ) ) || ( $is_parent && 'Barber' == $is_parent->get( 'Name' ) ) ){
    require_once BARBER_COMPANION_DIR_PATH . 'barber-init.php';
}else{

    add_action( 'admin_notices', 'barber_companion_admin_notice', 99 );
    function barber_companion_admin_notice() {
        $url = 'https://demo.colorlib.com/barber/';
    ?>
        <div class="notice-warning notice">
            <p><?php printf( __( 'In order to use the <strong>Barber Companion</strong> plugin you have to also install the %1$sBarber Theme%2$s', 'barber-companion' ), '<a href="'.esc_url( $url ).'" target="_blank">', '</a>' ); ?></p>
        </div>
        <?php
    }
}

?>