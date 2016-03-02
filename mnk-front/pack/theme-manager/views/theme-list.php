<?php metro::modalLinkView ("theme-file-creator","theme-file-creator","theme:theme-manager/theme-file-creator","theme-list"); ?> 
<?php metro::modalLinkView ("theme-creator","theme-creator","theme:theme-manager/theme-creator"); ?>
<hr class="clear">



<?php foreach ($d as $key => $value):?>
	<?php 

	$title 		= basename($value);
	$content 	= ui::rimg("code","16","fff",array("class"=>"alpha_5"));
	$color		= "midnight";
	$number 	= "";


	mnk::ilink("theme-page:theme-manager/theme-manager","",array("theme"=>$title));
		metro::tile($title,$number,$content,$color);
	mnk::linkOut();?>
<?php endforeach; ?>
<div class="clear"></div>