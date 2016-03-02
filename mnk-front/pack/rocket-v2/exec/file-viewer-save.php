<?php 
mnk::debug($_POST);


	extract($_POST);
	$dir = DIR_PACK."/rocket-v2/views/";
	$file = str_replace("_", "-", $view)."-".$file.".php";
	$dir .= $file;
if (file_put_contents($dir, $myCode)) {
	echo "ok";
}
else
	echo "no save";
 ?>	