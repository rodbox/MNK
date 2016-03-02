
<?php 

//mnk::debug($_POST);
extract($_POST);

$siteName 	= basename($site);

$dirSites 	= dirname(DIR_ROOT);
$dirSave 	= dirname($dirSites)."/save/".$siteName;


if(!file_exists($dirSave))
	mkdir($dirSave);


mnk::mod_load("zip_dir");

//db::dump(0,DIR_INCLUDE."/save",2);

$file       = $dirSave."/".$site."_".date("Y-m-d_G-i").".zip";
$srcSave    = $dirSites."/".$site;
$folderFilter   = array(
	$srcSave."/mnk-include/save"

	);
new zip_dir($srcSave, $file, $folderFilter);

echo $srcSave;

?>
		
