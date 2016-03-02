<?php 

mnk::pack_config("site-manager");
extract($_POST);

$replaceFTPInfo = array(
	"HOST" 	=> $ftp_host,
	"USER" 		=> $ftp_user,
	"PW" 		=> $ftp_pw,
	"SITE"		=> $site
	);

$sftp_file_template = DIR_TEMPLATE."/files/sftp-config.json";
$sftp_file_link = SITE_META_FILES."/".$site."/sftp-config.json";
// $sftp_file_link_web = WEB_TMP."/sftp-config.json";
file::replace_Key_Val_File($replaceFTPInfo,$sftp_file_template,$sftp_file_link);



$filezilla_template = DIR_TEMPLATE."/files/filezilla.xml";
$filezilla_link = SITE_META_FILES."/".$site."/filezilla.xml";
// $filezilla_link_web = WEB_TMP."/confzillaig.json";
file::replace_Key_Val_File($replaceFTPInfo,$filezilla_template,$filezilla_link);
?>