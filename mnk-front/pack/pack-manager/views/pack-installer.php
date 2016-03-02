<?php form::iform("pack-exec:pack-manager/pack-installer #pack-installer");?>
<?php mnk::iview("pack:pack-manager/pack-list-form","pack-list"); ?>
<?php mnk::iview("pack:pack-manager/site-list-form","site-list"); ?>

<?php form::submit("installer","installer"); ?>
<?php form::formOut();?>