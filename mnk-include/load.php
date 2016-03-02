<?php
    require_once('core/mnk-core.php');
    extract($_GET);
    extract($_POST);

    new mnk;

    
    Controller::loadControl($c);
    $cont = new $c;
    $cont->$m();
?>