<h1>Ouvrir</h1>
<hr>
<?php 

foreach ($d as $key => $value) {
	$opt[$value]=$value;
}


form::select("rocket-file",$opt);
 ?>
 <hr>
 <?php mnk::ilink("pack-exec:rocket-v2/rocket-load #loading-param"); ?>
<button><?php ui::imgSVG("folder",16)?> Ouvrir</button></a>