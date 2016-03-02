<?php 
require_once('../../mnk-include/core/mnk-core.php');
new mnk();
session_start();
$curPage = $_GET["paginate"]["0"];
$_GET["curPage"] = $curPage;
$byPage = $_GET["paginate"]["1"];
$dataView = explode(",", $_GET["view"]);



mnk::iview("pack:".$dataView[0],$dataView[1],$_GET);
//mnk::iview("pack:".$dataView[0],$dataView[1],$_GET,array("0"=>$curPage,"1"=>$byPage));
?>