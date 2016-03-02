<?php 
extract($_GET);
$dir = DIR_USER_ROOT."/rocket-v2/params/".$filename;

$json = mnk::load_json($dir,true);

ob_start();
$typeListe = array(0,1,2,3,4,5,"stay","pause","book");
	foreach ($typeListe as $key => $value) {
		foreach ($json['type-'.$value] as $keyElem => $idElem) {
			$valueType = $json["elem"][$idElem];
			$valueType["id"]= $idElem;
			mnk::iview("pack:rocket-v2/model-type-".$value,"",$valueType);
	}
}

$html = ob_get_contents ();

ob_end_clean ();

$jsonReturn = array(
	"html"=>$html,
	"idDraw"=>$json["idDraw"],
	"projectFile"=>$json["projectFile"],
	"projectShare"=>$json["projectShare"],
	"bg"=>$json["bg"]
	);
echo json_encode($jsonReturn);
 ?>