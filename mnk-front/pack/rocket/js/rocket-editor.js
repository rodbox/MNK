$(document).ready(function() {
	$("#addParam").on('click', function() {
		var t = $(this);

		var textarea = $("<textarea>", {
			"name": "param",
			"class": "paramListAuto",
			"cols": 30,
			"rows": 5
		});
		$("input.bg-4").parent("li").append(textarea);


		return false;

	});
	$('#param-lister').mnkLiveLink();

	$('#select').on("click", function() {
		var t = $(this);

		t.toggleClass("onActive");

		return false;
	})

	$("#onLive").mnkLiveForm();


	$('.rocket-manager tr td ul li').on("click", function() {
		var t = $(this);
		var p = t.parents("ul").find(".onSelect").removeClass("onSelect");
		if ($('#shareParam').hasClass("onActive")) {

			t.addClass('onSelect');
		}
		return false;
	})

	$(".rocket-func-list textarea").on('focusin focusout', function(e) {
		var t = $(this);
		if (e.type == "focusin")
			t.animate({
				'height': 150
			}, 150);
		else if (e.type == "focusout")
			t.animate({
				'height': 20
			}, 150);
	});

	$(document).on("mousedown", "input", function() {
		var t = $(this);
		console.log("yes");
		if ($('#select').hasClass("onActive")) {
			t.toggleClass("bg-4");
			t.toggleClass("onSelect");
		}
	})

	$("#del-mod").on('click', function() {
		var t = $(this);
		$("input.bg-4").parent("li").slideUp(150, function() {
			var t = $(this);
			t.remove();
		})
	});


	$('.paramType').on("change", function() {
		var t = $(this);
		var val = t.val();

		if (val == "static")
			$('.paramSub').hide();
		else
			$('.paramSub').show();





	})




	$(document).on('keydown keyup', ".paramListAuto", function(e) {
		var t = $(this);

		var txt = t.val();
		if (e.type == "keydown") {
			if (e.keyCode == 91 || e.keyCode == 93) {
				t.addClass("onAlt");
			}


		} else {
			if (e.keyCode == 91 || e.keyCode == 93) {
				t.removeClass("onAlt");
			}
		}

		if (e.keyCode == "13" && t.hasClass("onAlt")) {

			//var value = t.val();



			var str = t.val();
			// var myregexp = "/[^a-zA-Z0-9]/";
			var list = str.split("\n");

			var ul = $('<div>', {
				"class": "new-rec"
			});

			$.each(list, function(key, val) {
				var li = $('<li>');
				var input = $('<input>', {
					"type": "text",
					"name": "list[]",
					"val": val
				});
				li.append(input);
				ul.append(li);
			})

			t.before(ul);
			t.val("");

			// var match = myregexp.exec(value);
			// if (match != null) {


			// } else {
			//     // no match
			// }
			console.log(matches);


		}

	});


});