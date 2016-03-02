$(document).ready(function(){
$("form#upd-theme-index select").on("change",function(){
		$(this).parent("form").trigger("submit");
	})


	$("form#theme-file-creator").on("submit",function(){

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

	});

$("a.theme-bt-file-delete").on("click",function (){



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