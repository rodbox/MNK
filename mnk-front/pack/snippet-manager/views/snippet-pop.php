<div class="mini-pop" id="snippet-pop">
	<div class="mini-arrow"></div>
	<a href="#" id="pop-close"><?php ui::img("close",12,"000"); ?> </a>
	<?php form::iform("null:# #snippet-pop-form"); ?>
	<table>
		<thead>
			<tr>
				<th>num</th>
				<th>name</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>
					<?php form::text("tabNum","","",array("id"=>"tabNum")); ?>
				</td>
				<td>
					<?php form::text("tabName","","tab",array("id"=>"tabName")); ?>
				</td>
				<td>	
					<?php form::submit("replace","replace"); ?>
				</td>
			</tr>
		</tbody>
	</table>
	<?php form::formOut(); ?>
</div>