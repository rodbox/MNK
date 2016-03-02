<?php mnk::debug($_POST); 





?>
<?php mnk::pack_config("toodoo"); ?>
<?php extract($_POST); ?>

<?php 
$dir_task = DIR_TASK."/task.json";
$file = file_get_contents($dir_task);
$d = json_decode($file,true);


foreach($pos as $key => $val){
	$newTaskList["task"][$key] =  $d["task"][$val];
}



//reorder

$d = json_encode($newTaskList);

file_put_contents($dir_task,$d);
 ?>