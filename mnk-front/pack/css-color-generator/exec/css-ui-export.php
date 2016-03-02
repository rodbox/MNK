<?php 

$file = "color-ui.css";
$colorList = mnk::load_json(DIR_USER."/0/css-color-generator/palette-".$_GET["title"].".json",true);


function hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   return implode(",", $rgb); // returns the rgb values separated by commas
   // return $rgb; // returns an array with the rgb values
}





$svgSize = array(12,16,24,32,48,64,96,128,256);
$alphaList = array(1,2,3,4,5,6,7,8,9,95,97);

$i=0;

$content .= "\n\n/* ######### COLORS ######### \n\n";
$content .= "----------------------------- \n";

$content .= "ALPHA BG list \n";
$content .= implode($alphaList," ")."\n";
$content .= "----------------------------- \n\n";
foreach ($colorList["palette"]["name"] as $key => $color) {

	$content .= $i."\t".$key;
		$count = strlen($key);
	$content .=($count<8)?"\t\t":"\t";
	$content .= $color;
	


	$content .= "\t\t";
	$content .= hex2rgb($color)."\n";

	$i++;
}
$content .= "\n######### END COLORS ######### */\n\n\n";



$content .= "\n\n/* ######### SVG SIZE UI ######### */\n\n\n";

	$content .= ".svg-ui \n{\n ";
	$content .= "\tdisplay\t: inline-block;\n";

	$content .= "}\n";



	$content .= ".t-right \n{\n ";
	$content .= "\ttext-align : right;\n";
	$content .= "}\n";

	$content .= ".f-right \n{\n ";
	$content .= "\tfloat\t: right;\n";
	$content .= "}\n";	

	$content .= ".t-left \n{\n ";
	$content .= "\ttext-align : left;\n";
	$content .= "}\n";

	$content .= ".f-left \n{\n ";
	$content .= "\tfloat\t: left;\n";
	$content .= "}\n";




$content .= ".v-center \n{\n ";
$content .= "\tvertical-align\t: middle;\n";
$content .= "}\n";

$content .= ".overflow-hidden \n{\n ";
$content .= "\toverflow\t: hidden;\n";
$content .= "}\n";

$content .= ".overflow-y-auto \n{\n ";
$content .= "\ttoverflow-y\t: auto;\n";
$content .= "}\n";

$content .= ".none \n{\n ";
$content .= "\display\t: none;\n";
$content .= "}\n";


// 	$content .= "\n\n/* ######### Svg container ######### */\n\n\n";
// foreach ($svgSize as $key => $value) {

// 	$content .= ".svg-".$value." \n{\n ";
// 	$content .= "\tpadding\t: ".ceil($value/3)."px;\n";
// 	$content .= "\twidth\t: ".$value."px;\n";
// 	$content .= "\theight\t: ".$value."px;\n";
// 	$content .= "}\n";

// 	$content .= ".svg-".$value.".padding-1 \n{\n ";
// 	$content .= "\tpadding\t: ".ceil($value/2)."px;\n";
// 	$content .= "}\n";

// 	$content .= ".svg-".$value.".padding-2 \n{\n ";
// 	$content .= "\tpadding\t: ".$value."px;\n";
// 	$content .= "}\n";	

// 	$content .= ".svg-".$value.".padding-3 \n{\n ";
// 	$content .= "\tpadding\t: ".round($value*2)."px;\n";
// 	$content .= "}\n";



// 	$content .= ".svg-".$value." svg\n{\n ";
// 	$content .= "\twidth\t: ".$value."px;\n";
// 	$content .= "\theight\t: ".$value."px;\n";
// 	$content .= "}\n";
// }

	$content .= ".no-border \n{\n ";
	
	$content .= "\tborder\t: none !important;\n";
	$content .= "}\n";


	$content .= "\n\n/* ######### Color attributes ######### */\n\n\n";

$content .= ".portlet.box .portlet-body \n{\n ";
$content .= "\tbackground-color\t: #fff;\n";
$content .= "\tpadding\t: 0px;\n";
$content .= "}\n";

$content .= ".portlet.box .portlet-title \n{\n ";
$content .= "\tmargin-bottom\t: 0px;\n";
$content .= "\tpadding\t: 9px;\n";
$content .= "}\n";




/* Border */
$borderType = array("solid","dashed");
foreach ($borderType as $Bkey => $Bvalue) {
	$content .= ".border-".$Bvalue ." \t{ ";
	$content .= "border-type \t: ";
	$content .= $Bvalue." !important;";
	$content .= "}\n";
}


$content .= "\n";

$borderSens = array("top","left","right","bottom");
$borderSize = array(1,2,3,4);

