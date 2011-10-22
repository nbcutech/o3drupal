<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<title>CMS File upload</title>
<link href="../css/default.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../swfupload/swfupload.js"></script>
<script type="text/javascript" src="../js/swfupload.queue.js"></script>
<script type="text/javascript" src="../js/fileprogress.js"></script>
<script type="text/javascript" src="../js/handlers.js"></script>
<script type="text/javascript">
		var swfu;

		window.onload = function() {
			var settings = {
				flash_url : "/cmstool/uploader/swfupload/swfupload.swf",
				upload_url: "../upload.php",
				post_params: {"PHPSESSID" : "<?php echo session_id(); ?>"},
				file_size_limit : "40960",
				file_types : "*.*",
				file_types_description : "All Files",
				file_upload_limit : 100,
				file_queue_limit : 50,
				custom_settings : {
					progressTarget : "fsUploadProgress",
					cancelButtonId : "btnCancel"
				},
				debug: false,
	
				// Button settings
				button_image_url: "../images/TestImageNoText_65x29.png",
				button_width: "65",
				button_height: "29",
				button_placeholder_id: "spanButtonPlaceHolder",
				button_text: '<span class="theFont">Upload</span>',
				button_text_style: ".theFont { font-size: 16; }",
				button_text_left_padding: 8,
				button_text_top_padding: 3,
	
	/*			
					// Button Settings
				button_image_url : "/cmstool/uploader/multiinstancedemo/XPButtonUploadText_61x22.png",
				button_placeholder_id : "spanButtonPlaceholder",
				button_width: 61,
				button_height: 22,
*/
				
				// The event handler functions are defined in handlers.js
				file_queued_handler : fileQueued,
				file_queue_error_handler : fileQueueError,
				file_dialog_complete_handler : fileDialogComplete,
				upload_start_handler : uploadStart,
				upload_progress_handler : uploadProgress,
				upload_error_handler : uploadError,
				upload_success_handler : uploadSuccess,
				upload_complete_handler : uploadComplete,
				prevent_swf_caching: false,
				queue_complete_handler : queueComplete	// Queue plugin event
			};

			swfu = new SWFUpload(settings);
	     };
	</script>
</head>

<body>
<div id="content">
	<h2>CMS Upload</h2>
	<form id="form1" action="index.php" method="post" enctype="multipart/form-data">
		<p>Form Upload Page</p>

			<div class="fieldset flash" id="fsUploadProgress">
			<span class="legend">Upload Queue</span>
			</div>
		<div id="divStatus">0 Files Uploaded</div>
			<div>
				<span id="spanButtonPlaceHolder"></span>
				<input id="btnCancel" type="button" value="Cancel All Uploads" onclick="swfu.cancelQueue();" disabled="disabled" style="margin-left: 2px; font-size: 8pt; height: 29px;" />
			</div>

	</form>
</div>
</body>
</html>
