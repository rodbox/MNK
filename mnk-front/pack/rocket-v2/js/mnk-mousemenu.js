$(document).ready(function() {
	$(this).mousedown(function(e) {
		if (e.button == 2) {
			var mouseMenu = $(".mouse-menu");
			if (!mouseMenu.hasClass('onView')) {
				mouseMenu.show().css({
					"left": e.clientX-mouseMenu.width()/2,
					"top": e.clientY-mouseMenu.height()/2
				}).addClass("onView");
				mouseMenu.animate({
					opacity: 1
				}, 125);
			} else {
				$(".mouse-menu .center-close").trigger("click");

			}

			$(document)[0].oncontextmenu = function() {
				return false;
			}
			return false;
		}
	});

	$(".mouse-menu .center-close").click(function(e) {
		var t = $(this);
		var p = t.parents(".mouse-menu");
		p.removeClass("onView");
		p.animate({
			opacity: 0
		}, 125, function() {
			$(this).hide();
		});
	});
	$(".mouse-menu a.trigger").on("click", function() {
		var t = $(this);
		var idTrigger = t.attr("href");
		$(idTrigger).trigger("click");
		return false;
	})
});