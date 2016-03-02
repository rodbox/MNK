$(document).ready(function(){
// Creates canvas 320 × 200 at 10, 50



var paper = Raphael(30, 50, 1280,720);

// Creates circle at x = 50, y = 40, with radius 10
var circle = paper.circle(120, 120, 100);
// Sets the fill attribute of the circle to red (#f00)
circle.attr("fill", "#f00");

// Sets the stroke attribute of the circle to white
circle.attr("stroke", "transparent");
var circle = paper.circle(220, 220, 50);
circle.attr({
	"stroke-width" : "5"}
);
});