<?php 
$d["funcList"] = file::jsonToArray(DIR_USER_ROOT."/rocket/rocket-param.json");
$d["params"] = file::jsonToArray(DIR_USER_ROOT."/rocket/rocket-param-".$send['name'].".json");

 ?>