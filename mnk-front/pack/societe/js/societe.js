$(document).ready(function(){
	$('form.mnk-live').mnkLiveForm({"callback":function(html){
		var dom = $.parseHTML(html);

	console.log(dom);
		$('.result').html(html);
	}});

	$(".link").on('click',function (){
		var t = $(this);
		var in = $('input#siret').val();
		window.open('http://www.societe.com/cgi-bin/mainsrch?champ='+in+'&imageField2.x=0&imageField2.y=0', '_blank');
		return false;
	});
});