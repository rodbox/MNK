$(document).ready(function($) {
	$(".jquery-lab").on('click',function (){
		eval("$.draw."+$(this).attr("id")+"()");
		return false;
	});

	$.draw.load(10);
});

$.draw = {
	"param":0,
	load : function (load){
		this.param = load;
		console.log("load");
	},
	add : function (){
		this.param = this.param+1;
		console.log("add");
		},
	del : function (){
		this.param  = this.param-1;
		console.log("del");
	},
	upd : function (val){
		console.log("upd");
		this.upd = this.upd+val;
	},
	eval : function (){
		console.log(this);
	},
	new : function (){
		console.log("########");
		console.log("new");
		this.load(0)
	}
}