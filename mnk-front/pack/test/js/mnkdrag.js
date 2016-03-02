(function($)
{
    $.fn.mnkDrag=function(paramSend)
    {

      var defauts=
           {
           	onMove 	: false,
            param   : "",
            mousedown : [],
            mouseDif : [],
            posOrigin : []
           };  


      var param=$.extend(defauts, paramSend);

     $(document).on('mousedown',this.selector,function(e){
     	param.onMove  = true;
     	param.mousedown = [e.clientX,e.clientY]
        posOriginElem();

     })

     $(document).on('mouseup',function(e){
     	param.onMove  = false;
        param.posOrigin = [];
        
     })

     $(document).on('mousemove',function(e){
     	if (param.onMove){
     	    var difX = e.clientX-param.mousedown[0];
     	    var difY = e.clientY-param.mousedown[1];
     	    param.mouseDif = [difX,difY];
            console.log(e);
     	    // console.log(param.mouseDif);
     	    moveElem ()
     	}
     })


     function posOriginElem(){
        $.each($(".onSelectDrag"), function(index, val) {
             var t = $(this);
             param.posOrigin[index] = t.offset();
        });
     }

     function moveElem (){
     	$.each($(".onSelectDrag"), function(index, val) {
             var t = $(this);
             t.css({
                left    :  param.posOrigin[index].left+param.mouseDif[0],
                top     :  param.posOrigin[index].top+param.mouseDif[1]
             })
        });
     }
   
 
}})(jQuery);
$(document).ready(function() {




    $( document )
        .on("dragstart",function( ev, dd ){
            return $('<div class="selection" />')
                .css('opacity', .65 )
                .appendTo( document.body );
        })
        .on("drag",function( ev, dd ){
            $( dd.proxy ).css({
                top: Math.min( ev.pageY, dd.startY ),
                left: Math.min( ev.pageX, dd.startX ),
                height: Math.abs( ev.pageY - dd.startY ),
                width: Math.abs( ev.pageX - dd.startX )
            });
        })
        .on("dragend",function( ev, dd ){
            console.log("drag end");
            $(".dropped").toggleClass("active")
            $( dd.proxy ).remove();
        });
    $(document)
        .on("dropstart",".elem",function(){
         $( this ).addClass("active");
         console.log("start");
      })
      .on("drop",".elem",function( ev, dd ){
         $( this ).toggleClass("dropped");
         console.log("drop");
      })
      .on("dropend",".elem",function(){
         $( this ).removeClass("active");
         console.log("drop end");
      });
    $.drop({ multi: true });


$("#addTest").on('click',function (){
    var t = $(this);
    var div = $("<div>",{"class":"elem"}).html("test new");
    $(".elemList").append(div);
});



$(".elem").mnkDrag();
});