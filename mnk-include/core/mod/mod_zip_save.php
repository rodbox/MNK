<?php

class zip_save extends mnk {

    function zip_save($src_dir,$dest_zip_file) {

      
        $list = file::file_list($src_dir);

		$zipFile=$dest_zip_file."/save_".date("Y-m-d_G-i").".zip";

        $zip = new ZipArchive();
        $zip->open($zipFile, ZipArchive::CREATE);
mnk::debug($list);
  foreach ($list as $key => $val) {
 		if(is_array($val) && $key != "img"){
 				$zip->addEmptyDir($src_dir."/".$val,$val);
 				foreach ($val as $keyDir => $valueDir) {
 					$zip->addFile($src_dir."/".$key."/".$val,$key."/".$val);
 					# code...
 				}
 			}
 		else
			$zip->addFile($src_dir."/".$val,$val);
   //      	 $zip->addFile($src_dir."/".$list[$key],$list[$key]);
   //      	//echo $src_dir."/".$val.'<br>';
			// //$zip->addFile($src_dir."/".$val,$val);
 }
        $zip->close();

        // 

//         if ($zip->open($zipFile, ZipArchive::CREATE) == TRUE) {
//                 
//                 $zip->close();


// //             $file_url = mnk::absToWeb($zipFile);
// // msg::success("Sauvegarde effectuée");
// // mnk::ilink("url:".$file_url, basename($zipFile));
                
//             } else {
//                 msg::alert("Problème");
//                 // Traitement des erreurs avec un switch(), par exemple.
//             }

        echo file_exists($zipFile);
    }



function extractTo($zipFile,$dest){
  $zip = new ZipArchive;
if ($zip->open($zipFile) === TRUE) {
    $zip->extractTo($dest);
    $zip->close();
    echo 'ok';
} else {
    echo 'échec';
}
}

}
?> 
