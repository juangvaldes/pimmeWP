<?php
$form_id = get_field("form_id");
?>
<div class="form-group col_half">
	<!--[if lte IE 8]>
	<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
	<![endif]-->
	<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>

	<script>
	  hbspt.forms.create({
		portalId: "5031407",
		formId: "<?php echo $form_id;?>"
	});
	</script>
</div>
