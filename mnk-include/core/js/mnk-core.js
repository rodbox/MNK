$(document).ready(function() {


    
     $("table tr td a.mnk-live").live("click",function(){
         var t = $(this);
         t.parents("table").find('tr.mnk-live-cur').removeClass("mnk-live-cur");
         t.parents("tr").addClass("mnk-live-cur");
         
         return false;
     })


        




   

    $("form.mnk-live").live("submit",function(){
        var t = $(this);
        var action = t.attr("action");
        var data = t.serialize();
    
        $.post(action,data,function(html){
            t.replaceWith(html);
            
        })
        return false;
    })

    
    
    
    $("div.toggle-view div.view a.toggle-view").live ("click",function (){
        var t = $(this);
        t.parents("div.toggle-view").find("div.view").toggleClass("view-on");
        
        return false;
    })
    

    $("a.mnk-alert-del").on('click',function (){
        confirm("Etes vous certain de vouloir supprimer ?");
    })
    /*
    $("div.single-comment form.mnk-live").live("submit",function (){
     var t = $(this);

       var action    = t.attr("action");

        var data = t.serialize();
        $.post(action,data,function (html){
            t.parents("div.single-comment").find("ul").prepend(html);
        });
        
        t.find("input[type=text]").val("");
        
        return false;

    })
    */

})