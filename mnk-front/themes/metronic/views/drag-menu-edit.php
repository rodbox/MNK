<?php extract($d); ?>

<li class="dd-item dd3-item" data-id="<?php echo $i ?>">
	<div class="dd-handle dd3-handle">
	</div>
	<div class="dd3-content">
		<a href="#" class="bt-toggle-meta-page">
			<span class="small pack-title"><?php echo  $pack; ?></span><br/>
			<span class="pack-page-title"><?php echo  $title; ?></span>
		</a>
		<a class="bt-del" href="#">x</a>
		<div class="toggle-meta-page">
			
			<?php 
			$bgi = "background-image : url('http://betty.excentrik.fr/mnk-include/core/img/ui/242424/16px/file9.png');";

			form::text("icon[]","icon"	,$icon 		, array("class"=>"ui-icon-completion","style"=>$bgi)); ?><br>
			<?php form::text("pack[]","pack"	,$pack 		, array("class"=>"title-pack")); ?><br>
			<?php form::text("page[]","page"	,$page 	, array("class"=>"page-file")); ?><br>
			<?php form::text("title[]","title"	,$title 	, array("class"=>"title-link")); ?>
		</div>
	</div>

	<?php if (array_key_exists("child", $d)&&$d["child"]!=""): ?>
	    <ol class="dd-list">
        <?php metro::iview("pack:root/menu-tree","",$d["child"]); ?>
    </ol>
	<?php endif ?>


</li>