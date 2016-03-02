<?php form::iform("pack-exec:draw/menu-save #tool-menu-save","POST");?>
<?php form::text("filename"); ?>
<?php form::select("ext",array("json"=>"json")); ?>
<?php form::submit("Enregister","Enregister");?>
<?php form::formOut(); ?>