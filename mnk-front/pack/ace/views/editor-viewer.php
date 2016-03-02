<?php extract($_POST);  ?>
<div class="editor-viewer">
		<?php 
			$dir = DIR_PACK."/rocket-v2/views/";
			$fileName = str_replace("_", "-", $view)."-".$file.".php";
			$dir .= $fileName;
		?>
	<div class="span-9-10">

		<?php form::iform("pack-exec:rocket-v2/file-viewer-save #live-viewer-save");?>
		<?php form::hidden($view,"view");?>
		<?php form::hidden($file,"file");?>
		<textarea id="my-code-area" name="myCode" rows="35" style="width: 100%; height:95%"><?php 
			if (file_exists($dir))
				echo file_get_contents($dir);
		?></textarea><div class="modal-footer bg-25" style="border-top:0px;"><input type="submit" value ="save" class="bg-33 c-0"></div><?php form::formOut();?></div></div>