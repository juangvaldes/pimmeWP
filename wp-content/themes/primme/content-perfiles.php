<div class="col_half col_last">

	<div>

	<img width="170px" src="<?php bloginfo('template_directory')?>/images/hire/insights.png" alt="Primme">
	

	</div>
	
	<h3><span>Perfiles</span> de alta demanda hoy</h3>

	<ul class="skills">
<?php
$my_query = new WP_Query('post_type=perfiles');
//if( have_posts() ) : 
	while( $my_query -> have_posts() ) : $my_query -> the_post();
?>
		<li data-percent="<?php the_field("porcentaje");?>">
			<span><?php the_field("nombre_perfil");?></span>
			<div class="progress">
				<div class="progress-percent"><div class="counter counter-inherit counter-instant"><span data-from="0" data-to="<?php the_field("porcentaje");?>" data-refresh-interval="30" data-speed="1100"></span>%</div></div>
			</div>
		</li>
<?php
endwhile; /*else :
_e('Sorry, the post had not content profile.');
endif;*/
?>
	</ul>
</div>