<?php
$home = array(
	'post_type' => 'home'
	);

$the_query = new WP_Query($home);
if( have_posts() ) : while( $the_query -> have_posts() ) : $the_query -> the_post();
	$tipo_seccion = get_field("tipo_de_contenido");
	$agregar_imagen = get_field("agregar_imagen");
	$imagen = get_field("imagen");
	if($tipo_seccion == 2) {
		$form_id = get_field("form_id");
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

					<form class="landing-wide-form landing-form-overlay dark nobottommargin clearfix" novalidate="novalidate">
						<div class="heading-block nobottommargin nobottomborder">
							<h3>Contáctenos Hoy</h3>
							<span>Y le ayudaremos a encontrar <br> el perfil digital y de tecnología que <br> está buscando para su compañía. </span>
						</div>

					<!--[if lte IE 8]>
					<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
					<![endif]-->
					<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
					<div class="hbspt-form" id="hbspt-form-1542297686349-9677737570">
						<div id="hbspt-forms-recaptchaTarget-0"></div>
						<script>
						  hbspt.forms.create({
							portalId: "5031407",
							formId: "<?php echo $form_id;?>"
						});
						</script>
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