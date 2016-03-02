<?php 
extract($_POST); 
mnk::pack_config("draw");
$svgFolder = DIR_DRAW."/svg";
$pngFolder = DIR_DRAW."/png";

if($type == "svg"){
	file_put_contents($svgFolder."/".$filename.".".$type, $draw);
	msg::success("enristrement ok");
}
else if($type == "png"){
	//file_put_contents($pngFolder."/".$filename.".".$type, $draw);



$unencodedData=base64_decode($draw);
mnk::debug($draw);


$img = str_replace('data:image/'.$type.';base64,', '', $draw);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);

$put = file_put_contents($pngFolder."/".$filename.".".$type , $data);



	msg::success("enristrement ok");
}


	 ?>