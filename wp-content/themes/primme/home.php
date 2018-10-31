<?php get_header();?>
		<input type="hidden" id="page-blog" value="true"/>
		<!-- Page Title
		============================================= -->
		<section id="page-title2">

			<div class="container clearfix">
				<h1 style="color: #fff;">Blog</h1>
				<span style="color: #fff;">Las últimas noticias sobre...</span>
				
			</div>

		</section><!-- #page-title end -->

		<!-- Page Sub Menu
		============================================= -->
		<div id="page-menu">

			<div id="page-menu-wrap">

				<div class="container clearfix">

					<div class="menu-title"><span>PRIMME</span> BLOG</div>

					<nav>
						
					</nav>

					<div id="page-submenu-trigger"><i class="icon-reorder"></i></div>

				</div>

			</div>

		</div><!-- #page-menu end -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<!-- Posts
					============================================= -->
					<div id="posts" class="post-grid grid-container post-masonry grid-3 clearfix">
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<div class="entry clearfix">
							<div class="entry-image">
								<?php
								$type_seccion = get_field('tipo_de_seccion');
								$frase = false;
								$icon_content = null;
								if($type_seccion == 1) {

									$image = get_field('imagen');
									echo render_img($image);

								} else if($type_seccion == 2) {

									$icon_content = "icon-film";
									the_field('video');

								} else if($type_seccion == 3) {

									$galeria_imagenes = acf_photo_gallery('galeria_imagenes', $post->ID);
									echo render_galeria_img($galeria_imagenes);

								} else if($type_seccion == 4) {

									$slider_cuadrado = acf_photo_gallery('slider_cuadrado', $post->ID);
									echo render_slider_cuadrado($slider_cuadrado);

								} else if($type_seccion == 5) {

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
								<li><a href="blog-single.html#comments"><i class="icon-comments"></i> 13</a></li>
								<li><a href="#"><i class="<?php echo $icon_content;?>"></i></a></li>
							</ul>
							<?php
							if(!$frase) {
							?>
								<div class="entry-content" style="font-size: 20px; font-weight: 200;">
									<p><?php the_excerpt();?></p>
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
					<ul class="pagination nobottommargin">
						<li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
						<li class="page-item active"><a class="page-link" href="#">1</a></li>
						<li class="page-item"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item"><a class="page-link" href="#">4</a></li>
						<li class="page-item"><a class="page-link" href="#">5</a></li>
						<li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
					</ul>

				</div>

			</div>

		</section><!-- #content end -->

<?php get_footer();?>