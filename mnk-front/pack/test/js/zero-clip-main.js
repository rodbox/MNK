
$(document).ready(function(){

var client = new ZeroClipboard( $("#click-to-copy"), {
              moviePath: 'http://metronic.excentrik.fr/mnk-front/pack/test/img/ZeroClipboard.swf'
} );

client.on( "load", function(client)
{
    $('#flash-loaded').fadeIn();
    // console.log(client);
    // client.clip( document.getElementByClass('onSelectZero') );
    // client.on( "dataRequested", function(client, args) {
    // 	// console.log(arg.text);
    // 	client.setText($(".onSelectZero").html());
    // })
client.on( 'datarequested', function(client) {
          client.setText($(".onSelectZero").html());
        } );
    client.on( "complete", function(client, args) {
    	// console.log(args.text);
    	// alert("Your flash is too old " + args.flashVersion);
    	// console.log(client);
        // client.setText($(".onSelectZero").html());

        $('#copied').html(args.text+" copied !!!").animate({"font-size":"3em"},150,function (){
        	var t = $(this);
        	t.css({"font-size":"1em"});
        });
    } );
} );

$(".list li div").on("click",function(){
	var t = $(this);
	$(".onSelectZero").removeClass("onSelectZero");
	t.addClass("onSelectZero");

})
$(document).on('keydown',function (e){
	var t = $(this);
	$("#click-to-copy").trigger("click")
	console.log(t);

});
$("#click-to-copy").trigger("focusin");
});