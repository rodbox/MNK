<?php mnk::js('plugins:colorpicker_3/spectrum'); ?>
<?php mnk::css('plugins:colorpicker_3/spectrum'); ?>
<input id="color_fill" type="text" class="basic" value="#242424" />
<input id="color_stroke" type="text" class="basic" value="" />

<style type="text/css">

.full-spectrum .sp-palette {
max-width: 400px;
}
.sp-replacer{ float: left; display: inline;}
.sp-dd { display: none;}
</style>

<script type="text/javascript">
$(document).ready(function(){
$(".basic").spectrum({
    color: $(this).val(),
    showInput: true,
    showAlpha: true,
    showPalette: true,
    showInitial: true,
    preferredFormat: "hex",
    showSelectionPalette: false,
    showButtons: false,
     palette: [
        ['black', 'white', 'blanchedalmond']
    ],
    move 	: function (color){
    	//console.log(color);
    	$(this).attr("rel",color.alpha);
$(this).val(color);
    }
});







});
</script>