foreach ($borderSens as $Bkey => $Bvalue) {
	foreach ($borderSize as $Skey => $Svalue) {
		$content .= ".border-".$Bvalue ."-".$Svalue." \t{ ";
		$content .= "border-".$Bvalue." \t: ";
		$content .= $Svalue."px !important;";
		$content .= "}\n";
	}
}


$i=0;
foreach ($colorList["palette"]["name"] as $key => $color) {

	
	$colorRef	 	= $i;
	$colorName 		= $key;
	$colorValue 	= ($colorName!="transparent")?$color:"rgba(0,0,0,0)";
	$colorValueRGB 	= hex2rgb($color);
$i++;


	$content .= "\n\n/* ######### ".$colorName." ######### */\n\n\n";

		$content .= ".c-".$colorName .", \n";
		$content .= ".c-".$colorRef .", \n";
		$content .= ".sc-".$colorRef ." *\n{\n";
		$content .= "\tcolor \t: ";
		$content .= $colorValue." !important;";
		$content .= "\n}\n";	



		$content .= ".bg-".$colorName .",\n";
		$content .= ".bg-".$colorRef .",\n";
		$content .= ".sbg-".$colorRef ." *{\n";
		$content .= "\tbackground-color \t: ";
		$content .= $colorValue." !important;\n";
		$content .= "}\n";


		foreach ($alphaList as $keyAlpha => $alpha) {
			$content .= ".bga-".$colorName."-".$alpha.",\n";
			$content .= ".bga-".$colorRef."-".$alpha." { \n";
			$content .= "\tbackground-color : ";
			$content .= "rgba(".$colorValueRGB.",0.".$alpha.") !important;\n";
			$content .= "}\n";
		}




		$content .= ".border-".$colorRef .",\n";
		$content .= ".border-".$colorName ." \t{ ";
		$content .= "border-color \t: ";
		$content .= $colorValue." !important;";
		$content .= "}\n";




		$content .= ".portlet-body.light-".$colorRef .",\n";
		$content .= ".portlet-body.light-".$colorName .", \n";
		$content .= ".portlet.light-".$colorName ." \n";
		$content .= "{\n";

		$content .= "\tbackground-color \t: ";
		$content .= $colorValue." !important;\n";
		$content .= "}\n";


		$content .= ".portlet.box.portlet-".$colorRef ." .portlet-title ,\n ";
		$content .= ".portlet.box.portlet-".$colorName ." .portlet-title {\n ";
		$content .= "\tbackground-color \t: ";
		$content .= $colorValue." !important;\n";
		$content .= "}\n";


		$content .= ".fill-".$colorRef ." path,\n";
		$content .= ".fill-".$colorName ." path{\n ";
		$content .= "\tfill \t: ";
		$content .= $colorValue." !important;\n";
		$content .= "}\n";




		$content .= "\n";
}

/* ALPHA */
	for($i=0.05;$i<=1;$i=$i+0.05){
		$content .= ".alpha_".str_replace("0.","",$i) . ",\n";
		$content .= ".alpha_hover_".str_replace("0.","",$i) . ":hover {\n";


	$content .= "\t-ms-filter \t: 'progid\t:DXImageTransform.Microsoft.Alpha(Opacity=".($i*100).")';\n";
		$content .= "\tfilter \t: alpha(opacity=".($i*100).")\t:\n";
		$content .= "\t-moz-opacity \t\t: ".$i.";\n";
		$content .= "\t-khtml-opacity \t\t: ".$i.";\n";
		$content .= "\topacity \t\t: ".$i.";\n";
		$content .= "}\n";
	}

	$content .= ".alpha_hover\t:hover {\n";
	$content .= "\t-ms-filter \t: 'progid\t:DXImageTransform.Microsoft.Alpha(Opacity=100)';\n";
		$content .= "\tfilter \t: alpha(opacity=100)\t:\n";
		$content .= "\t-moz-opacity \t: 1;\n";
		$content .= "\t-khtml-opacity \t: 1;\n";
		$content .= "\topacity \t: 1;\n";
		$content .= "}\n";


/* END ALPHA*/

	for($i=5;$i<=100;$i=$i+5){
		$content .= ".w-".str_replace("0.","",$i) . " {\n";
		$content .= "\twidth \t\t: ".$i."% !important;\n";
		$content .= "}\n";
	}



