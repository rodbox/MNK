$(document).ready(function(){
$("#save-tools").mnkLiveForm();
$("#new-tool").click(function(){
	$("#save-tools input[type=text], #save-tools textarea ").val("");
	$(".bg-pumpkin").removeClass("bg-pumpkin");
});
$(".load-tool").click(function (){
	var t = $(this);
	var url = t.attr("href");
	$(".bg-pumpkin").removeClass("bg-pumpkin");
	t.parents("li").addClass("bg-pumpkin");
	$.getJSON(url,function (json){
		$.each(json,function(key,val){
			$("[name="+key+"]").val(val);
		})
		
	})
	return false;
})
});