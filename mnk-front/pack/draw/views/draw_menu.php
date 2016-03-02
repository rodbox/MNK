<ul class="draw-menu">	

		<li>
			<?php form::iform("pack-exec:draw/tools-return #loader-tool-menu"); ?>
<?php mnk::iview("pack:draw/tools-list","tools-list"); ?>
<?php form::submit("load","load"); ?>
			<?php form::formOut() ?>
		</li>
		<li><?php mnk::ilink("pack-page:draw/tool-editor", ui::rimg("pencil6",16)); ?>
		</li>
		
	</ul>
	<div id="tool-menu" class="both"></div>