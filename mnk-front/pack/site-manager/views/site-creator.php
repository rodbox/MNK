<?php form::iform("pack-exec:site-manager/site-create #site-creator"); ?>

<div class="span9">
<?php form::text("siteName","Nom","",array("style"=>"width:170px;")); ?>
<?php form::text("siteFolder","Dossier","",array("style"=>"width:170px;")); ?>
<?php form::text("siteDomain","Nom de domaine","",array("style"=>"width:170px;")); ?>

<hr>
<?php form::text("siteWebmasterMail","Mail du webmaster","",array("style"=>"width:170px;")); ?>
<hr>
<fieldset>
<?php form::text("dbHost","Server hote","",array("style"=>"width:170px;")); ?>
<?php form::text("dbName","Nom de la base de donnée","",array("style"=>"width:170px;")); ?>
<?php form::text("dbUser","Nom d'utilisateur","",array("style"=>"width:170px;")); ?>
<?php form::text("dbPw","Mot de passe","",array("style"=>"width:170px;")); ?>

</fieldset>

<hr>
<?php form::submit("Créer","Créer",array('class' => "btn green plus")); ?>
</div>
<?php form::formOut(); ?>
<div class="clear"></div>