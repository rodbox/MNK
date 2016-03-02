<div class="portlet-padding">
<?php form::iform("pack-exec:uifinder/find_ui_img #find_ui_img");?>

<div class="span12"><?php form::text("find"); ?>
	<?php form::select("size",array("12"=>"12px","28"=>"28px","32"=>"32px","48"=>"48px","64"=>"64px"),"","32",array("style"=>"width:70px;")); ?>
	<?php  form::select("color",array("000"=>"#000","fff"=>"#fff","242424"=>"#242424"),"","242424",array("style"=>"width:130px;")); ?></div>
<?php form::formOut(); ?>
<hr class="clear"><div id="uifinderResult"></div>
<?php mnk::js(array("pack:uifinder/uifinder")); ?>


</div>