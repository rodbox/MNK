<textarea  id="json" rows="15" cols="55">{"e8":[
    {"e1":["e2"]},
    {"e3":[
        "e4",
        {"e5":[
            "e7",
            "e8"
        ]}
    ]},
    "e6"
]} 
</textarea>
<br>
<input type="text" id="pointer" value="node.e8[1].e3[1].e5" />
<br>
<button id="exec">test</button>
<br>
<div id="result"></div>


<script>
$(document).ready(function($) {
	$("#exec").on("click",function(){
    $("#result").html("");
    var jsonStr = $("#json").val();
    var pointer = $("#pointer").val();
    //alert(json);


    var patt = new RegExp("[\n \t]","g");
	var jsonStr = jsonStr.replace(patt,"");
    

// var json = $.parseJSON('{"e8":[{"e9"}]}');
var json = $.parseJSON(jsonStr)
   // jsonStr = jsonStr.replace("\n","");
    console.log(jsonStr);
    console.log(json);

    return false;
})
});
</script>