/*PADDING*/
	for($i=0;$i<=55;$i=$i+5){
		$content .= ".padding-".str_replace("0.","",$i) . " {\n";
		$content .= "\tpadding \t\t: ".$i."px !important;\n";
		$content .= "}\n";
	
		$content .= ".padding-left-".str_replace("0.","",$i) . " {\n";
		$content .= "\tpadding-left \t\t: ".$i."px !important;\n";
		$content .= "}\n";


		$content .= ".padding-right-".str_replace("0.","",$i) . " {\n";
		$content .= "\tpadding-right \t\t: ".$i."px !important;\n";
		$content .= "}\n";


		$content .= ".padding-top-".str_replace("0.","",$i) . " {\n";
		$content .= "\tpadding-top \t\t: ".$i."px !important;\n";
		$content .= "}\n";


		$content .= ".padding-bottom-".str_replace("0.","",$i) . " {\n";
		$content .= "\tpadding-bottom \t\t: ".$i."px !important;\n";
		$content .= "}\n";
}
/* END PADDING*/


/*MARGIN*/
for($i=0;$i<=55;$i=$i+5){
		$content .= "\n";

		$content .= ".margin-".str_replace("0.","",$i) . " {\n";
		$content .= "\tmargin \t\t: ".$i."px !important;\n";
		$content .= "}\n";
	
		$content .= ".margin-left-".str_replace("0.","",$i) . " {\n";
		$content .= "\tmargin-left \t: ".$i."px !important;\n";
		$content .= "}\n";


		$content .= ".margin-right-".str_replace("0.","",$i) . " {\n";
		$content .= "\tmargin-right \t: ".$i."px !important;\n";
		$content .= "}\n";


		$content .= ".margin-top-".str_replace("0.","",$i) . " {\n";
		$content .= "\tmargin-top \t: ".$i."px !important;\n";
		$content .= "}\n";


		$content .= ".margin-bottom-".str_replace("0.","",$i) . " {\n";
		$content .= "\tmargin-bottom \t: ".$i."px !important;\n";
		$content .= "}\n";
/* END MARGIN*/

	}

$content .= "\n";


/* SHADOW */
$shadowList = array(50,100,150,250,350,450);
foreach ($shadowList as $key => $value) {
	$content .= ".inset-shadow-".$value . " {\n";
	$content .= "\t -webkit-box-shadow \t: inset 0 0 ".$value."px 0 rgba(0,0,0,0.7);\n";
	$content .= "\t box-shadow \t: inset 0 0 ".$value."px 0 rgba(0,0,0,0.7);\n";
	$content .= "}\n";
}


$content .= "\n";

$content .= ".no-decoration {\n";
	$content .= "\t text-decoration\t: none;\n";
$content .= "}\n";
$content .= "\n";

$content .= ".no-shadow {\n";
	$content .= "\t -webkit-box-shadow \t: none !important;\n";
	$content .= "\t box-shadow \t: none !important;\n";
$content .= "}\n";


$content .= ".box-size {\n";
$content .= "\t  -webkit-box-sizing\t: border-box;\n";
$content .= "\t -moz-box-sizing \t: border-box;\n";
$content .= "\t box-sizing \t: border-box;\n";
$content .= "}\n";

$content .= "\n";



/*ROTATE*/
for($i=45;$i<=360;$i=$i+45){
		

		$content .= ".rotate-".str_replace("0.","",$i) . " {\n";


		$content .= "\t-moz-transform:\t rotate(".$i."deg);\n";
		$content .= "\t-webkit-transform:\t rotate(".$i."deg);\n";
        $content .= "\t-o-transform:\t rotate(".$i."deg);\n";
        $content .= "\t-ms-transform:\t rotate(".$i."deg);\n";
        $content .= "\ttransform:\t rotate(".$i."deg);\n";
        $content .= "}\n";

		$content .= ".irotate-".str_replace("0.","",$i) . " {\n";


		$content .= "\t-moz-transform:\t rotate(-".$i."deg);\n";
		$content .= "\t-webkit-transform:\t rotate(-".$i."deg);\n";
        $content .= "\t-o-transform:\t rotate(-".$i."deg);\n";
        $content .= "\t-ms-transform:\t rotate(-".$i."deg);\n";
        $content .= "\ttransform:\t rotate(-".$i."deg);\n";
        $content .= "}\n";
/* END ROTATE*/

	}
$content .= "\n";

// $randomString = str::randomString();
// $tmpDir = DIR_TMP."/".$randomString;
// $tmpWeb = WEB_TMP."/".$randomString;

$tmpDir = DIR_THEME_LIST."/default/css";
$tmpWeb = WEB_THEME_LIST."/default/css";

echo "<pre>".$content."</pre>";


// mkdir($tmpDir);
// $pathFile = $tmpDir."/".$file;
// file_put_contents($pathFile, $content);
// mnk::ilink("url:".$tmpWeb."/".$file,$file);
 ?>
