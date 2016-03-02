<?php extract($_GET); ?>
<div id="plupload">
	<a href="#" id="browse">
		<?php user::imgUser($_SESSION['user']['id'],$_SESSION['user']['name'],"128","242424");?>
		Parcourir
	</a>
	<div id="filelist"></div>
</div>
<?php mnk::js(array(
	'theme:plupload',
	'theme:plupload.html5',
	'theme:plupload.flash',
	'theme:plupload.main-profile'));
?>