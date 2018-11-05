<?php
$iframe = get_field("embeber_formulario");
$width = get_field("width");
$height = get_field("height");
?>
<div class="form-group col_half">
	<iframe src="<?php echo $iframe;?>"
	scrolling="no"
	frameborder="0"
	width="<?php echo $width;?>" 
	height="<?php echo $height;?>"
	style=" overflow: hidden;"></iframe>
</div>