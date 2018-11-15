<?php
$home = array(
	'post_type' => 'home'
	);

$the_query = new WP_Query($home);
if( have_posts() ) : while( $the_query -> have_posts() ) : $the_query -> the_post();
	$tipo_seccion = get_field("tipo_de_seccion");
	$agregar_imagen = get_field("agregar_imagen");
	$imagen = get_field("imagen");
	if($tipo_seccion == 1) {
?>
		<section id="slider" class="slider-element" style="background: url(
<?php
if($agregar_imagen==1)
{echo $imagen["url"];}
?>
		) center; overflow: visible;" data-height-xl="500" data-height-lg="500" data-height-md="600" data-height-sm="600" data-height-xs="600">
			<div class="container clearfix">

				<div class="contact-widget" data-loader="button">

					<div class="contact-form-result"></div>

					<form action="include/landing-5.php" method="post" role="form" class="landing-wide-form landing-form-overlay dark nobottommargin clearfix">
						<div class="heading-block nobottommargin nobottomborder">
							<?php the_field('contactenos');?>
						</div>

				
						<div class="line" style="margin: 20px 0 30px;"></div>
				
						<div class="col_full">
							<input type="text" name="template-landing5-name" class="form-control required form-control-lg not-dark" value="" placeholder="Nombre">
						</div>
						<div class="col_full">
							<input type="email" name="template-landing5-email" class="form-control required form-control-lg not-dark" value="" placeholder="Email">
						</div>
						<div class="col_full">
							<input type="password" name="template-landing5-password" class="form-control required form-control-lg not-dark" value="" placeholder="Nombre de empresa">
						</div>
						<div class="col_full">
							<input type="password" name="template-landing5-repassword" class="form-control required form-control-lg not-dark" value="" placeholder="Teléfono">
						</div>
						<div class="col_full hidden">
							<input type="text" id="template-landing5-botcheck" name="template-landing5-botcheck" value="" class="form-control" />
						</div>

				
						<div class="col_full nobottommargin">
							<a href="contacto.html"><button class="btn btn-lg btn-light btn-block nomargin" value="submit" type="submit" style="">CONTACTARME</button></a>
						</div>
					</form>

				</div>

			</div>
		</section>
<?php
	}
endwhile; else :
_e('Sorry, the post had not content.');
endif;
?>