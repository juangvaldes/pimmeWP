
		<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix" style="color: #fff;">
				<?php the_field("registrese");?>
			<!--
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
					<li class="breadcrumb-item"><a href="#">Inscríbete</a></li>
					
				</ol>
			-->

		</section><!-- #page-title end -->

<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<!-- Contact Form
					============================================= -->
					<div class="col_half">

						<div class="contact-widget">

							<div class="contact-form-result"></div>

							<form class="nobottommargin" id="template-contactform" name="template-contactform" action="include/sendemail.php" method="post">

								<div class="form-process"></div>

								<?php
								$tipo_contenido = get_field("tipo_contenido");
			if($tipo_contenido == 1) {
				get_template_part("content", "contact-form");
			}
			?>
							</form>
						</div>

					</div><!-- Contact Form End -->

					<!-- Google Map
					============================================= -->
					<div class="col_half col_last">

						<iframe src="https://www.google.com/maps/embed?pb=<?php the_field("id_maps");?>" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>

					</div><!-- Google Map End -->

					<div class="clear"></div>

										<!-- Contact Info
					============================================= -->
					<div class="row clear-bottommargin">

<?php
$info_contacto = array(
	'post_type' => 'info_contacto'
	);

$the_query = new WP_Query($info_contacto);
if( have_posts() ) : while( $the_query -> have_posts() ) : $the_query -> the_post();
	$oficinas = get_field("oficinas");
	
	
?>
						<div class="col-lg-4 col-md-6 bottommargin clearfix">
							<div class="feature-box fbox-center fbox-bg fbox-plain">
								<div class="fbox-icon">
									<a href="#"><i class=<?php the_field("class-icono");?>></i></a>
								</div>
								<h3><?php the_field("descripcion");?></h3>
							</div>
						</div>

						

<?php
endwhile; else :
_e('Sorry, the post had not content.');
endif;
?>
</div><!-- Contact Info End -->
				</div>

			</div>

		</section><!-- #content end -->
