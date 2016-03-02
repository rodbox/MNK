var path;
var param = {
    toolDefault : "drawSimple",
    tool : {
        drawTrouble : {
            start       : function (){},
            onFrame       : function (event){},
              onMouseDown : function (event){
                pathTrouble = new Path();
                pathTrouble.fillColor = colorFill();
                pathTrouble.strokeColor = colorFill();
                pathTrouble.add(event.point); 
            },
            onMouseDrag : function (event){
                var step = event.delta / 2;
                step.angle += 90;
                
                var top = event.middlePoint + step;
                var bottom = event.middlePoint - step;
                
                pathTrouble.add(top);
                pathTrouble.insert(bottom, top-5);
                pathTrouble.smooth();
            },
            onMouseUp : function (event) {
                pathTrouble.add(event.point);
                pathTrouble.closed = false;
                pathTrouble.smooth();
                
                addLayerToList(pathTrouble)
                //console.log(pathTrouble);
            },
            onMouseMove : function (event){
            }
        }, drawTroubleRunner : {
            start       : function (){
            },onFrame       : function (event){
              var position = path.position;

                var viewBounds = view.bounds;
                position.x -= 25;
                console.log(viewBounds);
            },
            
            onMouseDown : function (event){
                $("canvas").addClass("onMove");
                path = new Path();
                path.project.view._animate = true;
                path.fillColor = colorFill();
                path.strokeColor = colorFill();
                path.add(event.point); 
                path.strokeWidth = 3;
            },
            onMouseDrag : function (event){

                var step = event.delta / 2;
                //step.angle += 90;
                
                var top = event.middlePoint + step;
                var bottom = event.middlePoint - step;
                
                path.add(top);
                path.insert(bottom, top);
                path.smooth();
                //console.log(path);
            },
            onMouseUp : function (event) {
                path.add(event.point);
                path.closed = false;
                path.smooth();
                path.project.view._animate = false;
                $("canvas").removeClass("onMove");
                addLayerToList(path);
            },
            onMouseMove : function (event){
 
              
            }
        },
        drawTroubleRoulette : {
            start       : function (){
            },
            onFrame     : function (event){
              pathTroubleRoulette.rotate(10);
            },
            onMouseDown : function (event){
                pathTroubleRoulette = new Path();

                pathTroubleRoulette.fillColor = colorFill();
                pathTroubleRoulette.strokeColor = colorFill();
                pathTroubleRoulette.add(event.point); 
            },
            onMouseDrag : function (event){
                var step = event.delta / 2;
                step.angle += 90;
                
                var top = event.middlePoint + step;
                var bottom = event.middlePoint - step;
                
                pathTroubleRoulette.add(top);
                pathTroubleRoulette.insert(bottom, top-2);
              //  pathTroubleRoulette.smooth();
                pathTroubleRoulette.rotate(10);

            },
            onMouseUp : function (event) {
                pathTroubleRoulette.add(event.point);

                 pathTroubleRoulette.smooth();
//                pathTroubleRoulette.smooth();
               // pathTroubleRoulette.project.view._animate = false;
               addLayerToList(pathTroubleRoulette);
            },
            onMouseMove : function (event){
            }
        },drawSimple : {
            start       : function (){
            },
            onFrame       : function (){
              
            },
            onMouseDown : function (event){
               path = new Path();
              //  path.fillColor = colorFill();
                path.strokeColor = colorFill();
                path.add(event.point); 
            },
            onMouseDrag : function (event){
                
                
                
                path.add(event.middlePoint);
                
               path.smooth();
            },
            onMouseUp : function (event) {
              /*  path.add(event.point);
                path.closed = false;
                path.smooth();
                addLayerToList(path);*/
            },
            onMouseMove : function (event){
            }
        },
        stroke : {
            start       : function (){
                path = new Path();
                path.strokeColor = colorFill();
            },
            onFrame       : function (){
              
            },
            onMouseDown : function (event){
               path.add(event.point);
               //console.log(path._segments[0]._path.length);
               
            },
            onMouseDrag : function (event){
               
            },
            onMouseUp : function (event) {
               path.add(event.point); 
               console.log(path.length);
               addLayerToList(path);
            },
            onMouseMove : function (event){
            }

        },strokeDist : {
            start       : function (){},
            onFrame     : function (){},
            onMouseDown : function (event){
                path = new Path();
                path.strokeColor = colorFill();
             /*  path.add(event.point);
               newCircle(event.point.x,event.point.y,5);
               path.strokeColor = colorFill();*/
              
               
               newCircle(event.point.x,event.point.y,6);
            },
            onMouseDrag : function (event){
                path.add(event.point);
                path.dashArray = [10, 5]; 
             
             //path.smooth();
            },
            onMouseUp : function (event) {
                newCircle(event.point.x,event.point.y,6);
                addLayerToList(path);
            },
            onMouseMove : function (event){
            }

        },
        round : {
            start       : function (){ tool.fixedDistance = 10;},
            onFrame     : function (){},
            onMouseDown : function (event){},
            onMouseDrag : function (event){
               var myCircle = new Path.Circle({
                    radius: event.delta.length / 4,
                    center: event.middlePoint
                });

                myCircle.fillColor = colorFill();
            },
            onMouseUp   : function (event) {
                addLayerToList(myCircle);
            },
            onMouseMove : function (event){}
        },
        circle : {
            start       : function (){},
            onFrame     : function (event){},
            onMouseDown : function (event){},
            onMouseDrag : function (event){
              var path = new Path.Circle({
                    center: event.downPoint,
                    radius: (event.downPoint - event.point).length
                    
                });
            if (colorFill()!=""){
                path.fillColor = colorFill();
                path.fillColor.alpha = alphaFill();
                }
            if (colorStroke()!=""){
                path.strokeColor =  colorStroke();
            path.strokeColor.alpha = alphaStroke();
                }
            path.removeOnDrag();
            },
            onMouseUp   : function (event) {addLayerToList(path);},
            onMouseMove : function (event){}
        },
        rail : {
            start       : function (){
              tool.fixedDistance = 10;
            },
            onFrame     : function (){},
            onMouseDown : function (event){
                path = new Path();
                path.strokeColor = colorFill();
                path.add(event.point);
            },
            onMouseDrag : function (event){
            path.add(event.point);

                var step = event.delta;
                step.angle += 90;
            
                var top = event.middlePoint + step;
                var bottom = event.middlePoint - step;
                
                var line = new Path();
                line.strokeColor = colorFill();
                line.add(top);
                line.add(bottom);
                 path.smooth();
            },
            onMouseUp : function (event) {addLayerToList(path);},
            onMouseMove : function (event){}
        },
        rectangle : {
            start       : function (){},
            onFrame     : function (event){},
            onMouseDown : function (event){},
            onMouseDrag : function (event){
               var path = new Path.Rectangle({
    point: [event.downPoint.x, event.downPoint.y],
    size: [event.point.x-event.downPoint.x, event.point.y-event.downPoint.y]
});
 if (colorFill()!=""){
                path.fillColor = colorFill();
                path.fillColor.alpha = alphaFill();
                }
            if (colorStroke()!=""){
                path.strokeColor =  colorStroke();
            path.strokeColor.alpha = alphaStroke();
                }
               path.removeOnDrag();
            },
            onMouseUp   : function (event) {
addLayerToList(path);
            },
            onMouseMove : function (event){}
        },
        selection : {
            start       : function (){},
            onFrame     : function (event){},
            onMouseDown : function (event){},
            onMouseDrag : function (event){
                                          

                var downPointX = event.downPoint.x;
                var downPointY = event.downPoint.y;
                var sizeX = event.point.x-downPointX;
                var sizeY = event.point.y-downPointY;

               var path = new Path.Rectangle({
                point: [downPointX,downPointY],
                size: [sizeX, sizeY]
                });

            path.fillColor = "black";
            path.fillColor.alpha = "0.1";
            path.strokeColor =  "grey";
            path.strokeWidth =  "1";
            path.strokeJoin = 'round';
            path.dashArray = [5, 5];
          /*  path.miterLimit(1);*/
            path.removeOnDrag();
            path.removeOnUp();

var textX = new PointText({
    point: [downPointX+(sizeX/2), downPointY+13],
    content:  Math.abs(sizeX),
    fillColor: 'black',

    justification: 'center',
    fontSize:13
}).removeOnDrag().removeOnUp();

var textY = new PointText({
    point: [downPointX+11, downPointY+(sizeY/2)],
    content:  Math.abs(sizeY),
    fillColor: 'black',
    justification: 'center',
    fontSize:13
}).rotate(-90).removeOnDrag().removeOnUp();







            },
            onMouseUp   : function (event) {

            },
            onMouseMove : function (event){}
        },
        move : {
            start       : function (){},
            onFrame     : function (){},
            onMouseDown : function (event){
   project.activeLayer.selected = false;
    if (event.item)
        event.item.selected = true;

     console.log(project.activeLayer);
var hitOptions = {
    segments: true,
    stroke: true,
    fill: true,
    tolerance: 10
};

segment = path = null;
    var hitResult = project.hitTest(event.point, hitOptions);
    if (!hitResult)
        return;

    if (event.modifiers.shift) {
        if (hitResult.type == 'segment') {
            hitResult.segment.remove();
        };
        return;
    }

    if (hitResult) {
        path = hitResult.item;
        if (hitResult.type == 'segment') {
            segment = hitResult.segment;
        } else if (hitResult.type == 'stroke') {
            var location = hitResult.location;
            segment = path.insert(location.index + 1, event.point);
            //path.smooth();
        }
    }
    movePath = hitResult.type == 'fill';
    if (movePath)
        project.activeLayer.addChild(hitResult.item);

            },
            onMouseDrag : function (event){ if (segment) {
        segment.point = event.point;
       // path.smooth();
    }

    if (movePath)
        path.position += event.delta;



},
            onMouseUp   : function (event) {
               
            },
            onMouseMove : function (event){
              
            }
        },text : {
            start       : function (){ tool.fixedDistance = 10;},
            onFrame     : function (){},
            onMouseDown : function (event){
              
            },
            onMouseDrag : function (event){
                //console.log(event.delta);
                var step = event.delta.x / 2;

                var textX = new PointText({
                point: [event.point.x, event.point.y],
                fillColor: colorFill(),
                justification: 'center',
                fontSize: Math.abs(event.delta.x + event.delta.y)});
                textX.content = $("#draw-word").val();
                var rotate = 0;
                if (event.delta.x > 0){
                    if(event.delta.y>0)
                        rotate = 45;
                    else if (event.delta.y==0)
                        rotate = 90;
                    else 
                        rotate = 135;
                }
                else{
                    if(event.delta.y>0)
                        rotate = -45;
                    else if (event.delta.y==0)
                        rotate = -90;
                    else 
                        rotate = -135;
                }
                textX.rotate(rotate);
    },
            onMouseUp   : function (event){},
            onMouseMove : function (event){},
            onKeyUp     : function (event){


              
//                 var textX = new PointText({
//     point: [downPointX+(sizeX/2), downPointY+13],
//     content:  Math.abs(sizeX),
//     fillColor: 'black',

//     justification: 'center',
//     fontSize:13
// })
            }
        }

    }
}


