<?php 


foreach ($_POST["class"] as $key => $value) {
	$_POST["class"][$key] = str_replace(array('section','onSelect'),"", $_POST["class"][$key]);
}


$json = json_encode($_POST);
$dir = DIR_USER."/0/section/".$_POST["title_project"].".json";
file_put_contents($dir, $json);

 ?>