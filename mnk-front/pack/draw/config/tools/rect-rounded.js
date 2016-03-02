var rectangle = new Rectangle(new Point(50, 50), new Point(150, 100));
var cornerSize = new Size(20, 20);
var path = new Path.RoundRectangle(rectangle, cornerSize);
path.fillColor = 'black';