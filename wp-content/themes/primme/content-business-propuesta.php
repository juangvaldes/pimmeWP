<div class="container clearfix">

	<div class="clear"></div>

	<div class="card propuesta-card">
		<div class="card-header" style="font-family: 'Playfair Display', serif; color: #351d74; font-size: 35px;">
			<?php the_title();?>
		</div>
			<div class="card-body">
				<p style="font-size: 20px; font-weight: lighter;">
					<?php the_field("descripcion_propuesta");?>
				</p>
			</div>
			<?php
			the_field("anadir_listado");
			?>
	</div>

	<?php
	$add_perfiles = get_field("anadir_perfiles_destacados");
	if($add_perfiles == 1) {
	?>
	<div class="clear"></div>

	<br><br>

				<div class="divider divider-center"><i class="icon-user2"></i></div>

	<br><br>

	<div class="title-block">
		<h1><?php the_field("titulo_perfiles");?></h1>
		<span><?php the_field("descripcion_perfiles");?></span>
	</div>
	<br><br>
	
	<?php

	$perfiles_destacados = array(
		'post_type' => 'perfiles_destacados'
		);

	$the_query = new WP_Query($perfiles_destacados);
	$i = 1;
	if( have_posts() ) : while( $the_query -> have_posts() ) : $the_query -> the_post();
		$tipo_de_contenido_perfiles = get_field("tipo_de_contenido_perfiles");
		if($tipo_de_contenido_perfiles == 2) {
			if($i == 3) {
				$col_last = "col_last";
				$i = 1;
			} else {
				$col_last = null;
			}
	?>
	<div class="col_one_third <?php echo $col_last;?>">
		<div class="feature-box fbox-small fbox-plain" data-animate="fadeIn">
			<div class="fbox-icon">
				<a href="#"><i class="<?php the_field("class_icono")?>"></i></a>
			</div>
			<h3><?php the_field("nombre_perfil")?></h3>
			<p style="font-size: 21px; font-weight: 200;"><?php the_field("descripcion_perfil")?></p>
		</div>
	</div>
	<?php	
	$i++;
	}
	endwhile; else :
	_e('Sorry, the post had not content.');
	endif;
	
	}
	?>
</div>