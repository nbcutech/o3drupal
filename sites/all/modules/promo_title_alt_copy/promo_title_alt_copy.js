// $Id$  promo_title_alt_copy.js August 8, 2011 Randall Goya decibel.places


/*
* to access, clear, or read wysiwyg fields, first remove wysiwyg iframe, then restore it after removing textarea value
* this is necessary to copy the linktext or blurb to imagetitle or imagealt AFTER deleting/clearing the Promo - 
* the text is only in the wysiwyg iframe body until it is disabled
*/


function copyfromblurb(thisfield,num){
$("#wysiwyg-toggle-edit-field-babypromo"+num+"-blurb-0-value").click();
thisval = $("#edit-field-" + copyfieldname +num+"-blurb-0-value").val();
$("#wysiwyg-toggle-edit-field-babypromo"+num+"-blurb-0-value").click();
//strip HTML tags and &nbsp;
thisval = thisval.replace(/(<([^>]+)>)/ig,"");
thisval = thisval.replace(/((&nbsp;)+)/," ");
$("#edit-field-" + copyfieldname +num+"-"+thisfield+"-0-value").val(thisval);
}
function copyfromlinktext(thisfield,num){
$("#wysiwyg-toggle-edit-field-babypromo"+num+"-linktext-0-value").click();
thisval = $("#edit-field-" + copyfieldname +num+"-linktext-0-value").val();
$("#wysiwyg-toggle-edit-field-babypromo"+num+"-linktext-0-value").click();
//strip HTML tags and &nbsp;
thisval = thisval.replace(/(<([^>]+)>)/ig,"")
thisval = thisval.replace(/((&nbsp;)+)/," ");
$("#edit-field-" + copyfieldname +num+"-"+thisfield+"-0-value").val(thisval);
}

function clearfield(thisfield,num){
$("#edit-field-" + copyfieldname +num+"-"+thisfield+"-0-value").val("");
}

function promoclear(num){

$("#wysiwyg-toggle-edit-field-babypromo"+num+"-blurb-0-value").click();
$("#edit-field-babypromo"+num+"-blurb-0-value").val("");
$("#wysiwyg-toggle-edit-field-babypromo"+num+"-blurb-0-value").click();
$("#wysiwyg-toggle-edit-field-babypromo"+num+"-linktext-0-value").click();
$("#edit-field-babypromo"+num+"-linktext-0-value").val("");
$("#wysiwyg-toggle-edit-field-babypromo"+num+"-linktext-0-value").click();

$("#edit-field-babypromo"+num+"-link-0-value").val("");
$("#edit-field-babypromo"+num+"-imagetitle-0-value").val("");
$("#edit-field-babypromo"+num+"-imagealt-0-value").val("");
$("#edit-field-babypromo"+num+"-image-0-filefield-remove").mousedown(); //mousedown, not click - important!
}

//Drupal.behaviors.run_after_page_loads not working here, maybe because of module weight?
$(document).ready(function() {

//copyfieldname = fieldname.replace("_","-");
if (fieldname == "photohub_promo") copyfieldname = "photohub-promo";
else copyfieldname = "babypromo";
var promocount = 1;
var titlelinktextlink = "";
var altlinktextlink = "";
var countlinktext = $("#edit-field-" + copyfieldname + promocount + "-linktext-0-value").length;

	$("div.standard legend:contains('Promo')").each(function() {
		//delete/clear promo fields for specific promo
		$(this).parent().append("<div class='promoclear'><a class='promoclearlink' href='javascript:promoclear("+promocount+")'>Delete Promo "+promocount+" (clear all fields)</a></div>");
		
		if (countlinktext > 0)
		{
		titlelinktextlink = "<a class='copyfromlinktext' href='javascript:copyfromlinktext(\"imagetitle\","+promocount+")'>copy from Link Text</a> ";
		altlinktextlink = "<a class='copyfromlinktext' href='javascript:copyfromlinktext(\"imagealt\","+promocount+")'>copy from Link Text</a> ";
		}
		
		//image title
		thistitle = $("#edit-field-"+copyfieldname+promocount+"-imagetitle-0-value");
		thistitle.after("<div class='promocopylinks'><a class='copyfromblurb' href='javascript:copyfromblurb(\"imagetitle\","+promocount+")'>copy from Blurb</a> " + titlelinktextlink + "<a class='clearfield' href='javascript:clearfield(\"imagetitle\","+promocount+")'>clear this field</a></div>");
		
		//image alt
		thisalt = $("#edit-field-" + copyfieldname +promocount+"-imagealt-0-value");
		thisalt.after("<div class='promocopylinks'><a class='copyfromblurb' href='javascript:copyfromblurb(\"imagealt\","+promocount+")'>copy from Blurb</a> " + altlinktextlink + "<a class='clearfield' href='javascript:clearfield(\"imagealt\","+promocount+")'>clear this field</a></div>");

		promocount++;

		//css for fieldset labels
		$(this).css({'font-size':'2em','font-weight':'bold','color':'purple'});

	});

});
//alert(jQuery.fn.jquery);
