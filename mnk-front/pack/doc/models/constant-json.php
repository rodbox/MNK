<?php
require_once('../../../../mnk-include/core/mnk-core.php');
new mnk();
$d=get_defined_constants (true);
$d= $d['user'];
echo json_encode(array_keys($d));
?>
