$(document).ready(function(){


  /* FOR TOGGLE ACTION */
  $("a.toggle-me").on('click',function (){
    var t = $(this);
    var url = t.attr("href");
    t.toggleClass('toggle-on');
    var data = {
      session : t.attr("id"),
      value   : (t.hasClass("toggle-on"))?"toggle-on":""
    }
    $.get(url,data);
    return false;
  });


  $.toggleEval = function (id){
    return $("#"+id).hasClass("toggle-on");
  }

  /* FOR HELPER */
  $("input,select,textarea").on('focusin focusout',function (e){
    var t = $(this);
    if($.toggleEval("toggle-helper")){
      var helperMsg = t.attr('help');
      // console.log(helperMsg);
      var metaHelperMsg = t.attr("required");
      if(metaHelperMsg)
        helperMsg += "<hr> * Ce champ est obligatoire.";

      var helperDiv = $("<div>",{"class":"app-helper bg-2 z-overlay"}).append(helperMsg).css({top:t.position().top+t.outerHeight()+6});
      if(e.type=="focusin"&&helperMsg)
        t.after(helperDiv);
      else
       $(".app-helper").remove();
    }
  });

$('.shortcut').on("mousedown",function(e){
  var checkbox = $(this).find("input[type=checkbox]");
  if(checkbox.attr("checked"))
    checkbox.removeAttr("checked");
  else
    checkbox.attr("checked","checked")
return false;
})



var form = $("input,select,textarea");
$.each(form,function(){

  var t = $(this);
  if(t.attr('required')){
      console.log("this");
    var placeholder = t.attr("placeholder");
    t.attr("placeholder","* "+placeholder);
  }
    
})





$('.shortcut input').on("mousedown",function(event){
  event.stopPropagation();
});

function extract(variable) {
  for (var key in variable) {
    window[key] = variable[key];
  }
}

  $("form.app button").on('click',function (){

    var t = $(this);
    var form = t.parents("form.app");
    var js = form.attr("javascript");
    // var input = form.find("input");
    var dataArray = form.serializeArray();
    var dataFunc = {};
    $.each(dataArray, function(index, val) {
      if(val.name!= "pointer")
        dataFunc[val.name]= val.value
    });
    extract(dataFunc)

    var pointer  = $.parseJSON($('.pointer').val());
    var data=$.extend(dataArray, {"pointer":pointer});

   eval(js);
   
  return false;
});

$("#toggle-app-menu").on('click',function (){
  var t = $(this);
  $(".app-menu").slideToggle(100);
  t.toggleClass('toggle-menu-open');
return false;
});

  /* FOR DEBUG*/

  setInterval(function (){
    if($.toggleEval("toggle-timer"))
      location.reload(true);
  },5000);

var appTime = 250;

$('img#startup').animate({"margin-top":50,"opacity":0},500,function(){$(this).remove()});
$('.app-content').css({"margin-top":-50,"display":"block","opacity":0}).animate({"margin-top":0,"opacity":1},appTime);

$('a.app-modal-link').on("click",function(e){
  var t = $(this);

var txt = "<p>Curabitur blandit tempus porttitor. Cras mattis consectetur purus sit amet fermentum. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Donec id elit non mi porta gravida at eget metus. Aenean lacinia bibendum nulla sed consectetur.</p>";


var modal = $("<div>",{"class":"app-modal bg-5 c-6"}).css({"margin-top": 100,"opacity":0}).animate({"margin-top":10,"opacity":1},appTime).html(txt);
$('body').prepend(modal);


  e.preventDefault();
return false;

 
})

$('a.app-link:not(.app-modal-link)').on("click",function(e){
  var t = $(this);

  $('.app-menu').slideUp();
  $(".app-content").animate({"margin-top":-50,opacity:0},appTime,function (){
    $(".app-header").animate({"margin-top":-50,opacity:0},appTime,function (){
      window.location.href = t.attr("href");
    })
  })

  e.preventDefault();
})



});











