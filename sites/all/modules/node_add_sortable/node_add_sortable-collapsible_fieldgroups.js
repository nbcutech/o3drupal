// $Id$  node_add_sortable-collapsible_fieldgroups.js July 28, 2011 Randall Goya decibel.places
// attempt to sort collapsible fieldsets - not working

//Drupal.behaviors.run_after_page_loads not working here, maybe because of module weight?

$(document).ready(function() {
	var oldorder;
	var newindex = 1;

	

	$("div.standard").sortable({
		items: "fieldset:contains('Promo')",		
	});


	$( "div.standard").bind( "sortupdate", function(event, ui) {
		//fieldname is in content-type specific js file loaded in module
		fieldname_cap = fieldname.charAt(0).toUpperCase() + fieldname.substring(1).toLowerCase();
		activepos = $(ui.item).text();
		activepos = activepos.substring(activepos.indexOf(fieldname_cap));
		activepos = activepos.substring(activepos.indexOf(" ")+1);
		activepos = activepos.substring(0,activepos.indexOf(" ")+1);
		//alert(activepos);
		$("div.standard legend:contains('Promo')").each(function() {
		//alert($(this).text().substring(6));
		oldorder = $(this).text().substring(6);
		
		replacethis = fieldname + oldorder;
		replacewith = fieldname + newindex.toString();
		fieldname_cap = fieldname.charAt(0).toUpperCase() + fieldname.substring(1).toLowerCase() + " " + oldorder;
		fieldname_cap_rep = fieldname.charAt(0).toUpperCase() + fieldname.substring(1).toLowerCase() + " " + newindex.toString();
		//alert("activepos: " + activepos + "oldorder: " + oldorder + " newindex: " + newindex);
		if (eval(activepos) == eval(oldorder)) {$(this).parents('fieldset').removeClass("collapsed");}
		else if (!($(this).parents('fieldset').hasClass("collapsed"))) $(this).parents('fieldset').addClass("collapsed");
		oldfclass = "group-highlight" + oldorder;
		newfclass = "group-highlight" + newindex;
		$(this).parents('fieldset').removeClass(oldfclass).addClass(newfclass);
		if (eval(activepos) == eval(oldorder)) {
		//alert($(this).parents('fieldset').attr("style"));
		$(this).parents('fieldset').attr("style","");
		$(this).siblings('.fieldset-wrapper').css({"display":"block","overflow" : "hidden"});
		}
		thiscode = $(this).parents('fieldset').html();

		if (replacethis != replacewith){
			while (thiscode.search(replacethis) > 0) {
				thiscode = thiscode.replace(replacethis,replacewith);
			}
			while (thiscode.search(fieldname_cap) > 0) {
				thiscode = thiscode.replace(fieldname_cap,fieldname_cap_rep);
			}
		}
		thiscode = thiscode.replace("Promo " + oldorder,"Promo " + newindex.toString());
		$(this).parents('fieldset').html(thiscode);
		newindex++;
		});
	newindex = 1;

	});

//alert('end docready');

});

//alert(jQuery.fn.jquery);