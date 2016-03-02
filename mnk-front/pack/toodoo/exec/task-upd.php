<?php mnk::pack_config("toodoo"); ?>
<?php extract($_POST); ?>

<?php 
$dir_task = DIR_TASK."/task.json";
$file = file_get_contents($dir_task);
$d = json_decode($file,true);

$newTask = array(
	"check" 	=> "",
	"content" 	=> $taskAdd,
	"date"		=> date("d/m/y - H\hi"),
	"limit" 	=> ""
	);

array_unshift($d["task"],$newTask);

$d = json_encode($d);

file_put_contents($dir_task,$d);
 ?>