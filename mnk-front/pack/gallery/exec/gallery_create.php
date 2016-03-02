<?php 
if($_POST["gal_name"]!=""){
	$newDir = DIR_USER_ROOT."/gallery/".$_POST["gal_name"];
	$newDirFull = DIR_USER_ROOT."/gallery/".$_POST["gal_name"]."/full";
	$newDirThumb = DIR_USER_ROOT."/gallery/".$_POST["gal_name"]."/thumb";
	$newDirTmp = DIR_USER_ROOT."/gallery/".$_POST["gal_name"]."/tmp";
	mkdir($newDir);
	mkdir($newDirFull);
	mkdir($newDirThumb);
	mkdir($newDirTmp);
}
 ?>