 <ul id="pack-page-list" class="no-collapse">
 	<?php foreach ($d as $key => $value): ?>
 	<li class=" margin-bottom-15">
 		<ol class="dd-list">
 			<?php foreach ($value as $keyPage => $valuePage): 

 			$filename = file::filename($valuePage); 
 			$send = array(
 				"icon"		=>"file",
 				"pack"		=>$key,
 				"page"		=>	$filename,
 				"title"		=>$filename
 				);
 				mnk::iview("metro:drag-menu-edit","",$send);
 			endforeach 
 			?>
 	</ol>
 <?php endforeach ?>
</ul>