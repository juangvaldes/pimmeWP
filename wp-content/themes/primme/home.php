<?php get_header();?>
		<input type="hidden" id="page-blog" value="true"/>
		<!-- Page Title
		============================================= -->
		<section id="page-title2">
			<?php
			global $post;
			echo $post_slug = $post->post_name;
			$page = array(
				'pagename' => $post_slug
				);

			$the_query = new WP_Query($page);
			if( have_posts() ) : while( $the_query -> have_posts() ) : $the_query -> the_post();
			echo "aaa";
			endwhile; 
			endif;
			?>
			<div class="container clearfix">
				<h1 style="color: #fff;">Blog</h1>
				<span style="color: #fff;">Las últimas noticias sobre...</span>
				
			</div>

		</section><!-- #page-title end -->

		<?php get_template_part("content", "sub-menu-blog");?>

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<!-- Posts
					============================================= -->
					<?php 
					$paged = (get_query_var('page')) ? get_query_var('page') : 1;
					$args = array(
					    'posts_per_page' => 9,
					    'paged' => $paged
					);
					$category_slug = null;
					if(isset($_GET['category']) && !empty($_GET['category'])) {
						$args['category_name'] = $_GET['category'];
						$category_slug = $_GET['category'];
					} 
					?>
					<input type="hidden" name="category-slug" id="category-slug" value="<?php echo $category_slug;?>"/>
					<div id="posts" class="post-grid grid-container post-masonry grid-3 clearfix">
						<?php
						$wp_query = new WP_Query($args);
						//echo $query->max_num_pages;exit;
						if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
						<div class="entry clearfix">
							<div class="entry-image">
								<?php
								$type_seccion = get_field('tipo_de_seccion');
								$frase = false;
								$icon_content = null;
								if($type_seccion == 1) {
									$icon_content = "icon-camera-retro";
									$image = get_field('imagen');
									echo render_img($image);

								} else if($type_seccion == 2) {

									$icon_content = "icon-film";
									the_field('video');

								} else if($type_seccion == 3) {
									$icon_content = "icon-picture";
									$galeria_imagenes = acf_photo_gallery('galeria_imagenes', $post->ID);
									echo render_galeria_img($galeria_imagenes);

								} else if($type_seccion == 4) {
									$icon_content = "icon-picture";
									$slider_cuadrado = acf_photo_gallery('slider_cuadrado', $post->ID);
									echo render_slider_cuadrado($slider_cuadrado);

								} else if($type_seccion == 5) {
									$icon_content = "icon-picture";
									$slider_vertical = acf_photo_gallery('slider_vertical', $post->ID);
									echo render_slider_vertical($slider_vertical);

								} else if($type_seccion == 6) {

									$frase = true;
									$icon_content = "icon-quote-left";
								?>
									<blockquote>
										<p><?php the_content();?></p>
										<footer><?php the_field('autor_de_la_frase');?></footer>
									</blockquote>
								<?php
								} else if($type_seccion == 7) {

									$frase = true;
									$icon_content = "icon-link";
								?>
									<a href="<?php the_field('agregar_link');?>" class="entry-link" target="_blank">
										<?php the_title();?>
										<span>- <?php the_field('agregar_link');?></span>
									</a>
								<?php
								} else if($type_seccion == 8) {
									$icon_content = "icon-music2";
									$iframe = get_field("iframe");
									echo render_iframe($iframe);
								}
								?>
							</div>
							<?php
							if(!$frase) {
							?>
								<div class="entry-title">
									<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								</div>
							<?php
							}
							?>
							<ul class="entry-meta clearfix">
								<li><i class="icon-calendar3"></i> <?php the_time('F j, Y'); ?></li>
								<li><a href="blog-single.html#comments"><i class="icon-comments"></i> <?php echo wpb_comment_count($post->ID);?></a></li>
								<li><a href="#"><i class="<?php echo $icon_content;?>"></i></a></li>
							</ul>
							<?php
							if(!$frase) {
							?>
								<div class="entry-content" style="font-size: 20px; font-weight: 200;">
									<p><?php the_field("resumen_post");?></p>
									<a href="<?php the_permalink(); ?>" class="more-link">Ver Más</a>
								</div>
							<?php
							}
							?>
						</div>
						<?php endwhile; else : ?>
							<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
						<?php endif; ?>
					</div><!-- #posts end -->

					<!-- Pagination
					============================================= -->
					<?php wpbeginner_numeric_posts_nav();?>
				</div>

			</div>

		</section><!-- #content end -->

<?php get_footer();?>