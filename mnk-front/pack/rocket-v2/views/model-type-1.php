<?php 
	extract($d); 

	$id 	= (!isset($d["id"]))?"new-type-1":$d["id"];
	$title 	= (!isset($d["title"]))?"":$d["title"];
	$model 	= (!isset($d["id"]))?"rocket-param-model ":"";
	$reldraw 	= (!isset($d["reldraw"]))?"":$d["reldraw"];
	$reldraw_child 		= (!isset($d["reldraw_child"]))?"":$d["reldraw_child"];
	$reldraw_parent 	= (!isset($d["reldraw_parent"]))?"":$d["reldraw_parent"];
	$style 	= (!isset($d["style"]))?"":$d["style"];
	$toggleMe 	= (!isset($d["toggleMe"]))?"":$d["toggleMe"];
	$toggleGroup 	= (!isset($d["toggleGroup"]))?"":$d["toggleGroup"];
	$view_form=(!isset($d["view_form"]))?"":$d["view_form"];
	$view_input=(!isset($d["view_input"]))?"":$d["view_input"];
	$view_menu=(!isset($d["view_menu"]))?"":$d["view_menu"];
	$pointer=(!isset($d["pointer"]))?"":$d["pointer"];
	$jsFile=(!isset($d["js_file"]))?"":$d["js_file"];
	$jsFileDisable=(!isset($d["js_file_disable"]))?"":$d["js_file_disable"];
	$cssFile=(!isset($d["css_file"]))?"":$d["css_file"];
	$cssFileDisable=(!isset($d["css_file_disable"]))?"":$d["css_file_disable"];
	$power=(!isset($d["power"]))?"private":$d["power"];
	$padding=(!isset($d["app_padding"])||$d["app_padding"]=="app-padding")?" checked='checked' ":"";
	$app_class=(!isset($d["app_class"])||$d["app_class"]=="")?"bg-3 sc-4 ":$d["app_class"];
	$app_class_sub=(!isset($d["app_class_sub"])||$d["app_class_sub"]=="")?"bg-3 sc-2 ":$d["app_class"];
	$param = array(
		"id"		=>$id,
		"title"		=>$title,
		"reldraw"	=>$reldraw,
		"reldraw_child"	=>$reldraw_child,
		"reldraw_parent"=>$reldraw_parent,
		"reldraw"	=>$reldraw,
		"style"		=>$style,
		"model"		=>$model,
		"toggleMe"	=>$toggleMe,
		"toggleGroup"=>$toggleGroup,
		"type"		=>1,
		"hookBg"	=>4,
		"typeLink"	=>"func"
		);
	 mnk::iview("pack:rocket-v2/model-type-header","",$param); 
 ?>
	<div class="mnk-tabulator">
		<div class="menu-mini">
			<ul>
				<li><a href="#speed-param-info" class="speed-param-info mnk-tab-link"><?php ui::imgSVG("info"); ?></a></li>
				<li><a href="#pointer-param-info" class="mnk-tab-link"><?php ui::imgSVG("code"); ?></a></li>
				<li><a href="#param-view" class="mnk-tab-link"><?php ui::imgSVG("eye"); ?></a></li>
				<li><a href="<?php echo WEB_ROOT;  ?>" class="php-app-view"><?php ui::imgSVG("globe"); ?></a></li>
				<li class="to-right"><a href="#clone-le" class="clone-me"><?php ui::imgSVG("copy"); ?></a></li>
			</ul>
		</div>
		<div class="toggle-next-target">
			<div class="mnk-tabs-list">
				<div class="speed-param-info mnk-tab">
					<?php form::textIco("type-info","bubble-quote","Info",$helper); ?>
					<?php form::textIco("type-info-submit","checkmark3","Submit",$submit); ?>
					<?php 
						$opt = array("public"=>"public","private"=>"private");
					form::select("type-power",$opt,"",$power); ?>
					<textarea name="type-func" cols="30" rows="20" class="data-func-edit type-func "><?php echo $func;  ?></textarea>
					<?php mnk::ilink("pack-view:ace/editor .modal-code","Edit","",array("rel"=>"function ".$id)); ?>
				</div>
				<div class="pointer-param-info mnk-tab">
					<?php mnk::iview("pack:rocket-v2/pointer-convert","",$pointer); ?>
					<?php mnk::iview("pack:rocket-v2/js-file-viewer","",array("file"=>$jsFile,"file_disable"=>$jsFileDisable)); ?>
					<?php mnk::iview("pack:rocket-v2/css-file-viewer","",array("file"=>$cssFile,"file_disable"=>$cssFileDisable)); ?>
				</div>
				<div class="param-view mnk-tab">
					<?php mnk::iview("pack:rocket-v2/pointer-viewer","",$d); ?>

<hr>

					<input type="checkbox" name="app_padding" <?php echo $padding;  ?>/><label for="app_bg" class="inline">Padding</label>
					<select name="app_bg" id="app_bg">
						<option value="normal">normal</option>
						<option value="sky">sky</option>
						<option value="white">white</option>
						<option value="242424">242424</option>
					</select>

						<table class="table-mini">


							<tbody>
								<tr><td colspan="3"><span class="small">content</span></td></tr>
								<tr>
									
									<td colspan="2"><input type="text" class="for-preview" name="app_class" value="<?php echo $app_class;  ?>" placeholder="content css class"/></td>
									
									<td><div class="preview-color small padding-5 <?php echo $app_class;  ?>">preview</div></td>
								</tr>
								<tr><td colspan="3"><span class="small">submenu</span></td></tr>
								<tr>
									
									<td colspan="2"><input type="text" class="for-preview" name="app_class_sub" value="<?php echo $app_class_sub;  ?>" placeholder="sub menu css class"/></td>
									<td><div class="preview-color small padding-5 <?php echo $app_class_sub;  ?>">preview</div></td>
								</tr>
							</tbody>
						</table>


					

				</div>

			</div>
		</div>
	</div>
</div>