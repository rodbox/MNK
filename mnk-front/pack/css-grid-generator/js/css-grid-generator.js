$(document).ready(function(){
	$("form.onLiveReplace").on("submit",function(){
		var t = $(this);
		var action = t.attr("action");
		var data = t.serialize();
		$.post(action,data,function (html){
			
			var message = $("<div>",{"class":"result-container"}).html(html);
			message.hide().slideDown(250);
			t.after(message,function (){alert()})
			t.slideUp(250,function (){t.remove()})
		})

		return false;

	})
});