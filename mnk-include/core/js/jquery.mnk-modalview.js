(function($)
{
    $.fn.mnkModalView=function(options){


    	var defauts = {
			beforeLoad: function(t) {}
		}

		var param = $.extend(defauts, options);

   $(document).on("click",this.selector , function (){
  var t = $(this);
  param.send = param.beforeLoad(t);

  var href = t.attr("href");
  $.get(href,param.send,function (data){
    $(document).mnkModal(data);
  });

  return false;
});
      }
})(jQuery);