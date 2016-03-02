<?php 

	form::iform("pack-exec:theme-manager/theme-file-creator #theme-file-creator","POST");

	form::text("fileName","","",array("style"=>"width:200px;"));
echo " ";
	$optPackList[] = "";
	foreach ($d as $key => $value) {
		$optPackList[basename($value)] = basename($value);
	}

	form::select("theme",$optPackList,"",$_GET['theme'],array("style"=>"width:120px;"));
echo " ";

	$opt = array(
		"views" 	=> "views",
		"js" 		=> "js",

		"img" 		=> "img",
		"css" 		=> "css",

		"config" 	=> "config"
		);
	form::select("type",$opt,"","",array("style"=>"width:80px;"));
echo " ";
	form::submit("Créer","Créer",array('class' => "btn green plus"));

	form::formOut();
mnk::iview("pack:theme-manager/theme-file-uploader");
 ?>