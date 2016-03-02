<div class="span4">
	<div class="ingrid">
	<button id="new-tool">new</button>
	</div>
	<ul class="tools-list">
	<?php foreach($d as $key => $val): ?>
	<li>
		<?php 
		$file = basename($val);
		$url = WEB_USER_ROOT."/rocket-v2/tools/".$file; 
		
		 ?>
		<a href="<?php echo $url; ?>" class="load-tool"><?php echo $file; ?></a>
	</li>
	<?php endforeach; ?>
	</ul>
</div>
<div class="span8">
<?php form::iform("pack-exec:rocket-v2/save-tools #save-tools");?>


<?php 
form::text("title","title");
form::text("ico","ico");
form::text("id","id");
form::toggle("toggle","toggle");
 ?>

<dd>click</dd>
<dt>
	<textarea name="tools-click" class="code-editor"></textarea>
</dt>
<dd>mousedown</dd>
<dt>
	<textarea name="tools-mousedown" class="code-editor"></textarea>
</dt>
<dd>mouseup</dd>
<dt>
	<textarea name="tools-mouseup" class="code-editor"></textarea>
</dt>
<dd>keyup</dd>
<dt>
	<textarea name="tools-keyup" class="code-editor"></textarea>
</dt>
<dd>keydown</dd>
<dt>
	<textarea name="tools-keydown" class="code-editor"></textarea>
</dt>
 




<?php form::submit("name","save");?>

<?php form::formOut();?></div>