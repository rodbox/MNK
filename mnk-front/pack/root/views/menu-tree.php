
<?php 
$dataSend = $d;

foreach ($d as $key => $value) {
$dataSend = array(
	'pack' => $value["pack"],
	'icon' => $value["icon"],
	'page' => $value["page"],
	'title' => $value["title"],
	'child' => $value["child"]
 );

	mnk::iview("metro:drag-menu-edit","",$dataSend); 
	
}
	

?>