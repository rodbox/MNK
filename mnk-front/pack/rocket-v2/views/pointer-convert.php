<table class="table-pointer border-pointer border-solid border-bottom-4">
	<thead>
		<tr class="">
			<th colspan="3">pointer</th>
			
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
		<?php foreach ($d as $key => $value): ?>
			<tr>
			<td><input type="text" name="pointer[]" class="input-mini" value="<?php echo $key;  ?>"></td>
			<td> > </td>
			<td><input type="text" name="pointer_value[]" class="input-mini" value="<?php echo $value;  ?>"></td>
		</tr>
		<?php $i++;  ?>
		<?php endforeach ?>
		<?php for ($i=$i;$i<1;$i++):?>
			<tr>
			<td><input type="text" name="pointer[]" class="input-mini" value=""></td>
			<td> > </td>
			<td><input type="text" name="pointer_value[]" class="input-mini" value=""></td>
		</tr>
		<?php endfor;?>
		
	</tbody>
</table>