<?php form::iform("pack-exec:site-manager/ftp-config-save #ftp-config-save");?>
		<fieldset>
			<?php form::hidden($_GET['site'],"site"); ?>

<label for="ftp_host">Host</label>
<input type="text" name="ftp_host" valule="<?php echo $d['Host']; ?>" class="host">
<label for="ftp_user">Utilisateur</label>
<input type="text" name="ftp_user" valule="<?php echo $d['User']; ?>" class="user">
<label for="ftp_pw">Mot de passe</label>			
<input type="password" name="ftp_pw" valule="<?php echo $d['Pass']; ?>" class="pw">
</fieldset>		

		
		<hr>
		<?php form::submit("save","save"); ?>
		<?php form::formOut();?>	
	</div>