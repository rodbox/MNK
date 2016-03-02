$(document).ready(function(){
$(document).on('keyup',"#my-regexp-area",function (){
	// var t = $(this);
	var reg = $(this).val();
 var patt = new RegExp(reg);
	var compareList = $('#regexp-test-result li');

//	compare list predefinis
	compareList.addClass('alpha_4').removeClass('bolder');
	$.each(compareList, function(index, val) {
		 var t = $(this);
		 var str = t.html();
		
		var eval = patt.test(str);
		if(eval)
			t.removeClass('alpha_4').addClass('bolder');

	});
// my-regexp-test
	var evalPerso = $('#my-regexp-test');
	evalPerso.addClass('alpha_4').removeClass('bolder');
	var str = evalPerso.val();
	var eval = patt.test(str);
	if(eval)
		evalPerso.removeClass('alpha_4').addClass('bolder');

});
});