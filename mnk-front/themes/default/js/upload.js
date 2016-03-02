$(document).ready(function () {

function basename (path, suffix) {
  // http://kevin.vanzonneveld.net
  // +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  // +   improved by: Ash Searle (http://hexmen.com/blog/)
  // +   improved by: Lincoln Ramsay
  // +   improved by: djmix
  // *     example 1: basename('/www/site/home.htm', '.htm');
  // *     returns 1: 'home'
  // *     example 2: basename('ecra.php?p=1');
  // *     returns 2: 'ecra.php?p=1'
  var b = path.replace(/^.*[\/\\]/g, '');

  if (typeof(suffix) == 'string' && b.substr(b.length - suffix.length) == suffix) {
    b = b.substr(0, b.length - suffix.length);
  }

  return b;
  }

$("form.upload_progress").live('submit',function(){

    $("a.progress").trigger("click");
})

$("a.trigger-file").on('click',function(){
    //alert($("input[name=fileList[]]").length)
    //$("input[name=fileList]").trigger("click");
    createLine();
    return false;
});

/*
 *
 * On creait une ligne a la liste de fichier a uploader
 *
 **/

function createLine(){
    var fileList    = $("ul#file-list");

    var input       =$("<input>",{
                        "type"  : "file",
                        "name"  :"fileList[]"
                    }).on('change',function(){
                      
                       var t       = $(this);
                        
                        var file    = basename(t.val());
                        t.before(file);
               
                    }).trigger("click");
          
        var line        = $("<li>").append(input);
    fileList.append(line);

}

/*
 *
 * PROGRESS
 *
 **/
    function check_progress(){
        var t       = $("a.progress");
        var href = t.attr('href');
        

        
        $.get(href,function (data){
            
            
            $("div.bar").animate({"width" :data+"%"},150).html("<p>"+data+"%</p>");
          if(data==100){
                $("div.bar").addClass("complete");
                $(this).oneTime(1000,function(){
                 location.reload();
                });
            }
        })
    }


    $("a.progress").live('click',function (){
        var t       = $(this);

        var bar         = '<div class="container"><div class="bar"><p></p></div></div>'        
        $("input[type=submit]").after(bar);
        
        
        t.everyTime(2000,function(){
           check_progress();
        });
        
        return false;
    })
 
})