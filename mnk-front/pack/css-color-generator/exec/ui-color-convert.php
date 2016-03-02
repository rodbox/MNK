<?php 
	extract($_POST);

	if (!empty($icon)&&!empty($suffix)&&!empty($color)){
		$iconList = explode(" ", $icon);


		foreach ($iconList as $key => $iconSingle) {
			$src = DIR_UI_SVG."/".$iconSingle.".svg";
			$dest = DIR_UI_SVG."/".$iconSingle."-".$suffix.".svg";
			$webDest = WEB_UI_SVG."/".$iconSingle."-".$suffix.".svg";

			if($xml = simplexml_load_file($src)){
				$xml->attributes()->fill = $color;

				if($xml->asXML($dest))
					echo $iconSingle."-".$suffix."<br>";

			}
			else
				echo "!!! => ".$iconSingle ." <= !!!";

		// echo "<img src='".$webDest."'/>";


		}
	}
	else
		echo "remplir tout les champs";
?>
