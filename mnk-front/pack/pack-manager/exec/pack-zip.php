<?php 

extract($_POST);

$dir = DIR_USER."/0/pack-manager/".$pack.".zip";
$web = WEB_USER."/0/pack-manager/".$pack.".zip";
mnk::mod_load("zip_dir");
new zip_dir(DIR_PACK."/".$pack, $dir);
// file_put_contents($dir,"toot");

 ?>
 <a href="<?php echo $web ?> "><?php echo $pack; ?></a>