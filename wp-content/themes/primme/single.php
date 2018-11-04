<?php get_header()?>
<input type="hidden" id="page-blog" value="true"/>
		<?php get_template_part("content", "sub-menu-blog");?>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
		global $wp;
		$urlPath = home_url($wp->request);
		add_comment($post->ID, $urlPath);
		?>
		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<!-- Post Content
					============================================= -->
					<div class="postcontent nobottommargin clearfix">

						<div class="single-post nobottommargin">

							<!-- Single Post
							============================================= -->
							<div class="entry clearfix">

								<!-- Entry Title
								============================================= -->
								<div class="entry-title">
									<h2 style="font-size: 40px; line-height: 39px;"><?php the_title(); ?></h2>
								</div><!-- .entry-title end -->

								<!-- Entry Meta
								============================================= -->
								<ul class="entry-meta clearfix">
									<li><i class="icon-calendar3"></i> <?php the_time('F j, Y'); ?></li>
									<li><a href="#"><i class="icon-user"></i> <?php the_author(); ?></a></li>
									<li><i class="icon-folder-open"></i> <a href="#">Diseño</a></li>
									<li><a href="#"><i class="icon-comments"></i> <?php echo wpb_comment_count($post->ID);?> Comentarios</a></li>
									<li><a href="#"><i class="icon-camera-retro"></i></a></li>
								</ul><!-- .entry-meta end -->

								<!-- Entry Image
								============================================= -->
								<div class="entry-image">
									<?php
									$type_destacada = get_field("imagen_o_video_destacado");
									if($type_destacada == 1) {
										$img_destacada = get_field("imagen_destacada");
									?>
										<img src="<?php echo $img_destacada['url'];?>"/>
									<?php
									} else if($type_destacada == 2) {
										the_field('video_destacado');
									}
									?>
								</div><!-- .entry-image end -->

								<!-- Entry Content
								============================================= -->
								<div class="entry-content notopmargin" style="font-size: 20px; font-weight: 200;">

									<p><?php the_content();?></p>
									<!-- Post Single - Content End -->

									<!-- Tag Cloud
									============================================= -->
									<div class="tagcloud clearfix bottommargin categorias-single-blog">
										
									</div><!-- .tagcloud end -->

									<div class="clear"></div>

									<!-- Post Single - Share
									============================================= -->
									<div class="si-share noborder clearfix">
										<span>Comparte esta publicación:</span>
										<div>
											<a href="#" class="social-icon si-borderless si-facebook">
												<i class="icon-facebook"></i>
												<i class="icon-facebook"></i>
											</a>
											<a href="#" class="social-icon si-borderless si-twitter">
												<i class="icon-twitter"></i>
												<i class="icon-twitter"></i>
											</a>
											<a href="#" class="social-icon si-borderless si-pinterest">
												<i class="icon-pinterest"></i>
												<i class="icon-pinterest"></i>
											</a>
											<a href="#" class="social-icon si-borderless si-rss">
												<i class="icon-rss"></i>
												<i class="icon-rss"></i>
											</a>
											<a href="#" class="social-icon si-borderless si-email3">
												<i class="icon-email3"></i>
												<i class="icon-email3"></i>
											</a>
										</div>
									</div><!-- Post Single - Share End -->

								</div>
							</div><!-- .entry end -->

							<!-- Post Navigation
							============================================= -->
							<div class="post-navigation clearfix">

								<div class="col_half nobottommargin">
									<?php previous_post_link("%link","&lArr; Anterior artículo"); ?>
								</div>

								<div class="col_half col_last tright nobottommargin">
									<?php next_post_link("%link","Siguiente artículo &rArr;"); ?>
								</div>
							</div><!-- .post-navigation end -->

							<div class="line"></div>

							<!-- Post Author Info
							============================================= -->
							<div class="card" style="font-size: 15px; font-weight: 200;">
								<div class="card-header"><strong>Publicado por <a href="#"><?php the_field("publicado_por");?></a></strong></div>
								<div class="card-body">
									<div class="author-image">
										<?php
										$foto_autor = get_field("foto_autor");
										?>
										<img src="<?php echo $foto_autor['url'];?>" alt="" class="rounded-circle">
									</div>
									<?php the_field("descripcion_publicacion");?>
								</div>
							</div><!-- Post Single - Author End -->

							<div class="line"></div>

							<h4>Artículos Relacionados:</h4>

							<div class="related-posts clearfix">

								<?php 
								$args = array(
									'posts_per_page' => 4, // How many items to display
									'post__not_in'   => array( get_the_ID() ), // Exclude current post
									'no_found_rows'  => true, // We don't ned pagination so this speeds up the query
								);

								// Check for current post category and add tax_query to the query arguments
								$cats = wp_get_post_terms( get_the_ID(), 'category' ); 
								$cats_ids = array();  
								foreach( $cats as $wpex_related_cat ) {
									$cats_ids[] = $wpex_related_cat->term_id; 
								}
								if ( ! empty( $cats_ids ) ) {
									$args['category__in'] = $cats_ids;
								}

								// Query posts
								$wpex_query = new wp_query( $args );
								// Loop through posts
								$i=1;
								$j=1;
								$last_ref = null;
								$total_post = count($wpex_query->posts);
								foreach( $wpex_query->posts as $post ) : setup_postdata( $post );
									if($i == 1) {
								?>
								<div class="col_half nobottommargin <?php echo $last_ref;?>">
								<?php
									}
									$img = get_field("imagen_destacada");
								?>
									<div class="mpost clearfix">
										<div class="entry-image">
											<?php
											$type_destacada = get_field("imagen_o_video_destacado");
											if($type_destacada == 1) {
												$img_destacada = get_field("imagen_destacada");
											?>
											<a href="<?php the_permalink(); ?>"><img src="<?php echo $img['url'];?>" alt="<?php echo $img['title'];?>"></a>
											<?php
											} else if($type_destacada == 2) {
												the_field('video_destacado');
											}
											?>
										</div>
										<div class="entry-c">
											<div class="entry-title">
												<h4><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a></h4>
											</div>
											<ul class="entry-meta clearfix">
												<li><i class="icon-calendar3"></i> <?php the_time('F j, Y'); ?></li>
												<li><a href="<?php the_permalink(); ?>"><i class="icon-comments"></i> <?php echo wpb_comment_count($post->ID);?></a></li>
											</ul>
											<div class="entry-content"><?php the_field("resumen_post");?></div>
										</div>
									</div>
								<?php
								if($i == 1 && $total_post > $j) {
									$i++;
								} else if($i == 2 || $total_post == $j) {
									$last_ref = 'col_last';
								?>
								</div>
								<?php
									$i = 1;
								}
								$j++;
								// End loop
								endforeach;

								// Reset post data
								wp_reset_postdata();

								//print_r(wpse250243_comment_form_default_fields());?>

							</div>

						</div>


						<!-- Comments
							============================================= -->
							<div id="comments" class="clearfix">

								<h3 id="comments-title"><span><?php echo wpb_comment_count($post->ID);?></span> Comentarios</h3>
								<!-- Comments List
								============================================= -->
								<ol class="commentlist clearfix">
								<?php
								$args = array(
									'status' => 'approve',
									'post_id' => $post->ID,
									'parent' => '0'
								);
								$comments = get_comments($args);
								foreach($comments as $comment) :
								?>
									<li class="comment even thread-even depth-1" id="li-comment-1">

										<div id="comment-1" class="comment-wrap clearfix">

											<div class="comment-meta">

												<div class="comment-author vcard">

													<span class="comment-avatar clearfix">
													<img alt='' src='<?php bloginfo('template_directory')?>/images/avatar.png' class='avatar avatar-60 photo avatar-default' height='60' width='60' /></span>

												</div>

											</div>

											<div class="comment-content clearfix">

												<div class="comment-author"><?php echo $comment->comment_author;?><span><a href="<?php the_permalink(); ?>" title="Permalink to this comment"><?php the_time('F j, Y g:i a') ?></a></span></div>

												<p><?php echo $comment->comment_content;?></p>

												<a class='comment-reply-link' href='#'><i class="icon-reply"></i></a>

											</div>

											<div class="clear"></div>

										</div>
										<?php
										$args_sub = array(
											'status' => 'approve',
											'post_id' => $post->ID,
											'parent' => $comment->comment_ID
										);
										$sub_comments = get_comments($args_sub);
										if(count($sub_comments) > 0) {
											echo "<ul class='children'>";
											foreach($sub_comments as $sub_comment) :
										?>

											<li class="comment byuser comment-author-_smcl_admin odd alt depth-2" id="li-comment-3">

												<div id="comment-3" class="comment-wrap clearfix">

													<div class="comment-meta">

														<div class="comment-author vcard">

															<span class="comment-avatar clearfix">
															<img alt='' src='<?php bloginfo('template_directory')?>/images/avatar_admin.png' class='avatar avatar-40 photo' height='40' width='40' /></span>

														</div>

													</div>

													<div class="comment-content clearfix">

														<div class="comment-author"><a href='<?php the_permalink(); ?>' rel='external nofollow' class='url'><?php echo $sub_comment->comment_author;?></a><span><a href="<?php the_permalink(); ?>" title="Permalink to this comment"><?php echo mysql2date('F j, Y g:i a', $sub_comment->comment_date); ?></a></span></div>

														<p><?php echo $sub_comment->comment_content;?></p>

														<a class='comment-reply-link' href='#'><i class="icon-reply"></i></a>

													</div>

													<div class="clear"></div>

												</div>

											</li>
										<?php
											endforeach;
											echo "</ul>";
										}
										?>
									</li>
								<?php
								endforeach;
								?>
								</ol><!-- .commentlist end -->
								<div class="clear"></div>

								<!-- Comment Form
								============================================= -->
								<div id="respond" class="clearfix">

									<h3>Deájanos <span>tu comentario</span></h3>

									<form class="clearfix" action="" method="post" id="commentform">

										<div class="col_half">
											<label for="author">Nombre</label>
											<input type="text" name="author" id="author" value="" size="22" tabindex="1" class="sm-form-control" />
										</div>

										<div class="col_half col_last">
											<label for="email">Email</label>
											<input type="text" name="email" id="email" value="" size="22" tabindex="2" class="sm-form-control" />
										</div>

										<div class="clear"></div>

										<div class="col_full">
											<label for="comment">Comentario</label>
											<textarea name="comment" cols="58" rows="7" tabindex="4" class="sm-form-control"></textarea>
										</div>

										<div class="col_full nobottommargin">
											<button name="submit" type="submit" id="submit-button" tabindex="5" value="Submit" class="button button-3d nomargin">Subir comentario</button>
										</div>

									</form>

								</div><!-- #respond end -->

							</div><!-- #comments end -->

					</div><!-- .postcontent end -->

					<!-- Sidebar
					============================================= -->
					<div class="sidebar nobottommargin col_last clearfix">
						<div class="sidebar-widgets-wrap">

							<div class="widget widget-twitter-feed clearfix">

								<h4>Twitter Feed</h4>
								<ul class="iconlist twitter-feed" data-username="envato" data-count="2">
									<li></li>
								</ul>

								<a href="#" class="btn btn-secondary btn-sm fright">Sìguenos en Twitter</a>

							</div>

							<div class="widget clearfix">

								<h4>Galería de Instagram</h4>
								<?php echo do_shortcode('[jr_instagram id="2"]');?>
							</div>

							<div class="widget clearfix">

								<div class="tabs nobottommargin clearfix" id="sidebar-tabs">

									<ul class="tab-nav clearfix">
										<li><a href="#tabs-1">Popular</a></li>
										<li><a href="#tabs-2">Recientes</a></li>
										<li><a href="#tabs-3"><i class="icon-comments-alt norightmargin"></i></a></li>
									</ul>

									<div class="tab-container">

										<div class="tab-content clearfix" id="tabs-1">
											<div id="popular-post-list-sidebar">
												<?php
												$popularpost = new WP_Query( array( 'posts_per_page' => 3, 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );
												while ( $popularpost->have_posts() ) : $popularpost->the_post();
												?>
												<div class="spost clearfix">
													<div class="entry-image">
														<a href="#" class="nobg"><img class="rounded-circle" src="<?php bloginfo('template_directory')?>/images/magazine/small/3.jpg" alt=""></a>
													</div>
													<div class="entry-c">
														<div class="entry-title">
															<h4><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h4>
														</div>
														<ul class="entry-meta">
															<li><i class="icon-comments-alt"></i> <?php echo wpb_comment_count($post->ID);?> Comentarios</li>
														</ul>
													</div>
												</div>
												<?php
												endwhile;
												?>

											</div>
										</div>
										<div class="tab-content clearfix" id="tabs-2">
											<div id="recent-post-list-sidebar">

												<div class="spost clearfix">
													<div class="entry-image">
														<a href="#" class="nobg"><img class="rounded-circle" src="images/magazine/small/1.jpg" alt=""></a>
													</div>
													<div class="entry-c">
														<div class="entry-title">
															<h4><a href="#">Lorem ipsum dolor sit amet, consectetur</a></h4>
														</div>
														<ul class="entry-meta">
															<li>10/10/2018</li>
														</ul>
													</div>
												</div>

												<div class="spost clearfix">
													<div class="entry-image">
														<a href="#" class="nobg"><img class="rounded-circle" src="images/magazine/small/2.jpg" alt=""></a>
													</div>
													<div class="entry-c">
														<div class="entry-title">
															<h4><a href="#">Elit Assumenda vel amet dolorum quasi</a></h4>
														</div>
														<ul class="entry-meta">
															<li>10/10/2018</li>
														</ul>
													</div>
												</div>

												<div class="spost clearfix">
													<div class="entry-image">
														<a href="#" class="nobg"><img class="rounded-circle" src="images/magazine/small/3.jpg" alt=""></a>
													</div>
													<div class="entry-c">
														<div class="entry-title">
															<h4><a href="#">Debitis nihil placeat, illum est nisi</a></h4>
														</div>
														<ul class="entry-meta">
															<li>10/10/2018</li>
														</ul>
													</div>
												</div>

											</div>
										</div>
										<div class="tab-content clearfix" id="tabs-3">
											<div id="recent-post-list-sidebar">

												<div class="spost clearfix">
													<div class="entry-image">
														<a href="#" class="nobg"><img class="rounded-circle" src="images/icons/avatar.jpg" alt=""></a>
													</div>
													<div class="entry-c">
														<strong>John Doe:</strong> Veritatis recusandae sunt repellat distinctio...
													</div>
												</div>

												<div class="spost clearfix">
													<div class="entry-image">
														<a href="#" class="nobg"><img class="rounded-circle" src="images/icons/avatar.jpg" alt=""></a>
													</div>
													<div class="entry-c">
														<strong>Mary Jane:</strong> Possimus libero, earum officia architecto maiores....
													</div>
												</div>

												<div class="spost clearfix">
													<div class="entry-image">
														<a href="#" class="nobg"><img class="rounded-circle" src="images/icons/avatar.jpg" alt=""></a>
													</div>
													<div class="entry-c">
														<strong>Site Admin:</strong> Deleniti magni labore laboriosam odio...
													</div>
												</div>

											</div>
										</div>

									</div>

								</div>

							</div>

							<div class="widget clearfix">

								<h4>Listado de Tags</h4>
								<div class="tagcloud categorias-single-blog">
								</div>

							</div>

						</div>

					</div><!-- .sidebar end -->

				</div>

			</div>

		</section><!-- #content end -->
		<?php endwhile; else : ?>
			<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<?php endif; ?>

<?php get_footer()?>