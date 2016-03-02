<?php
extract($_POST);
$fileList = DIR_UI."/242424/64px";
$d = file::listDir($fileList);

foreach ($d as $key => $value):?>
<?php 
$file = pathinfo($value);

if(preg_match("/".$find."/",$file['filename'] ,$result )): ?>
<div class="uiResult center">
	<?php ui::img($file['filename'],"32");?><br>
	<span class="small"><?php echo $file['filename'] ?></span> 

	<div class="meta-helper">
		<ul>
			<li><?php echo "ui::img('".$file['filename']."','".$size."', '".$color."')"; ?></li>
			<li><?php 
			$src = WEB_UI."/".$color."/".$size."px/";

			echo "background-image : url('".$src.$file['filename'].".".$file['extension']."');"; ?></li>
		</ul>
	</div>


</div>

	<?php endif; ?>
<?php endforeach;?>
<div class="clear"></div>
