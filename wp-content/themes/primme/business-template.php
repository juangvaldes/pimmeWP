<?php
/*
 Template Name: Plantilla Primme Business
 */
 get_header("business");
 ?>

 <?php
	if(is_front_page()) {

	get_template_part("content", "home-business");?>

	<?php
	} else {
    	get_template_part("content", "business");
	}
	?>
business-itemplate.php

<?php get_footer("business");?>
