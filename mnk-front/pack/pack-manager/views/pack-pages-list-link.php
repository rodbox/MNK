<ul>
<?php foreach ($d['file'] as $key => $value): ?>
	<li>
	<?php 	
	$page = pathinfo($value);
	$fileName = $page['filename'];

	mnk::ilink("pack-page:".$d['pack']."/".$fileName,$fileName);
	 ?>
	</li>
<?php endforeach ?>
</ul>