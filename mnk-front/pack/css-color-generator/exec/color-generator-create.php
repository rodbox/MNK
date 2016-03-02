<?php 
// extract($_POST);
$file = "color-ui.css";
$svgUI = false;



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

$content .= "\n\n/* ######### SVG SIZE UI ######### */\n\n\n";

	$content .= ".svg-ui \n{\n ";
	$content .= "\tdisplay: inline-block;\n";

	$content .= "}\n";



	$content .= ".t-right \n{\n ";
	$content .= "\ttext-align: right;\n";
	$content .= "}\n";
	$content .= ".t-left \n{\n ";
	$content .= "\ttext-align: left;\n";
	$content .= "}\n";


	$content .= ".f-right \n{\n ";
	$content .= "\tfloat: right;\n";
	$content .= "}\n";
	$content .= ".f-left \n{\n ";
	$content .= "\tfloat: left;\n";
	$content .= "}\n";

foreach ($svgSize as $key => $value) {
	$content .= "\n\n/* ######### Svg container ######### */\n\n\n";
	$content .= ".svg-".$value." \n{\n ";
	$content .= "\t padding: ".ceil($value/3)."px;\n";
	$content .= "\twidth: ".$value."px;\n";
	$content .= "\theight: ".$value."px;\n";
	$content .= "}\n";

	$content .= ".svg-".$value.".padding-1 \n{\n ";
	$content .= "\t padding: ".ceil($value/2)."px;\n";
	$content .= "}\n";

	$content .= ".svg-".$value.".padding-2 \n{\n ";
	$content .= "\t padding: ".$value."px;\n";
	$content .= "}\n";	

	$content .= ".svg-".$value.".padding-3 \n{\n ";
	$content .= "\t padding: ".round($value*2)."px;\n";
	$content .= "}\n";



	$content .= ".svg-".$value." svg\n{\n ";
	$content .= "\twidth: ".$value."px;\n";
	$content .= "\theight: ".$value."px;\n";
	$content .= "}\n";
}

	$content .= ".no-border \n{\n ";
	
	$content .= "\tborder: none !important;\n";
	$content .= "}\n";


	$content .= "\n\n/* ######### Color attributes ######### */\n\n\n";

$content .= ".portlet.box .portlet-body \n{\n ";
$content .= "\tbackground-color: #fff;\n";
$content .= "\tpadding: 0px;\n";
$content .= "}\n";

$content .= ".portlet.box .portlet-title \n{\n ";
$content .= "\tmargin-bottom: 0px;\n";
$content .= "\tpadding: 9px;\n";
$content .= "}\n";

$alphaList = array(1,2,3,4,5,6,7,8,9,95,97);
//$i=0;
foreach ($_POST["color-value"] as $key => $color) {
//$i++;
	$colorValue 	= $color;
	$colorValueRGB 	= hex2rgb($color);
	$colorRef	 	= $key;
	$colorName 		= $_POST["color-name"][$key];



	$content .= "\n\n/* ######### ".$colorName." ######### */\n\n\n";

		$content .= ".c-".$colorName .", \n";
		$content .= ".c-".$key ."\n{\n";
		$content .= "\tcolor : ";
		$content .= $colorValue." !important;";
		$content .= "\n}\n";	



		$content .= ".bg-".$colorName .",\n";
		$content .= ".bg-".$key ." {\n";
		$content .= "\tbackground-color : ";
		$content .= $colorValue." !important;\n";
		$content .= "}\n";

		foreach ($alphaList as $keyAlpha => $alpha) {
			$content .= ".bga-".$alpha."-".$colorName .",\n";
			$content .= ".bga-".$alpha."-".$key ." {\n";
			$content .= "\tbackground-color : ";
			$content .= "rgba(".$colorValueRGB.",0.".$alpha.") !important;\n";
			$content .= "}\n";
		}



		$content .= ".border-".$key .",\n";
		$content .= ".border-".$colorName ." \t{ ";
		$content .= "border : ";
		$content .= "1px solid ".$colorValue." !important;";
		$content .= "}\n";

		$content .= ".border-dashed-".$colorName ." \t{ ";
		$content .= "border : ";
		$content .= "1px dashed ".$colorValue." !important;";
		$content .= "}\n";


		$content .= ".portlet-body.light-".$colorName .", \n";
		$content .= ".portlet.light-".$colorName ." \n";
		$content .= "{\n";

		$content .= "\tbackground-color : ";
		$content .= $colorValue." !important;\n";
		$content .= "}\n";


		$content .= ".portlet.box.".$colorName ." .portlet-title {\n ";
		$content .= "\tbackground-color : ";
		$content .= $colorValue." !important;\n";
		$content .= "}\n";


		$content .= ".fill-".$colorName ." path{\n ";
		$content .= "\tfill : ";
		$content .= $colorValue." !important;\n";
		$content .= "}\n";




		$content .= "\n";
}

	for($i=0.05;$i<=1;$i=$i+0.05){
		$content .= ".alpha_".str_replace("0.","",$i) . " {\n";


	$content .= "\t-ms-filter \t: 'progid:DXImageTransform.Microsoft.Alpha(Opacity=".($i*100).")';\n";
		$content .= "\tfilter \t\t: alpha(opacity=".($i*100)."):\n";
		$content .= "\t-moz-opacity \t: ".$i.";\n";
		$content .= "\t-khtml-opacity \t: ".$i.";\n";
		$content .= "\topacity \t: ".$i.";\n";
		$content .= "}\n";
	}



	for($i=5;$i<=95;$i=$i+5){
		$content .= ".w-".str_replace("0.","",$i) . " {\n";
		$content .= "\twidth \t: ".$i."% !important;\n";
		$content .= "}\n";
	}



