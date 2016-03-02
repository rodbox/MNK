$(document).ready(function(){
            


// 	$(".sortable").sortable({
// 		connectWith: ".connectedSortable",
// 		dropOnEmpty : true,
// 		placeholder: "ui-state-highlight",
// 		forcePlaceholderSize: true,
// 		update: function( event, ui ) {



// 			var item = ui.item;

// 			var pack = item.find("input[name='pack[]']").val();
// 			var page = item.find("input[name='page[]']").val();
// 			var icon = item.find("input[name='icon[]']").val();
// 			console.log(pack);

// 			var lineReplace = "<tr>";
// 				lineReplace += "<td>"+icon+"</td>";
// 				lineReplace += "<td></td>";
// 				lineReplace += "<td>"+pack+"</td>";
// 				lineReplace += "<td>"+page+"</td>";
				
// 				lineReplace += "<td></td>";
// 				lineReplace += "</tr>";


// 			item.replaceWith(lineReplace);
// 			// $("#task-list-upd").trigger("submit");
// 		}
// 	});


// 	$(".connectedSortable").sortable({
//         receive: function(e,ui) {
//             copyHelper= null;
//         }






// 	$(document).on("click","a.tree-toggle",function (){
// 		var t = $(this);
// 		var p = t.parent("span");
// 		t.toggleClass("tree-close");
// 		t.next(".branch").slideToggle(125);
// 		return false;
// 	});	


// $("#side-menu-save").mnkLiveForm({
// 	callback 	: function (html,t){
	
// 	}
// 	});

// var treeCollapse = $("<a>",{"href":"#","id":"","class":"tree-toggle-all"})
// .click(function (){
// 		var t = $(this);
// 		var p = t.parent("ul.tree");
// 		t.toggleClass("tree-close")

// 		if(t.hasClass("tree-close")){
// 			p.find('.tree-toggle').addClass("tree-close");
// 			p.find(".branch").slideUp(125);
// 			t.html("open");
// 		}
// 		else {
// 			p.find('.tree-toggle').removeClass("tree-close");
// 			p.find(".branch").slideDown(125);
// 			t.html("close");
// 		}
		
// 		return false;
// 	}).html("close")
// $('ul.tree').prepend(treeCollapse);


// $('#tree-page-list').localSearch("li");

// $(document).on("mouseenter","ul#side-menu-edit li ul li",function (){
// 	var t = $(this);
// 	var btDel = $("<a>",{"class":"right del-menu"}).html("x");
// 	btDel.click(function (){
// 		t.remove();
// 	})
// 	t.append(btDel);
// t.mouseleave(function(){
// 	btDel.remove();
// })



// })

// 	$("#side-menu-subfolder").on("submit",function (){
// 		var t 	= $(this);
// 		var p 	= $("form#side-menu-save ul.tree");


// 		var title = t.find("input[name=title]").val();




// 		var title = $("<a>",{"href":"#","class":"tree-toggle"}).html(title);
// 		var ul = $("<ul>",{"class":"branch sortable connectedSortable ui-sortable"});
// 		var liFolder = $("<li>").append(title).append(ul);



// 		p.prepend(liFolder);

// 		t.find("input[type=text]").val("").css({"background-image":"none"});

// 		return false;
// 	})
















});