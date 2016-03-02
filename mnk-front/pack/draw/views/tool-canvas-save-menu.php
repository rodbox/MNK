<?php form::iform("pack-exec:draw/script-save #tool-canvas-save","POST");?>
<?php form::text("filename"); ?>
<?php form::select("ext",array("svg"=>"svg","png"=>"png","pdf"=>"pdf")); ?>
<?php form::submit("Enregister","Enregister");?>
<?php form::formOut(); ?>