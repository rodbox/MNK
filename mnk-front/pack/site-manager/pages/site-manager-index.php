<div class="row-fluid">
	<div class="span12">

			<?php mnk::iview("pack:pack-manager/pack-tile-to-page","pack-page-list",array("pack"=>$_GET['pack'])); ?>

	</div>
</div>

<div class="row-fluid">
	<div class="span12">
		<?php metro::portletLightIn("midnight"); ?>
		<?php mnk::iview("pack:site-manager/site-list-save","site-list"); ?>
		<?php metro::portletOut(); ?>
		
	</div>
</div>