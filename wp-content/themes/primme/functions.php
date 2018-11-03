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
	wp_enqueue_script( 'script_actions', get_stylesheet_directory_uri() . '/js/actions.js', '', '', 'true');
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

/*******************************************************************************************************/
/* Contenido blog */
/*******************************************************************************************************/

function render_img($image) {
	return '<img src="'.$image['url'].'" alt="'.$image['title'].'" title="'.$image['title'].'"/>';
}

function render_galeria_img($galeria_imagenes) {	

	$html = '<div class="portfolio-single-image masonry-thumbs grid-4" data-big="3" data-lightbox="gallery">';
		foreach($galeria_imagenes as $value) :
			$html .= '<a href="'.$value['full_image_url'].'" data-lightbox="gallery-item">
					<img src="'.$value['thumbnail_image_url'].'" class="width-thum-gallery image_fade"/>
				</a>';
		endforeach;
	$html .= '</div>';

	return $html;
}

function render_slider_cuadrado($slider_cuadrado) {

	$html = '<div class="fslider" data-animation="fade" data-pagi="false" data-pause="6000" data-lightbox="gallery">
		<div class="flexslider">
			<div class="slider-wrap">';

		foreach($slider_cuadrado as $value) :

			$html .= '<div class="slide">
				<a href="'.$value['full_image_url'].'" data-lightbox="gallery-item">

					<img src="'.$value['full_image_url'].'" class="image_fade" title="'.$value['title'].'"/>

				</a>
			</div>';

		endforeach;

			$html .= '</div>
		</div>
	</div>';

	return $html;
}

function render_slider_vertical($slider_vertical) {
	
	$html = '<div class="fslider" data-arrows="false" data-lightbox="gallery">
		<div class="flexslider">
			<div class="slider-wrap">';
	
		foreach($slider_vertical as $value) :
	
			$html .= '<div class="slide">
				<a href="'.$value['full_image_url'].'" data-lightbox="gallery-item">
	
					<img src="'.$value['full_image_url'].'" class="image_fade" title="'.$value['title'].'" alt="'.$value['title'].'"/>
	
				</a>
			</div>';
	
		endforeach;
	
			$html .= '</div>
		</div>
	</div>';

	return $html;
}

function render_iframe($iframe) {
	return '<iframe width="100%" scrolling="no" frameborder="no" src="'.$iframe.'"></iframe>';
}


/*******************************************************************************************************/
/* Paginador blog */
/*******************************************************************************************************/
function wpbeginner_numeric_posts_nav() {
 
    if( is_singular() )
        return;
 
    global $wp_query;
 
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
 
    $paged = $_GET[ 'page' ] ? absint( $_GET[ 'page' ] ) : 1;
    $max   = intval( $wp_query->max_num_pages );
 
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
 
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
 
    echo '<ul class="pagination nobottommargin">' . "\n";
 
    /** Previous Post Link */
    //if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", post_link_attributes(get_previous_posts_link("&laquo;")) );
 
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
 
        printf( '<li%s><a href="%s" class="page-link">%s</a></li>' . "\n", $class, alter_link_paginator(esc_url( get_pagenum_link( 1 ) )), '1' );
 
        if ( ! in_array( 2, $links ) )
            echo '<li class="page-item">…</li>';
    }
 
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="page-item active"' : ' class="page-item"';
        printf( '<li%s><a href="%s" class="page-link">%s</a></li>' . "\n", $class, alter_link_paginator(esc_url( get_pagenum_link( $link ) )), $link );
    }
 
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li class="page-item">…</li>' . "\n";
 
        $class = $paged == $max ? ' class="page-item active"' : ' class="page-item"';
        printf( '<li%s><a href="%s" class="page-link">%s</a></li>' . "\n", $class, alter_link_paginator(esc_url( get_pagenum_link( $max ) )), $max );
    }
 
    /** Next Post Link */
    //if ( get_next_posts_link() )
        printf( '<li class="page-item">%s</li>' . "\n", post_link_attributes(get_next_posts_link('&raquo;')) );
 
    echo '</ul>' . "\n";
 
}

function alter_link_paginator($link) {
	$category = isset($_GET['category']) && !empty($_GET['category']) ? '&category='.$_GET['category'] : '';
	$link = explode("?",$link);
	return str_replace("page/", "?page=", $link[0].$category);
}

function post_link_attributes($output) {
	$category = isset($_GET['category']) && !empty($_GET['category']) ? '&category='.$_GET['category'] : '';
    $code = 'class="page-link"';
    $output = str_replace('<a href=', '<a '.$code.' href=', $output);
    
    if(strpos($output, '?') != "") {
    	$pos = substr($output, strpos($output, '?'));
    	$pos = substr($pos, 0, strpos($pos, '"'));
    	$output = str_replace($pos, '', $output);
    }
    $output = str_replace('page/', '?page=', $output);
    return $output;
}

function wmpudev_enqueue_icon_stylesheet() {
    wp_register_style( 'fontawesome', 'http:////maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' );
    wp_enqueue_style( 'fontawesome');
}
add_action( 'wp_enqueue_scripts', 'wmpudev_enqueue_icon_stylesheet' );
?>