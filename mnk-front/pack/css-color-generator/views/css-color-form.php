<?php mnk::css('pack:css-color-generator/css-color-generator'); ?>
<div class="portlet-header">

<?php //mnk::iview("pack:css-color-generator/palette-list","palette-list",$cur); ?>

<?php 
// metro::modalLinkMini("create-palette","plus","Créer une palette","transparent");
// metro::modal("create-palette","Créer une palette","pack:css-color-generator/palette","palette-content"); ?>
</div>




<?php 

  mnk::iview("pack:css-color-generator/palette");

 foreach ($d as $key => $value){

  $title = str_replace(array("palette-",".json"),"",$value);
  $paletteName = array("title"=>$title);
  mnk::iview("pack:css-color-generator/palette","palette-content",$paletteName); 
}
?>




    <script type="text/javascript">
    $(document).ready(function(){
        $("input.color-picker").spectrum({

            color: $(this).val(),
            showInput: true,
            showAlpha: false,
            showPalette: false,
            showInitial: true,
            preferredFormat: "hex",
            showSelectionPalette: false,
            showButtons: false,
            palette: [
            ['000', '#fff',$(this).val()]
            ],
            move 	: function (color){
    	//console.log(color);
    	$(this).attr("rel",color.alpha);
        $(this).val(color);
    }
});







    });
    </script>