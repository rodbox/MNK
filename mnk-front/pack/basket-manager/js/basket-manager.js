$(document).ready(function(){
$("a.basket-bt-file-delete").on("click",function (){



        var t = $(this);
        var href = t.attr("href");

        if (confirm("Confirmer la suppression définitives des fichiers selectionnées ?")){
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

$("a.basket-bt-file-restore").on("click",function (){



        var t = $(this);
        var href = t.attr("href");

        if (confirm("Restorer les fichiers selectionnées ?")){
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