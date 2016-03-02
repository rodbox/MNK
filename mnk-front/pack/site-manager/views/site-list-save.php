<ul class="site-list">
	<?php foreach ($d as $key => $value):?>
	<li>
	<?php $site = basename($value); ?>

	<?php ui::img("arrow-right2",16,"242424",array("class"=>"alpha_2")); ?> 
	<a href="http://<?php echo $site; ?>.fr">
		<?php echo $site; ?>
	</a>
	<?php mnk::ilink("pack-exec:site-manager/site-save","",array("site"=>$site),array("class"=>"onLive btn mini")); ?>
	<?php ui::img("file-zip",12,"fff"); ?>
	save
	</a>
<?php mnk::ilink("pack-page:site-manager/site-explorer .explorer",ui::rimg("folder8"),array("site"=>$site)); ?>



	<?php mnk::iview("pack:site-manager/site-save-list","site-save-list",array("site"=>$site)); ?>



	</li>
<?php endforeach; ?>
</ul>