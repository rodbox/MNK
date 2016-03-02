
$("#run").on('click',function (){
	var t = $(this);
	var code = $('#tool-script').val();

	eval(code);
	return false;

});


$(".onLive-svg").on('click',function (){
	var t = $(this);
	var href = t.attr("href");
	
	var svg = project.exportSVG();
$('#svg-top-save').append(svg);
	var data = {svg : $("#svg-top-save").html()}

	$.post(href,data,function (html){
		alert(html)
	})

	return false;
});



var segment, path;
var movePath = true;
function onMouseDown(event) {
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
			path.smooth();
		}
	}
	movePath = hitResult.type == 'fill';
	if (movePath)
		project.activeLayer.addChild(hitResult.item);
}

function onMouseMove(event) {
	project.activeLayer.selected = false;
	if (event.item)
		event.item.selected = true;
}

function onMouseDrag(event) {
	if (segment) {
		segment.point = event.point;
		path.smooth();
	}

	if (movePath)
		path.position += event.delta;
}

