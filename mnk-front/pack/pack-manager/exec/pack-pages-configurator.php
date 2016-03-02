<?php
$packPagesFile = DIR_PACK."/".$_GET['pack']."/config/pack-pages.json";

$config["pack"] = array(
		"folder"	=> $_GET['pack'],
		"title"		=> $_POST['packTitle'],
		"icon"		=> $_POST['packIcon']
		);
foreach ($_POST['page'] as $key => $value) {
	$info = pathinfo($_POST['page'][$key]);


	$config["page"][$info["filename"]] = array(
		"page"		=> $info["filename"],
		"title"		=> $_POST['title'][$key],
		"subTitle"	=> $_POST['subTitle'][$key],
		"icon"		=> $_POST['icon'][$key]
		);
}

$json = json_encode($config);
//mnk::debug($json);

//echo $packPagesFile;
if(file_put_contents($packPagesFile, $json)){
	msg::success("Modifications enregistrées");
}
?>