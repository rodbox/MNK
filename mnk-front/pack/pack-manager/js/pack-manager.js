$(document).ready(function(){
	$("a.tile-pack-index").mnkLiveLink({
		"message" : "",
		callback 	: function (html,t){
			console.log(html);

			var clone = t.find(".tile").clone().attr({
				"class" : "bg-midnight tile-clone tile"
			}).html(html).mouseleave(function (){
				t.show();
				$(".tile-clone").remove();
			});
			t.hide().before(clone);

		}
		});



	$("#pack-installer").mnkLiveForm({
		callback 	: function (html,t){
			$.gritter.add({
                title:'Pack installer', 
                text: "Pack : " + t.find("select[name=pack]").val()+"<br>Site : " + t.find("select[name=site]").val(),
    
                image: 'http://betty.excentrik.fr/mnk-include/core/img/ui/fff/64px/checkmark.png',
                sticky: false,
                time: ''
            });
		}
		});


	$("form#pack-zip").mnkLiveForm({
		callback 	: function (html,t){
			$('#zip-link').html(html);
		}
		});
$("form#filecreator,form#pack-creator").mnkLiveForm();
	/*$("form#filecreator,form#pack-creator").on("submit",function(){
		var t = $(this);
		var action = t.attr("action");
		var data = t.serialize();
		$.post(action,data,function (html){
			t.find("input[type=text]").val("");
			var message = $("<div>",{"class":"result-container"}).html(html);
			message.hide().slideDown(250).delay(3000).slideUp(250,function (){
				$(this).remove()

			});
			t.after(message)
		})


		return false;

	})*/

	$("form#page-configurator").on("submit",function(){
		var t = $(this);
		var action = t.attr("action");
		var data = t.serialize();
		$.post(action,data,function (html){
			
			var message = $("<div>",{"class":"result-container"}).html(html);
			message.hide().slideDown(250).delay(3000).slideUp(250,function (){
				$(this).remove()

			});
			t.after(message)
		})


		return false;

	})

	$("form#upd-labo select").on("change",function(){
		$(this).parent("form").trigger("submit");
	})



	$("ul.filelist li").on("click",function (){
		var t = $(this);
		t.toggleClass("onSelect");
	})


	$("a.pack-bt-file-delete").on("click",function (){



        var t = $(this);
        var href = t.attr("href");

        if (confirm("Fichiers selectionnées vers la corbeille ?")){
            var selected = $(".onSelect");
           
           var data = '{"file[]":[';

            $.each(selected,function (index){
                var file = $(this).find("input[type=hidden]").val();
                data += '"'+file+'",';
            })
            data = data.substr(0,data.length-1);
            data += ']}';
       
           var data = $.parseJSON(data);
  			console.log(data);
  			
  			selected.slideUp(250,function (){
  				$(this).remove();
  			})

            $.post(href,data,function (html){
            	console.log(html);
                    })
        }
        return false;
    })
			

});