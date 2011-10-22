<?php

/**
 * This is RSS1.0/RDF basic parsing callback function
 */
function _aggregation_RDF10_parse($feed_XML, $feed)
{
	// set category splitter (space is for del.icio.us feed)
	$category_splitter = ' ';
	
	// get the default original author
	if ($feed_XML->channel->title)
		$oa = (string)$feed_XML->channel->title;
	else
		$oa = $feed->original_author;
		
	// get all namespaces
	if (version_compare(phpversion(), '5.1.2', '<'))
	{
		//versions prior 5.1.2 don't allow namespaces
		$namespaces['default'] = NULL;
	} 
	else
		$namespaces = $feed_XML->getNamespaces(TRUE);

	foreach ($feed_XML->item as $news)
	{
		//initialization
		$guid = $original_url = NULL;
		$title = $body = $teaser = '';
        
		$timestamp = time();
		$additional_taxonomies = array();
		$original_author = $oa;
		
		foreach($namespaces as $ns_prefix => $ns_link)
		{
			//get about attribute as guid
			foreach ($news->attributes($ns_link) as $name => $value)
				if ($name == 'about')
					$guid = $value;

			//get children for current namespace
			if (version_compare(phpversion(), '5.1.2', '<'))
				$ns = $news;
			else
				$ns = $news->children($ns_link);
			
			//title
			if ($ns->title)
				$title = "{$ns->title}";
			
			//description or dc:description
			if ($ns->description && $body == '')
				$body = "{$ns->description}";
			
			//link
			if ($ns->link)
				$original_url = "{$ns->link}";
			
			//dc:creator
			if ($ns->creator)
				$original_author = "{$ns->creator}";
			
			//dc:date
			if ($ns->date)
				$timestamp = strtotime("{$ns->date}");
			
			//content:encoded
			if ($ns->encoded)
				$body = "{$ns->encoded}";
				
			//dc:subject
			if ($ns->subject)
			{
				foreach ($ns->subject as $cat)
				{
					if (is_object($cat))
						$additional_taxonomies['Feed Categories'][] = trim(strip_tags("$cat"));
					else
						foreach (explode($category_splitter, $cat) as $tag)
						{
							$additional_taxonomies['Feed Categories'][] = $tag;
						}
				}
				$additional_taxonomies['Feed Categories'] = array_unique($additional_taxonomies['Feed Categories']);
			}
		}
		
	
		//make teaser
		$teaser = node_teaser($body);
        
		// if there are no link tag but rdf:about is provided
		if (!$original_url && $guid)
			$original_url = $guid;
		_aggregation_add_item($title, $body, $teaser, $original_author, $feed, $additional_taxonomies, $timestamp, $original_url, $guid, array());
	}
}
