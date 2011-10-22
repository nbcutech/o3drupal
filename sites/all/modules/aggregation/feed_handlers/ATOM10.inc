<?php

/**
 * This is ATOM 1.0 parsing callback function
 */
function _aggregation_ATOM10_parse($feed_XML, $feed)
{
	foreach ($feed_XML->entry AS $key => $news)
	{
	  $original_url = NULL;
	  
		if ($news->id)
			$guid = "{$news->id}";
		else
			$guid = NULL;
			
	  // I don't know how standard this is, but sometimes the id is the URL
	  if (valid_url($guid, TRUE))
	   $original_url = $guid;
			
		$additional_taxonomies = array();
			
		if ($news->category)
		{
			$additional_taxonomies['Feed Categories'] = array();
			foreach ($news->category AS $category)
				$additional_taxonomies['Feed Categories'][] = trim(strip_tags("{$category['term']}"));
		}
			
		$title = "{$news->title}";
	  
		if ($news->content)
		{
		  $body = '';
		  foreach($news->content->children() as $child) 
		    $body .= $child->asXML();
		  $body .= "{$news->content}";
		}
		else if ($news->summary)
		{
		  $body = '';
		  foreach($news->summary->children() as $child) 
		    $body .= $child->asXML();
		  $body .= "{$news->summary}";
		}
		
		if ($news->content['src'])
		{
		  // some src elements in some valid atom feeds contained no urls at all
		  if (valid_url("{$news->content['src']}", TRUE))
		    $original_url = "{$news->content['src']}";
		}
			
		if ($news->summary)
		{
		  $teaser = '';
		  foreach($news->summary->children() as $child) 
		    $teaser .= $child->asXML();
		  $teaser .= "{$news->summary}";		  
		}
		else
			$teaser = node_teaser($body);
		
		$author_found = FALSE;
			
		if ($news->source->author->name)
		{
      $original_author = "{$news->source->author->name}";
		  $author_found = TRUE;				
		}
		else if ($news->author->name)
		{
      $original_author = "{$news->author->name}";
		  $author_found = TRUE;
		}

		if ($feed_XML->author->name && !$author_found)
		  $original_author = "{$feed_XML->author->name}";
		else if (!$author_found)
			$original_author = $feed->original_author;
		
		if ($news->link['href'] && valid_url("{$news->link['href']}", TRUE))
      $original_url = "{$news->link['href']}";
			
		$timestamp = strtotime("{$news->published}");
		if ($timestamp === FALSE)
		  $timestamp = time();
			
		_aggregation_add_item($title, $body, $teaser, $original_author, $feed, $additional_taxonomies, $timestamp, $original_url, $guid, array());
	}
}