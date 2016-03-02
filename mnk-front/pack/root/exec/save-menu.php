<?php 

extract($_POST); 


foreach ($page as $key => $value) {
	$dataList[$order[$key]] = array(
		"order" 	=> $order[$key],
		"pack"		=> $pack[$key],
		"icon"		=> $icon[$key],
		"page"		=> $page[$key],
		"title" 	=> $title[$key]
		);
}

$menu = mnk::pushToKeyLoop($dataList);


$json = json_encode($menu);

file_put_contents(DIR_PACK."/root/config/menus/".$fileMenu.".json", $json);


?>