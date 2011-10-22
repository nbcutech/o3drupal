<?php

/**
 * This is RSS 2.0 parsing callback function
 */
function _aggregation_RSS20_parse($feed_XML, $feed)
{
	// set category splitter
	$category_splitter = '.';

	foreach ($feed_XML->xpath('//item') AS $news)
	{
		// for PHP > 5.1.2 get 'content' namespace
		$content = $news->children('http://purl.org/rss/1.0/modules/content/');
		$dc = $news->children('http://purl.org/dc/elements/1.1/');

		if ($news->guid)
			$guid = "{$news->guid}";
		else
			$guid = NULL;

		if ($news->title)
			$title = "{$news->title}";
		else
			$title = '';

		$body = '';
		// some sources use content:encoded as description i.e. PostNuke PageSetter module
		if ($news->encoded)  //content:encoded for PHP < 5.1.2
		{
		  foreach($news->encoded->children() as $child) 
		    $body .= $child->asXML();
		  $body .= "{$news->encoded}";
		}
		elseif ($content->encoded)  //content:encoded for PHP >= 5.1.2
		{
		  foreach($content->encoded->children() as $child) 
		    $body .= $child->asXML();
		  $body .= "{$content->encoded}";
		}
		elseif ($news->description)
		{
		  foreach($news->description->children() as $child) 
		    $body .= $child->asXML();
		  $body .= "{$news->description}";
		}
		else
			$body = $title;

		$teaser = node_teaser($body);
		
		if ($news->author)
			$original_author = "{$news->author}";
		elseif ($dc->creator)
		  	$original_author = "{$dc->creator}";
		elseif ($feed_XML->channel->title)
			$original_author = "{$feed_XML->channel->title}";
		else
			$original_author = $feed->original_author;
		
		if ($news->link)
			$original_url = "{$news->link}";
		else
			$original_url = NULL;

		$timestamp = strtotime("{$news->pubDate}");
		if ($timestamp === FALSE)
			$timestamp = time();

		$additional_taxonomies = array();
		
		if ($news->category)
		{
			$additional_taxonomies = array();
			
			foreach ($news->category as $cat)
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

		$other = array();	
		if ($news->comments) 
			$other['original_comments'] = "{$news->comments}";

		$image = array();
		if ($news->enclosure) {		    
			if($news->enclosure instanceof SimpleXMLElement) {
			  $enclosure = $news->enclosure;
			  $attributes = array();
			  foreach ($enclosure->attributes() as $key=>$value)
			    $attributes[(string)$key] = (string)$value;
			  if (preg_match('/^image/', $attributes['type'])) {
				$image[] = array('url' => $attributes['url']);
			  }
			}
			elseif (preg_match('/^image/', $news->enclosure['type'])) {
				$image[] = array('url' => "{$news->enclosure['url']}");
			}
		}
		else if (preg_match('/src="(.*)\.jpg/', $body, $matches)) 
		  $image[]['url'] = $matches[1] .'.jpg';
			
  	_aggregation_add_item($title, $body, $teaser, $original_author, $feed, $additional_taxonomies, $timestamp, $original_url, $guid, $image, $other);
	}
}
