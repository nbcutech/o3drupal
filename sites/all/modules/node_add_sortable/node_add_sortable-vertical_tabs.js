// $Id$  node_add_sortable-vertical_tabs.js July 28, 2011 Randall Goya decibel.places
// attempt to sort vertical tabs - not working

//Drupal.behaviors.run_after_page_loads not working here, maybe because of module weight?

$(document).ready(function() {
	var neworder = new Array();
	var newindex = 1;
	var fieldtemplate;
	//='<fieldset class="group-highlight1 vertical-tabs-fieldset vertical-tabs-group_highlight1 vertical-tabs-fieldset vertical-tabs-group_highlight1"><legend>Promo 1</legend><div class="form-item">  Highlight 1 Image [<a href="javascript:imceImage.open(\'/imce/browse\', \'0-field_highlight1_image\')" class="imceimage-add">Change Image</a>][<a class="imceimage-remove" href="javascript:imceImage.remove(\'0-field_highlight1_image\')">Remove</a>] </div> <input type="hidden" name="field_highlight1_image[0][imceimage_path]" id="imceimagepath-0-field_highlight1_image" value="http://localhost.tools.oxygen.com/sites/default/files/hairbattle/highlights/HBS_highlights1_10_11.jpg"  /> <input type="hidden" name="field_highlight1_image[0][imceimage_width]" id="imceimagewidth-0-field_highlight1_image" value="282"  /> <input type="hidden" name="field_highlight1_image[0][imceimage_height]" id="imceimageheight-0-field_highlight1_image" value="114"  /> <div class="form-item" id="imceimagealt-0-field_highlight1_image-wrapper">  <label for="imceimagealt-0-field_highlight1_image">caption: </label>  <textarea cols="60" rows="1" name="field_highlight1_image[0][imceimage_alt]" id="imceimagealt-0-field_highlight1_image"  class="form-textarea resizable text"></textarea>  <div class="description">The caption text for this image.</div> </div> <div class="textarea-identifier description">The ID for <a href="/admin/settings/fckeditor">excluding or including</a> this element is: imceimagealt-0-field_highlight1_image - the path is: node/96537/edit</div><div class="form-item">  <img src="http://localhost.tools.oxygen.com/sites/default/files/hairbattle/highlights/HBS_highlights1_10_11.jpg" alt="" width="282" height="114" id="imceimagearea-0-field_highlight1_image" /> </div> <div class="form-item" id="edit-field-highlight1-blurb-0-value-wrapper">  <label for="edit-field-highlight1-blurb-0-value">Highlight 1 Blurb: </label>  <input type="text" name="field_highlight1_blurb[0][value]" id="edit-field-highlight1-blurb-0-value" size="60" value="Download the latest episodes of Hair Battle Spectacular on iTunes." class="form-text text" /> </div> <div class="form-item" id="edit-field-highlight1-link-0-value-wrapper">  <label for="edit-field-highlight1-link-0-value">Highlight 1 Link: </label>  <input type="text" name="field_highlight1_link[0][value]" id="edit-field-highlight1-link-0-value" size="60" value="http://www.itunes.com/oxygen" class="form-text text" /> </div> <div class="form-item" id="edit-field-highlight1-linktext-0-value-wrapper">  <label for="edit-field-highlight1-linktext-0-value">Highlight 1 Link Text: </label>  <input type="text" name="field_highlight1_linktext[0][value]" id="edit-field-highlight1-linktext-0-value" size="60" value="Get started here." class="form-text text" /> </div> </fieldset>';


	$("ul.vertical-tabs-list").sortable({
		items: "li:contains('Promo')",
		
	});
	$( "ul.vertical-tabs-list" ).bind( "sortupdate", function(event, ui) {
		newindex = 1;
		$("ul.vertical-tabs-list a:contains('Promo')").each(function() {
		//alert($(this).text().substring(6));
		neworder[newindex] = $(this).text().substring(6);
		//alert(neworder[newindex]);
		thiscode = $(this).parent().html();
		replacethis = fieldname + neworder[newindex];
		replacewith = fieldname + newindex.toString();
		//alert("replacethis: " + replacethis + " replacewith: " + replacewith);
		if (replacethis != replacewith){
			while (thiscode.search(replacethis) > 0) {
				thiscode = thiscode.replace(replacethis,replacewith);
			}
		}
		thiscode = thiscode.replace("Promo " + neworder[newindex],"Promo " + newindex.toString());
		$(this).parent().html(thiscode);
		newindex++;
		});
		newindex = 1;
		/*$("fieldset:contains('Blurb')").each(function() {
			thiscode = $(this).parent().html();
			alert(thiscode);
			replacethis = fieldname + newindex.toString();
			replacewith = fieldname + neworder[newindex].toString();
			alert("replacethis: " + replacethis + " replacewith: " + replacewith);
			fieldname_cap = fieldname.charAt(0).toUpperCase() + fieldname.substring(1).toLowerCase() + " " + newindex.toString();
			fieldname_cap_rep = fieldname.charAt(0).toUpperCase() + fieldname.substring(1).toLowerCase() + " " + neworder[newindex].toString();
			if (replacethis != replacewith){ 
				while (thiscode.search(replacethis) > 0) {
					thiscode = thiscode.replace(replacethis,replacewith);
				}
				while (thiscode.search(fieldname_cap) > 0) {
					thiscode = thiscode.replace(fieldname_cap,fieldname_cap_rep);
				}
			$(this).parent().html(thiscode);
			}
	
		
			//$(this).replaceWith('<h2>New heading</h2>');
			//alert($(this).text());
			//alert(neworder[newindex]);
			alert(thiscode);
			newindex++;
		});*/
		//this=top li
		//activate_vtabs();
		
	});

//alert('end docready');
});

//alert(jQuery.fn.jquery);