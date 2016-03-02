<?php 
extract($_POST);

$destination    = DIR_THEME_LIST . '/' . $theme . '/'.$type;

$source = $_FILES['file']['tmp_name'];
$dest = $destination . "/".$_FILES['file']['name'];

move_uploaded_file($source, $dest);

?>