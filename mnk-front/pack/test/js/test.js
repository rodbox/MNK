$(document).ready(function(){
var json = {
	"link":[
		{
			"type":"text",
			"title":"link",
			"value":"111",
			"child": [
				{
					"type":"text",
					"title":"text",
					"value":"111.111"
				}

			]
		},
		{
			"type":"checkbox",
			"title":"php",
			"value":"222",
			"child": []
		}
	]
};


var select =$('<select>',{"class":"input_json"}).html("<option></option>").after("<div class='input_json_child'></div>");
select.on("change",function (){ 
var t = $(this);

	var meta = json.link[t.val()]



	var label = $('<input>',{type:meta.type,name:"child"})
	var input = $('<label>',{for:"child"}).html(meta.title)
	$('.input_json_child').html("");
	$('.input_json_child').append(input);
	$('.input_json_child').append(label);
	/*console.log(json);*/
})
$.each(json.link, function(index, val) {
/*	var content $('<div>',{id:val.title})*/
	var option = $('<option>',{"type":"text","value":index}).html(val.title);
	select.append(option);
	console.log(index);

});

$('.page').append(select);

})