$(document).ready(function(){
$('#tool-script').on("mouseup mouseleave", function (event){
  console.log(event);
})


  
$("#tool-script-save").on("submit",function (){
              var t=$(this);
        var action = t.attr("action");
        var dataSend = 
        {
          filename  : t.find("input[name=filename]").val(),
          ext     : t.find("select[name=ext]").val(),
          content   : $("#tool-script").val()
        };


  
            $.post(action,dataSend,function (data){
             t.parents(".modal").find("button.close").trigger("click");
          })
          return false;
                 
          });

$("#tool-script-load").mnkLiveForm({
	callback 	: function (html,t){
	$("textarea#tool-script").html(html);
  t.parents(".modal").find("button.close").trigger("click");
	}
	});

});