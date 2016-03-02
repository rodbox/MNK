<?php 

form::iform("null #upd-mod","GET");

form::hidden($_GET['page'],"page");
form::hidden($_GET['type'],"type");



$optModList[] = "";
foreach ($d as $key => $value) {

	$mod = str_replace(array("mod_",".php"), "", basename($value));


	$optModList[$mod] = $mod;
}

form::select("mod",$optModList,"",$_GET['mod'],array("class"=>"big"));
form::formOut();

 ?>