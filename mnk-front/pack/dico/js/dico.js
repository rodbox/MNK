$(document).ready(function(){
$("#add-dico").mnkLiveForm({
	callback 	: function (html,t){
		t.find("textarea, input").val("");
		//alert(html)
	}
	});
});