<?php metro::modalLinkView ("pack-file-creator","pack-file-creator","pack:pack-manager/pack-file-creator","pack-list"); ?> 
<?php metro::modalLinkView ("pack-creator","pack-creator","pack:pack-manager/pack-creator"); ?>
<hr class="clear">



<?php foreach ($d as $key => $value):?>
	<?php 

	$title 		= basename($value);
	$content 	= ui::rimg("puzzle4","16","fff",array("class"=>"alpha_5"));
	$color		= "midnight";
	$number 	= "";


	mnk::ilink("pack-page:pack-manager/pack-labo","",array("pack"=>$title));
		metro::tile($title,$number,$content,$color);
	mnk::linkOut();?>
<?php endforeach; ?>
<div class="clear"></div>