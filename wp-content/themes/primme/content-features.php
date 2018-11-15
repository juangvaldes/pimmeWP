<?php
$features = array(
	'post_type' => 'features'
	);

$the_query = new WP_Query($features);
if( have_posts() ) : while( $the_query -> have_posts() ) : $the_query -> the_post();
	$tipo_seccion = get_field("tipo_de_seccion");
	if($tipo_seccion == 2) {
?>

<div class="clear bottommargin-lg"></div>

					<div id="section-features" class="heading-block title-center page-section">
						<?php the_field('que_hacemos');?>
					</div>
					<br> <br> <br>					

					<div class="clear"></div>
