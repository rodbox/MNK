<?php form::iform("pack-exec:root/save-menu #side-menu-save"); ?>
<div class="portlet-header">

<?php mnk::iview("pack:root/menu-list-select","menu-list"); ?>
</div>
<table id="side-menu-edit" class="table">
	<thead>
		<tr>
			<th>position</th>
			<th>icon</th>
			<th>title</th>
			<th>pack</th>
			<th>page</th>
			<th>lien</th>
		</tr>
	</thead>
		<tbody class="tree sortable connectedSortable ui-sortable">
<?php foreach ($d as $key => $value): ?>
<tr>
			<td><?php echo $value['order'] ?></td>
			<td><?php ui::img($value['icon'],16,"000"); ?></td>
			<td><?php echo $value['title']; ?></td>
			<td><?php echo $value['pack']; ?></td>
			<td><?php echo $value['page']; ?></td>
			<td><?php mnk::ilink("pack-page:".$value['pack']."/".$value['page'],"lien"); ?></td>
		</tr>	
	

<?php endforeach ?>
</tbody>
</table>
<div class="portlet-footer">
<?php form::submit("save","save"); ?>
</div>
<?php form::formOut(); ?>