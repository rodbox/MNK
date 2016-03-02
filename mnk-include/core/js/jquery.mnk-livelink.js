(function($)
{
    $.fn.mnkLiveLink=function(paramSend)
    {

      var defauts=
           {  content   : "",
              start     : function(t){
                var w   = t.width();
                //var content   = "<span class='liveBtn'>"+t.html()+"</span>";
                var clone = t.clone().addClass("clone").html("clone");

                // t.addClass("loader").hide().after(clone);
                t.addClass("loader");
                
                //t.html(content).width(w).find(".liveBtn");
                $("body").addClass('protect');
               // defauts.content = content;
            },
              finish    : function(t){
                t.removeClass("loader").addClass("check");
                // $(".clone").remove();
                // t.show();
                $("body").removeClass('protect');
                gritter ();
              },
              confirm   : function(t){return true;},
              else      : function(){},
              callback  : function (data,t){
               // t.removeClass("loader");
              },
              message   : "Opération effectuée",
              titleMessage   : "Message :"

           };  


      var param=$.extend(defauts, paramSend);

      function gritter (){
         $.gritter.add({
                      title:param.titleMessage, 
                      text: param.message,
                      image: 'http://betty.excentrik.fr/mnk-include/core/img/ui/fff/48px/checkmark.png',
                      sticky: false,
                      time: ''
              });
         $.gritter.remove(param.gritter, { 
          fade: true, // optional
          speed: 'fast' // optional
        });
      }
      function gritterLoad (href){
         param.gritter = $.gritter.add({
                      title:"en cours", 
                      text: href,
                      image: 'http://betty.excentrik.fr/mnk-include/core/img/ui/fff/48px/clock2.png',
                      sticky: true,
                      time: ''
              });

      }

      $(document).on("click",this.selector , function (){
          var t=$(this);
          var href = t.attr("href");
          param.start(t);
          $("body").addClass("onLoad");
          gritterLoad(href);
          // if(param.confirm(t)){
          
            $.get(href,{"live":true},function (data){
              if(param.callback != null)
                  param.callback(data,t);




            param.finish(t);
            $("body").removeClass("onLoad");


            })
          //}
          // else 
          //   param.else();

           

    return false;
      })
    };
})(jQuery);