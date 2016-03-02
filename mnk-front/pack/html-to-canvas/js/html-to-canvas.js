$(document).ready(function(){
html2canvas(document.body, {
  onrendered: function(canvas) {
    // document.body.appendChild(canvas);
    $("div.render").html(canvas)
    console.log(canvas);
  }
});
});