(function($) {
  $.fn.mnkLinkerDraw = function(paramSend) {

    var defauts = {
      param: "",
      drawId: 0,

      drawMode: false
    };


    var param = $.extend(defauts, paramSend);



    function redraw() {

    }

    function createLineForMouse() {

      var elementStart = $('.onHookStart');
      var eval1 = elementStart.hasClass('rocket-param-hook-disabled');
      var eval2 = elementStart.hasClass('hook-lock');
     
      
      if (!eval1&&!eval2){
          var posA = elementStart.offset();
          var layerPos = $("svg.linker-zone").offset();
          var hookH = elementStart.outerHeight() / 2;
          var hookW = elementStart.outerWidth() / 2;
          var color = elementStart.css("background-color");
          // console.log(pos);
          var svg = $("svg.linker-zone");

          var x1 = posA.left - layerPos.left + hookW;
          var y1 = posA.top - layerPos.top + hookH;

          var newLine = document.createElementNS('http://www.w3.org/2000/svg', 'line');
          newLine.setAttribute('id', 'line-new');
          newLine.setAttribute('class', 'line type-0');
          newLine.setAttribute('x1', x1);
          newLine.setAttribute('y1', y1);
          newLine.setAttribute('x2', x1);
          newLine.setAttribute('y2', y1);

    svg.append(newLine);
// console.log(svg);
          $("#line-new").css({
            // "stroke": color,
            "stroke-width": 2
          })
    }
    }

    function clear_move_by_mouse() {
      $('.onHookStart').removeClass('onHookStart');
      $("#line-new").remove();
    }
 

    function createLine(idDraw) {

      if (idDraw == null) {
        var elementStart = $('.onHookStart');
        var elementFinish = $('.onHookFinish');
      } else {
        var line = $("line#" + idDraw);
        var rel1 = line.attr("rel1");
        var rel2 = line.attr("rel2");

        var elementStart = $("#" + rel1).find(".rocket-param-hook-to-child");
        var elementFinish = $("#" + rel2).find(".rocket-param-hook-to-parent");
      }

      var eval1 = (elementStart!=elementFinish)?true:false;
      var eval2 = elementStart.hasClass('rocket-param-hook-to-child-single');
      var eval3 = elementStart.hasClass('onHookFinish');
      if(!eval3){
        strokeW = (eval2)?2:4;

        var connect = parseInt(elementStart.find(".rocket-param-hook-connect").html());
        var req = parseInt(elementStart.find(".rocket-param-hook-req").html());
        var hookConnected = parseInt(elementStart.find(".rocket-param-hook-connect").html())

        elementStart.find(".rocket-param-hook-connect").html(hookConnected+1);


        var posA = elementStart.offset();
        var posB = elementFinish.offset();

        var layerPos = $("svg.linker-zone").offset();
        var hookH = elementStart.outerHeight() / 2;
        var hookW = elementStart.outerWidth() / 2;


        $("#line-new").attr({
          'x1': posA.left - layerPos.left + hookW,
          'y1': posA.top - layerPos.top + hookH,
          'x2': posB.left - layerPos.left + hookW,
          'y2': posB.top - layerPos.top + hookH
        }).animate({
          "stroke-width": strokeW
        }, 150)
        attributeLink()
      // };
      }
    }

    function attributeLink() {
      
      

      var idDraw = parseInt($("#idDraw").val())
      $("#idDraw").val(idDraw+1);

      var idDraw = "draw_" + $("#idDraw").val();

      var start = $('.onHookStart');
      var pStart = start.parents(".elem");

      var idStart = start.attr("id");
      var relStartElem = start.attr("relElem");
      var relStartDraw = start.attr("relDraw");

      var finish = $('.onHookFinish')
      var pFinish = finish.parents(".elem");

      var idFinish = finish.attr("id");
      var relFinishElem = finish.attr("relElem");
      var relFinishDraw = finish.attr("relDraw");

      var relDrawPStart = pStart.attr("relDraw");
      var relDrawPSFinish = pFinish.attr("relDraw");


      var newAttr = idDraw+","+idStart+","+idFinish;

if(!relStartElem)
  relStartElem = ""
if(!relStartDraw)
  relStartDraw = ""
if(!relFinishElem)
  relFinishElem = ""
if(!relFinishDraw)
  relFinishDraw = ""
if (!relDrawPStart)
  relDrawPStart =""
if (!relDrawPSFinish)
  relDrawPSFinish =""

      var newDraw = $("#line-new");
      newDraw.attr({
        rel1: idStart,
        rel2: idFinish,
        id: idDraw
      })

      start.attr({
        relDraw: relStartDraw + newAttr + "--"
      })

      finish.attr({
        relDraw: relFinishDraw + newAttr + "--"
      })

      pStart.attr({
        relDraw: relDrawPStart + newAttr + "--"
      })

      pFinish.attr({
        relDraw: relDrawPSFinish + newAttr + "--"
      })



    }

    // $(document).on("mouseenter mouseleave",".rocket-param-hook",function (e){
    //   if($('#rocket-param-linker').hasClass('toggled-on')){
    //     var t = $(this);
    //     var wplus = 15;
    //     var wOrig = 16;
    //     if(e.type=="mouseenter"){
          
    //       if(t.hasClass('rocket-param-hook-to-parent')){
    //         t.stop().animate({width:wOrig+wplus,"margin-left":0-wplus-wOrig},150);
    //       }
    //       else{
    //         t.stop().animate({width:wOrig+wplus},150);
    //       }
    //     }
    //     else{
    //       if(!t.hasClass("onHookStart")){
    //         if(t.hasClass('rocket-param-hook-to-parent'))
    //           t.stop().animate({width:wOrig,"margin-left":0-wOrig},150);
    //         else
    //           t.stop().animate({width:wOrig},150);
    //       }
    //     }
    //   }
    // })

    $(document).on("mousemove mouseup", function(e) {
      if (e.type == "mousemove") {
        if (param.drawMode) {
          draw_move_by_mouse(e);
          return false;
        };
      } else {
        clear_move_by_mouse();
      }

    })


    function draw_move_by_mouse(e) {
      $("#line-new").attr({
        'x2': e.pageX,
        'y2': e.pageY
      })

    }

    $(document).on("dblclick", this.selector, function(e) {
      var t = $(this);
      if($("#rocket-param-linker").hasClass("toggled-on")){
        if(t.hasClass('rocket-param-hook-to-child')&&!t.hasClass("onLock")){
          var rel = t.attr("reldraw");
          if(rel){
            attributeLinkRemove(rel)
          }
        }
      }
      
    })
function attributeLinkRemove(rel){


  var list = rel.split(",");

  var drawId = list[0];

  var start     = $("#"+list[1]);
  var pStart    = start.parents(".elem");
  var finish    = $("#"+list[2].replace("--",""));
  var pfinish   = finish.parents(".elem");

  startAttr     = start.attr("reldraw");
  pStartAttr    = pStart.attr("reldraw");
  finishAttr    = finish.attr("reldraw");
  pfinishAttr   = pfinish.attr("reldraw");



start.attr("reldraw",startAttr.replace(rel,""));
pStart.attr("reldraw",pStartAttr.replace(rel,""));
finish.attr("reldraw",finishAttr.replace(rel,""));
pfinish.attr("reldraw",pfinishAttr.replace(rel,""));



var connected = parseInt(start.find(".rocket-param-hook-connect").html());
start.find(".rocket-param-hook-connect").html(connected-1);



  $("#"+drawId).remove();
}
    $(document).on("mousedown mouseup mouseenter mouseleave", this.selector, function(e) {
      var t = $(this);
      if ($('#rocket-param-linker').hasClass("toggled-on")) {
        if (e.type == "mousedown") {

          $('.onHookStart').removeClass('onHookStart');
          $('.onHookFinish').removeClass('onHookFinish');

            if (!t.hasClass('rocket-param-hook-disabled')&&!t.hasClass('hook-lock')){
               // console.log(this);
                t.addClass("onHookStart");
                param.drawMode = true;

                createLineForMouse();
                t.addClass("onLock")
            }
         
        } else if (e.type == "mouseup") {
          t.addClass("onLock");
          t.addClass("onHookFinish");
          param.drawMode = false;
          createLine();
          $(".onHookFinish").removeClass('onHookFinish');
          $(".onHookStart").removeClass('onHookStart');
          $(".onLock").removeClass('onLock');
        } else if (e.type == "mouseenter") {
          if (param.drawMode)
            t.addClass("drag-on");
        }
        else {
          draw_move_by_mouse(e);
          t.removeClass("drag-on");
        }
      }
      if($("#rocket-param-locker").hasClass("toggled-on")){
        if (e.type == "mousedown")
         {t.toggleClass('hook-lock');
                   }
      }
    });

  }
})(jQuery);

// $("svg, .layer").css({"height":$(window).height(),"width":(window).width()})
$("body").addClass("bg-grid");
$('.rocket-param-hook').mnkLinkerDraw();