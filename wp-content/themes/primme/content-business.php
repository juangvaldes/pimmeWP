<?php

$home = array(
	'post_type' => 'home'
	);

$the_query = new WP_Query($home);

if( have_posts() ) : while( $the_query -> have_posts() ) : $the_query -> the_post();
	$type_contenido = get_field('tipo_de_contenido');

	if($type_contenido == 1) {
		get_template_part("content", "business-propuesta");
	} else if($type_contenido == 3) {
		get_template_part("content", "business-conectamos");
	} else if($type_contenido == 4) {
		get_template_part("content", "business-hacemos");
	} else if($type_contenido == 5) {
		get_template_part("content", "business-buscados");
	}

endwhile; else :
_e('Sorry, the post had not content.');
endif;
?>