<?php 
	extract($_POST);  
	$dir = DIR_PACK."/draw/config/tools";
	$file = DIR_PACK."/draw/config/tools/".$filename.".".$ext;
	
	 file_put_contents($file,$content);
	//file::templateFile("js",$dir,$filename);
		echo file_exists($file);

	/*if(file_put_contents))
		{echo "ok";}
	else
		{echo "no";}*/
?>