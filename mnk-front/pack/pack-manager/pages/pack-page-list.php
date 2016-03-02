<?php extract($_GET); ?>

<h2><?php mnk::iview("pack:pack-manager/pack-list-select","pack-list",$pack); ?></h2>

<div class="row-fluid">
	<div class="span10">
		<?php metro::portlet("Pack Title Configurator","stack-list","blue","pack:pack-manager/pack-pages-configurator","pack-pages-config",array("pack"=>$pack)); ?>
	</div>
</div>