(function($) {
	$.fn.mnkDrag = function(paramSend) {

		var defauts = {
			savePos: [],
			idFunc: 0,
			idParam: 0,
			idLink: 0,
			idDraw: 0,
			onMove: false,
			onResizeMode:false,
			lineId: 0,
			param: "",
			mouseDown: [],
			mouseDif: [],
			posOrigin: [],
			layerPosition: [],
			fixedAxis: "",
			keyMoveValue: {
				37: ["left", -10],
				38: ["top", -10],
				39: ["left", 10],
				40: ["top", 10]
			}
		};


		var param = $.extend(defauts, paramSend);

		$(document).on('mousedown', this.selector, function(e) {
			param.onMove = true;
			$("body").addClass("onMove");
			param.mouseDown = [e.clientX, e.clientY]
			param.layerPosition = $(".layer").offset();
			posOriginElem();


		})

		$(document).on('mouseup', function(e) {
			param.onMove = false;
			param.posOrigin = [];

		})



		$(document).on('mousemove', function(e) {
			if (param.onMove && !$("body").hasClass("onResizeMode")) {
				var difX = e.clientX - param.mouseDown[0];
				var difY = e.clientY - param.mouseDown[1];
				param.mouseDif = [difX, difY];

				param.fixedAxis = (Math.abs(difX) > Math.abs(difY)) ? "x" : "y";

				moveElem();
			}
		})


		function protectProject(bool,id){
			console.log("protect-on depuis la fonction mnkDrag => "+id);
			var layer = $('.layer')
			if(bool!=""){
				if(!layer.hasClass("protect-on"))
					layer.addClass('protect-on');
			}
			else 
				layer.removeClass('protect-on');

			$('#projectProtect').val(bool);
		}

		function posOriginElem() {
			$.each($(".onSelectDrag"), function(index, val) {
				var t = $(this);
				param.posOrigin[index] = t.offset();
			});
		}


		function RemoveDupArray(a) {
			a.sort();
			for (var i = 1; i < a.length; i++) {
				if (a[i - 1] === a[i])
					a.splice(i, 1);
			}
		}


		function moveDrawLinked(t) {
			if (t.attr("reldraw")) {


				fusionList = t.attr("reldraw").split("--")

				$.each(fusionList, function(index, val) {
					var obj = val.split(",");
					var draw = $("#" + obj[0]);
					if (draw.length == 1) {
						var rel1 = draw.attr("rel1");
						var rel2 = draw.attr("rel2");
						posA = $("#" + rel1).offset();
						posB = $("#" + rel2).offset();
						var layerPos = $("svg.linker-zone").offset();

						var hookHA = $("#" + rel1).outerHeight() / 2;
						var hookWA = $("#" + rel1).outerWidth();

						var hookHB = $("#" + rel2).outerHeight() / 2;
						var hookWB = $("#" + rel2).outerWidth();


						draw.attr({
							'x1': posA.left - layerPos.left + hookWA -10,
							'y1': posA.top - layerPos.top + hookHA,
							'x2': posB.left - layerPos.left+10,
							'y2': posB.top - layerPos.top + hookHB
						});
					}

				});
				protectProject("true","moveDrawLinked");
			}



		}

		function moveElem() {
			var zoom = $("input[name=zoom]").val() / 100;
			var layerW = $(window).width();
			var layerH = $(window).height();
			var zoomDif = 1 - zoom;
			var zoomT = layerH * zoomDif;
			var zoomL = layerW * zoomDif;
			// console.log(zoomDif);
			$.each($(".onSelectDrag"), function(index, val) {
				var t = $(this);
				if (!$("body").hasClass("onAltMaj")) {
					var left = param.posOrigin[index].left * zoom + param.mouseDif[0] - param.layerPosition.left;
					var top = param.posOrigin[index].top + param.mouseDif[1] - param.layerPosition.top;

				} else {
					if (param.fixedAxis == "x") {
						var top = param.posOrigin[index].top - param.layerPosition.top;
						var left = param.posOrigin[index].left + param.mouseDif[0] - param.layerPosition.left

					} else {
						var top = param.posOrigin[index].top + param.mouseDif[1] - param.layerPosition.top;
						var left = param.posOrigin[index].left - param.layerPosition.left;

					}
				}
				t.css({
					top: top,
					left: left
				})
				moveDrawLinked(t);
			});
			protectProject("true","move elem");
		}



	}
})(jQuery);



