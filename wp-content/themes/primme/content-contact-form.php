<?php
$contact_form_id = get_field("contact_form_id");
?>
<!--[if lte IE 8]>
<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
<![endif]-->
<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
<script>
  hbspt.forms.create({
	portalId: "5031407",
	formId: "<?php echo $contact_form_id;?>"
});
</script>
