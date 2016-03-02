$(document).ready(function(){
	var str = "<div>gjrkelzjg rgjtreopgrjeoz</div>";
	var obj = $($.parseHTML(str));
	obj.html("youpi");
	console.log(obj);

	$(".result").html(obj);
});