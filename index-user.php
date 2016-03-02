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
            "theme:style",
            "theme:mnk-ui",
            "theme:color-ui",
            // "pack:section/section-grid"

        ));

        theme::favicon();
    

mnk::js(
    array(
        "core:jquery",
        "metro-plugins:jquery-validation/dist/jquery.validate.min",
        "metro-plugins:jquery-ui/jquery-ui-1.10.1.custom.min",
        "core:jquery.mnk-livelink",
        "core:jquery.mnk-liveform",
        "core:jquery.mnk-onepage",
        "core:jquery.mnk-localsearch"
        )
    );

?>
    </head>
  <body id="body-fullscreen" class="fixed-top">
  
  <?php 

  mnk::incPackPage("section","preview");

   ?>


  </body>
  </html>