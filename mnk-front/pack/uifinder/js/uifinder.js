$(document).ready(function(){
$('form#find_ui_img').on('submit',function (){
			var t = $(this);
			var action = t.attr('action');
			$.post(action,t.serialize(),function (html){
				$("#uifinderResult").html(html);
			})
			return false;

		})






	$('form#find_ui_img input[name=find]').on("keyup",function (){
		var t = $(this);
		if(t.val().length>=3 || t.val()=="")
			t.parents("form").trigger("submit");
	})

	$('form#find_ui_img select').on("change",function (){
		var t = $(this);
		if($("input[name=find]").val().length>=3)
			t.parents("form").trigger("submit");
	})

	$.post("http://metronic.excentrik.fr/mnk-front/pack/uifinder/config/ui-list.json",function (data){

	$(".ui-icon-completion").autocomplete({
		source : data.file,
		select: function( event, ui ) {

			$(this).css({"background-image":"url("+data.folder+"/"+ui.item.value+".png)"})
		}
	})
.on("keyup change",function(){
var t = $(this);
var val = t.val();
	t.css({"background-image":"url("+data.folder+"/"+val+".png)"})
})
.data( "ui-autocomplete" )._renderItem = function( ul, item ) {
return $( "<li>")
.css({"background-image":"url("+data.folder+"/"+item.value+".png)"})
.append( "<a href='#'>" + item.label + "</a>" )
.appendTo( ul );
};
},"JSON");

});