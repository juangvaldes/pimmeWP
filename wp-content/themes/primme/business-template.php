<?php
/*
 Template Name: Plantilla Primme Business
 */
 get_header("business");
 
	if(is_front_page()) {

	get_template_part("content", "home-business");
?>
<section id="content" style="overflow: visible;">

			<div class="content-wrap">
<?php
	get_template_part("content", "business");
?>
	</div>
</section>
<?php
	} else {
    	get_template_part("content", "business");
	}

get_footer();?>
