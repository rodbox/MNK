$(document).ready(function() {

	var url = "http://metronic.excentrik.fr/mnk-users/0/rocket/scan-pack-pages.json";
	$.getJSON(url, function(data) {


		$('input.rocket')
			.on("keyup", function(e) {
				var t = $(this);

				var keyCodeList = [8, 13, 27, 37, 38, 39, 40];



				if ($.inArray(e.keyCode, keyCodeList) < 0) {

					var ul = $("<ul>");
					var launcher = $("#rocket-launcher");
					var col = $("#col-1");
					col.html("");
					$.each(data, function(index, val) {
						var eval = evalList(t.val(), val.pack);
						if (eval) {
							var li = $("<li>", {
								"class": "launcher",
								"rel": index
							});
							li.html(val.pack);
							ul.append(li);
						}
					});
					col.append(ul);
					$('input.rocket').after(launcher);
					$("#rocket-launcher li").first().addClass('onSelect');
				}
			})
			.on('focusin', function() {
				rocketIntro();
			})
			.on('focusout', function() {
				$(this).val("");
				rocketOutro();
			});


		function rocketIntro() {
			$('#rocket-launcher').stop().show().animate({
				"opacity": 1,
				"margin-top": 5
			}, 350);
			slideRocketCol(1);

			$('input.rocket').val("");
		}

		function rocketOutro() {
			$('#rocket-launcher').stop().animate({
					"opacity": 0,
					"margin-top": 15
				}, 350,
				function() {
					var t = $(this);
					$('#rocket-fil a').html("");
					t.hide();
				})
		}

		function createRegExp(strFind) {
			var strReg = "";
			var regexp = "[a-zA-Z-]{0,}";
			$.each(strFind, function(index, val) {
				strReg = strReg + val + regexp;
			});
			return strReg;
		}

		function evalList(strFind, str) {
			reg = createRegExp(strFind);

			var patt = new RegExp(reg);
			var eval = patt.test(str);

			return eval;
		}


		$(document).on("click", "li.launcher", function() {
			var t = $(this);
			var type = t.html();
			var colActive = parseInt($('#active-col').val());
			$('#rocket-fil #col-' + colActive + "-value").html(type);
			t.parents(".rocket-col").find("li.onActive").removeClass('onActive');
			t.addClass('onActive');
			$('input.rocket').trigger("focusin");
			//alert();
			var eq = t.attr("rel");

			var search = $('input.rocket').val();


			colActive++;
			var colNum = $("#col-" + colActive);
			var ulColNum = $("<ul>");

			var pageList = data[eq].pages;
			// console.log(pageList);
			$.each(pageList, function(indexPage, valPage) {
				console.log(search);


				var eval = evalList(search, valPage);

				if (eval) {
					var liColNum = $("<li>", {
						"class": "launcher",
						"rel": indexPage
					});
					liColNum.html(valPage);
					ulColNum.append(liColNum);
				}
			});
			ulColNum.find("li").first().addClass('onSelect');
			colNum.html(ulColNum);
			slideRocketCol(colActive)
		});
	});

	$(document).on("click", "#col-2 li.launcher", function() {


		var t = $(this);
		var param0 = "page";
		var param1 = $('#rocket-fil #col-1-value').html();
		var param2 = t.html();

		if (param0 == "page") {

			$('#rocket-launcher .rocket-col-container').stop();
			window.location = 'http://metronic.excentrik.fr/index.php?page=' + param1 + '/' + param2 + '&type=pack-page';
		}
		return false;
	})



	$(document).on("click", "#rocket-fil a", function() {
		var t = $(this);
		var target = t.attr("href");
		var index = $(target).index();

		slideRocketCol(index + 1);
		$('input.rocket').trigger("focusin");
		return false;
	});


	function slideRocketCol(num) {
		var size = 306;
		var pos = (num - 1) * size;
		$('.rocket-col.onActive').removeClass("onActive");
		$('#col-' + num).addClass("onActive");
		$('#active-col').val(num);
		//
		$('#rocket-launcher .rocket-col-container').stop().animate({
			"margin-left": -pos
		}, 350, function() {
			$('input.rocket').val("");
		});

	}


	/* navigation clavier */

	$(document).on("keydown", function(event) {

		var colActive = parseInt($('#active-col').val());
		// console.log(colActive);

		var curSelect = $("#rocket-launcher #col-" + colActive + " li.onSelect");
		var curSelectIndex = parseInt(curSelect.index());
		var indexMax = parseInt($("#rocket-launcher #col-" + colActive + " li").length);


		if (curSelect.length < 0)
			$("#rocket-launcher #col-" + colActive + " li").first().addClass('onSelect');

		if (event.keyCode == 40) {
			if (curSelectIndex < indexMax - 1)
				$("#rocket-launcher .rocket-col.onActive li.onSelect").removeClass("onSelect").next().addClass('onSelect');
			return false;
		} else if (event.keyCode == 38) {
			if (curSelectIndex > 0)
				$("#rocket-launcher .rocket-col.onActive li.onSelect").removeClass("onSelect").prev().addClass('onSelect');
			return false;
		} else if (event.keyCode == 13) {
			$("#rocket-launcher .rocket-col.onActive li.launcher.onSelect").trigger("click");
		} else if (event.keyCode == 32) {
			if ($("body").hasClass("onAltMaj"))
				$('input.rocket').trigger("focus");
		} else if (event.keyCode == 27) {
			if (colActive > 1)
				slideRocketCol(colActive - 1)
			else
				$('input.rocket').trigger('focusout')
		}


	});



});