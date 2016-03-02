$(document).ready(function(){

// $(".circle-nav li").on('click',function (){
// 	var t = $(this);
// 	t.find("ul").first().toggle()
// 	//return false;

// });




$(document).on('click',".open",function (){
	var t = $(this);
	var rel = t.attr("rel");
	// alert(t.text())





var listElements = $(rel+" li").not(rel +" li ul li");
    

    var circleCenter = t;
    var circleCenterPos = circleCenter.offset();

  // var step = (2*Math.PI)/listElements.length;
  var step = (2*Math.PI)/listElements.length;
  var angle= 0; 
  var circleCenterX = circleCenterPos.left;
  var circleCenterY = circleCenterPos.top;
  var radius = 75;


  for(var i = 0; i<listElements.length; i++)
  {


    var margTop = circleCenterPos.top-Math.round(circleCenterY+radius*Math.sin(angle));
    var margLeft = circleCenterPos.left-Math.round(circleCenterX+radius*Math.cos(angle));


    var li = listElements.eq(i);
    li.css({
        // "width": 0,
        // "height": 0,
        //         "margin-top" : 0,
        // "margin-left" : 0,
        // "opacity":0
    })
    .show()
    .animate({
        "margin-top" : margTop,
        "margin-left" : margLeft,
        // "opacity":0.3,
        // "width": 48,
        // "height": 48

    },350)
    .on("mouseenter",function(){
      var t = $(this);
      //t.stop().animate({"opacity":1},250);
    })
    .on("mouseleave",function(){
      var t = $(this);
      //t.stop().animate({"opacity":0.3},250);
    })
    .on("click",function(){
    	var t = $(this);

    	//  var margTop = circleCenterPos.top-50-Math.round(circleCenterY+radius*Math.sin(angle));
    	// var margLeft = circleCenterPos.left-50-Math.round(circleCenterX+radius*Math.cos(angle))





    })
    li.attr({'rel':angle})
    angle+=step;
  }


});



function circle (target,radius){







}




});