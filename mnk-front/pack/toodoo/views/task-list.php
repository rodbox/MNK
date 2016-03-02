<?php mnk::iview("pack:toodoo/task-menu"); ?>
<?php form::iform("pack-exec:toodoo/task-list-upd #task-list-upd");?>
<ul class="body task-sortable">
	<?php $i=0; ?>
	<?php foreach ($d["task"] as $key => $value): ?>
	<?php extract($value); ?>
	<li class="<?php echo ($check==true)?"check":"" ?>">
		<?php form::hidden($i++,"pos[]");?>
		<span class="small block"><?php echo $date; ?></span>
		<?php 
$reg = "[http:\/\/[a-z0-9\.\-]{1,}\.[a-z]{1,}[\?\=\&\/\-a-z]{0,}]";
		$content = preg_replace($reg,"<a href='$0'>$0</a>", $content);
//preg_match_all($reg, $content, $content);


//mnk::debug($content);

 ?>
		<?php echo $content; ?>
	</li>
	<?php endforeach ?>
	
</ul>
<?php form::formOut();?>