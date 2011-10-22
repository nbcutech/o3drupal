// $Id$  node_add_sortable.js July 28, 2011 Randall Goya decibel.places

//Drupal.behaviors.run_after_page_loads not working here, maybe because of module weight?

$(document).ready(function() {
	var oldorder;
	var newindex = 1;
	$(".textarea-identifier").css({'display':'none'});

	$("div.standard").sortable({
		items: "fieldset:contains('Promo')",
		helper: 'ui-sortable-helper',
		//forceHelperSize: true,
		placeholder: 'ui-sortable-placeholder',
	});

	$("div.standard" ).bind( "sortstart", function(event, ui) {
		$("html, body").animate({ scrollTop: 0 }, "slow");
		$(ui.item).css({'background-color':'#fcc','margin-top':'-100px'});
		//$('.ui-sortable-helper').css({'height':'100px','margin-top':'0px','background-color':'#f00'});
		$('.ui-sortable-placeholder').css({'height':'100px','margin-top':'0px','margin-bottom':'0px','padding':'0px','background-color':'#000','color':'#fff','text-align':'center','overflow':'hidden'});
		$('.ui-sortable-placeholder').html("<h1 id='drophere'>Drop Here</h1>");

		num = 1;
		$("div.standard legend:contains('Promo')").each(function() {
			$("#wysiwyg-toggle-edit-field-babypromo"+num+"-blurb-0-value").click();
			$("#wysiwyg-toggle-edit-field-babypromo"+num+"-linktext-0-value").click();
			$(this).parents('fieldset').css({'height':'100px','overflow':'hidden'});
			$(this).siblings('div').css({'display':'none'});
			$("legend:contains('Input')").css({'display':'none'});
			$(".form-item:contains('caption')").css({'display':'none'});
			
			
			
			num++;
		});
		num = 0;
		//$('.imagefield-preview').css({'display':'inline'});
	});

	$("div.standard" ).bind( "sortstop", function(event, ui) {
		

		$("div.standard legend:contains('Promo')").each(function() {
			$(this).parents('fieldset').css({'height':'auto'});
			$(this).siblings('div').css({'display':'block'});
			$("legend:contains('Input')").css({'display':'block'});
			$(".textarea-identifier").css({'display':'none'});
		});
		//hide IMCE image caption textarea
		$('div[id*="image-wrapper"]').css('display','none');
		//clicking Preview reloads CKeditor wysiwyg fields
		$('#edit-preview').click();
	});

	$( "div.standard").bind( "sortupdate", function(event, ui) {
		//fieldname is parsed from content-type node/add form id and pre-loaded in module
		activepos = $(ui.item).text();
		activepos = activepos.substring(activepos.indexOf("Promo"));
		activepos = activepos.substring(activepos.indexOf(" ")+1);
		activepos = activepos.substring(0,activepos.indexOf(" ")+1);
		$("div.standard legend:contains('Promo')").each(function() {
			oldorder = $(this).text().substring(6);
			replacethis = fieldname + oldorder;
			replacethisid = replacethis.replace("_","-");
			replacethispromo = "Promo " + oldorder;
			replacewith = fieldname + newindex.toString();
			replacewithid = replacewith.replace("_","-");
			replacewithpromo = "Promo " + newindex.toString();
			thisfieldname_cap = fieldname_cap + " " + oldorder;
			thisfieldname_cap_rep = fieldname_cap + " " + newindex.toString();
			oldfclass = "group-" + fieldname + oldorder;
			newfclass = "group-" + fieldname + newindex.toString();
			$(this).parents('fieldset').removeClass(oldfclass).addClass(newfclass);
			if (eval(activepos) == eval(oldorder)) {
			$(this).parents('fieldset').attr("style","");
			$(this).siblings('.fieldset-wrapper').css({"display":"block","overflow" : "hidden"});
			}
			thiscode = $(this).parents('fieldset').html();
			if (replacethis != replacewith){
				while (thiscode.search(replacethis) > 0) {
					thiscode = thiscode.replace(replacethis,replacewith);
					thiscode = thiscode.replace(replacethisid,replacewithid);
				}
				while (thiscode.search(thisfieldname_cap) > 0) {
					thiscode = thiscode.replace(thisfieldname_cap,thisfieldname_cap_rep);
				}
				while (thiscode.search(replacethispromo) > 0) {
					thiscode = thiscode.replace(replacethispromo,replacewithpromo);
				}
				while (thiscode.search('"imagetitle",'+oldorder) > 0) {
					thiscode = thiscode.replace('"imagetitle",'+oldorder,'"imagetitle",'+newindex);
				}
				while (thiscode.search('"imagealt",'+oldorder) > 0) {
					thiscode = thiscode.replace('"imagealt",'+oldorder,'"imagealt",'+newindex);
				}
			}			
			$(this).parents('fieldset').html(thiscode);
			
			//alert(thiscode);
	
		newindex++;
		});
		
		newindex = 1;
		
	});
	//hide incorrect preview
	$('div.preview').css('display','none');
	//hide preview button
	$('#edit-preview').css('visibility','hidden');
});

//alert(jQuery.fn.jquery);