var toolSelector        = $("<select>",{id:"toolSelector",name:"toolSelector"});

var toolSelectorOption  = $.each(param.tool,function (index){
    var option              = $("<option>",{value:index}).html(index)

    toolSelector.append(option);
    //console.log(index);
});
toolSelector.change(function (){
    toolSelected = param.tool[$(this).val()];
    toolSelected.start();
    $("form#loader-tool-menu").trigger("submit");
});
$("form#loader-tool-menu").append(toolSelector);
    toolSelected = param.tool[param.toolDefault];
    $("option[value="+param.toolDefault+"]").attr("selected","selected")
    toolSelected.start()

$("form#loader-tool-menu").on("submit",function (){
    var t = $(this);
    var action = t.attr("action");
    var data = t.serialize();
    $.post(action,data,function (html){
        $("#tool-menu").html(html);
    })
    return false;
})
 toolSelector.trigger("change");

function onMouseDown(event) {toolSelected.onMouseDown(event)}
function onMouseDrag(event) {toolSelected.onMouseDrag(event)
//console.log(event);
}
function onMouseUp(event) {toolSelected.onMouseUp(event)


var hitResult = project.hitTest(event.point, hitOptions);
}
function onMouseMove(event) {toolSelected.onMouseMove(event)}

function onFrame(event) {toolSelected.onFrame(event)

   $("a#randomDrawPoint").trigger("click");
}


