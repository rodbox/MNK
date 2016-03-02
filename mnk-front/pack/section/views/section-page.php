<?php foreach ($d["id"] as $key => $value): ?>

<div class="page <?php echo $d['class'][$key];?>" id="<?php echo $d['id'][$key]; ?>" style="<?php echo $d['style'][$key];?>">
	<?php mnk::incPackPage($d['pack'][$key],$d['pack-page'][$key]); ?>
</div>

<?php endforeach; ?>