/*PADDING*/
	for($i=5;$i<=45;$i=$i+5){
		$content .= ".padding-".str_replace("0.","",$i) . " {\n";
		$content .= "\tpadding \t: ".$i."px !important;\n";
		$content .= "}\n";
	
		$content .= ".padding-left-".str_replace("0.","",$i) . " {\n";
		$content .= "\tpadding-left \t: ".$i."px !important;\n";
		$content .= "}\n";


		$content .= ".padding-right-".str_replace("0.","",$i) . " {\n";
		$content .= "\tpadding-right \t: ".$i."px !important;\n";
		$content .= "}\n";


		$content .= ".padding-top-".str_replace("0.","",$i) . " {\n";
		$content .= "\tpadding-top \t: ".$i."px !important;\n";
		$content .= "}\n";


		$content .= ".padding-bottom-".str_replace("0.","",$i) . " {\n";
		$content .= "\tpadding-bottom \t: ".$i."px !important;\n";
		$content .= "}\n";
}
/* END PADDING*/


/*MARGIN*/
for($i=5;$i<=45;$i=$i+5){
		$content .= "\n";

		$content .= ".margin-".str_replace("0.","",$i) . " {\n";
		$content .= "\tmargin \t: ".$i."px !important;\n";
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
/*ROTATE*/
for($i=45;$i<=360;$i=$i+45){
		

		$content .= ".rotate-".str_replace("0.","",$i) . " {\n";


		$content .= "\t-moz-transform:\t scale(1) rotate(".$i."deg) translateX(0px) translateY(0px) skewX(0deg) skewY(0deg);\n";
		$content .= "\t-webkit-transform:\t scale(1) rotate(".$i."deg) translateX(0px) translateY(0px) skewX(0deg) skewY(0deg);\n";
        $content .= "\t-o-transform:\t scale(1) rotate(".$i."deg) translateX(0px) translateY(0px) skewX(0deg) skewY(0deg);\n";
        $content .= "\t-ms-transform:\t scale(1) rotate(".$i."deg) translateX(0px) translateY(0px) skewX(0deg) skewY(0deg);\n";
        $content .= "\ttransform:\t scale(1) rotate(".$i."deg) translateX(0px) translateY(0px) skewX(0deg) skewY(0deg);\n";
        $content .= "}\n";

		$content .= ".irotate-".str_replace("0.","",$i) . " {\n";


		$content .= "\t-moz-transform:\t scale(1) rotate(-".$i."deg) translateX(0px) translateY(0px) skewX(0deg) skewY(0deg);\n";
		$content .= "\t-webkit-transform:\t scale(1) rotate(-".$i."deg) translateX(0px) translateY(0px) skewX(0deg) skewY(0deg);\n";
        $content .= "\t-o-transform:\t scale(1) rotate(-".$i."deg) translateX(0px) translateY(0px) skewX(0deg) skewY(0deg);\n";
        $content .= "\t-ms-transform:\t scale(1) rotate(-".$i."deg) translateX(0px) translateY(0px) skewX(0deg) skewY(0deg);\n";
        $content .= "\ttransform:\t scale(1) rotate(-".$i."deg) translateX(0px) translateY(0px) skewX(0deg) skewY(0deg);\n";
        $content .= "}\n";
/* END ROTATE*/

	}
$content .= "\n";

// $randomString = str::randomString();
// $tmpDir = DIR_TMP."/".$randomString;
// $tmpWeb = WEB_TMP."/".$randomString;

$tmpDir = DIR_THEME_LIST."/default/css";
$tmpWeb = WEB_THEME_LIST."/default/css";


mnk::debug($_POST);

// mkdir($tmpDir);
// $pathFile = $tmpDir."/".$file;
// file_put_contents($pathFile, $content);
// mnk::ilink("url:".$tmpWeb."/".$file,$file);
 ?>
