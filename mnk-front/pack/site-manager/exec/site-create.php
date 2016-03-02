<?php 
extract($_POST);
mnk::pack_config("site-manager");


file::template("site/".$type,DIR_SITE,$siteFolder,true);


$file = mnk::jsonToArray(SITES_FILE);
// echo SITES_FILE;



$targetExtract 	= DIR_SITE."/".$siteFolder;
$zipFile 		= DIR_SITE."/".$siteFolder."/".$file[$type]["file"];


// $zipFile = $dest."/".$siteFolder."/source.zip";


mnk::mod_load("zip_save");
zip_save::extractTo($zipFile, $targetExtract);
unlink($zipFile);






// /* DB */

// $replaceDBInfo = array(
// 	"SERVER" 	=> $db_server,
// 	"USER" 		=> $db_user,
// 	"PW" 		=> $db_pw,
// 	"BASE" 		=> $db_base
// 	);

// $mod_DB_file = $targetExtract."/mnk-include/core/mod/mod_db.php";
// file::replace_Key_Val_File($replaceDBInfo,$mod_DB_file,$mod_DB_file);




// $replaceFTPInfo = array(
// 	"HOST" 	=> $ftp_host,
// 	"USER" 		=> $ftp_user,
// 	"PW" 		=> $ftp_pw,

// 	);

// $sftp_file_template = DIR_TEMPLATE."/files/sftp-config.json";
// $sftp_file_link = DIR_TMP."/sftp-config.json";
// $sftp_file_link_web = WEB_TMP."/sftp-config.json";
// file::replace_Key_Val_File($replaceFTPInfo,$sftp_file_template,$sftp_file_link);



?>
	<?php mkdir(DIR_USER."/0/site-manager/".$siteFolder); ?>
<a href="<?php echo $sftp_file_link_web; ?>">sftp-config link</a>