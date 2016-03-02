<?php
$d['gal_folder']    = $_GET['gal_folder'];
$d['list'] = file::listDir(DIR_UPLOAD."/gal/".$d['gal_folder']."/thumbs");
?>