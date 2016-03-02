<?php 

form::iform("null #upd-labo","GET");

form::hidden($_GET['page'],"page");
form::hidden($_GET['type'],"type");



$optPackList[] = "";
foreach ($d as $key => $value) {
	$optPackList[basename($value)] = basename($value);
}

form::select("pack",$optPackList,"",$_GET['pack'],array("class"=>"big"));
form::formOut();

 ?>