<?php

/*******************************************************************************************************/
/* Vincular scripts y estilos */
/*******************************************************************************************************/

function theme_enqueue_styles() {
	wp_enqueue_style( 'first_fonts_google', 'https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i');
	wp_enqueue_style( 'seconds_fonts_google', 'https://fonts.googleapis.com/css?family=Playfair+Display:400,400i');
	wp_enqueue_style( 'bootstrap_css', get_stylesheet_directory_uri() . '/css/bootstrap.css');
	wp_enqueue_style( 'style_css', get_stylesheet_directory_uri() . '/css/style.css');
	wp_enqueue_style( 'dark_css', get_stylesheet_directory_uri() . '/css/dark.css');
	wp_enqueue_style( 'font_icons_css', get_stylesheet_directory_uri() . '/css/font-icons.css');
	wp_enqueue_style( 'animate_css', get_stylesheet_directory_uri() . '/css/animate.css');
	wp_enqueue_style( 'magnific_popup_css', get_stylesheet_directory_uri() . '/css/magnific-popup.css');
	wp_enqueue_style( 'responsive_css', get_stylesheet_directory_uri() . '/css/responsive.css');
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function theme_enqueue_js() {
	wp_enqueue_script( 'script_jquery', get_stylesheet_directory_uri() . '/js/jquery.js', '', '', 'true');
	wp_enqueue_script( 'script_plugins', get_stylesheet_directory_uri() . '/js/plugins.js', '', '', 'true');
	wp_enqueue_script( 'script_functions', get_stylesheet_directory_uri() . '/js/functions.js', '', '', 'true');
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_js' );


/*******************************************************************************************************/
/* Menus */
/*******************************************************************************************************/

add_theme_support('menus');

function register_mis_menus() {
  register_nav_menus(
    array(
      'principal-menu' => __( 'Menu Prinicipal' )
    )
  );
}
add_action( 'init', 'register_mis_menus' );

/*******************************************************************************************************/
/* Thumbnails */
/*******************************************************************************************************/

add_theme_support( 'post-thumbnails' );
?>