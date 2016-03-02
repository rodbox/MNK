$(document).ready(function(){
	$('ul.snippet-list').localSearch("li");
	/* source 

	http://blog.vishalon.net/index.php/javascript-getting-and-setting-caret-position-in-textarea/
	*/
function doGetCaretPosition (ctrl) {
	var CaretPos = 0;	// IE Support
	if (document.selection) {
	ctrl.focus ();
		var Sel = document.selection.createRange ();
		Sel.moveStart ('character', -ctrl.value.length);
		CaretPos = Sel.text.length;
	}
	// Firefox support
	else if (ctrl.selectionStart || ctrl.selectionStart == '0')
		CaretPos = ctrl.selectionStart;
	return (CaretPos);
}
function setCaretPosition(ctrl, pos){
	if(ctrl.setSelectionRange)
	{
		ctrl.focus();
		ctrl.setSelectionRange(pos,pos);
	}
	else if (ctrl.createTextRange) {
		var range = ctrl.createTextRange();
		range.collapse(true);
		range.moveEnd('character', pos);
		range.moveStart('character', pos);
		range.select();
	}
}

/* fin ressource */






	

	$('textarea#snippet-content').select(function (data){
		var t = $(this);
		var start = data.currentTarget.selectionStart;
		var end = data.currentTarget.selectionEnd;
		var replaceTerm = t.val().substring(start,end);
		popIn();

		$("#snippet-pop-form").attr({"rel":start+"-"+end+"-"+replaceTerm});
	})

	$('textarea#snippet-content').mouseup(function (e){

		var left = e.clientX-10;
		var top = e.clientY+$(document).scrollTop()+20;
		popPos(left,top)
	})


$("#snippet-pop-form").on('submit',function (){
		var caretPos =  doGetCaretPosition(document.getElementById("snippet-content"));

		var t = $(this);
		var content = $('textarea#snippet-content').val();
		var submit = t.find("input[type=submit]");

		var posReplace = t.attr("rel").split("-");
		var start = parseInt(posReplace[0]);
		var end = parseInt(posReplace[1]);
		var termToReplace =posReplace[2];

		console.log(t.attr("rel"))

		var tabNum = $("#snippet-pop #tabNum").val();
		var tabName = $("#snippet-pop #tabName").val();

		var tabElem = "${"+tabNum+":"+tabName+"}";


		var contentNew = content.replace(termToReplace,tabElem);
			$('textarea#snippet-content').val(contentNew);

		var newVal = parseInt(tabNum)+1;

		popOut(newVal);
		return false;
	}).on("focusout",function (){
		popOut(0);
	});


	function popPos(left,top){
		//$('#snippet-pop').css({"top":top,"left":left})
	}

	function popIn(){
		$('#snippet-pop').show();
	}

	function popOut(tabNum){
		$('#snippet-pop').hide();
		if (tabNum != null)
			$("#snippet-pop #tabNum").val(tabNum);
	}

$("a#pop-close").on('click',function (){
	popOut();
	return false;

});





	$("form.snippet-editor").on("submit",function(){
		var t = $(this);
		var action = t.attr("action");
		var data = t.serialize();
		$.post(action,data,function (html){
			var message = $("<div>",{"class":"result"}).html(html);
			message.hide().slideDown(250);
			t.after(message);
			
			popOut(0);

			$.gritter.add({
		        title:'Snippet enregistrer ', 
		        text: t.find("input[name=snippetName]").val(),
	
		        image: 'http://betty.excentrik.fr/mnk-include/core/img/ui/fff/64px/checkmark.png',
		        sticky: false,
		        time: ''
			});


			clearEditor();

		})


		return false;

	})

	$('ul.snippet-list li').on("click",function(){
		var t = $(this);
		t.find("a.snippet-edit").trigger("click");
	})




	$("a.snippet-edit").on("click",function (){
		var t = $(this);
		var url = t.attr("href");
		var form = $("form.snippet-editor");
		var ul = t.parent("ul");
		var li = t.parent("li");
		$('.onEditor').removeClass("onEditor");
		li.addClass("onEditor");
		popOut(1);

		$.post(url,function (xml){
			var xml = $(xml);

			var content = xml.find("content").text();

			var tabTrigger = xml.find("tabTrigger").text();
			var scope 	= xml.find("scope").text();
			var description = xml.find("description").text();

			var name = t.find("input").val();


			form.find("textarea#snippet-content").val(content);

			form.find("input[name=snippetName]").val(name);
			form.find("input[name=trigger]").val(tabTrigger);
			form.find("select[name=type]").val(scope);
			form.find("textarea[name=desc]").val(description);

			
			/*alert(xml);*/
		},"xml");

		return false;

	})
	var i = 0;

	function clearEditor(){
		$("form.snippet-editor").find("input[type=text],textarea,select").val("");
		popOut();
	}


	$("input[name=new]").on('click',function (){
		clearEditor();
	});

// $("textarea#snippet-content").select(function (data) {
// 	console.log(data);
// });


});