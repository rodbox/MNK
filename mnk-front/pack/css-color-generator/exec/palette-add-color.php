<?php 
$json['title'] 	=  $_POST["title"];
$json['name'] 	=  $_SESSION["user"]["name"];

$fileName = "palette-".$_POST["title-palette"].".json";
$dir = DIR_USER."/0/css-color-generator/".$fileName;



$json = mnk::load_json($dir,true);
$json["palette"]["name"][$_POST["color-name"]]=$_POST["color-value"];
$json["palette"]["key"][]=$_POST["color-value"];
// echo $dir."/".$fileName;
// foreach ($_POST["color-value"] as $key => $value) {
// 	$name  = $_POST["color-name"][$key];
// 	$json["palette"]["name"][$name] = $value;
// 	$json["palette"]["key"][] = $value;
// 	# code...
// }
// $jsonFile = json_encode($json);
// $dir = DIR_USER."/0/css-color-generator/";
// $fileName = "palette-".$_POST["title"].".json";
// file_put_contents($dir.$fileName, $jsonFile);
mnk::push_json($dir,$json);
// print_r($json);
 ?>