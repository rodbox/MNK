$(document).ready(function(){
	function createRegExp(strFind) {
			var strReg = "";
			var regexp = "[a-zA-Z\s\_\-]{0,}";
			$.each(strFind, function(index, val) {
				strReg = strReg + val + regexp;
			});
			console.log(strReg);
			return strReg;
		}

	function evalList(strFind, str) {

			reg = createRegExp(strFind);

			var patt = new RegExp(reg,"i");
			var eval = patt.test(str);


// console.log(reg);
// console.log(str);
// console.log(eval);



			return eval;
		}






	$('#speed-search').on("keyup",function(){
		var t = $(this);
		var find = t.val();
		var rel = t.attr("rel");
var $rel = $(rel.toString());
		$rel.hide();

		$.each($rel, function(index, val) {
			var compare = $(this).find("a .contact").html();
			console.log("this");
			if(evalList(find,compare))
				$(this).show();

		});
	})
});