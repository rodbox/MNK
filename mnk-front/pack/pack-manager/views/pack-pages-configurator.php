<?php form::iform("pack-exec:pack-manager/pack-pages-configurator #page-configurator","POST",array("pack"=>$_GET['pack'])); ?>
<div class="portlet-padding">
<div class="span4">
	<fieldset>
		<legend>Le pack</legend>
<table class="table">
	<thead>
		<tr>
			<th>Pack title</th>
			<th>Icon</th>
		</tr>
	</thead>
	<tbody>

<tr>
			<td><?php form::text("packTitle","",$d['config']["pack"]["title"]); ?></td>
			<td><?php form::text("packIcon","",$d['config']["pack"]["icon"],array("class"=>"ui-icon-completion","style"=>"background-image:url('http://betty.excentrik.fr/mnk-include/core/img/ui/242424/16px/".$d['config']["pack"]["icon"].".png')")); ?></td>
		</tr>

		
		
	</tbody>
</table>
</fieldset>
</div>

</div>








<div class="row-fluid">
	<div class="portlet-padding">
	<div class="span12">
<fieldset>
<legend>les pages</legend>
<!-- LES PAGES -->
<table class="table">
	<thead>
		<tr>
			<th>Page File</th>
			<th>Title</th>
			<th>Sub Title</th>
			<th>Icon</th>
		</tr>
	</thead>
	<tbody>

<?php foreach ($d['file'] as $key => $value): ?>
	<?php $info = pathinfo($value);
	$file = $info['filename'];
	extract($d['config']["page"][$file]);

	 ?>
<tr>
			<td><?php form::text("page[]","",$file); ?></td>
			<td><?php form::text("title[]","",$title); ?></td>
			<td><?php form::text("subTitle[]","",$subTitle); ?></td>
			<td><?php form::text("icon[]","",$icon,array("class"=>"ui-icon-completion","style"=>"background-image:url('http://betty.excentrik.fr/mnk-include/core/img/ui/242424/16px/".$icon.".png')")); ?></td>
		</tr>
<?php endforeach ?>

		
		
	</tbody>
</table>
</fieldset></div></div>
</div>
<div class="portlet-footer">
<?php form::submit("save","save"); ?>
</div>
<?php form::formOut(); ?>