(function($) {
	$.fn.mnkModalReg = function(options) {

		var defauts = {
			beforeLoad: function() {}
		}

		var param = $.extend(defauts, options);

		$(document).on("click", this.selector, function() {
			var t = $(this);
			var linked = t.prev("input[name=type-reg]").addClass('modal-regexp-on');
			var reg = linked.val();
			param.send = param.beforeLoad(t);
			var href = t.attr("href");
			var dataSend = {
				reg: reg
			}
			$.post(href, dataSend, function(data) {

				var paramModal = {
					title: param.send.id,
					subTitle1: "regular",
					subTitle2: "expression",
					bg: "bg-1",
					color: "c-28",
					load: function() {
						
					},
					beforeClose: function() {
						var val = $('#my-regexp-area').val();
						$(".modal-regexp-on").val(val);
					},
					close: function() {
						$(".modal-regexp-on").removeClass('modal-regexp-on');
					}
				}
				$(document).mnkModal(data, paramModal);
			});
			return false;
		});
	}
})(jQuery);
