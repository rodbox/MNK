$(document).ready(function(){
$(".side-right .toggle-side-link").on('click',function (){
	var t = $(this);
	var p = t.parents(".side-right");

	p.toggleClass("open");
	if(p.hasClass("open"))
		p.animate({right:-p.width()},100)
	else
		p.animate({right:0},100)



	return false;


});




});