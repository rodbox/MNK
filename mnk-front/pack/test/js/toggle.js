$(document).ready(function(){
$(".form-toggle").on('click',function (){
	var t = $(this);
	var speed = 125;
	var check = t.find("input[type=checkbox]");
	var slide = t.find(".form-toggle-slide");
	// slide.toggleClass("toggle-off");
	if (slide.hasClass("form-toggle-off"))
		{
			slide.stop().animate({"margin-left":-50},speed).removeClass('form-toggle-off');;
			check.removeAttr("checked");
			
		}
	else
		{

			slide.stop().animate({"margin-left":0},speed).addClass('form-toggle-off');;
			check.attr("checked","checked");
		}
	}).on("mousedown",function (){return false;});

	});