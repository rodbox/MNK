<div class="row-fluid">
	<div class="span12">

		<?php form::iform("pack-exec:site-manager/site-create");?>

		<fieldset>
			<legend>Système</legend>
			<?php form::text("siteFolder","Nom du dossier"); ?>

		</fieldset>
		<fieldset>
			<legend>Type</legend>
			
			<?php 

			$opt = array("mnk"=>"mnk","joomla"=>"joomla","wordpress"=>"wordpress","drupal"=>"drupal","prestashop"=>"prestashop","modx"=>"modx");
			form::select("type",$opt,"type"); ?>

		</fieldset>
		<fieldset>
			<legend>Base de donnée</legend>
			<?php form::text("db_user","Nom d'utilisateur"); ?>
			<?php form::text("db_pw","Mot de passe"); ?>
			<?php form::text("db_server","Server"); ?>
			<?php form::text("db_base","Nom de la base"); ?>
		</fieldset>

		<fieldset>
			<legend>FTP</legend>
			<?php form::text("ftp_user","Nom d'utilisateur"); ?>
			<?php form::text("ftp_pw","Mot de passe"); ?>
			<?php form::text("ftp_host","Hote"); ?>

		</fieldset>		

		
		<hr>
		<?php form::submit("create","create"); ?>
		<?php form::formOut();?>	
	</div>
</div>
