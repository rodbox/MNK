<div class="row-fluid">
	<div class="span12 ">
		
		<div class="page-menu">
			<?php mnk::ilink("pack-exec:basket-manager/basket-file-delete",ui::rimg("file-remove2",32),array("type","file","pack"),array("class"=>"pack-bt basket-bt-file-delete")) ?>

			<?php mnk::ilink("pack-exec:basket-manager/basket-file-restore",ui::rimg("file-check2",32),array("type","file","pack"),array("class"=>"pack-bt basket-bt-file-restore")) ?>
		</div>
	</div>
	
</div>
<div class="row-fluid">
	<div class="span6">
		<?php metro::portlet("Corbeille","remove3","grey","pack:basket-manager/basket-file-list","basket-file-list"); ?>
	</div></div>
