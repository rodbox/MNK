<?php 
	extract($d); 

	$id 	= (!isset($d["id"]))?"new-type-2":$d["id"];
	$title 	= (!isset($d["title"]))?"":$d["title"];
	$model 	= (!isset($d["id"]))?"rocket-param-model ":"";
	$reldraw = (!isset($d["reldraw"]))?"":$d["reldraw"];
	$reldraw_child 		= (!isset($d["reldraw_child"]))?"":$d["reldraw_child"];
	$reldraw_parent 	= (!isset($d["reldraw_parent"]))?"":$d["reldraw_parent"];
	$style 	= (!isset($d["style"]))?"":$d["style"];
	$toggleMe 	= (!isset($d["toggleMe"]))?"":$d["toggleMe"];
	$toggleGroup 	= (!isset($d["toggleGroup"]))?"":$d["toggleGroup"];
	$data 	= (!isset($d["data"]))?array():$d["data"];

	$multiple 	= (!isset($d["multiple"]))?false:$d["multiple"];
	$multiple=($multiple=="true")?true:false;
	
$view_form=(!isset($d["view_form"]))?"":$d["view_form"];
	$view_input=(!isset($d["view_input"]))?"":$d["view_input"];
	$view_menu=(!isset($d["view_menu"]))?"":$d["view_menu"];
	$param = array(
		"id"		=>$id,
		"title"		=>$title,
		"reldraw"	=>$reldraw,
		"reldraw_child"	=>$reldraw_child,
		"reldraw_parent"=>$reldraw_parent,
		"style"		=>$style,
		"model"		=>$model,
		"toggleMe"	=>$toggleMe,
		"toggleGroup"=>$toggleGroup,
		"type"		=>2,
		"hookBg"	=>"",
		"typeLink"	=>"data"
		);
	 mnk::iview("pack:rocket-v2/model-type-header","",$param); 
 ?>
 	<form action="#" class="type-form" >
	<div class="mnk-tabulator">
		<div class="menu-mini">
			<ul>
				<li><a href="#speed-param-info" class="speed-param-info mnk-tab-link"><?php ui::imgSVG("info"); ?></a></li>
				<li><a href="#" class="speed-param-select toggled"><?php ui::imgSVG("cursor"); ?></a></li>
				<li><a href="#" class="speed-param-delete"><?php ui::imgSVG("remove8"); ?></a></li>
				<li><a href="#speed-param" class="speed-param mnk-tab-link"><?php ui::imgSVG("stack-list"); ?></a></li>
				<li><a href="#speed-param-child" class="speed-param-child"><?php ui::imgSVG("share2"); ?></a></li>
				<li><a href="#param-view" class="mnk-tab-link"><?php ui::imgSVG("eye"); ?></a></li>
				<li class="to-right"><a href="#clone-le" class="clone-me"><?php ui::imgSVG("copy"); ?></a></li>
			</ul>
		</div>
		<div class="toggle-next-target">
			<div class="mnk-tabs-list">
				<div class="speed-param mnk-tab">
					<textarea name="data-add" id="" cols="30" rows="5" class="data-speed-add"></textarea>
					<ol class="data">
						<?php foreach ($data as $key => $value): ?>
							<li>
								<?php 
									$inputName = $id."-data[]";
									$idHook = $id."-toChildSingl".$key;
								 ?>
								<input name="<?php echo $inputName ?>" class="speed-data" value="<?php echo $value; ?>"/>
<div id="<?php echo $idHook; ?>" class="rocket-param-hook-to-child-single rocket-param-hook" style="background-color: rgb(75, 141, 248);"/>
							</li>
						<?php endforeach ?>
					</ol>
				</div>
				<div class="speed-param-info mnk-tab">
					<?php form::toggle("multiple","",true,$multiple,"multiple","single","25","28");  ?>
					<span class="child-type"><?php form::toggle("subtype-link","","",true,"sibling","child","5","9") ?></span>
					<?php form::textIco("param-info","bubble-quote","Info",$info); ?>
					<textarea name="" id="" name="param-view" cols="40" rows="3"></textarea>
					<?php mnk::ilink("pack-view:ace/editor .modal-code","Edit"); ?>
				</div>
				<div class="param-view mnk-tab">
					<?php mnk::iview("pack:rocket-v2/pointer-viewer","",$d); ?>
				</div>
			</div>
		</div>
	</div>
	</form>
</div>