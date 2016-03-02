<?php 
extract($_POST);
	$col_coef = 1/$nb_col;
	$line_coef = 1/$nb_line;
if ($fluid_col)
	$file = "grid-".$nb_col."-fluid".".css";
else
	$file = "grid-".$nb_col.".css";

$content = "";
if ($fluid_col){
	$sizeRef = 100;
	$unit	= "%";
	$containerSize = ($pageX*$sizeRef);
	$pageSize	= 100/$pageX;

	$content .= "html {\n ";
	$content .= "\tmin-width \t: 100".$unit.";\n";
	$content .= "\theight \t: 100%;\n";
	$content .= "\tmin-height \t: 100".$unit.";\n";
	$content .= "}\n";	




	$content .= "body {\n";
	$content .= "\theight \t\t: 100".$unit.";\n";
	$content .= "\tmargin \t\t: 0;\n";
	$content .= "\tpadding \t: 0;\n";
	$content .= "\tmin-width \t: 960px;\n";
	$content .= "}\n";


$content .= "\n\n/* ######### align ######### */\n\n\n";
	$content .= ".t-left \t{ ";
	$content .= "text-align : left;";

	$content .= "}\n";

	$content .= ".t-right \t{ ";
	$content .= "text-align : right;";
	$content .= "}\n";

	$content .= ".t-center \t{ ";
	$content .= "text-align : center;";
	$content .= "}\n";


	$content .= "\n";
	$content .= ".v-center \t{ ";
	$content .= "vertical-align : middle;";
	$content .= "}\n";

	$content .= ".v-top \t{ ";
	$content .= "vertical-align : top;";
	$content .= "}\n";

	$content .= ".v-bottom \t{ ";
	$content .= "vertical-align : bottom;";
	$content .= "}\n";
	$content .= "\n";



	$content .= ".f-left \t{ ";
	$content .= "float : left;";
	$content .= "}\n";

	$content .= ".f-right \t{ ";
	$content .= "float : right;";
	$content .= "}\n";

	$content .= ".clear \t\t{ ";
	$content .= "clear   : both;";
	$content .= "}\n";




	$content .= "\n\n/* ######### font ######### */\n\n\n";

	$content .= ".ssmall *, \n";
	$content .= ".small \t{ ";
	$content .= "font-size : 0.8em !important;";
	$content .= "}\n";
$content .= "\n\n";
	$content .= ".sbig *, \n";
	$content .= ".big \t{ ";
	$content .= "font-size : 1.4em !important;";
	$content .= "}\n";
$big_list = array(1.8,2.2,2.6,3,3.4);
foreach ($big_list as $key => $value) {
	$content .= ".sbig_".($key+1)." *,\n ";
	$content .= ".big_".($key+1)." \t{ ";
	$content .= "font-size : ".$value."em !important; ";
	$content .= "}\n";
	# code...
}
$content .= "\n\n\n";

	$content .= ".sinline { ";
	$content .= "display : inline !important;";
	$content .= "}\n";


	$content .= ".sblock { ";
	$content .= "display : block !important;";
	$content .= "}\n";

	$content .= ".sinline-block { ";
	$content .= "display : inline-block !important;";
	$content .= "}\n";

	$content .= ".sinline-table { ";
	$content .= "display : inline-table !important;";
	$content .= "}\n";

	$content .= ".stable { ";
	$content .= "display : table !important;";
	$content .= "}\n";

	$content .= ".stable-cell { ";
	$content .= "display : table-cell !important;";
	$content .= "}\n";



	$content .= ".inline { ";
	$content .= "display : inline";
	$content .= "}\n";


	$content .= ".block { ";
	$content .= "display : block";
	$content .= "}\n";

	$content .= ".inline-block { ";
	$content .= "display : inline-block";
	$content .= "}\n";

	$content .= ".inline-table { ";
	$content .= "display : inline-table";
	$content .= "}\n";

	$content .= ".table { ";
	$content .= "display : table";
	$content .= "}\n";

	$content .= ".table-cell { ";
	$content .= "display : table-cell";
	$content .= "}\n";


$content .= "\n\n\n";

	$content .= ".sstrong *, \n";
	$content .= ".strong \t{ ";
	$content .= "font-weight : bolder !important;";
	$content .= "}\n";

	$content .= ".snormal *, \n";
	$content .= ".normal { ";
	$content .= "font-weight : normal !important;";
	$content .= "}\n";

$content .= "\n\n\n";

$content .= "\n\n/* ######### Size With ######### */\n\n\n";
$widthList = array("1"=>1,"2"=>2,"5"=>5,"10"=>10,"20"=>20,"25"=>25,"33"=>33,"50"=>50,"60"=>60,"75"=>75,"80"=>80,"90"=>90,"100"=>100);


	foreach ($widthList as $key => $value)
		$content .= ".wm-".$value ."\n";


	$content .= "{\n";
	$content .= "\tdisplay : inline-block;\n";
	$content .= "\t-webkit-box-sizing : border-box;\n";
	$content .= "\t-moz-box-sizing\t: border-box;\n";
	$content .= "\tbox-sizing\t: border-box;\n";
	$content .= "}\n";




	foreach ($widthList as $key => $value) {
		$content .= ".w-".$key ." \t{ ";
		$content .= "width : ";
		$content .= $value."%;";
		$content .= "}\n";



		if($value<100){
			$content .= ".w-m".$key." {\n";
			$content .= "\twidth \t\t: calc(".$value."% - ".$marg_grid."px);\n";
			$content .= "\twidth \t\t: -moz-calc(".$value."% - ".$marg_grid."px);\n";
			$content .= "\twidth \t\t: -webkit-calc(".$value."% - ".$marg_grid."px);\n";
			$content .= "\tmargin-right \t: ".$marg_grid."px !important;\n";
			$content .= "\tmargin-bottom \t: ".$marg_grid."px !important;\n";
			$content .= "}\n";
		}
		else{
			$content .= ".wm-".$key ." \t{ ";
			$content .= "width : ";
			$content .= $value."%;";
			$content .= "}\n";
		}
	}
	$content .= "\n\n\n";
	

	$heightList = array(100,125,150,175,200,225,250,275,300);
	foreach ($heightList as $key => $value) {
		$content .= ".h-".$value ." \t{ ";
		$content .= "height : ";
		$content .= $value."px;";
		$content .= "}\n";
	}
$content .= "\n\n\n";

$content .= "\n\n/* ######### Size Box ######### */\n\n\n";

$boxList = array(8,16,24,32,64,96,128,256,512);
		$content .= ".box\n";

		foreach ($boxList as $key => $value) {
			$content .= ".box-".$value ."\n";
		}

		$content .= "{\n";
	    $content .= "\t-webkit-box-sizing : border-box;\n";
	    $content .= "\t-moz-box-sizing\t: border-box;\n";
	    $content .= "\tbox-sizing\t: border-box;\n";
	$content .= "}\n";

	$content .= "\n";
	$boxList = array(8,16,24,32,64,96,128,256,512);
	foreach ($boxList as $key => $value) {
		$content .= ".box-".$value ." \t{\n";
		$content .= "\theight \t: ".$value."px;\n";
		$content .= "\twidth \t: ".$value."px;\n";
		$content .= "}\n";
	}





$content .= "\n\n/* ######### container ######### */\n\n\n";
	$content .= ".container_".$nb_col ." {\n";
	$content .= "\twidth \t\t: ".$containerSize."".$unit.";\n";
	$content .= "\tmin-height \t: 100".$unit.";\n";
	$content .= "}\n";



	// $content .= "\n\n/* ######### Alpha attributes ######### */\n\n\n";
	// $content .= ".page,\n";
	// $content .= ".grid,\n";
	// for($i=1;$i<=$nb_col;$i++){
	// 	$content .= ".grid_".$i .",\n";
	// }










	$content .= "\n\n/* ######### Size Grid Fixed attributes ######### */\n\n\n";
	$content .= ".fixed,\n";
	$content .= ".grid.fixed,\n";
	for($i=0;$i<=$nb_col;$i++){
		$content .= ".grid_".$i .".fixed,\n";
		$content .= ".grid_m".$i .".fixed,\n";
		
	}
 	$content = str::sub($content,2);
 	$content .= " {\n";
	$content .= "\tposition \t: fixed !important;\n";
	$content .= "}\n";



	$content .= ".relative,\n";
	$content .= ".grid.relative,\n";
	for($i=0;$i<=$nb_col;$i++){
		$content .= ".grid_".$i .".relative,\n";
		$content .= ".grid_m".$i .".relative,\n";
		
	}
 	$content = str::sub($content,2);
 	$content .= " {\n";
	$content .= "\tposition \t: relative !important;\n";
	$content .= "}\n";


	$content .= "\n\n/* ######### Size Grid Fixed attributes ######### */\n\n\n";
	$content .= ".absolute\n";
	for($i=0;$i<=$nb_col;$i++){
		$content .= ".grid_".$i .".absolute,\n";
		$content .= ".grid_m".$i .".absolute,\n";
		
	}
 	$content .= " {\n";
	$content .= "\tposition \t: absolute !important;\n";
	$content .= "}\n";


$content .= "\n\n/* ######### Default Grid attributes ######### */\n\n\n";
	$content .= ".grid,\n";
	$content .= ".grid_0,\n";
	for($i=1;$i<=$nb_col;$i++){
		$content .= ".grid_".$i .",\n";
		$content .= ".grid_m".$i .",\n";
		
	}
 	$content = str::sub($content,2);
 	$content .= " {\n";
	$content .= "\tposition \t: relative;\n";
	$content .= "\t-webkit-box-sizing : border-box;\n";
	$content .= "\t-moz-box-sizing\t: border-box;\n";
	$content .= "\tbox-sizing\t: border-box;\n";
	$content .= "}\n";



	$content .= "\n\n/* ######### Size Grid ######### */\n\n\n";


	for($i=1;$i<=$nb_col;$i++){
		$pourcent = $sizeRef*($i*$col_coef)."%";

		// $marg_grid_2 = $marg_grid/2;
		if($i == $nb_col){
			$content .= ".grid_m".$i ." \t{ ";
			$content .= "width : ";
			$content .= $pourcent.";";
			$content .= "}\n";
		}
		else{
			$content .= ".grid_m".$i ." {\n";
			$content .= "\twidth \t\t: calc(".$pourcent." - ".$marg_grid."px);\n";
			$content .= "\twidth \t\t: -moz-calc(".$pourcent." - ".$marg_grid."px);\n";
			$content .= "\twidth \t\t: -webkit-calc(".$pourcent." - ".$marg_grid."px);\n";
			$content .= "\tmargin-right \t: ".$marg_grid."px !important;\n";
			$content .= "\tmargin-bottom \t: ".$marg_grid."px !important;\n";
			// $content .= "\tmargin-left \t: ".$marg_grid_2."px !important;\n";
			$content .= "}\n";
		}
		

		$content .= ".grid_".$i ." \t{ ";
		$content .= "width : ";
		$content .= $pourcent.";";
		$content .= "}\n";
		$content .= "\n";
	}
$content .= "\n\n";

foreach (array("left","right","bottom","top") as $key => $value) {
	$content .= ".marg_grid_".$value." { ";
	$content .= "margin-".$value." \t: ".$marg_grid."px !important; ";
	$content .= "}\n";
}


	$content .= "\n\n/* ######### Size Page ######### */\n\n\n";

	$content .= ".page \t{ ";
	$content .= "width : ";
	$content .= $pageSize.$unit.";";
	$content .= "}\n";
	

	$content .= "\n\n/* ######### Push Space ######### */\n\n\n";

	$content .= ".push,\n";
		$content .= ".to_push  \t{ ";
		$content .= "left : ";
		$content .= "0px;";
		$content .= "}\n\n";
	for($i=1;$i<$nb_col;$i++){
		$content .= ".push_".$i .",\n";
		$content .= ".to_push_".$i ."  \t{ ";
		$content .= "left : ";
		$content .= $sizeRef*($i*$col_coef).$unit.";";
		$content .= "}\n\n";
	}

	$content .= "\n\n/* ######### Pull Space ######### */\n\n\n";

	$content .= ".pull,\n";
		$content .= ".to_pull  \t{ ";
		$content .= "left : ";
		$content .= "0px;";
		$content .= "}\n\n";
	for($i=1;$i<$nb_col;$i++){
		$content .= ".pull_".$i .",\n";
		$content .= ".to_pull_".$i ."  \t{ ";
		$content .= "left : ";
		$content .= "-".$sizeRef*($i*$col_coef).$unit.";";
		$content .= "}\n\n";
	}

	$content .= "\n\n/* ######### Out Space ######### */\n\n\n";

	$content .= ".out,\n";
		$content .= ".to_out  \t{ ";
		$content .= "right : ";
		$content .= "0px;";
		$content .= "}\n\n";
	for($i=1;$i<$nb_col;$i++){
		$content .= ".out_".$i .",\n";
		$content .= ".to_out_".$i ."  \t{ ";
		$content .= "right : ";
		$content .= "-".$sizeRef*($i*$col_coef).$unit.";";
		$content .= "}\n\n";
	}

	$content .= "\n\n/* ######### Line Size ######### */\n\n\n";
	for($i=1;$i<=$nb_line;$i++){

		$content .= ".line_".$i ."  \t{ ";
		$content .= "height : ";
		$content .= $sizeRef*($i*$line_coef).$unit.";";
		$content .= "}\n\n";
	}

	for($i=1;$i<=$nb_line;$i++){

		$content .= ".min-line_".$i ."  \t{ ";
		$content .= "min-height : ";
		$content .= $sizeRef*($i*$line_coef).$unit.";";
		$content .= "}\n\n";
	}


	$content .= "\n\n/* ######### Push top Space ######### */\n\n\n";
	$content .= ".top,\n";
		$content .= ".to_top \t{ ";
		$content .= "top : ";
		$content .= "0px;";
		$content .= "}\n\n";
	for($i=1;$i<=$nb_line;$i++){
		$content .= ".top_".$i .",\n";
		$content .= ".to_top_".$i ."  \t{ ";
		$content .= "top : ";
		$content .= $sizeRef*($i*$line_coef).$unit.";";
		$content .= "}\n\n";
	}


$content .= "\n\n/* ######### Push bottom Space ######### */\n\n\n";
	$content .= ".bottom,\n";
		$content .= ".to_bottom \t{ ";
		$content .= "bottom : ";
		$content .= "0px;";
		$content .= "}\n\n";
	for($i=1;$i<=$nb_line;$i++){
		$content .= ".bottom_".$i .",\n";
		$content .= ".to_bottom_".$i ."  \t{ ";
		$content .= "bottom : ";
		$content .= $sizeRef*($i*$line_coef).$unit.";";
		$content .= "}\n\n";
	}


	$content .= "\n\n/* ######### Z-index ######### */\n\n\n";



$indexList = array("root"=>200,"bg"=>300,"normal"=>500,"overlay"=>600,"max"=>994);

foreach ($indexList as $key => $value) {
	$content .= ".z-".$key." \t{ ";
	$content .= "z-index : ".$value.";";
	$content .= "}\n";
	for($i=1;$i<=5;$i++){

		$content .= ".z-".$key."_".$i ."  \t{ ";
		$content .= "z-index : ".($value+$i).";";
		$content .= "}\n";
	}

	$content .= "\n";
}
	




	$content .= "\n\n/* ######### Other Space ######### */\n\n\n";

	$content .= ".ingrid \t{ ";
	$content .= "padding : ".$pad_col."px;";
	$content .= "}\n";
 

	









}
else{
	$sizeRef = $size_col;
	$unit	= "px";
	for($i=1;$i<=$nb_col;$i++){
		echo $sizeRef*$i.$unit."<br>";
	}
}

$randomString = str::randomString();
$tmpDir = DIR_TMP."/".$randomString;
$tmpWeb = WEB_TMP."/".$randomString;
mkdir($tmpDir);
$pathFile = $tmpDir."/".$file;
file_put_contents($pathFile, $content);
mnk::ilink("url:".$tmpWeb."/".$file,$file);
 ?>
