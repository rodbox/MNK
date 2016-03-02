aler("hjkh");
$(document).ready(function() {


   


$("a.mnk-live").on("click",function(){
    
    
    return false;
})
  

$("a.mnk-live-exec").on("click",function(){
    var t = $(this);
    var href    = t.attr("href");
    
    var execInfo    = $("<div>",{
        "class" : "mnk-live-exec-loader mnk-live-exec-info",
        "html"  : " "
    })

    
    t.after(execInfo);
    $.get(href,function (data){
        t.next(".mnk-live-exec-info").removeClass("mnk-live-exec-loader").html(data);
    })

    
    return false;
})
