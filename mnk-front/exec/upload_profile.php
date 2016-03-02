<?php
$destination    	= DIR_UPLOAD . '/profiles';
$fileTmpName       = "profile_" . $_SESSION['user']['id'] . "_tmp.jpg";

$source = $_FILES['file']['tmp_name'];
$dest = $destination . "/".$fileTmpName;

move_uploaded_file($source, $dest);
?>





<?php

extract($_GET);
// gal_name
// file

extract($_POST);
// x
// y
// w
// h

$thumbW = $thumbH = array(16,32,64,128); // largeur de la vignette
// $thumbH = 32;  // hauteur de la vignette
$thumbRatio = 1; // le ratio du crop

$origSourceW = 0.7; // pourcentage de la largeur de l'image source prise en compte pour le crop
$origSourceH = 0.7; // pourcentage de la hauteur de l'image source prise en compte pour le crop




$i=0;
mnk::mod_load('image');



    $size = getimagesize($dest); // on recupere les dimensions de l'image
    $origW = $size[0];
    $origH = $size[1];

    $imgRatio = round($origW/$origH);


foreach ($thumbW as $key => $value) {
	# code...


    if($imgRatio>=1){ // si format paysage (ratio de l'image > 1)
        $w  = round($origW*$origSourceW);
        $h  = round(($w/$thumbRatio));

        $x  = round(($origW-$w)/2);
        $y  = round(($origH-$h)/2);
    }
    else{
        $h  = round($origH*$origSourceH);
        $w  = round(($h/$thumbRatio));

        $x  = round(($origW-$w)/2);
        $y  = round(($origH-$h)/2);
    }


    $image = new image($dest);

    //$image->resize(50);

    $image->quality(80);
    $image->crop($x,$y);
    $image->width($w);
    $image->height($h);

    $dif    = ($value/$w)*100;
        
    $image->resize ($dif);

   // $image->dir($dirThumb);
  //  echo $image->name("toto".$i.".".$image->ext);
    $image->name("profile_" . $_SESSION['user']['id'] . "_".$value);
    $image->save();
   // copy($dest, $destination."/profile_" . $_SESSION['user']['id'] . "_".$thumbW.".jpg");
    # code...

}


    // $data = array("gal_folder" => $gal_folder, "file" => $value,"cache"=>true,"class"=>"new");
    // mnk::iview("theme:gal/gal_thumbs_list_manage_line","",$data); 











echo '<img src="'.mnk::absToWeb($dest).'" class="profile profile_64"/>';

?>
