// $Id: decisions.js,v 1.1 2009/07/27 22:23:54 anarcat Exp $
/** 
 * Required jQuery methods to enable ahah processing of decisions forms
 *
 **/

/**
 * jQuery callback to be executed after user requests Drupal to add a new choice using ahah.
 * 
 * @param context content to insert
 */
jQuery.fn.decisions_addChoice = function(context){

	var choices = jQuery('#edit-choice-choices');
	var maxchoices = jQuery('#edit-settings-maxchoices');	
	var count = parseInt(choices.attr('value')) + 1;
	
	// Append newly received form element to list
	this.before(context);
	// Refresh choices count
	choices.attr('value', count);
	// Refresh maxchoices list to new count
	maxchoices.append(
		jQuery('<option></option>').val(count).html(count)
	);

}

