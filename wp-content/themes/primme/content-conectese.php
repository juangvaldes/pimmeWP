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

						<div class="col-lg-4 col-md-6 bottommargin clearfix">
							<div class="feature-box fbox-center fbox-bg fbox-plain">
								<div class="fbox-icon">
									<a href="#"><i class="icon-map-marker2"></i></a>
								</div>
								<h3>Nuestras Oficinas<span class="subtitle">Bogotá, Colombia.</span></h3>
							</div>
						</div>

						<div class="col-lg-4 col-md-6 bottommargin clearfix">
							<div class="feature-box fbox-center fbox-bg fbox-plain">
								<div class="fbox-icon">
									<a href="#"><i class="icon-phone3"></i></a>
								</div>
								<h3>Llámenos<span class="subtitle">(+57) 317 373 0263</span></h3>
							</div>
						</div>

						<div class="col-lg-4 col-md-6 bottommargin clearfix">
							<div class="feature-box fbox-center fbox-bg fbox-plain">
								<div class="fbox-icon">
									<a href="#"><i class="icon-google"></i></a>
								</div>
								<h3>Video Llamada?<span class="subtitle">hangouts - info@primmemhunt.com</span></h3>
							</div>
						</div>

						

					</div><!-- Contact Info End -->

				</div>

			</div>

		</section><!-- #content end -->
