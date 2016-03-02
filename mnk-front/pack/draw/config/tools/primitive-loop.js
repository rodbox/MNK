// Create a decahedron shaped path 

var viewW = view._bounds.width;
var viewH = view._bounds.height;

var byLine = 15;


var w = viewW/byLine;
var nbLine = viewH/w;

var x= 0+w;
var y = 0+(w/2);
for(y=0;y<10;y++){
for(x=x;x<viewW;x=x+w*2.5){
var decahedron = new Path.RegularPolygon(new Point([x,view.center.y]),6, w);
decahedron.fillColor = '#242424';
}}
console.log();