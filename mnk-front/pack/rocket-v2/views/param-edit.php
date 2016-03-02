<?php 
$i = 1;
foreach ($d as $key => $value):?>
	<?php extract($value);
	$prefix = $key."__";

	 ?>
	<div class="rocket-param-edit elem ui-widget-content rocket-param-<?php echo $nav; ?>" id="<?php echo $prefix; ?>id">
		<h2>
			<div class="rocket-param-hook-to-parent rocket-param-hook"  reldraw="" relelem=""><div class="toggle-next alpha_2"></div></div>
			
			<!-- <div class="mnk-mover"> </div> -->
			<span class="title-param">
			<span class="small"> <?php echo $i ?>.</span><?php echo $key ?>
			</span>
			<div class="rocket-param-hook-to-child rocket-param-hook <?php echo ($req == 0)?"rocket-param-hook-disabled":""; ?>" reldraw="" relelem="">
				<span class="rocket-param-hook-connect">0</span>/<span class="rocket-param-hook-req"><?php echo $req ?></span>
			</div>
		</h2>

		<dl class=" param-edit hide">
				<dt class="toggle-mini-open">view</dt>
				<dd><input name="<?php echo $prefix;?>view" value="<?php echo $view ?>"></dd>
				<dt class="toggle-mini-open">func </dt>
				<dd>
					<textarea name="<?php echo $prefix;?>func" id="" cols="30" rows="10"><?php echo $func ?></textarea>
					</dd>

				<dt class="toggle-mini-open">req</dt>
				<dd><input name="<?php echo $prefix;?>req" value="<?php echo $req ?>"></dd>
				<dt class="toggle-mini-open">param Nav</dt>
				<dd><?php $opt =  array(
					"free"=>"free",
					"sibling"=>"sibling",
					"child"=>"child"
					);
					
					form::select($prefix."paramNav[]",$opt,"",$nav,array("class"=>"rocket-param-navigator")); ?></dd>
				<dt class="toggle-mini-open">param Finder</dt>
				<dd><?php $opt =  array(
					"val"=>"val",
					"key"=>"key",
					"key+val"=>"key+val"
					);
					
					form::select($prefix."paramFinder[]",$opt,"",$nav,array("class"=>"rocket-param-finder")); ?></dd>
				<dt class="toggle-mini-open">target</dt>
				<dd>
					<?php $opt =  array(
					"file"=>"file",
					"this"=>"this"
					);
					
					form::select($prefix."target[]",$opt,"","this",array("class"=>"toggle-next")); ?>
					<input type="text" name="<?php echo $prefix ?>url" class="bg-url ico-16 hide" rel="file" value="http://" />
				</dd>
				
				<dt>data <span class="small">(<?php echo count($params); ?>)</span></dt>
				<dd class="hide">
<ul>
	<?php foreach ($params as $keyP => $valueP): ?>
		<li><?php echo $valueP; ?></li>
	<?php endforeach ?>

</ul>
				</dd>
			
		</dl>
	</div>
	<?php $i++ ?>
<?php endforeach; ?>