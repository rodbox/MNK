<?php

$zip = new ZipArchive;
if ($zip->open('draw.excentrik_2013-05-20_14-20.zip') === TRUE) {
    $zip->extractTo(dirname(__FILE__));
    $zip->close();
    echo 'ok';
} else {
    echo 'échec';
}
?>