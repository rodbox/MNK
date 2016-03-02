<?php 
mnk::js(array(
"pack:draw/paper",

"pack:draw/draw",
"pack:draw/tool-menu-editor",
"pack:draw/tool-script-editor"



	));
mnk::css("pack:draw/draw");
echo '<script type="text/paperscript" src="'.WEB_PACK.'/draw/js/tool-editor.js" canvas="tool-editor"></script>';
 ?>

<div class="row-fluid">
	<div class="span3">
		<?php mnk::iview("pack:draw/tool-edit"); ?>
		<?php mnk::iview("pack:draw/tool-menu-editor"); ?>
	</div>
		

	<div class="span6">
		<?php mnk::iview("pack:draw/tool-canvas"); ?>
	</div>
	<div class="span3">
		<?php metro::portlet("Layer","stack","concrete","pack:draw/layers-list","layers-list"); ?>
	</div>
</div>