$(function() {
	$.fn.plupload=function(paramSend)
	{



	var selector = this.selector.substring(1,this.selector.length);

    var defauts=
       {
           	containes		: selector,
           	file_list 		: "file-list-"+selector,
			browse_button	: "browse-"+selector,
			drop_element	: "droparea-"+selector,
			urlstream_upload: true,
			runtimes 		: "html5,flash",
			flash_swf_url	: "plupload.flash.swf",
			multipart 		: true
        };  

    var param=$.extend(defauts, paramSend);

	var uploader = new plupload.Uploader(param);

	var t 			= $(this);
	var fileList 	= $("<div>",{"id":param.file_list,"class":"file-list"});
	var browse 		= $("<a>",{"id":param.browse_button,"class":"bt-browse"}).html("parcourir");
	var ou 			= $("<span>",{"class":"small"}).html("ou");

	var drop 		= $("<div>",{"id":param.drop_element,"class":"droparea"}).html("<p>Déposer vos photos içi !</p>").append(ou).append(browse);

	$(this.selector).html(drop).append(fileList);
 
	uploader.init();
	uploader.bind('FilesAdded',function(up,files){
	var filelist = $("#"+param.file_list);
	for(var i in files){
		var file = files[i];

		var progress = $("<div>",{class:"progress"});
		var progressBar = $("<div>",{class:"progressBar"}).append(progress);

		var line = $("<div>",{
			id  	: file.id,
			class	: "file",
			html 	: "<div class='img-title'>"+file.name+" <span class='small'>("+plupload.formatSize(file.size)+")</span></div>"
		}).append(progressBar);
		filelist.append(line);
	}
	$("#droparea").removeClass("dragover");
	uploader.start();
	uploader.refresh();
	// fileListState();
});

uploader.bind("UploadProgress",function(up, file){
	var fileCurrent = $("#"+file.id)

	if (!fileCurrent.hasClass("upload-current"))
		fileCurrent.addClass("upload-current");

	fileCurrent.find(".progress").css({'width':file.percent+"%"});
	
})


uploader.bind("FileUploaded",function (up, file, data){

	var fileCurrent = $("#"+file.id);
	// var img = $("<img>",{src:data.response,class:"thumb"});
	// img.css({"opacity":0}).animate({"opacity":1},250);

	
	// fileCurrent.find("*").fadeOut(250);
	// fileCurrent.delay(250).html(img);

	fileCurrent.removeClass("upload-current").addClass("upload-complete");
	// fileListState();
})

}


});