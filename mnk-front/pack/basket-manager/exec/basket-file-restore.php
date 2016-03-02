<?php 
extract($_POST);

$srcBasket = array(
	"pack"	=> DIR_PACK,
	"theme" => DIR_THEME_LIST
	);



foreach ($_POST['file'] as $key => $value){

$basketFile = DIR_TMP."/basket/".$value;

	$srcOriginFile = explode("/",$value);

	$type = array_shift($srcOriginFile);
	$dirOrig = $srcBasket[$type];
	//rename($basketFile,$dirOrig."/".implode("/".$srcOriginFile));


	$restoreFile = $dirOrig."/".implode("/",$srcOriginFile);

rename($basketFile,$restoreFile);
	//mnk::debug($dirOrig);

	//$file = $value;



	//
	//unlink($file);
}

	
?>