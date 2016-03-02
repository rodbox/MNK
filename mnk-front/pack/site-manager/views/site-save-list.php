<table class="table site-list-save">
	<tbody>

			<?php foreach ($d['save'] as $key => $value): ?>
			<tr><?php 

			$dirSites 	= dirname(DIR_ROOT);
			$dirSave 	= dirname($dirSites)."/save/".$d['site']."/".$value;


			?>
			<td>
				<?php ui::img("file-zip",12,"242424",array("class"=>"alpha_2")); ?> 
				<span class="small "><?php echo $value ?></span>

			</td><td> <span class="small "><strong>
			<?php echo date("d m Y H:i",fileatime($dirSave)); ?>
		</span></strong></td>

		<td>
			<i><span class="small c-green">
				<?php echo file::format_taille(filesize($dirSave)); ?>
			</span></i>
		</td>
	</tr>
	
	<?php endforeach ?>
	</tbody>
</table>
