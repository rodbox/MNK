<?php mnk::css("pack:test/toggle"); ?>
<?php mnk::js("pack:test/toggle"); ?>

<?php form::iform("pack-exec:test/test");?>
<?php form::toggle("test","","test",true); ?>
<?php form::toggle("test2","","test2"); ?>
<?php form::toggle("test3","test3","test3"); ?>
<hr>
<?php form::submit("testGo","testGo");?>
<?php form::formOut();?>


