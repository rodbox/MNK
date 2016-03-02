$(document).ready(function(){

$("body").addClass("full");
function loadSelectMetaSection(t){
	/* INPUT */
	var sectionSelect = $('.section.onSelect');

	var sid 		= t.find(".sid").val();
	var stitle 		= t.find(".stitle").val();
	var sstyle 		= t.find(".sstyle").val();
	var sclass 		= t.find(".sclass").val();
	var spack 		= t.find(".spack").val();
	var spackPage 	= t.find(".spack-page").val();

	$("#section-id").val(sid);
	$("#section-title").val(stitle);
	$("#section-style").val(sstyle);
	$("#section-class").val(t.attr("class"));
	$("#section-pack").val(spack);
	$("#section-pack-page").val(spackPage);


}

	$(document).on('click',".section",function (){
		var t = $(this);
		$(".onSelect").removeClass("onSelect");
		t.addClass("onSelect");
		loadSelectMetaSection(t);
	});




$("#meta-section *").on('change keyup',function (){
	var t = $(this);
	var form = t.parents("form");

	var sectionSelect = $('.section.onSelect');


	var sid 		= $("#section-id").val();
	var stitle 		= $("#section-title").val();
	var sstyle 		= $("#section-style").val();
	var sclass 		= $("#section-class").val();
	var spack 		= $("#section-pack").val();
	var spackPage 	= $("#section-pack-page").val();





	/* HTML */
	sectionSelect.find("div.section-title").html(stitle);
	sectionSelect.find("span.pack").html(spack);
	sectionSelect.find("span.pack-page").html(form.find("#section-pack-page").val());

	/* INPUT */
	sectionSelect.find(".sid").val(sid);
	sectionSelect.find(".stitle").val(stitle);
	sectionSelect.find(".sstyle").val(sstyle);
	sectionSelect.find(".sclass").val(sclass);
	sectionSelect.find(".spack").val(spack);
	sectionSelect.find(".spack-page").val(spackPage);





	/* CSS PREVIEW */
	sectionSelect.attr({
		'style'	: sstyle,
		'class'	: sclass
	});


});


$('#grid-view ul').sortable({"axis": "y"});

$(document).on("click","a.del",function (){
	$(this).parents("li").slideUp(function(){
		$(this).remove();
	});

	return false;
})

$("#addSection").mnkLiveLink({
	callback 	: function (html,t){
		var viewZone =$('#grid-view');
		viewZone.prepend(html);
	}
	});

$("#section-save").mnkLiveForm();
$("#section-delete").mnkLiveForm({
	titleMessage 	: "Section supprimer",
	message 		: ""
});

$("#section-list").on('change',function (){
	var t = $(this);
	// t.parents("form").trigger('submit');
window.location.href = window.location.href + "&title_project="+t.val();
});

$('.fixed-menu , .page').mnkOnePage();



});