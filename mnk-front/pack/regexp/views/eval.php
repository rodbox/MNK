<div class="span3">
<input type="text" id="my-regexp-area" value="<?php echo $_POST["reg"];  ?>"/>
</div>
<div class="span9">
	<textarea name="" id="my-regexp-test" cols="30" rows="3"></textarea>
	<ul id="regexp-test-result">
		<li>raimoundo@sanchez.pr</li>
		<li>simon.bouatte@toto.fr</li>
		<li>gustave_palace@toto.fr</li>
		<li>gustave_palace_125@toto.fr</li>
		<li>Sed posuere consectetur est at lobortis.</li>
		<li>425478</li>
		<li>1995,45</li>
		<li>2145.675</li>
		<li>http://www.google.com</li>
		<li>yahoo.fr</li>
		<li>function toto(){}</li>
		<li>function testmoi($param1,$param2){}</li>
		<li>[0[01[012[0123]]][02[021][022]]]</li>
	</ul>
</div>
<?php mnk::css("pack:regexp/regexp"); ?>
<?php mnk::js("pack:regexp/regexp"); ?>