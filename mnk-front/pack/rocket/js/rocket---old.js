$(document).ready(function(){

	var url = "http://metronic.excentrik.fr/mnk-users/0/rocket/scan-pack.json";
	$.getJSON(url,function (data){
		//console.log(data);

	$('input.rocket').on("keyup",function(e){
		var t = $(this);
		var launcher = $('#rocket-launcher').find("ul");
		launcher.html("");

		$.each(data, function(index, val) {
			//console.log(t.val()+i++);
		var eval = evalList(t.val(),val.pack);
		if (eval) {
				var li = $("<li>",{"class":"launcher"});
				li.html(val.pack);
				launcher.append(li);
		}
		});
		//$("#rocket-launcher li").first().addClass('onSelect');
		//navKey(e);	
	})
	.on('keydown',function(e){
		$("#rocket-launcher").animate({
			"opacity":1,
			"margin-top":5
		});
	})
	.on('focusin',function (){
		var ul = $("<ul>");
		var rocketFil = $("<div>",{"class":"rocket-fil small"});
		var launcher = $("<div>",{"id":"rocket-launcher","class":"rocket-list"}).css({"opacity":0,"margin-top":15}).append(ul).prepend(rocketFil);
		$(this).after(launcher);
	})
	.on('focusout',function (){
		var t = $(this);
		t.val("");
		$('#rocket-launcher').animate({
			"opacity":0,
			"margin-top":15
		},350, function (){
			$(this).remove();
		})
	});


function createRegExp(strFind){
	var strReg = "";
	var regexp = "[a-zA-Z-]{0,}";
	$.each(strFind,function(index,val){
		strReg = strReg+val+regexp;
	});


	return strReg;
}

function evalList(strFind,str){
	reg = createRegExp(strFind);

	var patt = new RegExp(reg);
	var eval = patt.test(str);

	return eval;
}


	$(document).on("click","li.launcher",function(){
		var t = $(this);
		var type = t.html()
		var url = "http://metronic.excentrik.fr/mnk-users/0/rocket/"+type+".json";
		$.getJSON(url,function (data){
			eval(data.func);
		});

		var fil = $('#rocket-launcher .rocket-fil').append(type+" <span class='small'>/</span> ");
		//console.log(type);
	});
	});




});