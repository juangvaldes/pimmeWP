<?php
/*
 Template Name: Plantilla Primme Business
 */
 get_header("business");
 ?>

 <?php
	if(is_front_page()) {

	get_template_part("content", "business");?>

	<!-- Content
	============================================= -->
	<section id="business">
		<?php
			get_template_part("business", "index");
		?>		
	</section><!-- #content end -->
	<?php
	} else {
    	get_template_part("business", "index");
	}
	?>
business-itemplate.php

<?php get_footer("business");?>
