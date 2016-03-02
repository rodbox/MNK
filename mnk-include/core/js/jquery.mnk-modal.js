(function($)
{
    $.fn.mnkModal=function(data,options){

      var defauts = {
        title: "",
        subTitle1: "",
        subTitle2: "",
        load : function(){console.log("modal load");},
        close: function(){console.log("modal close");},
        beforeClose: function(){console.log("modal before close");},
        padding   : 20,
        percent   : 50,
        bg:"bg-0",
        color:"c-1"
      }



      var param=$.extend(defauts, options);


      var bg = $("<div>",{"class":"mnk-modal-container-bg"}).fadeIn(150,function (){
        $("body").addClass('mnkModal-on');
      });
      
      bg.fadeIn(150,function (){


        var wW = $(window).width();
        var containerW = wW*(param.percent/100)-(param.padding*2);
        var container = $("<div>",{"id":"mnk-modal-container-container"}).html(data).css({"margin-top":-500,"opacity":0}).animate({"margin-top":-400},250,function (){
          param.load();
          $(this).animate({"margin-top":100,"opacity":1},550);
        })

        container.css({
          width   : containerW,
          padding   : param.padding,
          "marginLeft":0-(containerW/2)
        });
        container.addClass(param.bg);
        container.addClass(param.color);

        if(param.title!=""){
          var title = $("<span>",{"class":"modal-title"}).html(param.title);
          var subTitle1 = $("<span>",{"class":"modal-sub-title-1 small"}).html(param.subTitle1 +"<br/>"+param.subTitle2);
          // var subTitle2 = $("<span>",{"class":"modal-sub-title-2 small"}).html(param.subTitle2);


          var h1 = $("<h1>").css("margin-top",0-param.padding-40);
          h1.append(title).append(subTitle1)
          container.prepend(h1);
        }
          
        // if(param.padding==false)
        //   container.addClass("no-padding");

        $(this).after(container);
      })

      $(document).on("keydown",function(e) {
        if(e.keyCode == 27)
          $(".mnk-modal-container-bg").trigger('click');
      });
      bg.click(function(){
        var t = $(this);
         param.beforeClose();

$("#mnk-modal-container-container").animate({"margin-top":450,"opacity":0},500,function (){
    var container = $(this)

  t.fadeOut(250, function() {
          t.remove();
          container.remove();
          $("body").removeClass('mnkModal-on');
          param.close();
        });

          })
      })
      $("body").prepend(bg);
      }



})(jQuery);