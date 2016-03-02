$.appExec = function (pack,exec,data,callback,dataType){

		var url ="http://metronic.excentrik.fr/mnk-front/pack/app/exec/app-exec.php"
		url += "?pack="+pack+"&exec="+exec;
		var gritterOnLoad = $.gritter.add({
			title:pack+ " "+exec, 
			text: "en cours",
			image: 'http://betty.excentrik.fr/mnk-include/core/img/ui/fff/48px/clock2.png',
			sticky: true,
			time: ''
	              });
		$.post(url,data,{dataType:"json"}).done(function (html){
			$.gritter.add({
				title:pack+ " "+exec, 
	            text: "OK",
	            image: 'http://betty.excentrik.fr/mnk-include/core/img/ui/fff/48px/checkmark.png',
	            sticky: false,
	            time: 500
	        });
	        $.gritter.remove(gritterOnLoad,{ 
	          fade: true, // optional
	          speed: 'fast' // optional
	        });
	        callback(html);
		});

}