<?php 

form::iform("null #upd-theme-index","GET");

form::hidden($_GET['page'],"page");
form::hidden($_GET['type'],"type");



$optPackList[] = "";
foreach ($d as $key => $value) {
	$optPackList[basename($value)] = basename($value);
}

form::select("theme",$optPackList,"",$_GET['theme'],array("class"=>"big"));
form::formOut();
?>