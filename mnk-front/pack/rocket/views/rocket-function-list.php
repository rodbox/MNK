<?php form::iform("pack-exec:rocket/rocket-function-create #onLive");?>
<table class="table rocket-func-list">
	<thead>
		<tr>
			<th>Title</th>
			<th>Shortcut</th>
			<th>Nb Param</th>
			<th>Func()</th>
			<th>Return</th>
			<th>Edit</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($d as $key => $value): ?>
	<?php extract($value); ?>

	<tr>
		<td><input type="text" name="title[]" value="<?php echo $title ?>" /></td>
		<td><input type="text" name="shortcut[]" value="<?php echo $shortcut ?>" /></td>
		<td><input type="text" name="nbParam[]" value="<?php echo $nbParam ?>" style="width:50px;" /></td>
		<td><textarea name="func[]" cols="30" rows="1"><?php echo $func ?></textarea></td>
		<td><?php $opt =  array(
			"true"=>"in",
			"false"=>"out"
			);
			form::select("onResult[]",$opt,"",$onResult); ?>
		</td>
		<td><?php mnk::ilink("pack-page:rocket/rocket-index",ui::rimg("pencil2",16,"000"),array("name"=>$title,"nbParam"=>$nbParam,"key"=>$key),array("class"=>"rocket-edit")); ?></td>
		<td><a href="#" class="del-func" onClick="if(confirm('Êtes vous certain de supprimer la fonction ?')){$(this).parents('tr').remove();} return false;"><?php ui::img("close2",16,"000"); ?></a></td>
	</tr>
<?php endforeach ?>
<tr class="rocket-function-add bg-12">
		<td><input type="text" name="title[]" value="" /></td>
		<td><input type="text" name="shortcut[]" value="" /></td>
		<td><input type="text" name="nbParam[]" value="" /></td>
		<td><textarea name="func[]" cols="30" rows="1"></textarea></td>
		<td><?php $opt =  array(
			"true"=>"in",
			"false"=>"out"
			);
			form::select("onResult[]",$opt); ?>
		</td>
		<td></td>
		<td></td>
	</tr>
	</tbody>
</table>
<?php form::submit("rocket","save");?>
<?php form::formOut();?>