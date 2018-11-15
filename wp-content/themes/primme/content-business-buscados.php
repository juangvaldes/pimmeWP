<?php 
$imagen = get_field("imagen_de_fondo");
?>
<div class="page-section section parallax dark" style="background-image: url('<?php echo $imagen["url"];?>'); padding: 200px 0; background-repeat: repeat-x;" data-bottom-top="background-position:0px 300px;" data-top-bottom="background-position:0px -300px;">
	<div class="container-fluid center clearfix">

		<div class="heading-block">
			<h2 style="color: #fff;"><?php the_title();?></h2>
			<span style="color: #fff;" ><?php the_field("descripcion_mas_buscados");?></span>
			<div class="clear"></div>
		</div>

		<?php
		$perfiles_buscados = array(
			'post_type' => 'perfiles_buscados'
			);

		$the_query = new WP_Query($perfiles_buscados);

		if( have_posts() ) : while( $the_query -> have_posts() ) : $the_query -> the_post();
		?>

		<div class="col_one_fifth nobottommargin" data-animate="bounceIn">
			<div class="counter counter-large"><span data-from="100" data-to="<?php the_field("cantidad_buscada");?>" data-refresh-interval="20" data-speed="2000"></span></div>
			<h5 style="color: #fff;"><?php the_field("nombre_perfil_buscado");?></h5>
		</div>

		<?php
		endwhile; else :
		_e('Sorry, the post had not content.');
		endif;
		?>


	</div>
</div>

<br> <br>