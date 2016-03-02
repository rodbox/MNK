$(document).ready(function(){
	$("ul.palette").sortable({
		axis: "y",
		placeholder: "ui-state-highlight"	
	});

	$(".addColor").on('click',function (){
		var t = $(this);

		var palette = t.parents(".color-list").find("ul.palette");
		var paletteLength 	= palette.find("li").length;
		var id = "color-picker-"+(paletteLength+1);
		var li 		= $('<li>');
		var btDel 		= '<span class="small hoverShow"><a href="#" class="delete-color alpha_4">&nbsp;</a></span>';
		var num 	= "<label for='color-value[]'><span class='small'>"+(paletteLength+1)+".</span></label>";
		var inputColorValue = $('<input>',{"type":"text","name":"color-value[]","class":"color-picker","id":id});
		var inputColorName = $('<input>',{"type":"text","name":"color-name[]"}).val('color-'+(paletteLength+1));




		li.click(function(){
			var t = $(this);
		})


		li.append(num);
		li.append(inputColorValue);
		li.append(inputColorName);
		li.append(btDel);
		palette.prepend(li);



		$("input#"+id).spectrum({
    color: "#fff",
    showInput: true,
    showAlpha: false,
    showPalette: true,
    showInitial: true,
    preferredFormat: "hex",
    showSelectionPalette: true,
    showButtons: true,
     palette: [
        ['black', 'white', $(this).val()]
    ],
    move 	: function (color){
    	// console.log(color);
//     	$(this).attr("rel",color.alpha);
// $(this).val(color);
}
    })


return false;
	
	});

$(".color-list form").mnkLiveForm({
	"titleMessage"	: "Sauvegarde",
	"message" 		: "OK"
});

// $(".color-list .footer a").mnkLiveLink({
// 	"titleMessage"	: "Export",
// 	"message" 		: "OK",
// 	callback 		: function (t,html){
// 		alert(t);
// 	}
// });

$(document).on("click",".delete-color",function (){
	var t = $(this);
	t.parents("li").slideUp(125,function(){
		$(this).remove();
	});


	return false;
})



$('.expand').on("click",function(){
	var t = $(this);
	var h = t.parents(".content").height();
	var hDefaut = 350;
	var grib = t.parents(".grib");
	var gribFooter =grib.find(".footer");
	var speed = 150;
	t.toggleClass("expand-open");

	if(t.hasClass('expand-open') && h>hDefaut)
		{
			grib.animate({"height":h+50}, speed)
			gribFooter.animate({"margin-top":h-70}, speed)
			

		}
	else
		{
			grib.animate({"height":hDefaut}, speed)
			gribFooter.animate({"margin-top":hDefaut-115}, speed)
		}

	console.log(h);
	return false;
})

$("#ui-export").mnkLiveForm({
	callback 	: function (html,t){
		t.after(html+"<br>");
	}
	});


});