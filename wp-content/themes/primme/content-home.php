<?php
$home = array(
	'post_type' => 'home'
	);

$the_query = new WP_Query($home);
if( have_posts() ) : while( $the_query -> have_posts() ) : $the_query -> the_post();
	$tipo_seccion = get_field("tipo_de_seccion");
	if($tipo_seccion == 1) {
?>
	<section id="slider" class="slider-element slider-parallax" style="background: url('<?php bloginfo('template_directory')?>/images/landing/landing1.jpg') no-repeat; background-size: cover" data-height-xl="600" data-height-lg="500" data-height-md="400" data-height-sm="300" data-height-xs="250">
		<div class="slider-parallax-inner">

			<div class="container clearfix">
				<div class="vertical-middle dark center">

					<!-- Info resoluciones 1199px a 768px-->

					<div class="heading-block nobottommargin center d-none d-md-block">

					
						<h1>
							<img src="<?php bloginfo('template_directory')?>/images/mm-large.jpg" width="50px" style="margin: auto;">
						</h1>
						<span style="font-size: 40px; line-height: 45px; font-family: 'Playfair Display', serif;"><?php the_field("sub_titulo");?></span>
					
					</div>


					<!-- Fin info resoluciones 1199px a 768px -->
					<!-- Info resoluciones menor de 768px	 -->

					<div class="heading-block nobottommargin center d-block d-md-none">

						
						<span style="font-size: 20px; line-height: 25px; color: #fff; font-family:'Playfair Display', serif; margin-top: 70px;"><?php the_field("sub_titulo");?></span>
					</div>

					<a href="<?php the_field("url_boton");?>" class="button button-border button-light button-rounded button-reveal tright button-large topmargin d-md-inline-block">
						<i class="icon-angle-right"></i><span><?php the_field("texto_boton");?></span>
					</a>

					<!-- Fin info resoluciones menor de 768px -->

				</div>
			</div>
		</div>
	</section>
<?php
	}
endwhile; else :
_e('Sorry, the post had not content.');
endif;
?>