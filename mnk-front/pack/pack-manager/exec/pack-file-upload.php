<?php 
extract($_POST);
if($type!="ui-svg"){
	$destination    = DIR_PACK . '/' . $pack . '/'.$type;
}
else{
	$destination    = DIR_UI_SVG."/";
}
$source = $_FILES['file']['tmp_name'];
$dest = $destination . "/".$_FILES['file']['name'];

move_uploaded_file($source, $dest);

?>