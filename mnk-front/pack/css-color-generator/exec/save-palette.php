<?php 
$json['title'] 	=  $_POST["title"];
$json['name'] 	=  $_SESSION["user"]["name"];
foreach ($_POST["color-value"] as $key => $value) {
	$name  = $_POST["color-name"][$key];
	$json["palette"]["name"][$name] = $value;
	$json["palette"]["key"][] = $value;
	# code...
}
$jsonFile = json_encode($json);
$dir = DIR_USER."/0/css-color-generator/";
$fileName = "palette-".$_POST["title"].".json";
file_put_contents($dir.$fileName, $jsonFile);


 ?>