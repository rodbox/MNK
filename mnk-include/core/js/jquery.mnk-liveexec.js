(function($)
{
    $.fn.mnkLiveExec=function(pack,exec,data,type,paramSend)
    {
      var defauts=
           {  
              url : 'http://metronic.excentrik.fr/mnk-include/exec.php',
              start     : function(){
                $("body").addClass('protect');
            },
              finish    : function(){
                $("body").removeClass('protect');
                
              },
              confirm   : function(t){return true;},
              else      : function(){},
              callback  : function (data,t){
              },
              message   : "Opération effectuée",
              titleMessage   : "Message :"

           };  


      var param=$.extend(defauts, paramSend);

      function gritter (pack,exec){
         $.gritter.add({
                      title:pack+ " "+exec, 
                      text: "OK",
                      image: 'http://betty.excentrik.fr/mnk-include/core/img/ui/fff/48px/checkmark.png',
                      sticky: false,
                      time: 500
              });
         $.gritter.remove(param.gritter, { 
          fade: true, // optional
          speed: 'fast' // optional
        });
      }

      function gritterLoad (pack,exec){
         param.gritter = $.gritter.add({
                      title:pack+ " "+exec, 
                      text: "en cours",
                      image: 'http://betty.excentrik.fr/mnk-include/core/img/ui/fff/48px/clock2.png',
                      sticky: true,
                      time: ''
              });

      }


         var href = param.url+'?exec='+pack+'/'+exec+'&type=pack-exec&';
          param.start();
          $("body").addClass("onLoad");
          gritterLoad (pack,exec);






          data=$.extend({"live":true}, data);

          if (type!="post") {
            $.get(href,data,function (data){
              if(param.callback != null)
                  param.callback(data);
                gritter (pack,exec);
              param.finish();
              $("body").removeClass("onLoad");
            })
          }
          else {
             $.post(href,data,function (data){
              if(param.callback != null)
                  param.callback(data);
                gritter (pack,exec);
              param.finish();
              $("body").removeClass("onLoad");
            })
          }

    };
})(jQuery);


