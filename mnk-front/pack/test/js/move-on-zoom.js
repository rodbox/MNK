$(document).ready(function(){
$.each($('.move-zone'), function(index, val) {
var t = $(this);
t.before(t.attr("id"));
});
	$(document).on('mousemove','.move-zone',function (e){
		var t = $(this);
		var moover = t.find(".moover");
		moover.css({"left":e.offsetX+5,"top":e.offsetY+5});
		console.log(e);
	});
});