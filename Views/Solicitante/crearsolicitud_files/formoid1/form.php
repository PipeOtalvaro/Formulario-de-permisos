<?php

define('EMAIL_FOR_REPORTS', '');
define('RECAPTCHA_PRIVATE_KEY', '@privatekey@');
define('FINISH_URI', 'http://');
define('FINISH_ACTION', 'message');
define('FINISH_MESSAGE', 'Thanks for filling out my form!');
define('UPLOAD_ALLOWED_FILE_TYPES', 'doc, docx, xls, csv, txt, rtf, html, zip, jpg, jpeg, png, gif');

define('_DIR_', str_replace('\\', '/', dirname(__FILE__)) . '/');
require_once _DIR_ . '/handler.php';

?>

<?php if (frmd_message()): ?>
<link rel="stylesheet" href="<?php echo dirname($form_path); ?>/formoid-solid-green.css" type="text/css" />
<span class="alert alert-success"><?php echo FINISH_MESSAGE; ?></span>
<?php else: ?>
<!-- Start Formoid form-->
<link rel="stylesheet" href="<?php echo dirname($form_path); ?>/formoid-solid-green.css" type="text/css" />
<script type="text/javascript" src="<?php echo dirname($form_path); ?>/jquery.min.js"></script>
<form class="formoid-solid-green" style="background-color:#ffffff;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:480px;min-width:150px" method="post"><div class="title"><h2>Formulario de solicitud</h2></div>
	<div class="element-input<?php frmd_add_class("input"); ?>"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" type="text" name="input" required="required" placeholder="Nombre del solicitante"/><span class="icon-place"></span></div></div>
	<div class="element-input<?php frmd_add_class("input2"); ?>"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" type="text" name="input2" required="required" placeholder="Primer Apellido"/><span class="icon-place"></span></div></div>
	<div class="element-input<?php frmd_add_class("input1"); ?>"><label class="title"></label><div class="item-cont"><input class="large" type="text" name="input1" placeholder="Segundo Apellido"/><span class="icon-place"></span></div></div>
	<div class="element-email<?php frmd_add_class("email"); ?>"><label class="title"></label><div class="item-cont"><input class="large" type="email" name="email" value="" placeholder="Correo electrónico"/><span class="icon-place"></span></div></div>
	<div class="element-phone<?php frmd_add_class("phone"); ?>"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" type="tel" pattern="[+]?[\.\s\-\(\)\*\#0-9]{3,}" maxlength="24" name="phone" required="required" placeholder="Celular" value=""/><span class="icon-place"></span></div></div>
	<div class="element-date<?php frmd_add_class("date2"); ?>"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" data-format="yyyy-mm-dd" type="date" name="date2" required="required" placeholder="Fecha en la que se realiza la solicitud"/><span class="icon-place"></span></div></div>
	<div class="element-multiple<?php frmd_add_class("multiple"); ?>"><label class="title"><span class="required">*</span></label><div class="item-cont"><div class="large"><select data-no-selected="Nothing selected" name="multiple[]" multiple="multiple" required="required">
undefined</select><span class="icon-place"></span></div></div></div>
	<div class="element-separator"><hr><h3 class="section-break-title"></h3></div>
	<div class="element-select<?php frmd_add_class("select"); ?>"><label class="title"><span class="required">*</span></label><div class="item-cont"><div class="large"><span><select name="select" required="required">

		<option value="option 1">option 1</option>
		<option value="option 2">option 2</option>
		<option value="option 3">option 3</option></select><i></i><span class="icon-place"></span></span></div></div></div>
	<div class="element-radio<?php frmd_add_class("radio"); ?>"><label class="title">Cardinalidad<span class="required">*</span></label>		<div class="column column2"><label><input type="radio" name="radio" value="Salida" required="required"/><span>Salida</span></label></div><span class="clearfix"></span>
		<div class="column column2"><label><input type="radio" name="radio" value="Entrada" required="required"/><span>Entrada</span></label></div><span class="clearfix"></span>
</div>
	<div class="element-date<?php frmd_add_class("date"); ?>"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" data-format="yyyy-mm-dd" type="date" name="date" required="required" placeholder="Fecha de inicio"/><span class="icon-place"></span></div></div>
	<div class="element-date<?php frmd_add_class("date1"); ?>"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" data-format="yyyy-mm-dd" type="date" name="date1" required="required" placeholder="Fecha de fin"/><span class="icon-place"></span></div></div>
	<div class="element-number<?php frmd_add_class("number"); ?>"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" type="text" min="1" max="7" name="number" required="required" placeholder="Número de días que se ausentará" value=""/><span class="icon-place"></span></div></div>
	<div class="element-checkbox<?php frmd_add_class("checkbox"); ?>"><label class="title">Días<span class="required">*</span></label>		<div class="column column4"><label><input type="checkbox" name="checkbox[]" value="L "/ required="required"><span>L </span></label><label><input type="checkbox" name="checkbox[]" value="V"/ required="required"><span>V</span></label></div><span class="clearfix"></span>
		<div class="column column4"><label><input type="checkbox" name="checkbox[]" value="M"/ required="required"><span>M</span></label><label><input type="checkbox" name="checkbox[]" value="S"/ required="required"><span>S</span></label></div><span class="clearfix"></span>
		<div class="column column4"><label><input type="checkbox" name="checkbox[]" value="X"/ required="required"><span>X</span></label><label><input type="checkbox" name="checkbox[]" value="D"/ required="required"><span>D</span></label></div><span class="clearfix"></span>
		<div class="column column4"><label><input type="checkbox" name="checkbox[]" value="J"/ required="required"><span>J</span></label></div><span class="clearfix"></span>
</div>
	<div class="element-select<?php frmd_add_class("select1"); ?>"><label class="title"><span class="required">*</span></label><div class="item-cont"><div class="large"><span><select name="select1" required="required">

		<option value="Una vez ">Una vez </option>
		<option value="Semanal">Semanal</option>
		<option value="Quincenal">Quincenal</option>
		<option value="Mensual">Mensual</option></select><i></i><span class="icon-place"></span></span></div></div></div>
	<div class="element-textarea<?php frmd_add_class("textarea"); ?>"><label class="title"><span class="required">*</span></label><div class="item-cont"><textarea class="large" name="textarea" cols="20" rows="5" required="required" placeholder="Explique el motivo de la solicitud"></textarea><span class="icon-place"></span></div></div>
	<div class="element-select<?php frmd_add_class("select2"); ?>"><label class="title"></label><div class="item-cont"><div class="large"><span><select name="select2" >
undefined</select><i></i><span class="icon-place"></span></span></div></div></div>
	<div class="element-radio<?php frmd_add_class("radio1"); ?>"><label class="title">Respuesta</label>		<div class="column column1"><label><input type="radio" name="radio1" value="Aceptado" /><span>Aceptado</span></label><label><input type="radio" name="radio1" value="Denegado" /><span>Denegado</span></label></div><span class="clearfix"></span>
</div>
<div class="submit"><input type="submit" value="Enviar"/></div></form><script type="text/javascript" src="<?php echo dirname($form_path); ?>/formoid-solid-green.js"></script>

<!-- Stop Formoid form-->
<?php endif; ?>

<?php frmd_end_form(); ?>