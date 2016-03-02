<?php 

$meta = json_decode(file_get_contents(DIR_PACK."/".$d["pack"]."/infos.txt"));
mnk::debug($meta);
echo $meta->name;
 ?>