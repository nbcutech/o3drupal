// $Id$ crop_presets.js September 24, 2011 Randall Goya decibel.places
// this script is loaded on the node/add form

$(document).ready(function() {
$("a:contains('browse')").text("Open file browser");
$('.crop-rect').focus(function() {
$('.crop-rect').val('0,0,' + cropw + ',' + croph);
setTimeout("$('.crop-rect').focus()",100);
)};

});

