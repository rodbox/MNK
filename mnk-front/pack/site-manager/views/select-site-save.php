<ul class="zip-save-list">
	<?php foreach ($d['save'] as $key => $value): ?>
<li>


<?php mnk::ilink("pack-exec:site-manager/dl-zip-save",str_replace(".zip", "", $value),array("site"=>$d["site"],"file"=>$value)); ?>


	</li>
	<?php endforeach ?>
</ul>