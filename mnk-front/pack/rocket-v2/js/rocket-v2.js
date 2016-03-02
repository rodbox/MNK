(function($) {
	$.fn.mnkRocket = function(paramSend) {

		var defauts = {
			this: this.selector,
			launcherList: $('#rocket-launcher-list'),
			url: "",
			data: "",
			curParam: 0,
			reqParam: 1,
			index: 0,
			freeParam: false,
			navParam: "child",
			selectParam: [],
			selectIndex: [],
			nodeList: [],
			funcActive: function() {},
			suggestList: [],
			searchStr: "",
			curView: "",
			searchRegExp: "",
			navIndexMax: 0,
			translate: {},
			recMode: false,
			recStory: [],
			navIndexCur: 0,
			keyCodeList: [8, 13, 27, 38, 40]
		};


		var param = $.extend(defauts, paramSend);


		$.ajax({
			url: param.url,
			type: 'GET',
			dataType: 'json',
			data: {
				param: param.selectIndex
			},
			async: false,
			cache: false
		})
			.success(function(json, textStatus) {

				param.data = json;
			})
			.error(function() {
				param.translate = ["erreur de chargement"];
				// alert("erreur de chargement");
			});



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


		function srcListForNext() {
			var idChild = param.nodeList[param.curParam - 1];
			var child = param.data.child[idChild];
			var type = child.type;
			var view = child.view;
			param.curView = view;
			if (type == "link") {
				var url = child.url;

				$.ajax({
					url: url,
					type: 'POST',
					dataType: 'json',
					data: {
						param: param.selectIndex
					},
					async: false,
					cache: false
				})
					.success(function(json, textStatus) {

						param.translate = json;
					})
					.error(function() {
						param.translate = ["erreur de chargement"];
						// alert("erreur de chargement");
					});

				var list = param.translate;
				param.freeParam = false;
				// var list = child.data;
			} else if (type == "child" || type == "siblings") {
				var list = child.data;
				param.freeParam = false;
			} else if (type == "free") {
				var list = [];
				param.freeParam = true;
			}
			return list;
		}


		function createList() {
			var ul = $('<ul>');
			var i = 1;

			if (param.curParam == 0) {
				var list = param.data.func;
				$.each(list, function(index, val) {
					if (evalList(param.searchStr, val.title)) {
						var result = $("<span>", {
							"class": "result"
						}).html(val.title)
						var li = $('<li>', {
							"class": "rocket-func"
						}).html(result);

						var hidden_index = $('<input>', {
							'type': 'hidden',
							'class': 'index'
						}).val(index);

						var hidden_val = $('<input>', {
							'type': 'hidden',
							'class': 'value'
						}).val(val);

						var count = $("<span>",{"class":"mini-count small alpha_5"}).html(i+". ");


						li.prepend(hidden_index);
						li.prepend(hidden_val);
						li.prepend(count);
						ul.append(li);
						i++;
					}
				});
			} else {
				// console.log(param.curList);
				$.each(param.curList, function(index, val) {
					if (evalList(param.searchStr, val)) {
						var result = $("<span>", {
							"class": "result"
						}).html(val)
						var li = $('<li>').append(result)
						var inputHidden = $('<input>', {
							'type': 'hidden',
							'class': 'index'
						}).val(index);
						var count = $("<span>",{"class":"mini-count small alpha_5"}).html(i+". ");
						li.prepend(inputHidden);
						li.prepend(eval(param.curView));
						li.prepend(count);
						ul.append(li);
						i++;
					}
				});
			}
			ul.find("li").first().addClass("onSelect");
			param.launcherList.html(ul);
			param.navIndexCur = 0;
			param.navIndexMax = i - 2;
			$('#nbResult').html(i);
		}

		$(document).on('click', "#rocket-launcher-list ul li", function() {
			var t = $(param.this);

			param.launcherList.find("li").removeClass("onSelect");
			t.addClass("onSelect");

			var e = jQuery.Event("keyup", {
				keyCode: 13
			});
			$(param.this).val(t.find(".result").html()).trigger(e).focus();
		})


		$(document).on('mousedown', "#rocket-launcher-list ul li", function() {
			var t = $(this);
			param.launcherList.find("li").removeClass("onSelect");
			t.addClass("onSelect");
		})



		$(document).on("keyup keydown", this.selector, function(e) {

			if (e.type == "keyup") {
				var t = $(this);
				var searchStr = t.val();
				param.searchStr = searchStr;
				param.searchRegExp = createRegExp(searchStr);

				if ($.inArray(e.keyCode, param.keyCodeList) > 0) {
					if (e.keyCode == 13) {
						paramNavigator("+");
					}
					else if (e.keyCode == 27) {
						paramNavigator("clear");
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



		function rocketExec() {
			var idFunc = param.selectIndex[0];
			var func = param.data.func[idFunc].func;

			var param1 = param.selectParam[1];
			var param2 = param.selectParam[2];
			var param3 = param.selectParam[3];
			var param4 = param.selectParam[4];
			eval(func);

			paramNavigator("clear");
		}



		function keyboardNavigator(sens) {

			if (sens == "+") {
				if (param.navIndexCur < param.navIndexMax)
					param.navIndexCur++
			} else if (sens == "-") {
				if (param.navIndexCur > 0)
					param.navIndexCur--
			}

			param.launcherList.find("li").removeClass("onSelect").eq(param.navIndexCur).addClass("onSelect");
			helper(param.navIndexCur);
		}

		function helper() {
			var helper = $('#rocket-helper');
			var idHelper = "helper-" + param.curParam;

			var paramFil = $(".param-select");

			var param0 = parseInt($('#param0').html());
			var param1 = parseInt($('#param1').html());
			var param2 = parseInt($('#param2').html());
			var param3 = parseInt($('#param3').html());
			var param4 = parseInt($('#param4').html());

			if (param.curParam == 0) {
				var ul = $("<ol>");

				var info = param.data[param0].helper;
				var li = $("<li>", {
					"id": idHelper
				}).html(info);

				ul.append(li);
				helper.html(ul);
			} else {
				var info = param.data[param0].child[0].helper;

				if ($("#" + idHelper).length < 1) {
					var li = $("<li>", {
						"id": idHelper
					});
					helper.find("ol").append(li);
				}
				$("#" + idHelper).html(info);
			}
			helper.find("ol").find(".helper-cur").removeClass('helper-cur');
			$("#" + idHelper).addClass('helper-cur');
		}

		function paramNavigator(sens) {
			var t = $(param.this);

			if (sens == "+") {
				if (param.curParam == 0) {
					var idParam = param.launcherList.find("ul li.onSelect").find(".index").val();
					var valueParam = param.launcherList.find("ul li.onSelect").find(".result").html();
					param.selectIndex = [];
					param.selectIndex.push(idParam);

					param.selectParam = [];
					param.selectParam.push(idParam);

					param.nodeList = param.data.func[idParam].node;
					$("#param0").html(idParam);
					param.reqParam = param.data.func[idParam].req;
					// console.log(valueParam);
					if(param.recMode){
						param.recStory.push(valueParam);
					}
				} 
				else {
					if (param.freeParam)
						var valueParam = t.val();
					else
						var valueParam = param.launcherList.find("ul li.onSelect").find(".result").html();

					param.selectIndex.push(valueParam);
					param.selectParam.push(valueParam);
					$("#param" + param.curParam).html(valueParam);

					if(param.recMode){
						param.recStory.push(valueParam);
					}
				}

				if (param.curParam < param.reqParam) {
					param.curParam++;
					param.curList = srcListForNext();
				}
				else
					rocketExec();

				t.val("").trigger('keyup');
			} else if (sens == "-") {
				param.selectParam[param.curParam] = "";
				param.selectIndex[param.curParam] = "";
				$("#param" + param.curParam).html("")
				(param.curParam > 0) ? param.curParam-- : "";
				param.curList = srcListForNext();
				t.val("");
			} else if (sens == "clear") {
				param.selectParam = [];
				param.selectIndex = [];
				$("#param0,#param1,#param1,#param2,#param3,#param4").html("");
				param.curParam = 0;
				param.freeParam = false;
				$("#result").html("");
				$("#rocket-launcher-result").html("");
				t.val("").trigger("keyup");
			}



		}


		$(document).on("focusout focusin", this.selector, function(e) {
			if (e.type == "focusout") {
				$("#rocket-launcher-list").html("");
			}
			else if (e.type == "focusin") {
				$(".rocket-launcher").val("").trigger("keyup");
			}
		});

		$(".back").on("click", function(e) {
			// $("#rocket-launcher-fil").hide();
			$("#rocket-launcher-list").html("");

			paramNavigator("clear");
			$(this.selector).trigger('keyup');
			return false;
		})



		function consoleParam() {
			$("#paramActive").html(param.curParam + "/" + param.reqParam);

			var func = param.selectParam[0];
			$('#func').html(param.data[func].func);


			$.each(param.selectParam, function(index, val) {
				$("#param" + index).html(val);
			})
		}

	}
})(jQuery);


$(document).on("keydown", function(event) {
	if (event.keyCode == 18) {
		if ($("body").hasClass("onAltCtrl")) {
			$('input.rocket-launcher').trigger("focus");
		}
	}
})

$(document).ready(function() {
	$('input.rocket-launcher').mnkRocket({
		// url : "http://metronic.excentrik.fr/mnk-users/0/rocket-2/rocket-params.json"
		url: "http://metronic.excentrik.fr/mnk-users/0/rocket-2/params/my-rocket.json"
	})


});