function addLayerToList(data){
    var layer = $("<li>").html("elem id "+data.id);
//console.log(data._parent._project.layers[0]);
    $("#layers-list li.layer.active ul").append(layer);
}

function colorFill(){
    return $("#color_fill").val();
}
function colorStroke(){
    return $("#color_stroke").val();
}

function alphaFill(){
    return $("#color_fill").attr("rel");
}

function alphaStroke(){
    return $("#color_stroke").attr("rel");
}

$(document).on("click",'a#randomDrawPoint',function (){
   // var canvas = $("canvas");
    //var layer = new Layer();
    var t = $(this);
    if(!t.hasClass("onWork")){
        t.addClass("onWork");
        $.each(project.layers,function (index){

            var elem =this._children;
           // elem.smooth();
           // console.log(elem);
            $.each(elem,function (index2){
                this.smooth();
                $.each(this.segments,function(index3){
                 
                    this.orig = (typeof(this.orig)=='undefined')?this._handleOut:this.orig;
                 
                   // console.log(index3);

                     var src = this.orig;

                     var rand = Math.random();
                    if (rand > 0.5){
                       this._handleOut.x = src.x + Math.floor((Math.random()*3)+1);
                       this._handleOut.y = src.y + Math.floor((Math.random()*3)+1);
                    }
                    else {
                         this._handleOut.x = src.x - Math.floor((Math.random()*3)+1);
                       this._handleOut.y = src.y - Math.floor((Math.random()*3)+1);
                    }
                    

                })
        
            })
       
       
        })
 t.removeClass("onWork");
    }

    return false;
})



