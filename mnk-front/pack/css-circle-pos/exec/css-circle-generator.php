<?php 

	extract($_POST);
	// $angle;
	// $pos;
	// $elem;
	// $radius;

	$step = (2*pi())/$elem;

	//$step = (2*Math.PI)/nbElem;
	$angle=($pos*$step)+$angle; 

$file = "circle.css";


$content = "\n\n/* ############### Infos ############### */\n";

$content .= "/* \n";
$content .= "/*  Radius\t : ".$radius."px\n";
$content .= "/*  Elements\t : ".$elem."\n";
$content .= "/*  Size Elements : ".$sizeElem."px\n";
$content .= "/*  Position\t : ".$pos."\n";
$content .= "/*  Angle\t : ".$angle."\n";
$content .= "/* \n";
$content .= "/* ###################################### */\n\n\n";


$content .= "\n\n/* ############### Circle ############### */\n\n\n";
/* les positions */

	for($i=0;$i<=$elem;$i++){
		$content .= ".".$sub."pos_".$i .",\n";
	}
 	$content = str::sub($content,2);
	$content .= " {\n";
	$content .= "\tposition \t: absolute;\n";
	$content .= "}\n";




/* Les marges */
	for($i = 1; $i<=$elem; $i++)
	{
		$content .= ".".$sub."pos_".$i." \n{\n ";
		$content .= "\t margin-top\t: ".ceil($radius*sin($angle))."px;\n";
		$content .= "\t margin-left\t: ".ceil($radius*cos($angle))."px;\n";
		$content .= "}\n";

		$angle+=$step;
	}
$content .= "\n\n/* ###################################### */\n\n\n";
?>

<pre><?php echo $content; ?></pre>