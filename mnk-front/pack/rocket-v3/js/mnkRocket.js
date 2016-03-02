(function($) {
	$.fn.mnkRocketBeta = function(paramSend) {

		var defauts = {
			this 		: this.selector,
			suggest 	: this.attr("id")+"-suggest",
			helper 		: this.attr("id")+"-helper",
			fil 		: this.attr("id")+"-fil",
			result 		: this.attr("id")+"-result",
			url			: "http://metronic.excentrik.fr/mnk-users/0/rocket-v2/params/",
			file 		: "",
			paramCur	: 0,
			load 		: false,
			focusreload	: false,
			help 		: false,
			multiple	: false,
			selectIndex : [],
			selectData	: {},
			selectReq   : {},
			selectFunc  : function (){},
			curID		: "",
			nextID		: "",
			prevID		: "",
			book		: "",
			data 		: {},
			time 		: 125,
			keyCodeList	: [8, 13, 27, 38, 40]
		};


		var param = $.extend(defauts, paramSend);



		param.url = param.url+param.file+".json";

		var launcherSuggest = $('<div>',{"class":"mnk-suggest","id":param.suggest}).width($(this.selector).outerWidth());
		var launcherStickHelper = $('<div>',{"class":"mnk-stick-helper","id":param.helper}).width($(this.selector).outerWidth()-20).css({'margin-right':$(this.selector).outerWidth()});
		var launcherFil = $('<ul>',{"class":"mnk-fil-mini","id":param.fil});
		var launcherResult = $('<ul>',{"class":"mnk-result","id":param.result});

		$(this.selector).addClass('mnk-rocket-input').after(launcherSuggest).before(launcherFil).after(launcherResult);

		var t = {
			"this" 		: $(this.selector),
			"fil"  		: launcherFil,
			"suggest"  	: launcherSuggest,
			"helper"  	: launcherStickHelper,
			"result"  	: $(this.selector+"-result")
		}


		$(this.selector).before("<span class='rocket-title'>"+param.file+"</span>")

		function help(){
			launcherHelp.html("helper")
		}




		function dataLoad(){
			if(param.load == false || param.focusreload){
				$.ajax({
					url		: param.url,
					type 	: 'GET',
					dataType: 'json',
					data 	: {
					param: param.selectIndex
					},
					async	: false,
					cache	: false
					})
					.success(function(json, textStatus) {
						param.data = json;
						param.load  = true;
					})
					.error(function() {
						param.translate = ["erreur de chargement"];
					});
			}
		}


		function createList(){
			helperStickDel();
			var listSuggest = $("<ul>");
			var i =0;
			var x =0;


			if(param.paramCur==0){
				var data = param.data["type-book"];

				$.each(data, function(index, id) {
					var val = param.data.elem[id];
					if(evalList(param.searchStr,val.title)||param.searchStr==x+1){
						var li = $("<li>");
						li.prepend($("<span>",{"class":"small mnk-counter-list"}).html(x+1+"."));
						li.append($("<span>",{"class":"mnk-title"}).html(val.title));
						li.prepend($("<input>",{"class":"mnk-eq","type":"hidden","name":"mnk-eq[]"}).val(i));
						li.prepend($("<input>",{"class":"mnk-eq-real","type":"hidden","name":"mnk-eq-real[]"}).val(x));
						//li.prepend($("<input>",{"class":"mnk-node","type":"hidden","name":"mnk-node[]"}).val(val.node));
						li.prepend($("<input>",{"class":"mnk-id","type":"hidden","name":"mnk-id[]"}).val(id));
						li.prepend($("<input>",{"class":"mnk-value","type":"hidden","name":"mnk-value[]"}).val(val.title));

						// var spanNode = $("<span>",{"class":"small mnk-node-list"}).html(n);
						if(param.help==true){


							var spanHelper = $("<span>",{"class":"small mnk-helper-list"}).html(val.helper)
							li.append(spanHelper);
						}
						listSuggest.append(li);
						i++;
					 }
					 x++;
				});
			}
			else {
				if(param.curTypeID=="type-4"){
				helperStick(param.curID);///
					$.each(param.curList, function(index, val) {
					// var val = param.data.elem[id];
					if(evalList(param.searchStr,val)||param.searchStr==x+1){
						var li = $("<li>");
						li.prepend($("<span>",{"class":"small mnk-counter-list"}).html(x+1+"."));
						li.append($("<span>",{"class":"mnk-title"}).html(val));
						li.prepend($("<input>",{"class":"mnk-eq","type":"hidden","name":"mnk-eq[]"}).val(i));
						li.prepend($("<input>",{"class":"mnk-eq-real","type":"hidden","name":"mnk-eq-real[]"}).val(x));
						//li.prepend($("<input>",{"class":"mnk-node","type":"hidden","name":"mnk-node[]"}).val(val.node));
						li.prepend($("<input>",{"class":"mnk-id","type":"hidden","name":"mnk-id[]"}).val(param.curIDChild));
						li.prepend($("<input>",{"class":"mnk-value","type":"hidden","name":"mnk-value[]"}).val(val));

						// var spanNode = $("<span>",{"class":"small mnk-node-list"}).html(n);

						listSuggest.append(li);
						i++;
					 }
					 x++;
				});
				}
				else if(param.curTypeID=="type-3"){
					helperStick(param.curID);
				}
				else{
					$.each(param.curList, function(index, val) {
					// var val = param.data.elem[id];
					if(evalList(param.searchStr,val.title)||param.searchStr==x+1){
						var li = $("<li>");
						li.prepend($("<span>",{"class":"small mnk-counter-list"}).html(x+1+"."));
						li.append($("<span>",{"class":"mnk-title"}).html(val.title));
						li.prepend($("<input>",{"class":"mnk-eq","type":"hidden","name":"mnk-eq[]"}).val(i));
						li.prepend($("<input>",{"class":"mnk-eq-real","type":"hidden","name":"mnk-eq-real[]"}).val(x));
						//li.prepend($("<input>",{"class":"mnk-node","type":"hidden","name":"mnk-node[]"}).val(val.node));
						li.prepend($("<input>",{"class":"mnk-id","type":"hidden","name":"mnk-id[]"}).val(val.id));
						li.prepend($("<input>",{"class":"mnk-value","type":"hidden","name":"mnk-value[]"}).val(val.title));

						// var spanNode = $("<span>",{"class":"small mnk-node-list"}).html(n);
						if(param.help==true&&val.helper!=""){
							var spanHelper = $("<span>",{"class":"small mnk-helper-list"}).html(val.helper)
							li.append(spanHelper);
						}
						listSuggest.append(li);
						i++;
					 }
					 x++;
					});
				}
				
			}




			launcherSuggest.html(listSuggest);



			listSuggest.find("li").first().addClass("onSelect");

			param.navIndexCur = 0;
			param.navIndexMax = i - 1;
			// $('#nbResult').html(i);
		}

		$(this.selector).on('focusin',function (){
			var t = $(this);
			var searchStr = t.val();
			param.searchStr = searchStr;
			param.searchRegExp = createRegExp(searchStr);
			dataLoad();
			createList();
		});
function helperStick(id){
	console.log("stick "+id);

	var info = param.data.elem[id].helper;
	if(info!="")
		t.this.after(launcherStickHelper.html(info))
	// alert(id);

	//$(this.selector).after("<div>helper</div>");
}
function helperStickDel(){
	launcherStickHelper.remove();
}

		function createRegExp(strFind) {
			var strReg = "";
			var regexp = "[a-zA-Z\s\_\-]{0,}";
			$.each(strFind, function(index, val) {
				strReg = strReg + val + regexp;
			});
			return strReg;
		}
		function evalList(strFind, str) {

			reg = createRegExp(strFind);

			var patt = new RegExp(reg,"i");
			var eval = patt.test(str);

			return eval;
		}


		$(document).on("keyup keydown", this.selector, function(e) {

			if (e.type == "keyup") {
				var t = $(this);
				var searchStr = t.val();
				param.searchStr = searchStr;
				param.searchRegExp = createRegExp(searchStr);

				if ($.inArray(e.keyCode, param.keyCodeList) > 0) {
					if (e.keyCode == 13) {
						paramNavigatorNext();
					}
					else if (e.keyCode == 27) {
						if(t.val()==""){
							if($("body").hasClass('onAltMaj'))
								paramNavigatorClear();
							else
								paramNavigatorBefore();
						}
						else{
							t.val("");
						}
						
					}
					return false;
				}

				createList();

			} else if (e.type == "keydown") {
				if (e.keyCode == 40)
					keyboardNavigator("+");
				else if (e.keyCode == 38)
					keyboardNavigator("-");
			}
		})


		function keyboardNavigator(sens) {
			// console.log(sens);
			if (sens == "+") {
				if (param.navIndexCur < param.navIndexMax)
					param.navIndexCur++
			} else if (sens == "-") {
				if (param.navIndexCur > 0)
					param.navIndexCur--
			}

			launcherSuggest.find("li").removeClass("onSelect").eq(param.navIndexCur).addClass("onSelect");
			return false;
		}


		function paramNavigatorClear(){
			param.selectIndex = [];
			t.fil.html("");
			
			param.paramCur=0;
			param.book="";
			param.selectData={};
			t.this.val("").trigger("keyup");
		}
function paramNavigatorBefore(){
	t.fil.find("li").last().remove();
	param.selectIndex.pop();

	if(param.paramCur>0){
		param.paramCur--;

		var eqLast = param.selectIndex.length;
		param.curID = param.selectIndex[eqLast].id;
		srcListForNext();

	}
	else
		paramNavigatorClear();


	t.this.val("").trigger("keyup");

}

function srcListForNext(){

	console.log("fornext");

	param.curTypeID = param.data.elem[param.curID].typeID;
	param.curListID = param.data.elem[param.curID].child;


	curList = [];
	// console.log(param.curType);
	if(param.curTypeID=="type-book"){
		$.each(param.curListID, function(index, val) {
			//console.log(index);
			var elemData = param.data.elem[val];
			 curList.push(elemData);
		});
		param.curList = curList;
	}
	else if(param.curTypeID=="type-1"){
		$.each(param.curListID, function(index, val) {
			//console.log(index);
			var elemData = param.data.elem[val];
			 curList.push(elemData);
		});
		param.curList = curList;
	}
	else if(param.curTypeID=="type-2"){
		$.each(param.curListID, function(index, val) {
			//console.log(index);
			console.log(param.data.elem[val].data);
			var elemData = param.data.elem[val].data;
			 curList.push(elemData);
		});
		param.curList = curList;
	}

	else if(param.curTypeID=="type-4"){
		var url = param.data.elem[param.curID].param_url;
		if(url!=""){
			$.ajax({
				url: url,
				type: 'POST',
				dataType: 'json',
				data 	: {
					param: param.selectData
				},
				async	: false,
				cache	: false
				})
			.done(function(json) {
				param.curIDChild = param.curListID[0];
				param.curList = json;

				// console.log("success");
			})
			.fail(function() {
				// console.log("error");
				param.curList = {"msg":"erreur de chargement"};;
				// param.curIDChild = 
			})
			.always(function(json) {
			});
		}
		else {

		}
	}
}
$(document).on('mousedown',".mnk-suggest li",function (){
	var t = $(this);
	t.parents(".mnk-suggest").find('.onSelect').removeClass('onSelect');
	t.addClass('onSelect');
	var e = jQuery.Event("keyup", {
				keyCode: 13
	});
	t.parents(".mnk-suggest").prev().prev(".mnk-rocket-input").trigger(e);
	return false;
});

function paramNavigatorNext(){

			if(true){
				value 	= t.suggest.find(".onSelect").find(".mnk-value").val();
				id		= t.suggest.find(".onSelect").find(".mnk-id").val();
				eq 		= t.suggest.find(".onSelect").find(".mnk-eq-real").val();

				param.selectIndex.push({"id":id,"value":value,"eq":eq});
				param.selectData[id]=value;
				param.curID = id;

				if(param.paramCur==0)
					param.book = $.parseJSON(param.data.elem[id].node_json);

				t.fil.append("<li id=fil-"+id+">"+value+"</li>");
				t.suggest.html("")


				param.paramCur++;
				srcListForNext(id);

				t.this.val("").trigger("keyup");

			}
		}

	}
})(jQuery);