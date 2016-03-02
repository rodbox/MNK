$(document).ready(function(){
$('.uploader').plupload({
			url 			: "http://"+location.host+"/mnk-front/pack/exec.php?exec=gallery/upload_to_gal",
			//resize 			: {"width":2000, "height": 2000, "quality": 90},
			filters			: [
			{
				title 		:  'Images',
				extensions 	: 'jpg,gif,png,jpeg,JPG,JPEG,PNG,GIF'
			}],
			
			data			: function (){
				return {
					"gallery"	: $("#gallery").val(),
					"resize" 	:
								{  
									width: 1200,
					    			height: 1200
					  			}
				}
			},
			createLine		: function (up, files, uploader){
				//var filelist = $("#file-list-plupload");
				var filelist = $('#file-list-uploader');
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


	});
});