$(document).ready(function() {

	$(document).on("mousemove mouseup", function(e) {
		var t = $(".onResize");
		if (e.type == "mousemove" && !$("#rocket-param-select").hasClass("toggled-on")) {

			var pos = t.offset();
			var width = e.pageX - pos.left;

			var inputW = width - 45;
			var textareaW = width - 20;
			var toggleMeMarg = width - 20;
			var toggleGroup = width - 34;
			var metaCount = width + 8;
			var hookTochildMarg = width;

			var list = $(".onSelectDrag");
			if (list.length>0){
				$.each(list, function(index, val) {
					var t = $(this);
					t.width(width);
					t.find("input").width(width - 45);
					t.find("textarea").width(width - 20);
					t.find(".toggle-me").css("margin-left", width - 20);
					t.find(".group-linked-toggle").css("margin-left", width - 34);
					t.find(".rocket-param-meta-count").css("margin-left", width + 8);
					t.find(".rocket-param-hook-to-child").css("margin-left", width);
					moveDrawLinkedByThis(t);
				});

			}
			else {
				t.width(width);
				t.find("input").width(width - 45);
				t.find("textarea").width(width - 20);
				t.find(".toggle-me").css("margin-left", width - 20);
				t.find(".group-linked-toggle").css("margin-left", width - 34);
				t.find(".rocket-param-meta-count").css("margin-left", width + 8);
				t.find(".rocket-param-hook-to-child").css("margin-left", width);
				moveDrawLinkedByThis(t);
			}
			protectProject("true","resize");
		}

		else {
			t.removeClass("onResize");
			$("body").removeClass("onResizeMode");
		}
	})


	$(document).on("mousedown", "a.bt-resize", function(e) {
		$("#rocket-param-select").removeClass("toggled-on");
		$(this).parents(".rocket-param-edit").addClass("onResize");
		$("body").addClass("onResizeMode");
		// param.onResizeMode=true;
	})


	$(".rocket-param-edit").mnkDrag();


	$(".param-edit dt").on('click', function(e) {

		$(this).toggleClass('toggle-mini-open').next().slideToggle(125);
	});

	$(document).on('click', ".toggle-next", function() {

		$(this).toggleClass('toggle-next-open').parents(".rocket-param-edit").toggleClass('param-edit-open').find("dl").slideToggle(125);
	});



	$(".param-edit dt").addClass("toggle-mini");
	$(".rocket-param-navigator").on('change', function() {
		var t = $(this);
		var p = t.parents(".rocket-param-edit");

		var cla = 'rocket-param-' + t.val();

		p.removeClass('rocket-param-free');
		p.removeClass('rocket-param-sibling');
		p.removeClass('rocket-param-child');
		p.addClass(cla);
	});

	$(".toggle-next").on('change', function() {
		$(this).after().slideToggle();
	});

	$('.rocket-param-edit h2').dblclick(function() {
		$(this).find(".toggle-next").trigger("click")
	});


	$("#clean").on('click', function() {
		var num = cleanLink();
		var t = $(this);
		var info = $("<span>", {
			"class": "small mini-counter"
		}).html(num);
		t.append(info);
		setTimeout(function() {
			info.fadeOut('150', function() {
				$(this).remove();
			});
		}, 1000);
		return false;
	});

	function cleanLink() {
		var list = $(".type-1 .rocket-param-hook-to-parent");
		var i = 0;

		$.each(list, function(key, val) {

			var t = $(this);
			t.attr("reldraw","");
			i++;


		})

		return i;
	}



	$(document).on('click','#loading-param',function() {
		var t = $(this);
		var filename = $('select[name=rocket-file]').val();
		if(clearProject()){
			$.ajax({
				url: t.attr("href"),
				type: 'GET',
				dataType: 'json',
				beforeSend: function( xhr ) {
					
				},
				data: {filename: filename},
			})
			.done(function(data) {
				$(".layer").html(data.html);
				$("#idDraw").val(data.idDraw);
				$("#projectFile").val(data.projectFile);
				$("#projectShare").val(data.projectShare);
				$("svg.linker-zone").css("background-image",data.bg);
				cleanSize();
				createLineForLoad();
				

				$('.rocket-param-edit')
					.drop("start", function() {
						$(this).addClass("onHoverDrop");
					})
					.drop(function(ev, dd) {
						$(this).toggleClass("onSelectDrag");

					})
					.drop("end", function() {
						$(this).removeClass("onHoverDrop");
					}).on("mouseenter", function() {
						$("body").addClass("offDrag");
					}).on("mouseleave", function() {
						$("body").removeClass("offDrag");
			});
			})
			.fail(function() {
				//console.log("error");
			})
			.always(function() {
				//console.log("complete");
			});
}
		return false;

	})

function cleanSize(){
	$(".elem").css("width","");
}


	function showAll() {
$('.layer .elem').show();

	}
	$('.sub-menu-top ul li.toggled, .sub-menu-top ul li a.toggled').click(function() {
		var t = $(this);
		if (t.hasClass("toggled-on"))
			t.toggleClass('toggled-on');
		else {
			$(".toggled-on").removeClass("toggled-on")
			t.addClass('toggled-on');
		}

		
	})
$('.sub-menu-top ul li a.toggled').click(function() {
	return false;
});

	$("#rocket-param-unselect").click(function() {
		$(".onSelectDrag").removeClass("onSelectDrag");
	})
	$("#rocket-tools").click(function() {
		$("#tools-editor").toggle();
	});

	$("#rocket-param-select-all").click(function() {
		$(".layer .elem").addClass("onSelectDrag");
	});
	$(".rocket-param-select").click(function() {
		var t = $(this);
		$(".onSelectDrag").removeClass("onSelectDrag");
		var type = t.attr("href").replace("#", ".");
				// console.log(type);
		$(type).addClass("onSelectDrag");
	});


	$(".rocket-param-select-linked").click(function() {
		var select = $(".onSelectDrag");
		$.each(select, function() {
			var t = $(this);
			var type_1_node = exportChildNodeLoop(t.attr("id"));
			// console.log( type_1_node);
			var child = type_1_node.split("[");
			$.each(child, function(key, val) {
				var val = val.replace(new RegExp("]", "g"), '');
				$("#" + val).addClass("onSelectDrag");
			})

		})



	})


	$("#rocket-param-select-toggle").click(function() {
		$(".layer .elem").toggleClass("onSelectDrag");
	});

	$(document).on("click",'#rocket-param-rocket',function() {
		var t 					= $(this);
		var url 				= t.attr("href");
		var data 				= {};
		var fileName 			= $('input[name=rocket-file]').val();
		var share 				= ($('input[name=rocket-file-share]').attr("checked")=="checked")?true:false;
		data["fileName"] 		= fileName
		data["bg"] 				= $('svg.linker-zone').css("background-image");
		data["idDraw"] 			= $('#idDraw').val();
		data["projectFile"] 	= fileName;
		data["projectShare"] 	= share;
		data["elem"] 			= {};

		var elemTypeList 		= new Array(1,2,3,4,"book");
		$.each(elemTypeList, function(index, val) {

			 var cur_type_list = $(".layer .type-"+val);
			 var cur_type = "type-"+val;

			 data[cur_type] =  [];

				 $.each(cur_type_list, function(indexType,valType) {

				 	var cur_elem 	= $(this);
				 	
				 	if(cur_elem.length == 1){

				 		var cur_id 		= cur_elem.attr("id");
				 		var cur_reldraw = cur_elem.attr("reldraw");
				 		var cur_toggle_me = (cur_elem.hasClass('toggle-me-on'))?'toggle-me-on':'';
				 		var cur_toggle_group = (cur_elem.hasClass('toggle-group'))?'toggle-group':'';
				 		var cur_reldraw_toChild = cur_elem.find(".rocket-param-hook-to-child").attr("reldraw");
				 		var cur_reldraw_toParent = cur_elem.find(".rocket-param-hook-to-parent").attr("reldraw");
				 		var cur_reldraw = cur_elem.attr("reldraw");
				 		var cur_style 	= cur_elem.attr("style");
					 	var cur_title 	= cur_elem.find(".type-title").val();
					 	var cur_info 	= cur_elem.find("input[name=type-info]").val();
					 	// console.log(cur_info);
					 	var cur_type_name 	= cur_elem.find(".type-link").val();
					 	var cur_node 	= exportChildNodeLoop(cur_id);
					 	var cur_node_child_direct 	= extractChildNodeArray(cur_id);
					 	// console.log(cur_node_child_direct);

					 	var cur_pos_y		= cur_elem.css("top");
					 	var cur_pos_x		= cur_elem.css("left");

					 	data[cur_type].push(cur_id);


					 	var cur_viewForm = cur_elem.find("input[name=view-form]").val();
					 	var cur_viewMenu = cur_elem.find("input[name=view-menu]").val();
					 	var cur_viewInput = cur_elem.find("input[name=view-input]").val();

					 	data.elem[cur_id] = {
					 		"id"		: cur_id,
					 		"title"		: cur_title,
					 		"style"		: cur_style,
					 		"toggleMe"	: cur_toggle_me,
					 		"toggleGroup":cur_toggle_group,
					 		"reldraw"	: cur_reldraw,
					 		"reldraw_child"	: cur_reldraw_toChild,
					 		"reldraw_parent": cur_reldraw_toParent,
					 		"helper"	: cur_info,
					 		"typeID"		: cur_type,
					 		"type"		: cur_type_name,
					 		"node"		: cur_node,
					 		"child"		: cur_node_child_direct,
					 		"pos"		: {"left":cur_pos_x,"top":cur_pos_y},
					 		"view_form"	: cur_viewForm,
							"view_menu"	: cur_viewMenu,
							"view_input": cur_viewInput
					 	};

					 	if(cur_type == "type-1"){
					 		data.elem[cur_id]["app_padding"]= (cur_elem.find("input[name=app_padding]").attr("checked")=="checked")?"app-padding":"";


					 		data.elem[cur_id]["app_class"]= cur_elem.find("input[name=app_class]").val();
					 		data.elem[cur_id]["app_class_sub"]= cur_elem.find("input[name=app_class_sub]").val();
					 		data.elem[cur_id]["app_bg"]= cur_elem.find("select[name=app_bg]").val();

					 		alert(data.elem[cur_id]["app_bg"]);


					 		var cur_power = cur_elem.find("select[name=type-power]").val();
					 		data.elem[cur_id]["power"] = cur_power;

					 		var cur_func = cur_elem.find("textarea.type-func").val();
					 		data.elem[cur_id]["func"] = cur_func;

					 		var cur_submit = cur_elem.find("input[name=type-info-submit]").val();
					 		data.elem[cur_id]["submit"] = cur_submit;



					 		var pointerList = cur_elem.find("input[name='pointer[]']");
					 		var pointerValueList = cur_elem.find("input[name='pointer_value[]']");
					 		var exportList = {};
					 		$.each(pointerList,function(pointerKey,pointerVal){
					 			var pointer = $(this);
					 			var pKey = pointer.val();
					 			if(pKey!=""){
						 			var pValue = pointerValueList.eq(pointerKey).val();
						 			exportList[pKey] = pValue;
					 			}
					 		})
					 		data.elem[cur_id]["pointer"] = exportList;


					 		var jsFileList = cur_elem.find("input[name='js_file[]']");
					 		var exportJSList = [];
					 		var exportJSDisableList = [];
					 		$.each(jsFileList,function(jsFileKey,jsFileVal){
					 			var jsFile = $(this);
					 			if(jsFile.val()!=""){
					 				exportJSList.push(jsFile.val());
					 				if(jsFile.parents("tr").find("input[type=checkbox]").attr("checked")=="checked")
					 					exportJSDisableList.push(jsFile.val());
					 			}
					 		})
					 		data.elem[cur_id]["js_file"] = exportJSList;
					 		data.elem[cur_id]["js_file_disable"] = exportJSDisableList;



					 		var cssFileList = cur_elem.find("input[name='css_file[]']");
					 		var exportCSSList = [];
					 		var exportCSSDisableList = [];
					 		$.each(cssFileList,function(cssFileKey,cssFileVal){
					 			var cssFile = $(this);
					 			if(cssFile.val()!=""){					 								 				exportCSSList.push(cssFile.val());
					 				//console.log(cssFile.parents("tr").find("input[name=css_file_disable[]]").attr("checked"));
					 				if(cssFile.parents("tr").find("input[type=checkbox]").attr("checked")=="checked")
					 					exportCSSDisableList.push(cssFile.val());

					 			}
					 		})
					 		data.elem[cur_id]["css_file"] = exportCSSList;
					 		data.elem[cur_id]["css_file_disable"] = exportCSSDisableList;




					 	}
					 	else if(cur_type == "type-2"){
					 		var cur_subType = (cur_elem.find("input[name=subtype-link]").is(":checked"))?"child":"sibling";

					 		var cur_data_input = cur_elem.find(".data").find('input');
					 		var cur_data = new Array();
					 		$.each(cur_data_input, function(index, val) {
					 			var input = $(this);
					 			var value = input.attr("value");
					 			// console.log();
					 			cur_data.push(value);
					 		});


					 		data.elem[cur_id]["data"] = cur_data;
					 		data.elem[cur_id]["subType"] = cur_subType;

					 		var cur_multiple = cur_elem.find("input[name=multiple]").is(":checked");
					 		data.elem[cur_id]["multiple"] = cur_multiple;
					 	}
					 	else if(cur_type == "type-3"){
					 		var cur_reg = cur_elem.find("input[name=type-reg]").val();
					 		data.elem[cur_id]["reg"] = cur_reg;

					 		var cur_msg_true = cur_elem.find("input[name=type-msg-true]").val();
					 		data.elem[cur_id]["msg_true"] = cur_msg_true;

					 		var cur_msg_false = cur_elem.find("input[name=type-msg-false]").val();
					 		data.elem[cur_id]["msg_false"] = cur_msg_false;
					 	}
					 	else if(cur_type == "type-4"){
							var cur_url = cur_elem.find("input[name=param-url]").val();
					 		data.elem[cur_id]["param_url"] = cur_url;
					 		var cur_view = cur_elem.find("input[name=param-view]").val();
					 		data.elem[cur_id]["param_view"] = cur_view;

					 		var cur_multiple = cur_elem.find("input[name=multiple]").is(":checked");
					 		data.elem[cur_id]["multiple"] = cur_multiple;

					 		var pointerList = cur_elem.find("input[name='pointer[]']");
					 		var pointerValueList = cur_elem.find("input[name='pointer_value[]']");
					 		var exportList = {};
					 		$.each(pointerList,function(pointerKey,pointerVal){
					 			var pointer = $(this);
					 			var pKey = pointer.val();
					 			if(pKey!=""){
						 			var pValue = pointerValueList.eq(pointerKey).val();
						 			exportList[pKey] = pValue;
					 			}
					 		})
					 		data.elem[cur_id]["pointer"] = exportList;
					 	}
					 	else if(cur_type == "type-book"){
					 		var cur_node_json 	= exportChildNodeJson(cur_id);
					 		data.elem[cur_id]["node_json"] = cur_node_json;
					 	}
				 	}

				});
			});


		var id = $.gritter.add({
			title: "Enregistrement",
			text: "en cours",
			image: 'http://betty.excentrik.fr/mnk-include/core/img/ui/fff/48px/clock2.png',
			sticky: true,
			time: ''
		});
console.log(data);
		// $("body").addClass("onLoad");
		$.post(url, data, function(data) {
			$("#projectFile").val(fileName);
			$("#projectShare").val(share);
			protectProject("","on save");

			$.gritter.add({
				title: "Enregistrement",
				text: "my-rocket OK",
				image: 'http://betty.excentrik.fr/mnk-include/core/img/ui/fff/48px/checkmark.png',
				sticky: false,
				time: '250'
			});
			$.gritter.remove(id)
		})

		return false;
	})
	
	function exportChildNodeJson(idParent){
		var childList = exportChildNodeLoopJson(idParent);
		// childList = childList.substring(0, childList.length - 1);
		return childList;
	}


	function exportChildNodeLoopJson(idParent, level) {
		var childList = '{"'+idParent+'":[';
		var level = (level == null) ? 0 : level
		var idChild = extractChildNode(idParent);

		if (idChild != "") {

			childSplite = idChild.split(";");
			// console.log(childList);
			$.each(childSplite, function(key, val) {
				// childList += '{"' + val +'":';
				var list = exportChildNodeLoopJson(val, level + 1);
				if (list) {

					childList += list;
				}

				childList += ",";
			})
		}
		else
			{
				childList += '[';
			}
		childList = childList.substring(0, childList.length - 1);
		childList += ']}';


		return childList;
	}





	function exportChildNodeLoop(idParent, level) {
		var childList = "";
		var level = (level == null) ? 0 : level
		var idChild = extractChildNode(idParent);

		if (idChild != "") {

			childSplite = idChild.split(";");
			// console.log(childList);
			$.each(childSplite, function(key, val) {
				childList += "[" + val;
				var list = exportChildNodeLoop(val, level + 1);
				if (list) {

					childList += list;
				}

				childList += "]";
			})
		}



		return childList;
	}

	function extractChildNodeArray(idParent) {
		var idChild = $("#" + idParent).find(".rocket-param-hook-to-child").attr("reldraw");
		if (idChild) {

			var idChild = idChild.split("--");
			idChild = idChild.splice(0, idChild.length - 1);
			var childList = "";
			$.each(idChild, function(key, val) {
				var childSplit = val.split(",");
				childList += childSplit[2].replace(new RegExp("-toParent", "g"), '') + ",";
			})
			childList = childList.substring(0, childList.length - 1);
			return childList.split(",");
		} else {
			return "";
		}
	}	function extractChildNode(idParent) {
		var idChild = $("#" + idParent).find(".rocket-param-hook-to-child").attr("reldraw");
		if (idChild) {

			var idChild = idChild.split("--");
			idChild = idChild.splice(0, idChild.length - 1);
			var childList = "";
			$.each(idChild, function(key, val) {
				var childSplit = val.split(",");
				childList += childSplit[2].replace(new RegExp("-toParent", "g"), '') + ";";
			})
			childList = childList.substring(0, childList.length - 1);
			return childList;
		} else {
			return "";
		}
	}


	function extractData(id, dataToExtract) {
		var data = new Array();

		$.each(dataToExtract, function(key, val) {

			if (val.name == id + "-data[]")
				data.push(val.value);
		})


		return data;
	}

	$("#addP").on('click', function() {
		var t = $(this);
		addParamReq()

	});

	function addParamReq() {
		var list = $('.type-1 .speed-param-info.mnk-tab');

		$.each(list, function() {
			var t = $(this);
			var input = $('<input>', {
				"type": "text",
				"class": "req input-ico placeholder-no-fix",
				"name": "param-req",
				"value": "1"
			}).css({
				"background-image": "url(http://metronic.excentrik.fr/mnk-include/core/img/svg/compass.svg)"
			});
			t.prepend(input);
			// console.log(input);
		})
	}


	$('#param-rocket-new').click(function() {
		clearProject()
		return false;
	})
function clearProject(){
	var eval = evalProtectProjectSave();
	if(eval){
		$("#projectFile").val("");
		$("#projectShare").val(false);
		$("#idDraw").val(0);
		$(".layer").html("");
		$("svg.linker-zone").html("");
		protectProject("","clearProject");
	}
	return eval;
}

function protectProject(bool,id){
	console.log("protect-on id => " + id);
	var layer = $(".layer");
	if(bool!=""){
		if(!layer.hasClass("protect-on"))
			layer.addClass('protect-on');
	}
	else 
		layer.removeClass('protect-on');

	$('#projectProtect').val(bool);
}

function evalProtectProjectSave(){
	var protect = $('#projectProtect').val();
	console.log("eval protect"+protect);
	if(protect!="")
		return (confirm("Avez-vous sauvegarder votre projet en cours ?"));
	else
		return true;
}

	$("#rocket-param-delete").click(function() {
		if (confirm('Êtes-vous certain de vouloir supprimer les elements selectionnés ?'))
			$(".layer .onSelectDrag").fadeOut(150, function() {
				var t = $(this);
				t.remove();
				var idDrawLinked = t.find(".rocket-param-hook").attr("reldraw");
				var drawList = idDrawLinked.split('--');
								// console.log(drawList);
				// if (idDrawLinked){

				$.each(drawList, function(index, val) {
					attributeLinkRemove(val)

				});
				// }

			});

	});


	function attributeLinkRemove(rel) {

		var list = rel.split(",");

		var drawId = list[0];

		var start = $("#" + list[1]);
		var pStart = start.parents(".elem");
		var finish = $("#" + list[2].replace("--", ""));
		var pfinish = finish.parents(".elem");

		startAttr = start.attr("reldraw");
		pStartAttr = pStart.attr("reldraw");
		finishAttr = finish.attr("reldraw");
		pfinishAttr = pfinish.attr("reldraw");



		start.attr("reldraw", startAttr.replace(rel, ""));
		pStart.attr("reldraw", pStartAttr.replace(rel, ""));
		finish.attr("reldraw", finishAttr.replace(rel, ""));
		pfinish.attr("reldraw", pfinishAttr.replace(rel, ""));



		var connected = parseInt(start.find(".rocket-param-hook-connect").html());
		start.find(".rocket-param-hook-connect").html(connected - 1);


		$("#" + drawId).remove();
	}



	$("#uploader").toggle(function() {
			var uploader = $("<div>", {
				id: 'drop-zone'
			})
			$("svg.linker-zone").before(uploader);
		},
		function() {
			$("#drop-zone").remove();
		});

	$(".rocket-type-add").on("click", function(e) {
		var t = $(this);
		var type = t.attr("href");



		createType(type, type, e.pageX, e.pageY);
		protectProject("true","type-add");
	});



	function lastId() {

		var idList = [];
		var paramList = $('.layer .rocket-param-edit');
		$.each(paramList, function() {
			var t = $(this);
			idList.push(parseInt(t.attr("id").replace("e", "")));
		})

		var lastId = (paramList.length > 0) ? Math.max.apply(Math, idList) : 0;

		return lastId;
	}

	function createType(type, title, left, top) {



		var posLayer = $(".layer").offset();
		var model = $("#model " + type);
		var clone = model.clone();
		var w = model.outerWidth();
		var h = model.outerHeight();
		var posLeft = left - posLayer.left;
		var posTop = top - posLayer.top;
		clone.show().css({
			"left": posLeft,
			"top": posTop
		}).keyup(function(e) {
			var t = $(this);
			speedParam(t);
		});

		var cloneId = "e" + (lastId() + 1);



		clone.attr({
			"id": cloneId
		});
		clone.removeClass("hide");
		clone.removeClass("rocket-param-model");
		clone.find(".rocket-param-hook-to-child").attr("id", cloneId + "-toChild");
		clone.find(".rocket-param-hook-to-parent").attr("id", cloneId + "-toParent");
		clone.find(".type-id").html(cloneId);
		clone.find(".type-title").val(title).attr("value", title);

		clone.drop("start", function() {
			$(this).addClass("onHoverDrop");
		})
			.drop(function(ev, dd) {
				$(this).toggleClass("onSelectDrag");
			})
			.drop("end", function() {
				$(this).removeClass("onHoverDrop");
								// console.log("drop end");
			}).on("mouseenter", function() {
				$("body").addClass("offDrag");
			}).on("mouseleave", function() {
				$("body").removeClass("offDrag");
			});

		$(".layer").append(clone);


		clone.find("a.speed-param-info").trigger("click")
		clone.find("input.type-title").val("").focus()

		if (type == "#new-type-2") {
			// console.log("this");
			clone.find(".form-toggle").trigger('click');
		}

		return cloneId;
	}



	$(document).on("click", '.speed-param-child', function() {
		var t = $(this);
		var p = t.parents(".rocket-param-edit");
		var selectSpeed = p.find("ol li.onParamSelect");


		$.each(selectSpeed, function() {
			var tP = $(this);
			var type = "#new-type-2";
			var posTp = tP.offset();
			var title = tP.find(".speed-data").val();
			var id = createType(type, title, posTp.left + tP.width(), posTp.top);

			$("#" + id + " .form-toggle-slide").trigger("mouseup")
			// console.log(id);
		})

	})



	$(' a.rocket-align').click(function() {

		var t = $(this);
		var id = t.attr("id");
		var onSelectDrag = $(".onSelectDrag");

		var animateTime = 125;

		var left = new Array();
		var top = new Array();
		// var height = new Array();
		// var width = new Array();

		var marginRight = 75;
		var marginBottom = 10;

		var height = 75;
		var width = onSelectDrag.width();



		$.each(onSelectDrag, function(index, val) {

			var t = $(this);
			var pos = t.position();

						// console.log(pos);

			var elemLeft = pos.left;
			var elemTop = pos.top;


			// var elemHeight = parseInt(t.css("height"));
			left.push(elemLeft);
			// right.push(elemRight);
			top.push(elemTop);
			// width.push(elemWidth);

		})


		if (id == "rocket-align-left") {
			var max = Math.max.apply(null, left); /* This about equal to Math.max(numbers[0], ...) or Math.max(5, 6, ..) */
			var min = Math.min.apply(null, left);
			onSelectDrag.stop().animate({
				left: min
			}, animateTime);

		} else if (id == "rocket-align-right") {
			var max = Math.max.apply(null, left); /* This about equal to Math.max(numbers[0], ...) or Math.max(5, 6, ..) */
			var min = Math.min.apply(null, left);


			var pRight = max;

			onSelectDrag.stop().animate({
				left: pRight
			}, animateTime);

						// console.log(min);
						// console.log(max);
						// console.log(pRight);
		} else if (id == "rocket-align-center-horizontal") {
			var max = Math.max.apply(null, left); /* This about equal to Math.max(numbers[0], ...) or Math.max(5, 6, ..) */
			var min = Math.min.apply(null, left);



			var center = min + (max - min) / 2;

			onSelectDrag.stop().animate({
				left: center
			}, animateTime);

		} else if (id == "rocket-align-center-vertical") {
			var max = Math.max.apply(null, top); /* This about equal to Math.max(numbers[0], ...) or Math.max(5, 6, ..) */
			var min = Math.min.apply(null, top);


			var center = min + (max - min) / 2;

			onSelectDrag.stop().animate({
				top: center
			}, animateTime);

		} else if (id == "rocket-align-bottom") {
			var max = Math.max.apply(null, top); /* This about equal to Math.max(numbers[0], ...) or Math.max(5, 6, ..) */
			var min = Math.min.apply(null, top);

			onSelectDrag.stop().animate({
				top: max
			}, animateTime);

		} else if (id == "rocket-align-top") {
			var max = Math.max.apply(null, top); /* This about equal to Math.max(numbers[0], ...) or Math.max(5, 6, ..) */
			var min = Math.min.apply(null, top);

			onSelectDrag.stop().animate({
				top: min
			}, animateTime);

		} else if (id == "rocket-align-list-vertical") {
			var max = Math.max.apply(null, top); /* This about equal to Math.max(numbers[0], ...) or Math.max(5, 6, ..) */
			var min = Math.min.apply(null, top);



			var i = 0;

			var posTop = min;
			$.each(onSelectDrag, function(index, val) {
				var posTop = min + (height + marginBottom) * i;
				$(this).stop().animate({
					top: posTop
				}, animateTime);
				i++;
			});


		} else if (id == "rocket-align-list-horizontal") {
			var type1 = $(".onSelectDrag.type-1, .onSelectDrag.type-0");

			var max = Math.max.apply(null, left); /* This about equal to Math.max(numbers[0], ...) or Math.max(5, 6, ..) */
			var min = Math.min.apply(null, left);
			$.each(type1, function(key, val) {
				var t = $(this);
				var child = exportChildNodeLoop(t.attr("id"));
				child = child.substring(1, child.length)
				var child = child.split("[");
				// console.log(child);
				var pos = t.offset();
				var tW = t.width();
				var leftStart = pos.left + tW + marginRight;
				$.each(child, function(key, val) {
					val = val.replace(new RegExp("]", "g"), '');
					var tChild = $("#" + val);
					tChild.addClass("onSelectDrag");
					tChild.animate({
						"left": leftStart,
						"top": pos.top + 3
					}, animateTime);
					leftStart = leftStart + tChild.width() + marginRight;
					// console.log(leftStart);
				})
				// $(".onSelectDrag").removeClass("onSelectDrag");
				// type1.addClass("onSelectDrag");

			})


			// var i = 0;

			// var posTop = min;
			// $.each(onSelectDrag, function(index, val) {
			// 	var width = $(this).width();
			// 	var posLeft = min + (width + marginRight) * i;
			// 	$(this).stop().animate({
			// 		left: posLeft
			// 	}, animateTime);
			// 	i++;
			// });


		} 




		setTimeout(function() {
			moveDrawLinkedByAlign();
		}, animateTime)

		if ($(this).attr("relDraw")) {


			fusionList = $(this).attr("relDraw").split(" ")

			$.each(fusionList, function(index, val) {
				var draw = $("#" + val);
				if (draw.length == 1) {
					var rel1 = draw.attr("rel1");
					var rel2 = draw.attr("rel2");
					posA = $("#" + rel1).offset();
					posB = $("#" + rel2).offset();
					var layerPos = $("svg.linker-zone").offset();

					var hookH = $("#" + rel1).outerHeight() / 2;
					var hookW = $("#" + rel1).outerWidth() / 2;

					draw.attr({
						'x1': posA.left - layerPos.left + hookW -10,
						'y1': posA.top - layerPos.top + hookH,
						'x2': posB.left - layerPos.left + 10,
						'y2': posB.top - layerPos.top + hookH
					});
				}

			});
		}
		protectProject(true," align");
		return false;
	})

	$(document)
		.drag("start", function(ev, dd) {
			if (!$("body").hasClass("offDrag")) {
				if ($('#rocket-param-select').hasClass("toggled-on")) {
					if (!$("body").hasClass("onAltCmd")) {
						$(".onSelectDrag").removeClass("onSelectDrag");
						$(".selection").remove()
					}
					return $('<div class="selection" />').appendTo(document.body);
				}
			}
		})
		.drag(function(ev, dd) {
			$(dd.proxy).css({
				top: Math.min(ev.pageY, dd.startY),
				left: Math.min(ev.pageX, dd.startX),
				height: Math.abs(ev.pageY - dd.startY),
				width: Math.abs(ev.pageX - dd.startX)
			});
		})
		.drag("end", function(ev, dd) {

			// $(".dropped").toggleClass("active")
			$(dd.proxy).remove();
		});



	$('.rocket-param-edit')
		.drop("start", function() {
			$(this).addClass("onHoverDrop");

						// console.log("start");
		})
		.drop(function(ev, dd) {

			$(this).toggleClass("onSelectDrag");


							// console.log("drop");
		})
		.drop("end", function() {
			$(this).removeClass("onHoverDrop");
						// console.log("drop end");
		}).on("mouseenter", function() {
			$("body").addClass("offDrag");
		}).on("mouseleave", function() {
			$("body").removeClass("offDrag");
		});

	$.drop({
		multi: true
	});



	var shortKey = {
		86: "rocket-param-select",
		68: "rocket-param-unselect",
		107: "rocket-param-plus",
		65: "rocket-param-select-all",
		96: "rocket-align-list-horizontal",
		39: "move-right",
		73: "rocket-param-select-toggle",
		103: "rocket-align-left",
		105: "rocket-align-right",
		104: "rocket-align-center-horizontal",
		40: "move-down",
		38: "move-up",
		37: "move-left"
	};

	$(document).on("click", "a.speed-param", function() {
		var t = $(this);
		var meta = $("<div>", {
			"class": "meta-count"
		});
		var textarea = t.parents('.rocket-param-edit').find("textarea");


		var val = textarea.val().split("\n");

		var ol = t.parents('.rocket-param-edit').find("ol.data");
		var pID = t.parents('.rocket-param-edit').attr("id");
		var i = ol.find("li").length;




		$.each(val, function(key, val) {
			i++;
			if (val != "") {
				var hook = $("<div>", {
					"id": pID + "-toChildSingle" + key,
					"class": "rocket-param-hook-to-child-single rocket-param-hook"
				})
				var input = $("<input>", {
					"name": pID + "-data[]",
					"class": "speed-data",
					"value": val
				}).val(val);
				var li = $("<li>").prepend(input).append(hook);
				ol.append(li)
			}
		})
		textarea.val("").html("");
		if (t.find(".meta-count").length == 0)
			t.prepend(meta.html(i - 1))
		else
			t.find(".meta-count").html(i - 1)
		return false;
	})



	$(document).on("click", ".speed-param-delete", function() {
		$(this).parents('.rocket-param-edit').find("ol.data .onParamSelect").remove();
		return false;
	})

	$(document).on("focusout", ".rocket-param-edit input", function(e) {

		// var shortKeyList = [37, 39, 13, 16, 9];

		// var eval = $.inArray(e.keyCode, shortKeyList);
		// if (eval < 0) {
			var t = $(this);
			t.attr("value", t.val());
		// }

	})
	$(document).on("focusout", ".rocket-param-edit textarea", function(e) {
		// var shortKeyList = [37, 39, 13, 16, 9];
		// var eval = $.inArray(e.keyCode, shortKeyList);
		// if (eval < 0) {
			var t = $(this);
			t.html(t.val());
		// }
	})


	$(document).on("click", ".rocket-param-edit", function(e) {
		$(".super-zindex").removeClass("super-zindex")
		$(this).addClass('super-zindex');

	})



	$(document).on("click", "ol.data li", function() {
		if ($(this).parents(".rocket-param-edit").find(".speed-param-select").hasClass("toggled-on"))
			$(this).toggleClass("onParamSelect")
	})
	$(document).on('click', ".menu-mini a.toggled", function() {
		var t = $(this);
		t.toggleClass("toggled-on");
		t.parents(".rocket-param-edit").find(".onParamSelect").removeClass('onParamSelect')

		return false;
	});


	$(document).on('click', ".menu-mini a.clone-me", function() {
		var t = $(this);
		// t.toggleClass("toggled-on");
		var p = t.parents(".rocket-param-edit");
		var lastID = parseInt(lastId());
		var newID = lastID+1;
		var idElem = "e"+newID;
		var idElemToChild = idElem+"-toChild";
		var idElemToParent = idElem+"-toParent";



		var clone = p.clone();
		clone.attr({
			"reldraw"	: "",
			"id"	: idElem
		}).css({"left":p.offset().left+150});
		clone.find(".type-id").html(idElem);


		clone.find(".rocket-param-hook-to-parent").attr({
			"id"	: idElemToParent,
			"reldraw": ""
		});
		clone.find(".rocket-param-hook-to-child").attr({
			"id"	: idElemToChild,
			"reldraw": ""
		});

		clone.drop("start", function() {
			$(this).addClass("onHoverDrop");
		})
			.drop(function(ev, dd) {
				$(this).toggleClass("onSelectDrag");
			})
			.drop("end", function() {
				$(this).removeClass("onHoverDrop");
								// console.log("drop end");
			}).on("mouseenter", function() {
				$("body").addClass("offDrag");
			}).on("mouseleave", function() {
				$("body").removeClass("offDrag");
			});


		p.after(clone);
console.log(lastId());
console.log(clone);

		return false;
	});

	$(document).on('dblclick', ".speed-param-select", function() {
		$(this).parents(".rocket-param-edit").find("ol.data li").toggleClass('onParamSelect')

	});

	$(document).on('mouseup', ".elem .child-type .form-toggle", function() {
		var t = $(this).find(".form-toggle-slide");
		console.log("this");
		var elem = t.parents(".rocket-param-edit");
		var hook = elem.find(".rocket-param-hook");
		var bgcOff = t.find(".off").css("background-color")
		var bgcOn = t.find(".on").css("background-color")
		if (t.hasClass('form-toggle-off')) {
			hook.css("background-color", bgcOff);
			elem.find("ol.data").css("border-color", bgcOff)
			elem.addClass("rocket-child").removeClass('rocket-sibling');
			elem.find(".rocket-param-hook-to-child").addClass('rocket-param-hook-disabled').css("background-color", "#ccc");
		} else {
			elem.removeClass("rocket-child").addClass('rocket-sibling');
			elem.find("ol.data").css("border-color", bgcOn)
			hook.css("background-color", bgcOn);
			elem.find(".rocket-param-hook-to-child").removeClass('rocket-param-hook-disabled');
		}
		// 	var bgc = t.find(".off").css("background-color")
		// else 
		// 	var bgc = t.find(".on").css("background-color");



	});

	function moveDrawLinkedByToggle(idParent) {
		var onSelectDrag = $(".onSelectDrag");
		$.each(onSelectDrag, function(index, val) {
			moveDrawLinkedByThis($(this));
		})
	}


	function moveDrawLinkedByAlign() {
		var onSelectDrag = $(".onSelectDrag");
		$.each(onSelectDrag, function(index, val) {
			moveDrawLinkedByThis($(this));
		})
	}




	function moveDrawLinkedByThis(t) {
		if (t.attr("relDraw")) {
			fusionList = t.attr("reldraw").split("--")
			$.each(fusionList, function(index, val) {
				var obj = val.split(",");
				var draw = $("#" + obj[0]);
				if (draw.length == 1) {
					var rel1 = draw.attr("rel1");
					var rel2 = draw.attr("rel2");
					posA = $("#" + rel1).offset();
					posB = $("#" + rel2).offset();
					var layerPos = $("svg.linker-zone").offset();

					var hookHA = $("#" + rel1).outerHeight() / 2;
					var hookWA = $("#" + rel1).outerWidth();

					var hookHB = $("#" + rel2).outerHeight() / 2;
					var hookWB = $("#" + rel2).outerWidth();


					var x1 =  posA.left - layerPos.left + hookWA -10
					var y1 =  posA.top - layerPos.top + hookHA
					var x2 =  posB.left - layerPos.left + 10
					var y2 =  posB.top - layerPos.top + hookHB


						draw.attr({
							'x1': x1,
							'y1': y1,
							'x2': x2,
							'y2': y2
						});

				}

			});
		}
	}



	function createForThis(t) {

		if (t.attr("reldraw")) {

			var drawList = t.attr("reldraw");
			var drawList = drawList.substring(0, drawList.length - 2)
			var drawSplite = drawList.split("--");

			$.each(drawSplite, function(index, val) {

				if (val != "") {
					var obj = val.split(",");


					var idDraw = obj[0];
					if ($("#" + idDraw).length < 1) {



						var start = $("#" + obj[1]);


// console.log(start);

						var finish = $("#" + obj[2]);
						var posA = start.offset();
						var posB = finish.offset();
if(posA && posB){
						var layerPos = $("svg.linker-zone").offset();
						var hookHA = start.outerHeight() / 2;
						var hookWA = start.outerWidth();

						var hookHB = finish.outerHeight() / 2;
						var hookWB = finish.outerWidth();
						var color = start.css("background-color");


						var svg = $("svg.linker-zone");

						var x1 = posA.left - layerPos.left + hookWA-10;
						var y1 = posA.top - layerPos.top + hookHA;

						var x2 = posB.left - layerPos.left + 10;
						var y2 = posB.top - layerPos.top + hookHB;


						var newLine = document.createElementNS('http://www.w3.org/2000/svg', 'line');
						newLine.setAttribute('id', idDraw);
						newLine.setAttribute('class', 'line');
						newLine.setAttribute('x1', x1);
						newLine.setAttribute('y1', y1);
						newLine.setAttribute('x2', x2);
						newLine.setAttribute('y2', y2);
						newLine.setAttribute('rel1', obj[1]);
						newLine.setAttribute('rel2', obj[2]);

						svg.append(newLine);

						}


					}
				}
			})


		}
	}


	function createLineForLoad() {
		var hook = $('.rocket-param-hook');
		$.each(hook, function() {
			var t = $(this);
			createForThis(t)
		})



	}


	$(".move").on("click", function() {
		var t = $(this);
		var value = 10;
		var sens = t.attr("href").replace("#", "");


		var onSelectDrag = $(".onSelectDrag");
		var layer = $(".layer").offset();


		$.each(onSelectDrag, function(index, val) {
			var elem = $(this);
			var pos = elem.position();


			if (sens == "right")
				elem.css("left", pos.left + value)
			else if (sens == "left")
				elem.css("left", pos.left - value)
			else if (sens == "up")
				elem.css("top", pos.top - value)
			else if (sens == "down")
				elem.css("top", pos.top + value)
			else {
				elem.css({
					left: layer.left + 100,
					top: layer.top + 100
				})
			}
			moveDrawLinkedByThis(elem)
		});



		return false;
	});

	$(document).on("click", "a.toggle-me", function() {
		var t = $(this);
		var list = $(".onSelectDrag");
		if (list.length>0){
			$.each(list, function(index, val) {
				var t = $(this);
				// t.find("a.toggle-me").trigger('click');
				t.toggleClass('toggle-me-on');
				moveDrawLinkedByThis(t)
			});
		}
		else {
			// t.find("a.toggle-me").trigger('click');
			t.parents(".rocket-param-edit").toggleClass('toggle-me-on');
			moveDrawLinkedByThis(t.parents(".rocket-param-edit"))
		}







		// if ($("body").hasClass("onAltCtrl")) {
		// 	$.each($(".onSelectDrag"), function(index, val) {
		// 		var t = $(this);
		// 		t.find("a.toggle-me").trigger('click');
		// 	});
		// }



		return false;
	})

	$(".range-div input").on("change", function() {
		var t = $(this);

		var layer = $(".layer, svg.linker-zone");
		var zoom = t.val() / 100;
		layer.css({
			'transform': 'scale(' + zoom + ')',
			'transform-origin': '0 0'

		})
	})

	$(document).on("keydown", function(e) {

		if ($("body").hasClass('onAltMaj')) {
			var eval = e.keyCode in shortKey;
			if (eval) {
				$("#" + shortKey[e.keyCode]).trigger("click");
				//return false;
			}
		}
	})


	$('#loading-param').trigger("click")
	$("#rocket-param-select").trigger('click');

	$(document).on("click", "a.group-linked-toggle", function() {
		var t = $(this).parents(".rocket-param-edit");

		var tPos = t.offset();
		var time = 500;

		var draw = t.find(".rocket-param-hook-to-child").attr("reldraw");
		if (draw) {
			// console.log(draw);
			// var val = val.replace(new RegExp("]", "g"), '');
			draw = draw.split("--");
			$.each(draw, function(key, val) {
				var val = val.split(",");
				// $("#" + val[0]).toggle();
			})

		}

		t.toggleClass("toggle-group");
		var child = exportChildNodeLoop(t.attr("id"));

		var child = child.split("[");

		if (t.hasClass("toggle-group")) {
			var meta = $("<div>", {
				"class": "rocket-param-meta-count"
			}).css({
				"position": "absolute",
				"margin-left": t.outerWidth()
			}).html(child.length - 1)
			t.prepend(meta);

		} else {
			t.find(".rocket-param-meta-count").remove();
		}


		$.each(child, function(key, val) {
			var val = val.replace(new RegExp("]", "g"), '');
			var c = $("#" + val);
			// var cPos = c.offset();
			var draw = c.find(".rocket-param-hook-to-child").attr("reldraw");
			if (draw) {
				draw = draw.substring(0, draw.length - 2).split("--");
				$.each(draw, function(key, val) {
					var val = val.split(",");
					if (t.hasClass("toggle-group")) {

						$("#" + val[0]).hide();

					} else {
						$("#" + val[0]).show();
					}
				});

			}



			if (t.hasClass("toggle-group")) {

				c.hide();


			} else {
				c.show();


			}
			// setTimeout(function (){
			moveDrawLinkedByThis(c);
			// },20)
		})
		moveDrawLinkedByThis(t);
		setTimeout(function() {
			
			// console.log(c.offset());
		}, 20)
		return false;
	})

	$("#del-by-id").on('click', function() {
		var t = $(this);
		var find = $('input[name=rocket-search-param]').val();
		var target = $("#" + find);
		var msg = "etes vous certains de vouloir supprimer cette element ?";
		var eval = confirm(msg);
		if (eval) {
			target.remove();
		}
return false;
	});	

	$("#select-by-id").on('click', function() {
		var t = $(this);
		var find = $('input[name=rocket-search-param]').val();

		var list = find.split(",");

		$.each(list, function(index, val) {
			var target = $("#" + val);
			target.addClass("onSelectDrag");
		});
		return false;
	});


	$("#clean-by-id").on('click', function() {
		var t = $(this);
		var find = $('input[name=rocket-search-param]').val();
		var target = $("#" + find);
		var list = find.split("*");
		var msg = "etes vous certains de vouloir supprimer tout ces liens ?";
		var eval = confirm(msg);
		if (eval) {
			$.each(list, function(index, val) {
				
				var valLink = $("#"+val).attr("reldraw");
console.log(valLink);
				 /* iterate through array or object */
			});

		}



return false;
	});	





	$("#find-by-id").on('click', function() {
		var t = $(this);
		var scrollTime = 500;
		var find = $('input[name=rocket-search-param]').val();
		var target = $("#" + find);
		
		

		scroollToId(find,scrollTime);
return false;
	});



		$("#connect-by-id").on('click', function() {
		var t = $(this);
		var find = $('input[name=rocket-search-param]').val();
		var list = find.split(">");
		var count = list.length;
		var i =0;
		if(!$("#rocket-param-linker").hasClass("toggled-on"))
			$("#rocket-param-linker").trigger("click");

		$.each(list, function(index, val) {
			 var target = $("#" + val);
			 if(target.length==1){
			 	var eval = ($(".onHookStart").length==1)?true:false;
			 	if(eval){
					target.find(".rocket-param-hook-to-parent").trigger("mouseup");
			 	}
			 	if(i<count-1)
			 	target.find(".rocket-param-hook-to-child").trigger("mousedown");
			 }
			 i++;
		});
		$(".onHookStart").removeClass("onHookStart");
		$(".onHookFinish").removeClass("onHookFinish");
return false;
	});

$(".rocket-search-param-meta-search-action").click(function(){
	return false;
})
function scroollToId(id,scrollTime){
	var target = $("#" + id);
	var pos = target.offset();
	var w = $(window).width()/2;
	var h = $(window).height()/2;

	var tW = target.width()/2;
	var tH = target.height()/2;

	target.addClass('onLight');
	setTimeout(function (){
		target.removeClass('onLight');
	},scrollTime*2)

	$("html, body").animate({scrollTop: pos.top-h+tH,scrollLeft:pos.left-w+tW}, scrollTime);
}
$('input[name=rocket-search-param]').keydown(function (e){
	if(e.keyCode ==13)
		$("#find-by-id").trigger("click");
})

	$("input[name=rocket-search-param]").on("focusin focusout", function(e) {
		if (e.type == "focusin") {
			var t = $(this).animate({
				width: 150
			}, 150);
			$(".rocket-search-param-meta-search-action").show();
		} else {
			var t = $(this).animate({
				width: 0
			}, 150)
			$(".rocket-search-param-meta-search-action").hide()
		}
	})


	$(".modal-view").mnkModalView({beforeLoad:function (t){
		console.log("beforeload");
		return {"filename":$("#projectFile").val(),"share":$('#projectShare').val()}
	}});
	$(".modal-code").mnkModalCode({beforeLoad:function (t){
		// var t = $(this);
		var id = t.parents(".elem").attr("id");
		var list = exportChildNodeLoop(id);
		return {"id":id,"title":"function "+id,"node":list}
		
	}});
	$(".modal-regexp").mnkModalReg({beforeLoad:function(t){
			var id = t.parents(".elem").attr("id");
			return {"id":id}
		}
	});
	$(document).on("click","a.modal-viewer",function(){

		var t = $(this);
		var url = t.attr("href");
		var data = {
			view 	: t.prev("input").first().attr("placeholder"),
			id 		: t.parents(".elem").attr("id"),
			file 	: t.prev("input").first().val()
		}
		$.post(url,data,function (html){
			var paramModal = {
					title: data.id,
					subTitle1: "viewer",
					subTitle2: "php",
					bg: "bg-1",
					color: "c-28",
					load: function() {
						$('#my-code-area').ace({
							theme: 'twilight',
							lang: "php"
						});
					},
					beforeClose: function() {
						var val = $('#my-code-area').val();
						$(".modal-code-on").val(val);
					},
					close: function() {
						$(".modal-code-on").removeClass('modal-code-on');
					},
					padding: 0,
					percent: 85
				}




			$(document).mnkModal(html,paramModal);
		})


		
		return false;
	});
$(document).on('change',"select[name=bg-svg]",function (){
	var t = $(this);

	$('svg.linker-zone,#mnk-modal-container-container').css("background-image","url("+t.val()+")");
});
$(document).on("change",".layer input, .layer textarea",function(){
	protectProject("true"," change input or textarea");
})

$(document).on("mouseover mouseleave","ol.param-list li",function (e){
	console.log(e);
	if(e.type="mouseover"){


		var t = $(this);
		

		if(t.hasClass('stickLoad')){
			t.find('.mnk-stick-info').show();
		}
		else{
			var pos = t.offset();
			var stick = $("<span>",{"class":"mnk-stick-info"}).css({"padding":"5px","display":"block"});
			var id = t.html();

			var elem = $("#"+id);
			var colorPrev = elem.find(".rocket-param-hook-to-child").css("background-color");
			var title = elem.find(".type-title").val();
			var colorStick = $("<span>",{"class":"mnk-color-stck-mini"}).css({"padding":"5","background-color":colorPrev}).append(title);
			stick.append(colorStick);
			t.append(stick);
			t.addClass('stickLoad');
		}
		// console.log(colorPrev);
	}
	else{
			t.find('.mnk-stick-info').hide();
	}

})

$(document).on('click',".php-app-view",function (){
	var t = $(this);
	var project = $("#projectFile").val()
	var func = t.parents(".elem").attr("id");

	var url = t.attr("href")+"/"+project+"/"+func;

// console.log(url);
   window.open(url,'_blank');
    return false;
});
$("#live-viewer-save").mnkLiveForm();
$(document).on('click','.add-tbody-line',function (){
	var tBody = $(this).parents("table").find("tbody");
	var clone = tBody.find("tr").first().clone();
	clone.find("input").val("");
	tBody.append(clone);
return false;
	// var t = $(this).parents("table").find("tbody tr").first().clone;
	

});


$(document).on('keyup',".for-preview",function (){
	var t = $(this);
	var p = t.parents("tr");


	var attrClass = "preview-color small padding-5 "
	var prev = p.find(".preview-color");
	$.each(p.find('.for-preview'),function (){
		attrClass += " "+$(this).val();
	})
	prev.attr("class",attrClass);
	console.log("preview");

});

// function svgToPng(filename){
// 	// var canvasId    = $("canvas.canvasActive").attr("id");
//     var img         = document.getElementById("canvasActive");
//     // var context     = img.getContext('2d');
//     // // on enregistre que si un nom de fichier

//     // //p.find("a").trigger("click");
//     // //if(filename!=""){

//     // var imgData     = img.toDataURL("image/png");
//     var data = {
//             draw : "imgData",
//             type : "png",
//             filename : filename
//     }
//     console.log(img);
//     console.log(data);
// }

// $(document).on('click',"#render",function (){
// 	var t = $(this);

// // $("svg.linker-zone").css("position","relative");



// 	html2canvas($(".torender"), {
//   onrendered: function(canvas) {
//     // document.body.appendChild(canvas);
//     // canvas.attr("id","canvasActive");
//     canvas.setAttribute('id','canvasActive');
//     // console.log(canvas);
//     $(document).mnkModal(canvas,{percent:98})

//     var can = document.getElementById("linker-zone").getContext('2d');
//     console.log(can);
//     // svgToPng(can);
//     // $("svg.linker-zone").css("position","absolute");
//     // $("div.render").html(canvas)
//     // console.log(canvas);
//   }
// });

// });
});