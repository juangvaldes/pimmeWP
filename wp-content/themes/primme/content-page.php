<input type="hidden" id="page-blog" value="true"/>
<?php
global $post;
$post_slug = $post->post_name;

$args = array(
    'pagename' => $post_slug
);

$wp_query = new WP_Query($args);

if ( $wp_query->have_posts() ) : 
	while ( $wp_query->have_posts() ) : $wp_query->the_post();
	$subTitle = get_field("sub-titulo");
	$eslogan = get_field("eslogan");
	$tipo_de_contenido = get_field("tipo_de_contenido");
	if(!empty($subTitle)) {
?>
<!-- Page Title
============================================= -->
<section id="page-title">

	<div class="container clearfix" style="color: #fff;">
		<h1 style="color: #fff;"><?php echo $subTitle;?></h1>
		<span style="color: #fff; font-weight: lighter; font-size: 17px;"><?php echo $eslogan;?></span>
</section><!-- #page-title end -->
<?php
	}
?>
<!-- Content
============================================= -->
<section id="content">

	<div class="content-wrap">

		<div class="container clearfix">
			<?php
			if($tipo_de_contenido == 2) {
				$add_perfiles = get_field("agregar_perfiles");
				get_template_part("content", "formulario");
				if($add_perfiles == 1) {
					get_template_part("content", "perfiles");
				}
			} else if($tipo_de_contenido == 1) {
				the_field("texto_contenido");
			}
			?>
		<div class="line"></div>
	</div>
</div>
</section> <!-- #content end -->
<?php
	endwhile;
endif;
?>