$(document).ready(function(){
	$("#mail-list .shortcut").on('click',function (){
		var t = $(this);
		var p = t.parents("#mail-list");
		var select = $("input#mode-Select").is(":checked");
if(select){
	t.toggleClass('onSelect');
}
else{
	p.find(".onActive").removeClass('onActive');
	t.addClass('onActive');
}



	});


	$("#mail-remove").on('click',function (){
	var t = $(this);
	if(confirm("etes vous certains de supprimer les mails selectionnés ?")){
		$("#mail-list .onSelect").slideUp(150);

	}
	return false;
});

});