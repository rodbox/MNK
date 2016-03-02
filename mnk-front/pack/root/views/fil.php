<?php 

$configFile = DIR_PACK."/".$d["pack"]."/config/pack-pages.json";
$json =  json_decode(file_get_contents($configFile),true);
$packFolder = $d["pack"];
$packTitle = $json["pack"]['title'];
$pagetitle = $json["page"][$d["page"]]['title'];
$icon = $json["page"][$d["page"]]['icon'];
$pageSubTitle = $json["page"][$d["page"]]['subTitle'];
?>





<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<?php mnk::ilink("pack-page:root/root-index"); ?>Acceuil</a> 
	<?php if ($d["pack"] != "root"): ?>
		<i class="icon-angle-right"></i>
	</li>

	<li>
		<?php mnk::ilink("pack-page:".$packFolder."/".$packFolder."-index",$packTitle); ?>
		<?php if ($d["page"]!=$packFolder."-index"): ?>
			<i class="icon-angle-right"></i>
			</li>
			<li><a href="#"><?php echo $pagetitle ?></a>

	</li><?php else: ?>
</li>
<?php endif ?>
<?php else: ?>
</li>
<?php endif ?>                        



</ul>