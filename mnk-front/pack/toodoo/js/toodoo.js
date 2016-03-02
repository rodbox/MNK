$(document).ready(function(){

	$('.task-sortable').sortable(
	{
		axis: "y",
		placeholder: "ui-state-highlight",
		start:function(e,ui){
			ui.placeholder.height(ui.item.height());
		},
		update: function( event, ui ) {
			$("#task-list-upd").trigger("submit");
		}
	});


	$("#task-list-upd").mnkLiveForm({
		callback 	: function (html,t){
			// alert("ok");
		}
	});
	taskCounter ();

	
	$(document).on("click","#toodoo ul li", function (){
		var t = $(this);
		t.toggleClass("check");
		taskCounter ();
	})


/*	$(document).on("click","#toodoo ul li a", function (){
		var t = $(this);
 		href = t.attr("href");
 		//window.location = href;
	})
*/

	$("#task-add-toggle").on('click',function (){
		var t = $(this);
		var $addZone = $('.task-add-zone');
		$addZone.slideToggle(150);
		$addZone.toggleClass("open");
		if($addZone.hasClass("open"))
			$addZone.find("textarea").trigger("focus");

		return false;

	});
	$("textarea").on('keyup',function (event){
		var t = $(this);
		if(event.keyCode == 13){
			t.parents("form").trigger("submit");}

		});
	$("#task-add").mnkLiveForm({
		callback 	: function (html,t){
			var content = t.find("textarea").val();
			var li = $("<li>").hide().html(content);
			$('#toodoo .body').prepend(li.slideDown());
			t.find("textarea").val("");
			taskCounter ();

		}
	});	

	$("#task-del").on("click",function(){
		$('#toodoo li.check').remove();
		taskCounter ();
		$("#task-list-upd").trigger("submit");
		return false;
	});


	function taskCounter (){
		var counter = $('#toodoo ul.body li:not(.check)').length;
		if (counter==0)
			{
				$('#toodoo .stick').hide();
				$('#toodoo .toggle-side-right').removeClass("bg-pumpkin");
				$('#toodoo .toggle-side-right').addClass("bg-concrete");

			}
		else
			{
				$('#toodoo .stick').show();
				$('#toodoo .toggle-side-right').addClass("bg-pumpkin");
				$('#toodoo .toggle-side-right').removeClass("bg-concrete");
			}

			$('#toodoo .stick').html(counter);
	}



});