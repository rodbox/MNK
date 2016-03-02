$(document).ready(function(){


// $("img.bg-full").fadeIn(750);
function redimensionnement(){ 
 
    var $image = $('img.bg-full');
    var image_width = $image.width(); 
    var image_height = $image.height();     
     
    var over = image_width / image_height; 
    var under = image_height / image_width; 
     
    var body_width = $(window).width(); 
    var body_height = $(window).height(); 
     
    if (body_width / body_height >= over) { 
      $image.css({ 
        'width': body_width + 'px', 
        'height': Math.ceil(under * body_width) + 'px', 
        'left': '0px', 
        'top': Math.abs((under * body_width) - body_height) / -2 + 'px' 
      }); 
    }  
     
    else { 
      $image.css({ 
        'width': Math.ceil(over * body_height) + 'px', 
        'height': body_height + 'px', 
        'top': '0px', 
        'left': Math.abs((over * body_height) - body_width) / -2 + 'px' 
      }); 
    } 
} 
      


     
    // En cas de redimensionnement de la fenêtre
    $(window).resize(function(){ 
        redimensionnement(); 
    }); 
 

    // Au chargement initial   
    redimensionnement();

    $(".grid").on('click',function (){
        var t = $(this);
        t.toggleClass("dropped");
    });

    $("button.tag").on('click',function (){
        var t = $(this);

        stickSag({"class" : t.attr("class"),"html":t.html()});
        
    });

    $("button.clear").on('click',function (){
       clearSelect()
    });


$(".tag-stick").on('click',function (){
    var t = $(this);
    t.replaceWith("toto");

});
    function clearSelect(){
        $(".grid.dropped").removeClass("dropped");
    }


function stickSag(param){
    var tagStick = $("<div>").attr({"class" : param.class}).append(param.html).removeClass("tag").addClass("tag-stick");

        $(".dropped").prepend(tagStick);
}


$("input[name=new-tag]").on('keyup',function (e){
    var t = $(this);
if(e.keyCode ==13){
    
    var num = $('ul.tag-list li').length;

    var button = $("<button>",{"class":"tag bg-"+num+" c-1","value":"tag-"+num}).append(t.val());
    button.on("click",function(){
        var t = $(this);
         stickSag({"class" : t.attr("class"),"html":t.html()});
    })
    var li = $("<li>").html(button);
    $('ul.tag-list').append(li);
    t.val("");
}

});





    $( document )
        .drag("start",function( ev, dd ){
            return $('<div class="selection" />')
                .css('opacity', .65 )
                .appendTo( document.body );
        })
        .drag(function( ev, dd ){
            $( dd.proxy ).css({
                top: Math.min( ev.pageY, dd.startY ),
                left: Math.min( ev.pageX, dd.startX ),
                height: Math.abs( ev.pageY - dd.startY ),
                width: Math.abs( ev.pageX - dd.startX )
            });
        })
        .drag("end",function( ev, dd ){
            $( dd.proxy ).remove();
        });
    $('.grid')
        .drop("start",function(){
            $( this ).addClass("onSelect");
        })
        .drop(function( ev, dd ){
            $( this ).toggleClass("dropped");
        })
        .drop("end",function(){
            $( this ).removeClass("onSelect");
        });
    $.drop({ multi: true });

});