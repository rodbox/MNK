<?php 
mnk::css("pack:uifinder/uifinder");
$file = "home12.svg";
$folder = "/mnk-include/core/img/svg/".$file;
$dirW = WEB_ROOT.$folder ;
$dirD = DIR_ROOT.$folder ;

//echo file_exists($dir); ?>

<h2>img</h2>
<img src="<?php echo $dirW; ?>" width="32" height="32" style = "color:#444444"/>
<br><br>

<h2>by BG</h2>
<div class="ico  bg-5" style="background-image: url('http://metronic.excentrik.fr/mnk-include/core/img/svg/earth.svg')  !important;"></div>
<h2>by svg</h2>
<?php 
$size = array(8,12,16,32,48,64,128,256,512);
rsort($size);
$i = 18;
foreach ($size as $key => $value) {

	echo '<div class="svg-style svg-'.$value.' fill-'.$i.' alpha_5" >';
    echo file_get_contents($dirD);
    echo "</div>";
$i++;
}
       ?>
