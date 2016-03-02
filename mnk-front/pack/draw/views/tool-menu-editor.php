<?php mnk::iview("pack:draw/tool-menu-menu"); ?>
<div class="tool-menu">
	<ul>
</ul>
</div>

<?php form::iform("pack:draw/tool-menu-editor #tool-menu-editor","POST");?>
<fieldset class="tool-editor">
<?php 
$opt =  array(
 "text"=>"text",
 "select"=>"select",

 "check"=>"check"	
 );
 
 form::select("tool-menu-type",$opt,"Type"); ?>
 <?php form::text("tool-menu-name","Name"); ?>
 <?php form::text("tool-menu-id","id"); ?>
 <?php form::text("tool-menu-default","Default"); ?>
 <?php form::text("tool-menu-label","Label"); ?>

 <hr>
 <?php form::submit("Ajouter","Ajouter"); ?>
</fieldset>
<?php form::formOut(); ?>