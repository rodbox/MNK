<table class="table table-condensed" id="doc-mod">
	<tbody>
		<?php foreach ($d["func"] as $key => $value): ?>

		<?php 

		$func = str_replace("function ", "", $value);
		$func = explode("(", $func);
			$funcName = $func[0];
			$funcVarList = explode(",",str_replace(array(")","{"), "", $func[1]));


			?>




			<tr>
				<td><strong><?php echo $funcName; ?></strong></td>
				<td><ul>
					<?php foreach ($funcVarList as $keyVar => $valueVar): ?>
					<li>
						<?php $valVar = explode("=",$valueVar); ?>
						<?php echo $valVar[0];?>
						<i class="small c-green"><?php echo $valVar[1];?></i>
					</li>
				<?php endforeach; ?>
			</ul>
		</td>
	</tr>
<?php endforeach ?>
</tbody>
</table>