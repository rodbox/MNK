<?php
require_once('../../mnk-include/core/mnk-core.php');
new mnk();
$data = explode("/", $_GET['exec']);
include (DIR_PACK."/".$data[0]."/exec/".$data[1].".php");
?>