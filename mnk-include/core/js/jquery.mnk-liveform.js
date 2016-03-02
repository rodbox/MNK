(function($)
{
    $.fn.mnkLiveForm=function(options)
    {
        //On définit nos paramètres par défaut
      var defauts=
      { 
        submitVal : $(this.selector).find("input[type=submit]").val(),
        dataType: "html",
        before  : function (t){return true;},
        start   : function (t){

           t.find("input[type=submit]").val('en cours').addClass("loader").attr({"disabled":true});
          t.addClass("loader");}, 
        confirm : function (){return true;},
        data    : {},
        callback: function (data,t){
            t.find("input").blur();
           
        },
        finish  : function(t,submitVal){

           // var submitVal = $(this.selector).find("input[type=submit]").val();
          t.find("input[type=submit]").val(submitVal).removeAttr('disabled');
          gritter();
        },
          message   : "Opération effectuée",
              titleMessage   : "Message :"

        };  
       
      //On fusionne nos deux objets ! =D
      var param=$.extend(defauts, options);

              function gritter (){
         $.gritter.add({
                      title:param.titleMessage, 
                      text: param.message,
                      image: 'http://betty.excentrik.fr/mnk-include/core/img/ui/fff/48px/checkmark.png',
                      sticky: false,
                      time: ''
              });
      }

        $(document).on("submit",this.selector , function (){
          var t=$(this);
          var action = t.attr("action");
        	var dataSend = t.serialize();
          $("body").addClass("onLoad");
          param.start(t);
          if(param.confirm()){  
            $.post(action,dataSend,function (data){
              if(param.callback != null){
                param.callback(data,t);
            
            param.finish(t,param.submitVal);
            $("body").removeClass("onLoad");
              }
				    },param.dataType);
          }
          
          return false;
          })
        }
})(jQuery);