$(document).ready(function(){


//circleExemple();

// $('.liveform input[type=range]').on("change mousemove",function (){
//   var t = $(this);
// circleExemple();

//  var forRange = $("input[for="+t.attr('name')+"]");
//   forRange.val(t.val());
// })

$('.load-palette').mnkLiveForm({
  callback:function(data){
    var result = $("input[name=palette-result]");
    var t = $(this);
    result.val(data)
    console.log(data);
  },
  dataType:"HTML"
});


$("input[type=range").on('change mousemove',function (){
  var t = $(this);
  circleExemple ()

});

function circleExemple (){

  var startAngle = parseInt($('input[name=angle]').val());
  var startRotate = parseInt($('input[name=rotate]').val());
  var startPos = parseInt($('input[name=position]').val());
  var nbElem = parseInt($('input[name=elem]').val());
  var radius = parseInt($('input[name=radius]').val());
  var posX = parseInt($('input[name=pos-x]').val());
  var posY = parseInt($('input[name=pos-y]').val());
  var distribute = $('input[name=color-distribute]:checked').val();

  var sizeElem = parseInt($('input[name=sizeElem]').val());
  var sizeElemMiddle = sizeElem/2;

  var stepRotate = Math.round(360/nbElem);

  var exemple = $('.circle-exemple');

  var palette = $.parseJSON($("input[name=palette-result]").val());
  var nbColor = (palette.palette.key.length);
  var curColor = 0;
  // var json = '{ "name": ["123","456","789"]}';
  // var palette = $.parseJSON(json);

  exemple.html("");
  for(i=1;i<=nbElem;i++){
 
 /* color loop */




    if (distribute == "redo"){
        curColor++;
        if(curColor>=nbColor)
          curColor = 0
    }
    else if (distribute == "random")
      curColor  =Math.round(Math.random() * nbColor);
    else if (distribute == "pingpong"){

    }
/* color random */






    var bgc = palette.palette.key[curColor];









    var p = $("<p>",{"class":"alpha_6"}).html(i)
    var div = $("<div>",{
       "style" : "background-color:"+bgc,
        "class" : 'line-dashed c-1 '
      }

      ).html(p)
    var elem = $("<li>").html('<div class="></div>').html(div);
    exemple.append(elem);
  }

  var listElements = $(".circle li");

  var step = (2*Math.PI)/nbElem;
  var angle=(startPos*step)+(startAngle/1000); 
  var deg = 180*angle/Math.PI;

  var curRotate = startRotate;
  for(var i = 0; i<nbElem; i++)
  { 
    curRotate = curRotate+stepRotate;
    var li = listElements.eq(i);
    li.css({
      "margin-top"  : Math.ceil(radius*Math.sin(angle)),
      "margin-left" : Math.ceil(radius*Math.cos(angle)),
      "-webkit-transform": "scale(1) rotate("+curRotate+"deg) translateX(0px) translateY(0px) skewX(0deg) skewY(0deg)",
      "-webkit-transform-origin": sizeElemMiddle+"px "+ sizeElemMiddle+"px"
    })
    angle+=step;
  }

  exemple.find(".line-dashed").css({
    "height"  : sizeElem,
    "width"   : sizeElem,
    "line-height":sizeElem+"px"
  })
  $(".circle").css({
    "height"  : radius,
    "width"   : radius,
    "top"     : posY,
    "left"    : posX
    });
}


  $('.liveform').mnkLiveForm(
    {
      callback: function (html){
        $(document).mnkModal(html,{load:function(){
          console.log("ok");
          SelectText("mnk-modal-container-container");
        }});
        

        // $('.response').html(html)
      }

    });


function SelectText(element) {
    var doc = document;
    var text = doc.getElementById(element);    
    if (doc.body.createTextRange) { // ms
        var range = doc.body.createTextRange();
        range.moveToElementText(text);
        range.select();
    } else if (window.getSelection) {
        var selection = window.getSelection();
        var range = doc.createRange();
        range.selectNodeContents(text);
        selection.removeAllRanges();
        selection.addRange(range);

    }
}



// $('input[type=text].range-value').mousewheel(function (e,delta){
//   var t = $(this);
//   var val = parseInt(t.val());

//   // console.log(delta);
//   if(delta<0){
//     forTxt(t,-1);
    
//     t.val(val-1);
//   }
// else{
//   forTxt(t,1);
// t.val(val+1);}
// t.trigger("keyup");
// return false;
// });
  // $(".bt-num-moins").on('click',function (){
  //   var t = $(this);
  //   var forTxt = $('input[name='+t.attr("for")+']');
  //   var val = parseInt(forTxt.val());
  //   forTxt.val(val-1);
  //   forTxt.trigger("keyup");
  //   return false;
  // });
$('.circle').on("mousedown mouseup",function (e){
  var t = $(this);
  if(e.type=="mousedown")
    t.addClass('onMove');
  else if (e.type=="mouseup"){
      t.removeClass('onMove');
  }
  return false;
})

$(".grid-pattern").on('mousemove',function (e){
  var t = $(this);

  if(e.type =="mousemove")
$('.circle.onMove').css({
  left:e.pageX,
  top:e.pageY,
  "margin-left":-parseInt($('input[name=radius]').val()/2),
  "margin-top":-parseInt($('input[name=radius]').val()/2)
})
else {

}

});





// $(".bt-num-moins").on('mousedown mouseup',function (e){
//   var t = $(this);
//   var p = t.parents(".input-bt-num");
//   var input = p.find(".num-edit");
//   if(e.type == "mousedown"){
//     input.val(parseInt(input.val()+1))
//   }
//   console.log(e);
// })

});



$(document).ready(function(){
    //store nodepath value to clipboard (copy to top of page)
    $('.response-copy').on('click', function(){
        //console.log($('#pathtonode').html()+ " copied to window");
        var path = $('.response pre').html();
        path = path.replace(/ &amp;gt; /g,".");
        //console.log(path);
        addtoppath(path);
        return false;
    });
    //initially hide copy window
    //$('#toppathwrap').hide();

    function addtoppath(path) {
        console.log(path);
        $('#copypath').val(path);
        $('#toppathwrap').show();
        $('#copypath').focus();
        $('#copypath').select();
    }   
});