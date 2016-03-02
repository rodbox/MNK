$(document).ready(function(){

var list = ["admin","photo-manager","css-webfont","dico","pack-manager","theme-manager","toodoo","uifinder","test","rocket","css-color-generator","basket-manager"];
	

$('.evalReg input').on("keyup",function(){
	var strFind = $('input[name=strFind]').val();	
	
	var regexp = $('input[name=regexp]').val();	

	var strReg = regexp;

	$.each(strFind,function(index,val){
		strReg = strReg+val+regexp;
	});

	evalList(strReg);
	$('.resultExplode').html(strReg);
})


function evalList(regexp){
	if($('input[name=strFind]').val()!=""){
		
		$.each($("#rocket-list li"), function(index, val) {
			var t = $(this);
			var li = t.eq(0);
			var str = li.html();
			

			var patt = new RegExp(regexp);
			var eval = patt.test(str,"i");
			if (eval)
				li.addClass("onSelect");
			else 
				li.removeClass("onSelect");
		});
//		navList(0);
		
	}
	else {
		$("#rocket-list li").removeClass("onSelect")
	}
}

// function navList(eq){
// 	// console.log($("#rocket-list li.onNav").index());
// 	$("#rocket-list li.onNav").removeClass("onNav");

// 	$("#rocket-list li").eq(eq).addClass("onNav");
	
// }
// $(document).on('keydown',function (e){
// 		var t = $(this);

// 		var eq = $("#rocket-list li.onNav").index();
		

// 	if(e.keyCode == 40 )
// 		navList(eq+1);
// 	else if (e.keyCode == 38)
// 		navList(eq-1);
// 		//console.log(e.keyCode);
	
// 	});


var ul = $("<ul>",{"id":"rocket-list"})
$.each(list,function(index,val){
		var li = $("<li>").html(val);
		ul.append(li);
	})
$(".resultList").html(ul);

$('.evalReg input').trigger("keyup");





});