<?php form::iform("pack-exec:pack-manager/pack-creator #pack-creator"); ?>

<div class="span9">
<?php form::text("packName","","",array("style"=>"width:170px;")); ?>


</div>
<div class="span1">
<?php form::submit("Créer","Créer",array('class' => "btn green plus")); ?>
</div>
<?php form::formOut(); ?>
<div class="clear"></div>