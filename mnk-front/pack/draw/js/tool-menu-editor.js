$(document).ready(function(){
$("#tool-menu-save").on('submit',function (){
  var t = $(this);
   t.parents(".modal").find("button.close").trigger("click");

var menuList = $('div.tool-menu ul input[type=hidden]');
var data = "";
	menuList.each(function (){
		var menuElem = $(this);
		// data += '{
		// 	name 	: '+menuElem.attr("name")+',
		// 	id 		: '+menuElem.attr("id")+',
		// 	type 	: '+menuElem.attr("type")+'
		// }';


	})
console.log($.parseJson(data));



return false;
});

$("#tool-menu-load").mnkLiveForm({
  callback  : function (html,t){

  }
  });


$("#tool-menu-editor").on('submit',function (){
	var t = $(this);
	var type = t.find("[name=tool-menu-type]").val();
	var name = t.find("[name=tool-menu-name]").val();
	var label = t.find("[name=tool-menu-label]").val();
	var id = t.find("[name=tool-menu-id]").val();
	var defaultValue = t.find("[name=tool-menu-default]").val();


	var meta =  '{"type" : "'+type+'",';
		meta += '"name" : "'+name+'",';
		meta += '"label" : "'+label+'",';
		meta += '"id" : "'+id+'",';
		meta += '"defaultValue" : "'+defaultValue+'"}';

alert(meta);

	var toolMenuElem = $("<input>",{"type":type,"id":id,"name":name}).val(defaultValue);
	var toolMenuElemMeta = $("<input>",{"type":"hidden","name":"menu[]"}).val(meta);
	var toolMenuElemLabel = $("<label>",{"for":name}).html(label);


	//var attrList = new Array ("type","name","label","value","default");


	var toolMenuList = $("<li>").append(toolMenuElemLabel).append(toolMenuElem).append(toolMenuElemMeta);

	$('div.tool-menu ul').append(toolMenuList);

	return false;
});


});