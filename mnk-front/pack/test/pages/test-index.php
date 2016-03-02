<?php mnk::js(array("pack:test/test")); ?>
	<div class="row-fluid">
		<div class="span12">
	<?php 

// 		$orderList = array(
// 			"1.1.1.1",
// 			"1.1.1.2",
// 			"1.1.1.3",
// 			"1.1.1.4",
// 			"1.1.1.5",
// 			"1.1.2.1",
// 			"1.1.3.2",
// 			"1.1.4.3",
// 			"1.2.1",
// 			"1.2.2",
// 			"1.2.3",
// 			"1.2.4",
// 			"1.2.5",
// 			"1.3.1.1",
// 			"1.3.1.2",
// 			"1.3.1.3"
		
// 		);
// $strMenu ="";
// foreach ($orderList as $key => $value) {
// 	$strMenu  .= "\$menu";
// 	$order = explode(".",$value);

// 	foreach ($order as $keyOrder => $valueOrder) {
// 		$strMenu.="[".$valueOrder."]";
// 	}
// 	$strMenu  .= "='123';";
// }

// $arrayMenu = eval($strMenu);
// mnk::debug($menu);




function pushToKey($strKey,$valueKey,$value,$arrayInput,$childKey="child"){
	$strCode = "\$arrayInput";
	if (preg_match("/./",$strKey)){
		$order = explode(".",$strKey);
		foreach ($order as $key => $val) {
			if($key>0)
				$strCode.="[".$childKey."]";
			$strCode.="[".$val."]";
		}
	}
	else 
		$strCode.="[".$strKey."]";

	$strCode.="[".$valueKey."]";
	$strCode  .= "='".$value."';";
	$strCode .= " return \$arrayInput;";

	return eval($strCode);
}


function pushToKeyLoop($dataList,$arrayInput,$childKey="child"){	
	foreach ($dataList as $key => $value) {
		foreach ($value as $keyData => $valueData) {
			$arrayInput = pushToKey($key,$keyData,$valueData,$arrayInput,$childKey);
		}
	}
	ksort($arrayInput);
	return $arrayInput;
}


// $menu =  pushToKey("1","name",$menu,"name");
// $menu =  pushToKey("1","id",$menu,"id");
// $menu =  pushToKey("4.1.2.4.10","id","id 1",$menu);
// $menu =  pushToKey("1.1","id","id 1.1",$menu);
// $menu =  pushToKey("1.1","name","name 1.1",$menu);



$pushJson = '{
		"2":{
			"id":"id",
			"name":"name"
		},
	"1":{
			"id":"id",
			"name":"name"
		},
	"2":{
			"id":"id",
			"name":"name"
		},
	"3":{
			"id":"id",
			"name":"name"
		},
	"1.1":{
			"id":"id",
			"name":"name"
	},
	"1.1.2.1":{
			"id":"id",
			"name":"name"
	}
}';


$dataPush = array(
	"3.1" => 
		array(
			"id"=>"id",
			"name"=>"name"
		),
	"4" => 
		array(
			"id"=>"id",
			"name"=>"name"
		)
	);


$menu = pushToKeyLoop(json_decode($pushJson));
$menu = pushToKeyLoop($dataPush,$menu);
$menuJson = json_encode($menu);


mnk::debug($menu);

	 ?>
		


		
		</div>
	</div>