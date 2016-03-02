$(document).ready(function() {
     var loader = $("<img>").attr({src:"../mnk-include/core/img/loader_16_red.gif","class":"loader_16"});
    
     $("#user_log").bind({
         'mouseenter'   : function(){
            var t = $(this);
            t.stop().animate({width:96,height:96},150);
         },
         'mouseleave'   : function () {
            var t = $(this);
            t.stop().animate({width:48,height:48},150); 
         }
         
     })
     
     $("form.live").bind({
         'submit'       : function (){
             var t = $(this);
             var submit = t.find("input[type=submit]");
             var action     = t.attr('action');
             
             submit.replaceWith(loader);
             
            $.post(action,function(){
                
                loader.replaceWith("ok");
                
            })
             
             
             
             return false;
         }
     })
})

