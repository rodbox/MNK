$(document).ready(function(){





$("#thiefOnLive").mnkLiveForm();
$("#thiefOnLive").on("submit",function (){
	var list ={
		"industrie" 	: [1352,1590],
		"services" 		: [1591,2016],
		"btp" 			: [557,813],
		"commerce" 		: [814,1351],
		"agroalimentaire" 	: [506,556],
		"regional" 		: [4774,482]
	} 
	$.each(list,function(key,val){
		$("input[name=first]").val(val[0]);
		$("input[name=last]").val(val[1]);
		$("input[name=title]").val(key);

		$("#thiefOnLive").trigger("submit");
			
		})

	});


});