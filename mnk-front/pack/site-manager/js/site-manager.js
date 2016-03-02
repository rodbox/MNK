$(document).ready(function(){
	$("form#site-creator").on("submit",function(){
		var t = $(this);
		var action = t.attr("action");
		var data = t.serialize();
		$.post(action,data,function (html){
			t.find("input[type=text]").val("");
			var message = $("<div>",{"class":"result-container"}).html(html);
			message.hide().slideDown(250).delay(3000).slideUp(250,function (){
				$(this).remove()
				window.location.reload(true);
			});
			t.after(message)
		})


		return false;

	})
$("#site-filter-save, #ftp-config-save").mnkLiveForm()
$("a.onLive, a#scan-refresh").mnkLiveLink();
	// $("a.onLive").on("click",function(){
	// 	var t = $(this);
	// 	var href = t.attr("href");
	// 	//var data = t.serialize();
	// 	$.get(href,function (html){
			

	// 		var message = $("<div>",{"class":"result-container"}).html(html);
	// 		message.hide().slideDown(250).delay(3000).slideUp(250,function (){
	// 			$(this).remove()
				
	// 		});
	// 		t.after(message);


	// 	})


	// 	return false;

	// })


$("ul.folder li div.title").on('dblclick',function (){
	var t = $(this);
	t.find("a.toggle-expand").first().trigger("click");
	return	false;
}).on('mousedown',function(){
	return false;
});

$("ul.folder li div.title").on('click',function (){
	var t = $(this);
	var checkbox = t.find("input[type=checkbox]");
	var checked		= checkbox.attr('checked');

	(!checked)?t.addClass("checked"):t.removeClass("checked");
	checkbox.attr('checked', !checked );



	if(t.hasClass("folder-title")){
		var ul = t.parents("li").first().find("ul li").find("input[type=checkbox]").attr('checked', !checked );
		if (!checked)
			t.parents("li").first().find("ul li div.title").addClass("checked");
		else
			t.parents("li").first().find("ul li div.title").removeClass("checked");
	}

	return	false;
});

$("ul.folder li a.toggle-expand").on('click',function (){
	var t = $(this);
	t.toggleClass('expandOn');
	var ul = t.parents("li").find("ul").first();
	ul.slideToggle(250).toggleClass('open');
	return	false;
});

$(".folder input[type=checkbox]").on('click',function (){
return false;
});

$(".checkSelect").on('click',function (){
	var t = $(this);
	
$("ul.folder input[type=checkbox]").attr('checked', true );
$("ul li div.title").addClass("checked");
});

$(".toggleCheckAll").on('click',function (){
	var t = $(this);
	t.toggleClass("check");
	if(t.hasClass("check")){
		$("ul.folder input[type=checkbox]").attr('checked', true );
		$("ul li div.title").addClass("checked");
	}
	else {
		$("ul.folder input[type=checkbox]").attr('checked', false );
		$("ul li div.title").removeClass("checked");
	}


});



});