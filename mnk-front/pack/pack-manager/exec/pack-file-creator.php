<?php 
	extract($_POST);

	$srcType = array(
		"css"		=>"css",
		"exec"		=>"php",
		"js"		=>"js",
		"jquery-plugin"		=>"jquery-plugin",
		"views"		=>"php",
		"models"	=>"php",
		"demo"		=>"php",
		"img"		=>"null",
		"pages"		=>"php",
		"config"	=>"json"
	);
if ($srcType[$type]=="jquery-plugin") {
	$dest = DIR_PACK."/".$pack ."/js/";
	$fileName = "jquery.".$fileName;
}
else
	$dest = DIR_PACK."/".$pack ."/".$type."/";
	//mnk::debug($_POST);

	file::templateFile($srcType[$type],$dest,$fileName);
?>