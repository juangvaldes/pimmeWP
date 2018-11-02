<?php
$home = array(
	'post_type' => 'home'
	);

$the_query = new WP_Query($home);
$count_post = wp_count_posts('home')->publish;
$i = 1;
if( have_posts() ) : while( $the_query -> have_posts() ) : $the_query -> the_post();
	$tipo_seccion = get_field("tipo_de_seccion");
	$add_style = null;
	if($i == 2) {
		$add_style = 'padding-top: 30px;';
	} else if($i == $count_post) {
		$add_style = 'padding-bottom: 150px;';
	}
	if($tipo_seccion == 2) {
		$img = get_field("imagen_contactarme");
?>
	<div style="background-color: #371b7c;<?php echo $add_style;?>">
		<form action="#" method="post" role="form" class="landing-wide-form clearfix" >

			<img src="<?php echo $img['url']?>" class="col_one_fourth" >
		
			<div class="col_one_fourth nobottommargin">
				<input type="text" class="form-control form-control-lg not-dark" value="" placeholder="Nombre">
			</div>
			<div class="col_one_fourth nobottommargin">
				<input type="email" class="form-control form-control-lg not-dark" value="" placeholder="Email">
			</div>
			<button class="col_one_fourth btn btn-lg btn-outline-light btn-block nomargin" value="submit" type="submit" style=""><?php the_field('texto_boton_contactarme');?></button>
			
		</form>
	</div>
<?php
	} else if($tipo_seccion == 3) {
		$add_img = get_field("agregar_imagen");
		$color_section = get_field("color_seccion");
		$style_section = null;
		$style_text = null;
		if(!empty($color_section) && ( $color_section != '#ffffff' )) {
			$style_section = "style='background-color: ".$color_section."; ".$add_style."'";
			$style_boton = "style='border-color: #fff; color: #fff;'";
			$style_text = "color-text";
		}
		$add_ancla = get_field("ancla");
		$id_ancla = get_field("id_ancla");
		$un_ancla = null;
		if ($add_ancla==1) {
			$un_ancla = "id='".$id_ancla."'";
		}
?>
	<div class="section notopmargin nobottommargin" <?php echo $style_section;?>>
		<div class="container clearfix" <?php echo $un_ancla;?> >

			<?php
			if(!empty($add_img)) {
				$position_css = null;
				$img = get_field("imagen_contenido");
				$position_img = get_field("posicion_imagen");
				if($position_img == 'right') {
					$position_css = 'position-img-info';
				}
			?>
			<div class="col_half nobottommargin topmargin-lg <?php echo $position_css;?>">
				<img src="<?php echo $img['url'];?>" alt="<?php echo $img['alt'];?>" class="center-block">
			</div>
			<?php
			}
			?>

			<div class="col_half nobottommargin topmargin-lg col_last">

				<div class="heading-block topmargin-lg information-section <?php echo $style_text;?>">
					<?php the_field('descripcion');?>
				</div>
				<?php 
				$url_informativa = get_field('url_boton_informativa');
				$texto_boton = get_field('texto_boton');
				if(!empty($texto_boton)) {
				?>
					<a href="<?php the_field('url_boton_informativa');?>" class="button button-border button-rounded button-large button-dark noleftmargin" <?php echo $style_boton;?>>
						<?php the_field('texto_boton');?>
					</a>
				<?php
				}
				?>
			</div>

		</div>
	</div>
<?php
	}
	$i++;
endwhile; else :
_e('Sorry, the post had not content.');
endif;
?>