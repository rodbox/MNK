<div class="row-fluid">
	<div class="span12">
	<?php form::iform("pack-exec:societe/siret-scanner .mnk-live");  ?>
	<input type="text" name="siret" id="siret" value="349207142"/>
	<?php form::submit("scan","scan");?>

</form>
	<button class="link">link</button>
<div class="result"></div>
	</div>
</div>
<?php mnk::js("pack:societe/societe");  ?>