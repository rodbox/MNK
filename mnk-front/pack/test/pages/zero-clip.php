<?php 
mnk::js("pack:test/zero-clip");
mnk::css("pack:test/test");
mnk::js("pack:test/zero-clip-main");

// echo WEB_PACK."/test/img/ZeroClipboard.swf";
 ?>
<div class="row-fluid">
	<div class="span4"><h2>click my list</h2><ul class="list">
	<li><div data-clipboard-text="toto">toto</div></li>
	<li><div data-clipboard-text="tata">tata</div></li>
	<li><div data-clipboard-text="lorem">Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam quis risus eget urna mollis ornare vel eu leo.</div></li>
	<li><div data-clipboard-text="ipsum">ipsum</div></li>
	<li><div data-clipboard-text="whouatttt">whouatttt</div></li>
</ul></div>
	<div class="span4"><h2>paste my clip</h2>
 <textarea name="" id="" style="width:100%; min-height:650px; "></textarea></div>
	<div class="span4">
	<h2>msg</h2>
		<span id="copied">copied !!!</span>	</div>
</div>

<div class="row-fluid">
	<div class="span12">
	<button id="click-to-copy" class="copy-button">Copy</button>  <span id="flash-loaded" style="display: none;">loaded</span>
	</div>
</div>


<!-- <input type="text" id="test" value="wouatttttt"><br> -->
<br>

<!-- <button id="alt" class="copy-button">alt</button> -->
