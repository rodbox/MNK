(function($)
{
    $.fn.mnkDowninterval=function(paramSend)
    {

      var defauts=
           {  
              interval  : 500,
              function    : function(t){}, 
             
           };  


      var param=$.extend(defauts, paramSend);

      $(document).on("mousedown mouseup",this.selector , function (){
          var t=$(this);
        

            })

    return false;
      })
    };
})(jQuery);