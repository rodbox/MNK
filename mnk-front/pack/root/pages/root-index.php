<div class="row-fluid">
<!-- <div class="span6">
		<?php metro::portletLightIn("midnight"); ?>
		<?php mnk::iview("pack:site-manager/site-list-save","site-list"); ?>
		<?php metro::portletOut(); ?>
</div> -->
	<div class="span8 offset2">
	<?php metro::portlet("UI image","zoom-in","dark","pack:uifinder/ui-finder-list"); ?>
	<?php metro::portlet("Package","package","midnight","pack:pack-manager/pack-tile-to-index","pack-list"); ?>		
</div>	
</div>



