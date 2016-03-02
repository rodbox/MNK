<?php extract($d);  ?>

<table class="table-css">
	<thead>
		<tr>
			<th colspan="2">Css file</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<td colspan="3">
				<a href="#" class="add-tbody-line">add Line</a>
			</td>
		</tr>
	</tfoot>
	<tbody>
		<?php $i=0;  ?>
		<?php foreach ($d["file"] as $key => $value): ?>
		<tr>
			<td><input type="checkbox" name="css_disable[]" value="<?php echo $value;  ?>" <?php echo (in_array($value, $d["file_disable"]))?"checked='checked' ":"";  ?> /></td>
			<td><input type="text" name="css_file[]" placeholder="pack/cssfile" value="<?php echo $value;  ?>"></td>
		</tr>
		<?php $i++;  ?>
		<?php endforeach ?>
		<?php for ($i=$i;$i<1;$i++):?>
		<tr>
			<td><input type="checkbox" name="css_disable[]" value=""/></td>
			<td><input type="text" name="css_file[]" placeholder="pack/cssfile" value=""></td>
		</tr>
		<?php endfor;?>
		
	</tbody>
</table>
