<?php get_header();?>

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
								if(has_post_thumbnail()) {
								?>
								<a href="<?php the_permalink(); ?>" data-lightbox="image">
								<?php
									the_post_thumbnail();
								?>
								</a>
								<?php
								}
								?>
							</div>
							<div class="entry-title">
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							</div>
							<ul class="entry-meta clearfix">
								<li><i class="icon-calendar3"></i> <?php the_time('F j, Y'); ?></li>
								<li><a href="blog-single.html#comments"><i class="icon-comments"></i> 13</a></li>
								<li><a href="#"><i class="icon-camera-retro"></i></a></li>
							</ul>
							<div class="entry-content" style="font-size: 20px; font-weight: 200;">
								<p><?php the_excerpt();?></p>
								<a href="<?php the_permalink(); ?>" class="more-link">Ver Más</a>
							</div>
						</div>
						<?php endwhile; else : ?>
							<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
						<?php endif; ?>
					</div><!-- #posts end -->

				</div>

			</div>

		</section><!-- #content end -->

<?php get_footer();?>