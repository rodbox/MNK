$(document).ready(function(){
$("form#upd-mod select").on("change",function(){
		$(this).parent("form").trigger("submit");
	})
$('#doc-constant, #doc-mod,#doc-func').localSearch("tr");


});