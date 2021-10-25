<?php
/*
 * Plugin Name:       Job_Board Companion
 * Plugin URI:        https://colorlib.com/wp/themes/job_board/
 * Description:       Job_Board Companion is a companion for Job_Board theme.
 * Version:           1.0.1
 * Author:            Colorlib
 * Author URI:        https://colorlib.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       job_board-companion
 * Domain Path:       /languages
 */


if( !defined( 'WPINC' ) ){
    die;
}

/*************************
    Define Constant
*************************/

// Define version constant
if( !defined( 'JOB_BOARD_COMPANION_VERSION' ) ){
    define( 'JOB_BOARD_COMPANION_VERSION', '1.1' );
}

// Define dir path constant
if( !defined( 'JOB_BOARD_COMPANION_DIR_PATH' ) ){
    define( 'JOB_BOARD_COMPANION_DIR_PATH', plugin_dir_path( __FILE__ ) );
}

// Define inc dir path constant
if( !defined( 'JOB_BOARD_COMPANION_INC_DIR_PATH' ) ){
    define( 'JOB_BOARD_COMPANION_INC_DIR_PATH', JOB_BOARD_COMPANION_DIR_PATH.'inc/' );
}

// Define sidebar widgets dir path constant
if( !defined( 'JOB_BOARD_COMPANION_SW_DIR_PATH' ) ){
    define( 'JOB_BOARD_COMPANION_SW_DIR_PATH', JOB_BOARD_COMPANION_INC_DIR_PATH.'sidebar-widgets/' );
}

// Define elementor widgets dir path constant
if( !defined( 'JOB_BOARD_COMPANION_EW_DIR_PATH' ) ){
    define( 'JOB_BOARD_COMPANION_EW_DIR_PATH', JOB_BOARD_COMPANION_INC_DIR_PATH.'elementor-widgets/' );
}

// Define demo data dir path constant
if( !defined( 'JOB_BOARD_COMPANION_DEMO_DIR_PATH' ) ){
    define( 'JOB_BOARD_COMPANION_DEMO_DIR_PATH', JOB_BOARD_COMPANION_INC_DIR_PATH.'demo-data/' );
}


$current_theme = wp_get_theme();

$is_parent = $current_theme->parent();



if( ( 'Job_Board' ==  $current_theme->get( 'Name' ) ) || ( $is_parent && 'Job_Board' == $is_parent->get( 'Name' ) ) ){
    require_once JOB_BOARD_COMPANION_DIR_PATH . 'job_board-init.php';
}else{

    add_action( 'admin_notices', 'job_board_companion_admin_notice', 99 );
    function job_board_companion_admin_notice() {
        $url = 'https://demo.colorlib.com/job_board/';
    ?>
        <div class="notice-warning notice">
            <p><?php printf( __( 'In order to use the <strong>Job_Board Companion</strong> plugin you have to also install the %1$sJob_Board Theme%2$s', 'job_board-companion' ), '<a href="'.esc_url( $url ).'" target="_blank">', '</a>' ); ?></p>
        </div>
        <?php
    }
}

?>