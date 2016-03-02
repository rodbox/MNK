<li>
<div class="section <?php echo $d['class'];?>" id="<?php echo $d['id']; ?>" style="<?php echo $d['style'];?>">
	<a href="#" class="del float-right bg-24"><?php ui::img("close2",16,"fff"); ?></a>
		<div class="section-id"><?php echo  $d['id']; ?></div>
		<div class="section-body">
			<div class="section-title"><?php echo  $d['title']; ?></div>
			<div class="pack-link"><span class="pack"><?php echo  $d['pack']; ?></span>/<span class="pack-page"><?php echo  $d['pack-page']; ?></span>	</div>
			<input type="hidden" value="<?php echo  $d['id']; ?>" class="sid" name="id[]">
			<input type="hidden" value="<?php echo  $d['style']; ?>" class="sstyle" name="style[]">
			<input type="hidden" value="<?php echo  $d['class']; ?>" class="sclass" name="class[]">
			<input type="hidden" value="<?php echo  $d['title']; ?>" class="stitle" name="title[]">
			<input type="hidden" value="<?php echo  $d['pack']; ?>" class="spack" name="pack[]">
			<input type="hidden" value="<?php echo  $d['pack-page']; ?>" class="spack-page" name="pack-page[]">
		</div>	</div>
</li>