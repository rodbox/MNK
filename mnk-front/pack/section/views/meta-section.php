<fieldset>
	<legend>Section</legend>
	<form action="#" id="meta-section">
<?php //form::text("section-pos-x","pos-x"); ?>
<?php //form::text("section-pos-y","pos-y"); ?>
<!-- <hr> -->
<?php form::text("section-id","ID","",array("id"=>"section-id")); ?>
<?php form::text("section-title","Title","",array("id"=>"section-title")); ?>
<hr>
<?php form::text("section-class","Class","",array("id"=>"section-class")); ?>

<?php form::textarea("section-style","Style","",array("id"=>"section-style")); ?>
<hr>
<?php mnk::iview("pack:section/pack-list-select","pack-list");?> 
<?php form::text("section-pack-page","","",array("id"=>"section-pack-page")); ?>
</fieldset></form>