$(document).on("click",'a#random-text',function (){
   // var canvas = $("canvas");
    //var layer = new Layer();
    var t = $(this);
    if(!t.hasClass("onWork")){
        t.addClass("onWork");
        $.each(project.layers,function (index){

            var elem =this._children;
            $.each(elem,function (index2){
                var srcX = this.position.x;
            //this.position.x = srcX+12;
            this.rotate(10);
            this.content = $("#draw-word").val();
            console.log(this);
            })
        t.removeClass("onWork");
       // console.log(elem[index]);
    })

    }

    return false;
})



$("#draw-save").on("submit",function (){
    var t = $(this);
    var action = t.attr("action");
    var type = t.find('[name=type]').val();
    var filename = t.find('[name=filename]').val();

 
    if(type == "svg"){
        var svg = project.exportSVG();
        var svgContainer = $("<div>",{"id":"svg-save"}).hide().html(svg);
        t.append(svgContainer);
        var data = {
            draw : $("#svg-save").html(),
            type : type,
            filename : filename
    }
}
    else if(type=="png"){

    var canvasId    = $("canvas.canvasActive").attr("id");
    var img         = document.getElementById(canvasId);
    var context     = img.getContext('2d');
    // on enregistre que si un nom de fichier

    //p.find("a").trigger("click");
    //if(filename!=""){

    var imgData     = img.toDataURL("image/"+type);
    var data = {
            draw : imgData,
            type : type,
            filename : filename
    }
}




    $.post(action,data,function (html){
        var result = $("<div>",{"id":"result"}).html(html).delay(4000).fadeIn(150,function (){
            $(this).remove();
        })


        $.gritter.add({
                title:'Enregistrement OK', 
                text: "fichier enregistré",
    
                image: 'http://betty.excentrik.fr/mnk-include/core/img/ui/fff/64px/checkmark.png',
                sticky: false,
                time: ''
            });




        t.append(result);
        $("#svg-save").remove();
    })
    
    return false;
})

$("#draw-svg-load").on("submit",function (){
    var t = $(this);
    var action = t.attr("action");
   var data = t.serialize();

    $.post(action,data,function (html){
        var result = $("<div>",{"id":"result"}).html(html).delay(4000).fadeIn(150,function (){
            $(this).remove();
            project.importSVG(html);
        })
        t.append(result);

    })



        



    return false;
})


/* FONCTION DU MENU */



/*function newRectangle(x,y,w,h){
   // console.log("this");
var path = new Path.Rectangle({
    point: [x, y],
    size: [w, h]
});
if (colorFill()!=""){
    path.fillColor = colorFill();
    path.fillColor.alpha = alphaFill();
}
    

if (colorStroke()!=""){
    path.strokeColor =  colorStroke();
    path.strokeColor.alpha = alphaStroke();
}

}

function newCircle(x,y,radius){
    var path = new Path.Circle({
    center: [x, y],
    radius: radius,
    fillColor :colorFill(),
    strokeColor: colorStroke()
});

}
*/
// on lie les identifiants des liens du menu au fonction du fichier paper_script
// dans un json
/*var paramMenu = {
    "new-rect" : function (){newRectangle()},
    "new-circle"    : function (){newCircle(150,150,75)}
}

$(".draw-menu a").on("click",function () {
    var t = $(this);
    var id= t.attr('id');
    paramMenu[id]();

    return false;
    // body...
})
*/




