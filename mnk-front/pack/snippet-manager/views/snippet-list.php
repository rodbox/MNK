<ul class="snippet-list"><?php foreach ($d as $key => $value): ?>
	<li>
		<?php $url =	mnk::absToWeb($value);?>
		<?php $infos = pathinfo($value); ?>
		
		<a href="<?php echo $url ?>" class="snippet-edit c-dark">
			<?php ui::img("code",12,"000","alpha_4"); ?>
			<?php form::hidden($infos["filename"],"filename");?>
			<?php 
				

			echo $infos["filename"];  ?><span class=" alpha_3">.<?php echo $infos["extension"] ?></span>
		</a>
	</li>
<?php endforeach ?>
</ul>