$(function () {

    var textarea = $('#snippet-content');
    textarea.on("click keyup keydown",function () {
        
    var carretPos = textarea.caretpixelpos();
    var textPos = textarea.offset()


    var popX  = carretPos.childPos.left+textPos.left;
    var popY  = carretPos.childPos.top+textPos.top+5;


    console.log();
$('#snippet-pop').css({"top":popY,"left":popX})

        console.log("X: " + carretPos.left);
        console.log("Y: " + carretPos.top);
        console.log("Child X: " + carretPos.childPos.left);
        console.log("Child Y: " + carretPos.childPos.top);
    });
    $('#text_area').caretpixelpos();
    $("body").prepend(div);

});