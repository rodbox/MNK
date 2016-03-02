<?php mnk::js("pack:test/color-convert"); ?>
<?php mnk::css("pack:test/color-convert"); ?>
<h3>hex <span class="small">to</span> RGB</h3>

#<input type="text" id="color-hex" /><br>
<div class="exempleHex colorExemple"></div>
<br>
<span id="toRGB"></span>
<hr>
<h3>RGB <span class="small">to</span> hex</h3>
<div class="result">
	
R : <input class="rgb" id="valR"/><br>
G : <input class="rgb" id="valG"/><br>
B : <input class="rgb" id="valB"/><br>
<div class="exempleRGB colorExemple"></div>
<br>
<span id="toHEX"></span>
</div>