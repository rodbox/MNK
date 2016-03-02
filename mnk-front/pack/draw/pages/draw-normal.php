<?php 
mnk::js(array(
"pack:draw/paper",

"pack:draw/draw"



	));
mnk::css("pack:draw/draw");

 ?>


<div class="row-fluid">

	<div class="span12">
		<div class="menu"><?php mnk::iview("pack:draw/tool-menu-normal"); ?></div>
			<div id="colorpicker-zone">
			<?php mnk::iview("pack:draw/colorpicker_3"); ?>
	</div>
			<div class="center" id="canvas-viewer">
		<?php mnk::iview("pack:draw/new_canvas","",array("w"=>1800,"h"=>1000,"id"=>1)); ?>
		
	</div>
	</div>
</div>