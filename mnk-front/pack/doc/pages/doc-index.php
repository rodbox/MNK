<h1><?php echo$_GET['pack']; ?></h1>

<div class="row-fluid">
	<div class="span12">
		
		<?php mnk::iview("pack:pack-manager/pack-tile-to-page","pack-page-list",array("pack"=>$_GET['pack'])); ?>

	</div>
</div>