// $Id$ crop_presets_imce_form.js September 24, 2011 Randall Goya decibel.places
// this script is loaded on the IMCE browser window

$(document).ready(function() {
// Preload Imagecache dimensions in crop & resize settings

$('#op-item-crop').mousedown( function() {
	//crop
	$('#edit-crop-width').keydown();
	$('#edit-crop-width').val(opener.cropw);
	$('#edit-crop-width').keyup();
	$('#edit-crop-height').keydown();
	$('#edit-crop-height').val(opener.croph);
	$('#edit-crop-height').keyup();
});
$('#op-item-resize').mousedown( function() {
	//resize
	//$('#edit-width').keydown();
	setTimeout("$('#edit-width').val(opener.cropw)", 750); //kludge, to keep value correct instead of changing
	//$('#edit-width').keyup();
	//$('#edit-height').keydown();
	$('#edit-height').val(opener.croph);
	//$('#edit-height').keyup();
});

//add a Reset (reload) item to IMCE menu
$('#ops-list').append('<li id="op-item-reset"><a href="javascript:location.reload()">Reset</a></li>');

//maximize IMCE popup dialog
if (window.screen) {
	window.moveTo(0,0);
	window.outerHeight = screen.availHeight;
	window.outerWidth = screen.availWidth;
}
});

