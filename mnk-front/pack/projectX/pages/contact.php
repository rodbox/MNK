<div class="row-fluid">
	<div class="span6 offset3">
<h1>Contact</h1>

<?php form::iform("pack-exec:projectX/contact-send");?>
<?php form::text("name","Nom",""); ?>
<?php form::text("mail","Mail",""); ?>
<?php form::textarea("msg","Message",""); ?>
<br><br><br>
<?php form::submit("send","send"); ?>
<?php form::formOut();?>
</div>
</div>