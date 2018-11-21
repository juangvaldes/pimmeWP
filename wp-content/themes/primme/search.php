<?php
get_header();
global $query_string;
global $wp_query;
$total_results = $wp_query->found_posts;
wp_parse_str( $query_string, $search_query );
$search = new WP_Query( $search_query );
?>
<input type="hidden" id="page-blog" value="true"/>
<!-- Page Title
============================================= -->
<section id="page-title">

	<div class="container clearfix">
		<h1 style="color: #fff;">Resultado de búsqueda</h1>
	</div>

</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">

	<div class="content-wrap">

	<br>

		<?php
		if ( $search->have_posts() ) {
			$i = 0;
			while ( $search->have_posts() ) {
				$search->the_post();

		?>
		<div class="section notopborder nomargin header-stick">
			<div class="container clearfix">
				<?php
				if($i == 0) {
				?>
				<p style="color: #66408D; font-size: 17px;"><?php echo $total_results;?> resultados de búsqueda con la palabra <b>"<?php echo $search->query['s'];?>"</b></p>

				<div class="divider divider-rounded"><i class="icon-search"></i></div>
				<?php
				}
				?>
				<div class="heading-block">
					<h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title();?></a></h3>
				</div>

				<p style="font-size: 20px; font-weight: lighter;"><a href="<?php the_permalink(); ?>"><?php the_field("resumen_post");?></a></p>

			</div>
		</div>
		<br> <br>
		<?php
			$i++;
			}
			/* Restore original Post Data */
			wp_reset_postdata();
		}
		?>

	</div>

</section><!-- #content end -->
<?php
get_footer();
?>