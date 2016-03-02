
(function($)
{
    $.fn.mnkOnePage=function(options)
    {
        //On définit nos paramètres par défaut
      var defauts=
      {
        "pageTop" : [],
        "pageHeight" : [],
        "pageCount" : $(".page").length
      };
      var selector = $(this.selector);

      //On fusionne nos deux objets ! =D
      var param= $.extend(defauts, options);




     selector.find('a[href^="#"]').on("click",function(){

      var t = $(this);
     
      
      $('.onActive')
  .stop().animate({
        "padding": 5,

   "background-color": "#fff",
    "color": "#000",
    opacity:0.45,
    "font-size": 1.6+"em",
    'background-position-x': '-10%'
  
  },50).removeClass('onActive');
    t.stop().animate({
    "padding": 10,
    "padding-left":48,
   "background-color": "#000",
    "color": "#fff",
    opacity:1,
    "font-size": 2.3+"em",
    'background-position-x': '5px'

  },50).addClass('onActive');







       //SMOOTH SCROLL 
     var the_id = $(this).attr("href");
      $('html, body').animate({
        scrollTop:$(the_id).offset().top
      }, '250');

      return false;
    });

var i =0;
     $(".page").each(function(){
      var t = $(this);
      var pos = t.offset();
      param.pageTop[i] = pos.top;
      param.pageHeight[i] = t.height();

      i++;
     });



$( window ).scroll(function() {
  var t = $(this);
  var scrollTop = t.scrollTop();
 evalPos(scrollTop);
console.log(param);
});



function evalPos(scrollTop){
  var x = 0;
  var select = [];
  $.each(param.pageTop,function(index,value){
    if(scrollTop<value){
      select[x] = index;
      x++;
    }
    else {
      select[0] = param.pageCount;  
    }
  })

  $('.onActive')
  .stop().animate({
        "padding": 5,

   "background-color": "#fff",
    "color": "#000",
    opacity:0.45,
    "font-size": 1.6+"em",
    'background-position-x': '-10%'
  
  },50).removeClass('onActive');
  var liActive = $('.fixed-menu li a').eq(select[0]-1);
      liActive.stop().animate({
    "padding": 10,
    "padding-left":48,
   "background-color": "#000",
    "color": "#fff",
    opacity:1,
    "font-size": 2.3+"em",
    'background-position-x': '5px'

  },50).addClass('onActive');
  console.log("#######");}

























}

})(jQuery);









