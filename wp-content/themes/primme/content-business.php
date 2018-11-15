<?php

	$type_seccion = get_field('tipo_de_seccion');
	if($type_seccion == 1) {
		get_template_part("content", "home-business");?>
	}
	else if($type_seccion == 2) {
		get_template_part("content", "features");?>
	}

?>