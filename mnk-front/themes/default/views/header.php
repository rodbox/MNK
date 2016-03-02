<!DOCTYPE HTML>
<html lang="fr-FR">
    <head>
        <meta charset="UTF-8">
        <title>Metronic</title>
        <?php
        mnk::css(array(
            "metro-plugins:bootstrap/css/bootstrap.min",
           // "metro-plugins:bootstrap/css/bootstrap-responsive.min",
            "metro-plugins:font-awesome/css/font-awesome.min",
            "metro-plugins:uniform/css/uniform.default",
            "pack:pack-manager/pack-manager",
            "pack:uifinder/uifinder",
           
            "pack:snippet-manager/snippet-manager",
            "pack:site-manager/site-manager",
            "pack:toodoo/toodoo",
            "metro:style",
            "metro:themes/default",
            "metro:style-metro",
            //"metro:style-responsive",
            "metro-plugins:font-awesome/css/font-awesome.min",
            "metro-plugins:gritter/css/jquery.gritter",
            "plugins:colorpicker_3/spectrum",
            "theme:style",
            "theme:mnk-ui",
            "theme:color-ui",
            "theme:upload",
            "theme:ui-date-picker",
            "theme:ui-autocomplete",
            "theme:metro-tile",
            "theme:metro-sidebar",
            "theme:metro-header",
            "theme:bootstrap-fix",
            "pack:circle-nav/circle-nav",
            "pack:rocket-v2/rocket-v2"
        ));

        theme::favicon();
  


mnk::js(
    array(
        "core:jquery",
        "metro-plugins:jquery-validation/dist/jquery.validate.min",

        "core:jquery.mnk-livelink",
        "core:jquery.mnk-liveexec",
        "core:jquery.mnk-liveform",
        "core:jquery.mnk-modal",
        "core:jquery.mnk-modalview",
        "core:jquery.mnk-modalcode",
        "core:jquery.mnk-modalregexp",

        "core:jquery.mnk-localsearch",
        "core:jquery.mnk-onepage",
        "core:jquery/jquery.timer",
        "core:jquery/jquery.mousewheel.min",

        "metro-plugins:bootstrap/js/bootstrap.min",
        "metro-plugins:jquery-ui/jquery-ui-1.10.1.custom.min",
        "metro-plugins:gritter/js/jquery.gritter.min",

        "plugins:colorpicker_3/spectrum",

        "pack:pack-manager/pack-manager",
        "pack:site-manager/site-manager",
        "pack:theme-manager/theme-manager",

        "pack:basket-manager/basket-manager",
        "pack:css-grid-generator/css-grid-generator",
        "pack:css-color-generator/css-color-generator",
        "pack:doc/doc",
        "pack:snippet-manager/snippet-manager",
        "pack:toodoo/toodoo",

        "plugins:plupload/js/plupload",
        "plugins:plupload/js/plupload.html5",
        "pack:carret-postion/selection_range",
        "pack:carret-postion/string_splitter",
        "pack:carret-postion/cursor_position",
        "pack:carret-postion/jquery.caretpixelpos",
        "theme:metro",
        "pack:rocket-v2/rocket-v2"

    )
    );
mnk::pack_config("toodoo");
?>
    </head>
  <body id="body-fullscreen" class="fixed-top <?php echo $_SESSION['user']['ui']['sidebar']; ?>">
  <?php  mnk::ilink("pack-exec:user/session-ui #toggle-menu") ?><?php ui::img("menu4",16,"fff"); ?></a>
<div id="document-loader">Chargement</div>
   <!-- BEGIN HEADER -->
   <div class="header navbar navbar-inverse navbar-fixed-top ">
      <!-- BEGIN TOP NAVIGATION BAR -->
      <div class="navbar-inner">
         <div class="container-fluid">
           <span class="alpha_4"><?php mnk::fil("theme:navigation_fil"); ?></span>
            <a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
             <?php ui::img('menu4','16', 'fff'); ?>
            </a>          
            
            <?php mnk::iview("theme:navigation_top"); ?>
            <?php metro::sideRight("toodoo","checkbox","pumpkin","pack:toodoo/toodoo"); ?>
      <!-- END TOP NAVIGATION BAR -->
   </div> </div> </div>

   <!-- END HEADER -->
   <!-- BEGIN CONTAINER -->   
   <div class="page-container row-fluid sidebar-closed">
      <!-- BEGIN SIDEBAR -->
<?php mnk::iview("theme:side_bar"); ?>
      <!-- END SIDEBAR -->
      <!-- BEGIN PAGE -->
      <div class="page-content">
        <div class="arrow-down-pumpkin"></div>
         <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
 <?php mnk::iview("theme:portlet"); ?>        
         </div>
         <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->
            <div class="row-fluid"><?php    

metro::modal("pack-creator","Créer un pack","pack:pack-manager/pack-creator"); 
metro::modal("dico","Favoris","pack:dico/add-dico"); 
metro::modal("pack-file-creator","Créer un fichier de pack","pack:pack-manager/pack-file-creator","pack-list"); 
 ?>
               <!-- <div class="span12">
                  <h1>Dashboard</h1>
                
               </div> -->
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN CHART PORTLETS-->
            <div class="row-fluid">
                  
                <?php mnk::title("root","root-index"); ?>
                <div class="page-content-page">


           