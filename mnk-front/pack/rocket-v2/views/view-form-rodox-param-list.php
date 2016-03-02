<?php 
	$form 	= new form();
	$app 	= new app;
?>
<div class="top_1 push_1 grid_12">
    <h1>Mes paramètres</h1>
    	<div class="margin-top-25">
		<?php $app->view("pack-manager","form-create-app");  ?>
		</div>
		<div class="margin-top-25">
			<?php $app->view("pack-manager","form-create-file");  ?>
		</div>
		<div class="margin-top-25">
			<?php $app->view("pack-manager","form-push-app");  ?>	
		</div>
</div>
