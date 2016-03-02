<?php 
$optPackList[] = "";
foreach ($d as $key => $value) {
	$optPackList[basename($value)] = basename($value);
}

form::select("section-pack",$optPackList,"",$_GET['pack'],array("class"=>"big","id"=>"section-pack"));
?>