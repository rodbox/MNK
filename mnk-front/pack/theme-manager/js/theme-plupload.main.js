var execFile	= "theme-manager/theme-file-upload";

/*var url 		= "http://"+location.host+"/mnk-include/exec.php"+location.search+"&exec="+execFile;*/
var url 		= "http://"+location.host+"/mnk-include/exec.php?type=pack&exec="+execFile;
var uploader = new plupload.Uploader({
	runtimes 		: "html5,flash",
	containes		: "plupload",
	browse_button	: "browse",
	url 			: url,
	drop_element	: "droparea",
	flash_swf_url	: "plupload.flash.swf",
	multipart 		: true,
//	resize 			: {"width":1200, "height": 1000, "quality": 90},
	urlstream_upload: true,
	multipart_params: {}
/*	filters: [
		{title :  'Images', extensions : 'jpg,gif,png,jpeg'}
	]*/
})

var paramLocation = location.search
var paramLocation = paramLocation.substring(1,paramLocation.length);


//console.log(paramLocation);

uploader.init();
uploader.bind('FilesAdded',function(up,files){
	var filelist = $("#filelist");

	var pack  = uploader.settings.multipart_params.theme = $("select[name=theme]").val();
	var type  = uploader.settings.multipart_params.type = $("select[name=type]").val();


	for(var i in files){
		var file = files[i];

		var progress = $("<div>",{class:"progress"});
		var progressBar = $("<div>",{class:"progressBar"}).append(progress);

		var line = $("<div>",{
			id  	: file.id,
			class	: "file",
			html 	: file.name+"  <span class='small'>" + pack + " " + type +" ("+plupload.formatSize(file.size)+")</span>"
		}).append(progressBar);
		filelist.append(line);
	}
	$("#droparea").removeClass("dragover");

	

	//console.log(uploader.settings.multipart_params);
	uploader.start();
	uploader.refresh();
});

uploader.bind("UploadProgress",function(up, file){
	var fileCurrent = $("#"+file.id)

	if (!fileCurrent.hasClass("upload-current"))
		fileCurrent.addClass("upload-current");

	fileCurrent.find(".progress").css({'width':file.percent+"%"});
	
})


uploader.bind("FileUploaded",function (up, file, data){
	var fileCurrent = $("#"+file.id);

		$("table#gal-manage-tmp tbody").prepend(data.response);
		setTimeout(function(){
					$("a.crop_profile_tmp").trigger('click');
				},1000);
		fileCurrent.removeClass("upload-current").addClass("upload-complete");

})

jQuery(function($){

	$("#droparea").bind({
		dragover	: function(e){
			$(this).addClass("dragover")
		},
		dragleave	: function (e){
			$(this).removeClass("dragover")
		}
	})






})	

					




