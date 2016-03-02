<?php 

	foreach ($_POST['title'] as $key => $value) {
		$json[$key] = array(
			"title" => $_POST['title'][$key],
			"shortcut" => $_POST['shortcut'][$key],
			"nbParam" => $_POST['nbParam'][$key],
			"onResult" => $_POST['onResult'][$key],
			"func" => $_POST['func'][$key]
			);
		# code...
	}

mnk::push_json(DIR_USER_ROOT."/rocket/rocket-param.json",$json);
mnk::push_json(DIR_USER_ROOT."/rocket/rocket-param.json",$json);
 ?>