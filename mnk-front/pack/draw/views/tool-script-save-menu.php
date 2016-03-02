<?php form::iform("pack-exec:draw/script-save #tool-script-save","POST");?>
<?php form::text("filename"); ?>
<?php form::select("ext",array("js"=>"js","json"=>"json")); ?>
<?php form::submit("Enregister","Enregister");?>
<?php form::formOut(); ?>