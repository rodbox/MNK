<div class="portlet-padding">
<?php foreach ($d as $key => $value):?>
	<?php 

	$title 		= basename($value);
	$content 	= ui::rimg("link4","16","fff",array("class"=>"alpha_5"));
	$color		= "turquoise";
	$number 	= "";


	mnk::ilink("pack-view:pack-manager/pack-pages-list-link,pack-pages-config .tile-pack-index","",array("pack"=>$title));
		metro::tile($title,$number,$content,$color);
	mnk::linkOut();

// unlink($value."/EN.success.json");
// unlink($value."/EN.alert.json");
// unlink($value."/EN.msg.json");

// unlink($value."/FR.success.json");
// unlink($value."/FR.alert.json");
// unlink($value."/FR.msg.json");

	?>	
<?php endforeach; ?>
<div class="clear"></div>