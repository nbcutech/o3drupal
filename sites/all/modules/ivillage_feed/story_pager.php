<?php
        $teaser_length = 512;
        $items_per_page = 10;
        $query = "SELECT n.title, r.body, n.nid, n.created FROM node n, node_revisions r WHERE n.type = 'ivillage_story_feed' AND n.nid = r.nid ORDER BY n.created DESC";

        $result = pager_query($query,$items_per_page);
        $output = "";

        while ($current_story = db_fetch_object($result)) {
            $pub_date = date("d/m/Y", $current_story->created);
            
            $teaser = truncate(strip_tags($current_story->body),$teaser_length,$etc = "...");
            
            $output .= '<div><a href="node/' . $current_story->nid . '">' . $current_story->title . '</a> - ' . $pub_date . '</div>';
            $output .= '<div>' . $teaser . '</div><br />';
        
        
        }


        $output .= theme('pager', NULL, $items_per_page, 0);
        print $output;
?>


