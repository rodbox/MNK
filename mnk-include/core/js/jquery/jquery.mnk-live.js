(function($)
{
    $.fn.mnkLive=function(options)
    {
        //On définit nos paramètres par défaut
           var defauts=
           {
               "event": "click",
               "callback":function (data,t){
                t.replaceWith(data+ ' : ok');
               }
           };  
            
           //On fusionne nos deux objets ! =D
           var param=$.extend(defauts, options);
        
        return this.each(function(){
            $(this).live (param.event,function (){
                var t=$(this);
                var href = t.attr("href");
              
                $.post(href,function (data){
                    if(param.callback != null){
                        param.callback(data,t);
                        
                    }

            })
                return false;
            })
        })
    };
})(jQuery);