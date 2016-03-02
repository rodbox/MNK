(function($) {
	$.fn.mnkModalCode = function(options) {

		var defauts = {
			beforeLoad: function() {},
			lang: 'javascript',
			theme: 'twilight'
		}

		var param = $.extend(defauts, options);

		$(document).on("click", this.selector, function() {
			var t = $(this);
			var linked = t.prev("textarea").addClass('modal-code-on');
			var code = linked.val();
			param.send = param.beforeLoad(t);
			var href = t.attr("href");
			var dataSend = {
				code: code,
				node: param.send.node
			}
			$.post(href, dataSend, function(data) {

				var paramModal = {
					title: param.send.id,
					subTitle1: "function",
					subTitle2: param.lang,
					bg: "bg-1",
					color: "c-28",
					load: function() {
						$('#my-code-area').ace({
							theme: 'twilight',
							lang: param.lang
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
				$(document).mnkModal(data, paramModal);
			});
			return false;
		});
	}
})(jQuery);