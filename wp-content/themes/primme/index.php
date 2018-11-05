<?php get_header();?>

	<?php
	if(is_front_page()) {

	get_template_part("content", "home");?>

	<!-- Content
	============================================= -->
	<section id="content">
		<?php
			get_template_part("content", "home-informativa");
		?>		
	</section><!-- #content end -->
	<?php
	} else {
    	get_template_part("content", "page");
	}
	?>
<?php get_footer();?>