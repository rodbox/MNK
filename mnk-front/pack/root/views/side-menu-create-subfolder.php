<?php form::iform("pack-exec:root/null #side-menu-subfolder","GET");?>

<table>
	<thead>
		<tr>
			<th></th>
			<th>title</th>
			<th>icon</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><?php ui::img("folder-plus4",32); ?></td>
			<td><?php form::text("title",""); ?></td>
			<td><?php form::text("icon","","",array("class"=>"ui-icon-completion")); ?></td>
			<td><?php form::submit("creer","creer"); ?></td>
		</tr>
	</tbody>
</table>
 <?php form::formOut(); ?>