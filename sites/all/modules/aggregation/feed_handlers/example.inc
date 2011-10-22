<?php

/**
 * This is an example callback function, just here for demonstration purposes and to show you what
 * you need to pass
 *
 * ALL NULLABLE VALUES TO _aggregation_add_item CAN BE PASSED A NULL value, aggregation module will handle everything
 */

/**
 * This is only an example showing the values that need to be passed to add a new Feed Item
 *
 * @param simpleXML $feed_XML
 * @param stdClass $feed
 */
function _aggregation_example_parse($feed_XML, $feed)
{
	// loop over items in feed. For each item prepare the needed parameters, 
	// then call _aggregation_add_item, dummy calls with info below...
	
	// Foreach item in $feed_XML
	
		// Note : If in VERY rare occasions (ex. NEWSML) you need to process a feed URL present in this current feed,
		// you can do that by calling aggregation_get_URL, then passing the return value to aggregation_get_XML.You are 
		// strongly encouraged to wrap any calls to these function in try catch statements. 
		// If any error occurs, simply throw an exception and the module will handle logging the error!
		
		// can be ommitted, then image URL will be our image GUID
		$image_array['guid'] = $image_guid;
		
		// can be ommitted, then image will take article's title
		$image_array['title'] = $image_title;	
		
		// if any of these is ommitted, the $image_title will be used instead
		$image_array['teaser'] = $image_teaser;
		$image_array['body'] = $image_body;
		
		// This is A MUST if you're interested in getting an image at all
		$image_array['url'] = $image_url;
		
		// can be ommitted, then image will take current time
		$image_array['timestamp'] = $image_timestamp;
		
		
		// Create additional taxonomies if the feed contains categories you'd like to preserve such as ATOM category tags
		
		$additional_taxonomies = array();
		// Create a vocabulary named "vocab_new_1" if it doesn't already exist. Next create "term_new_1", "term_new_2" if they
		// don't exist. If vocabulary or terms exist, the item will go under them! This is sort of an auto-taxonomy technique!
		$additional_taxonomies['vocab_new_1'] = array('term_new_1', 'term_new_2');
		
		// Create as many as you'd like to capture categories already present in the feed checkout ATOM.inc for example
		$additional_taxonomies['vocab_new_2'] = array('term_new_3', 'term_new_4');
		
		// let's pass these arguments to the module by calling _aggregation_add_item
		_aggregation_add_item($title, $body, $teaser, $original_author, $feed, 
			$additional_taxonomies, $timestamp, $original_item_url, $guid, $image_array);
	
		// We're finally done, moving on to the next item if any...
	// End Foreach
}