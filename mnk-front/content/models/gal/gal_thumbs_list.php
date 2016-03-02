<?php
$d['gal_folder']    = $_GET['gal_folder'];
$d['gal_name']    = $_GET['gal_name'];
$d['list'] = file::listDir(DIR_GAL."/".$d['gal_folder']."/thumbs");
?>