$(document).ready(function(){
var str = $('.to-list').val();

// var str  =str.replace(/\e0-9{1,}/g,"<ul>");


var patt = new RegExp("e");
var res = patt.test(str);

var str  =str.replace(/\[/g,"<ul class='marginLeft'>");
var str  =str.replace(/\]/g,"</ul>");

var ul = $.parseHTML(str);
console.log(ul);
// var str  =str.replace(/]/g,"</ul>");

$('.result').html(str);
$('.result-2').html(res);
});