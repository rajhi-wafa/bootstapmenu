<?php
/** 
 * Plugin Name:       Bootstrap Menu
 * Plugin URI:        http://gitlab.kbosolution.com/wp-plugins/boostrap-menu
 * Description:       Ajoute un menu bootstrap.
 * Version:           1.0.0
 * Author:            Wafa Rajhi
 * Author URI:        https://www.kbodev.com/
 * Text Domain:       kbodev-bootstrap-menu
 * Domain Path:       /languages
**/  

include_once 'inc/class-wp-bootstrap-navwalker.php';

register_nav_menu('bootstrap-menu', 'Bootstrap menu');

function kbodev_enqueue_style() {
	wp_enqueue_style( "bootstrap-style", "https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css");
}
function kbodev_enqueue_script() {
	wp_enqueue_script( "bootstrap-script", "https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js", array(), "5.0", true );
}
add_action( 'wp_enqueue_scripts', 'kbodev_enqueue_style', 50 );
add_action( 'wp_enqueue_scripts', 'kbodev_enqueue_script' );

function addbootstrap_menu(){
    echo '<nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand p-0" href="'.esc_url( home_url( '/' ) ).'"><img style="max-height:40px;" src="'.esc_url( wp_get_attachment_url( get_theme_mod( 'custom_logo' ) ) ).'" alt=""></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
            
            <div class="collapse navbar-collapse d-md-flex flex-row-reverse" id="navbarCollapse">';
                wp_nav_menu(array(
                    'theme_location' => 'bootstrap-menu',
                    'container' => false,
                    'menu_class' => '',
                    'fallback_cb' => '__return_false',
                    'items_wrap' => '<ul id="%1$s" class="navbar-nav mb-2 mb-md-0 %2$s">%3$s</ul>',
                    'depth' => 2,
                    'walker' => new bootstrap_5_wp_nav_menu_walker()
                ));
    echo '       </div>
        </div>
    </nav>';        
}


