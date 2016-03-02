<?php 
extract($_POST);

$packName = str_replace(" ", "-", $packName);

$dest = DIR_PACK;
file::template("pack",$dest,$packName);

$newPackDir = $dest."/".$packName;

rename($newPackDir."/pages/pack-index.php", $newPackDir."/pages/".$packName."-index.php");
rename($newPackDir."/js/pack.js", $newPackDir."/js/".$packName.".js");
rename($newPackDir."/config/pack.json", $newPackDir."/config/".$packName.".json");
rename($newPackDir."/config/pack-pages.json", $newPackDir."/config/".$packName."-pages.json");
rename($newPackDir."/css/pack.css", $newPackDir."/css/".$packName.".css");

rename($newPackDir."/pack-config.php", $newPackDir."/".$packName."-config.php");
rename($newPackDir."/pack-controller.php", $newPackDir."/".$packName."-controller.php");

file::replace_Key_Val_File(array("PACK"=>$packName),$newPackDir."/".$packName."-controller.php");
file::replace_Key_Val_File(array("PACK"=>$packName),$newPackDir."/pages/".$packName."-index.php");

mkdir(DIR_USER."/0/".$packName);



?>
<?php 

extract($_POST);

$dir = DIR_USER."/0/pack-manager/".$packName.".zip";
$web = WEB_USER."/0/pack-manager/".$packName.".zip";
mnk::mod_load("zip_dir");
new zip_dir(DIR_PACK."/".$packName, $dir);
// file_put_contents($dir,"toot");

 ?>
 <a href="<?php echo $web ?> "><?php echo $packName; ?></a>