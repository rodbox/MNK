
$(document).ready(function()
{

$('#pack-page-list').localSearch("li");

$(document).on('click','.bt-toggle-meta-page',function (){
    $(this).parents("li").first().find(".toggle-meta-page").first().slideToggle(100);
    return false;
});

$(document).on('click','.bt-del',function (){
    $(this).parents("li").first().slideUp(100,function (){
        $(this).remove();
    });
    return false;
});


$(document).on("keyup", "input.title-link", function (){
var t = $(this);
    var p = t.parents("li").first();
    p.find("a.bt-toggle-meta-page .pack-page-title").html(t.val());
})

$(document).on("keyup", "input.title-pack", function (){
var t = $(this);
    var p = t.parents("li").first();
    p.find("a.bt-toggle-meta-page .pack-title").html(t.val());
})

$("#menu-save").on('submit',function (){
    var t = $(this);
    var action = t.attr("action");
    nestableOrder ();
    var data = t.serialize();
    var list = t.find('li');



    var nestable =$('#nestable').nestable('serialize');
    console.log(nestable);

$.post(action, data, function (html){
    var result = $("<div>",{"class":"result"}).html(html).delay(20000).fadeOut(150);
    t.append(result);
})





    return false;

});





    $("#addFolder").on('click',function (){
        var t = $(this);
        var handler = $("<div>",{"class":"dd-handle dd3-handle"})
        
        var pageTitle = $("<span>",{"class":"pack-page-title"}).html('title');
        var pagePack = $("<span>",{"class":"small pack-title"}).html('pack');
        var br = $("<br>");
        var btToggle =    $("<a>",{"class":"bt-toggle-meta-page","href":"#"});
        btToggle.append(pagePack);
        btToggle.append(br);
        btToggle.append(pageTitle);


        var btDel =    $("<a>",{"class":"bt-del","href":"#"}).html('x');

        var inputTitle = $("<input>",{"type":"text","name":"title[]","class":" title-link","value":"Title"});
        var labelTitle = $("<label>",{"for":"title[]"}).html("title");
        var inputPack = $("<input>",{"type":"text","name":"pack[]","class":" title-pack","value":"Pack"});
        var labelPack = $("<label>",{"for":"pack[]"}).html("pack");
        var inputIcon = $("<input>",{"type":"text","name":"icon[]","class":" ui-icon-completion","value":"Icon"});
        var labelIcon = $("<label>",{"for":"icon[]"}).html("icon");
        var inputPage = $("<input>",{"type":"text","name":"page[]","class":"","value":"Page"});
        var labelPage = $("<label>",{"for":"page[]"}).html("page");

        var content = $("<div>",{"class":"dd3-content"});
        var contentToggle = $("<div>",{"class":"toggle-meta-page"});



        contentToggle.append(labelIcon);
        contentToggle.append(inputIcon);  
        contentToggle.append("<br>"); 


        contentToggle.append(labelPack); 
        contentToggle.append(inputPack);   

        contentToggle.append("<br>"); 

contentToggle.append(labelPage); 
        contentToggle.append(inputPage);   
         
        contentToggle.append("<br>"); 

        contentToggle.append(labelTitle);
        contentToggle.append(inputTitle);
        
      
        contentToggle.append("<br>"); 
 
     

        content.append(btToggle);
        content.append(btDel);
        // content.prepend(toggle);   
        content.append(contentToggle);   
        
        var li = $("<li>",{"class":"dd-item dd3-item","data-id":0}).append(handler).append(content);

 


    $('#nestable ol').first().prepend(li);

    return false;
    });


function nestableOrder (){
    $("#nestable li").each(function (){
        var t = $(this);
        var index = t.index()+1;

        if(t.find('.order-hidden').length == 0){
                var order = $("<input>",{"type":"hidden","name":"order[]","class":"order-hidden"});
                t.prepend(order);
        }

        
        t.attr("data-id",index);
        t.find('input.order-hidden').val(index);
        //t.find('a.bt-toggle-meta-page').html(index);

        var p = t.parents("li");
        
    if (p.length >0){

        index = p.attr('data-id')+"."+index;
        t.attr("data-id",index);
        t.find('input.order-hidden').val(index);
       // t.find('a.bt-toggle-meta-page').html(index);
    }

       // t.prepend(index);
    });
}



    var updateOutput = function(e)
    {
        var list   = e.length ? e : $(e.target),
            output = list.data('output');
        if (window.JSON) {
            output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
        } else {
            output.val('JSON browser support required for this demo.');
        }
  
    };

    // activate Nestable for list 1
    $('#nestable').nestable({
        group: 1
    })
    //.on('change', updateOutput);
    
    // activate Nestable for list 2
    $('#nestable2').nestable({
        group: 1
    })
    // .on('change', updateOutput);

    // // output initial serialised data
    // updateOutput($('#nestable').data('output', $('#nestable-output')));
    // updateOutput($('#nestable2').data('output', $('#nestable2-output')));

    // $('#nestable-menu').on('click', function(e)
    // {
    //     var target = $(e.target),
    //         action = target.data('action');
    //     if (action === 'expand-all') {
    //         $('.dd').nestable('expandAll');
    //     }
    //     if (action === 'collapse-all') {
    //         $('.dd').nestable('collapseAll');
    //     }
    // });

    // $('#nestable3').nestable();

});