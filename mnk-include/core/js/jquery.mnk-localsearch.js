(function($)
{
    $.fn.localSearch=function(filterElem,options)
    {
        //On définit nos paramètres par défaut
      var defauts=
      { 
        minLength : 2,
        filter      : $(this.selector).find(filterElem)
      };  

      var selector = $(this.selector);

      //On fusionne nos deux objets ! =D
      var param=$.extend(defauts, options);


      var container = $('<div>',{"class":"localsearch-container"});


      var inputSearch = $('<input>',{
        "type"  : "text",
        "name"  : "localsearch",
        "class" : "localsearch"
      })
      .hide()
      .on ("keyup",function(){
        var t = $(this);
        var search = t.val();
        var filterList = param.filter;
        if (search.length >= param.minLength ){
          filterList.hide().filter(function (){
            return $(this).text().match(search);
          }).show();
        }
        else {
          filterList.show();
        }
      });
      container.append(inputSearch.slideDown());
      selector.before(container);
      }
})(jQuery);