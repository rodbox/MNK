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
			multipart 		: true,
			startOnAdded	: true,
			data   			: function (){
				return {};
			},
			FilesAdded		: function (up, files, uploader){
				// on ajouter les paramètres param.data

				createLine (up,files)
				$("#droparea-"+selector).removeClass("dragover");
				(param.startOnAdded)?uploaderStart(uploader):"";

				uploader.refresh();
			},
			UploadProgress 	: function (up, file, uploader){
				var fileCurrent = $("#"+file.id)
				if (!fileCurrent.hasClass("upload-current"))
					fileCurrent.addClass("upload-current");

				fileCurrent.find(".progress").css({'width':file.percent+"%"});
			},
			FileUploaded	: function (up, file, data, uploader){
				var fileCurrent = $("#"+file.id);
				fileCurrent.removeClass("upload-current").addClass("upload-complete");
			},
			createLine		: function (up, files, uploader){
				//var filelist = $("#"+param.file_list);
				var filelist = $(this.selector);
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
			}
        };  

    var param=$.extend(defauts, paramSend);

	var uploader = new plupload.Uploader(param);

	var t 			= $(this);
	

 	createDrop(this.selector,param);
	uploader.init();

	uploader.bind('FilesAdded',function(up,files){
		param.FilesAdded(up,files,uploader);
	});

	uploader.bind("UploadProgress",function(up, file){
		param.UploadProgress(up,file,uploader);
	})

	uploader.bind("FileUploaded",function (up, file, data){
		param.FileUploaded(up,file,data,uploader);
	})

function uploaderStart(uploader){
//	uploader = param.beforeStart(uploader);
uploader.settings.multipart_params = param.data();
uploader.start();
	}


function createDrop(selector,param){
		var fileList 	= $("<div>",{"id":param.file_list,"class":"file-list"});
		var browse 		= $("<a>",{"id":param.browse_button,"class":"bt-browse"}).html("Drop files");


		var drop 		= $("<div>",{"id":param.drop_element,"class":"droparea"}).append(browse);

		$(selector).html(drop).append(fileList);
	}


function createLine (up,files){
	param.createLine(up,files);
}


}


});