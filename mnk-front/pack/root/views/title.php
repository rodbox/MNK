<?php 

$configFile = DIR_PACK."/".$d["pack"]."/config/pack-pages.json";
$json =  json_decode(file_get_contents($configFile),true);
$packTitle = $json["pack"]['title'];
$pagetitle = $json["page"][$d["page"]]['title'];
$icon = $json["page"][$d["page"]]['icon'];
$pageSubTitle = $json["page"][$d["page"]]['subTitle'];
 ?>

 <h1 class="page-title">
 	<?php ui::img($icon,"64","000",array("class"=>"alpha_1")); ?>
 	<?php echo $packTitle; ?>
	<br>
 	<span class="small"><?php echo $pagetitle; ?></span>

 </h1>