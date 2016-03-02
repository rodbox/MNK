<?php 
	mnk::pack_config("toodoo");
	extract($_POST); 
	$dir_task = DIR_TASK."/task.json";
	$file = file_get_contents($dir_task);
	$d = json_decode($file,true);

	$newTask = array(
		"check" 	=> "",
		"content" 	=> $taskAdd,
		"date"		=> date("d/m/y - H\hi"),
		"limit" 	=> ""
		);

	if(is_array($d["task"])) 
		array_unshift($d["task"],$newTask);
	else
		$d["task"][] = $newTask;

	$d = json_encode($d);

	file_put_contents($dir_task,$d);

	//mnk::debug($_POST);
 ?>

 <?php echo $taskAdd; ?>