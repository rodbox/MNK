<ul class="draw-menu menu">	


		<li><?php mnk::ilink("null #undo", ui::rimg("undo2"	,16)); ?></li>
		<li>
			<?php form::iform("pack-exec:draw/loader_tool_menu #loader-tool-menu"); ?>

			<?php form::formOut() ?>
		</li>
		<li>
<?php 
	metro::modalLinkMini("draw-load-svg","folder","Ouvrir","white");
	metro::modal("draw-load-svg","Ouvrir","pack:draw/load-svg-menu","draw-svg-list"); 
?>
		</li>
		<li>
<?php 
	metro::modalLinkMini("draw-save-menu","disk","save","white");
	metro::modal("draw-save-menu","save","pack:draw/draw-save-menu"); 
?>
		</li>
	</ul>
	<div id="tool-menu" class="both"></div>