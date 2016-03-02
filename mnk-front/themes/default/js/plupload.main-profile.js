var execFile	= "upload_profile";
var url 		= "http://"+location.host+"/mnk-include/exec.php?type=classic&exec="+execFile;
var uploader = new plupload.Uploader({
	runtimes 		: "html5,flash",
	containes		: "plupload",
	browse_button	: "browse",
	url 			: url,
	drop_element	: "droparea",

	flash_swf_url	: "plupload.flash.swf",
	multi_selection	: false,
	multipart 		: true,
	resize 			: {"width":1200, "height": 1000, "quality": 90},
	urlstream_upload: true,
	multipart_params: [{directory:"test"}],
	filters: [
		{title :  'Images', extensions : 'jpg,gif,png,jpeg'}
	]
})

var paramLocation = location.search
var paramLocation = paramLocation.substring(1,paramLocation.length);


//console.log(paramLocation);

uploader.init();

uploader.bind('FilesAdded',function(up,files){
	var filelist = $("#filelist");
	for(var i in files){
		var file = files[i];

//console.log();

		var progress = $("<div>",{class:"progress"});
		var progressBar = $("<div>",{class:"progressBar"}).append(progress);

		var line = $("<div>",{
			id  	: file.id,
			class	: "file",
			html 	: file.name+" <span class='small'>("+plupload.formatSize(file.size)+")</span>"
		}).append(progressBar);
		filelist.append(line);
	}
	$("#droparea").removeClass("dragover");
	uploader.start();
	uploader.refresh();
});

uploader.bind("UploadProgress",function(up, file){
	var fileCurrent = $("#"+file.id)
	fileCurrent.find(".progress").css({'width':file.percent+"%"});
	if (!fileCurrent.hasClass("upload-current"))
		fileCurrent.addClass("upload-current");

	
	})
uploader.bind("FileUploaded",function (up, file, data){
	var fileCurrent = $("#"+file.id);
console.log(data);

		//fileCurrent.html();
		setTimeout(function(){
					$("a.crop_profile_tmp").trigger('click');
				},1000);
		fileCurrent.removeClass("upload-current").addClass("upload-complete").fadeOut(function (){

$(".profile").replaceWith(data.response);
		fileCurrent.remove();
		});

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

					




