<ul>
<?php foreach ($d as $key => $value): ?>
	<li>
		<?php mnk::ilink("pack-exec:thief/xls",ui::rimg("file-excel")." ".$value,array("file"=>$value)); ?>
		<?php $size = filesize(DIR_USER."/0/thief/".$value);
		$colorNum = ($size>0)?12:22;
		 ?>
		 <span class="small c-<?php echo $colorNum ?>"> <?php echo file::format_taille($size); ?></span>
	</li>
<?php endforeach ?>
</ul>