<ul class="filelist">
<?php foreach ($d["file"] as $key => $value):?>
<li><?php $file = basename($value);
		form::hidden($d["theme"]."/".$d["folder"]."/".$file);
		echo $file; ?></li>
<?php endforeach; ?>
</ul>
