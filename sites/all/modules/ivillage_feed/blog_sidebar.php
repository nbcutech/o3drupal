<div style="background-color:#fff;padding:6px;">

<?php

    $terms = taxonomy_node_get_terms(arg(1));
    if ($term[21]) {$site_id=$term[21]->name; }
    print_r($terms);
    print "SITE_ID:" . $site_id;
    
    // select all the unique UID "blog" nodes, then join them with users and away we should go
    $result = db_query("SELECT DISTINCT u.name, u.uid FROM {users} u INNER JOIN {node} n ON n.uid = u.uid WHERE n.type = 'blog' ORDER BY u.name");
    while ($node = db_fetch_object($result)) 
    {
        $latestr = db_query("SELECT DISTINCT n.nid, n.title, r.teaser, p.value
                            FROM node n, node_revisions r, profile_values p, term_node t
                            WHERE n.type =  'blog'
                            AND n.nid = r.nid
                            AND n.uid =  %d
                            AND p.uid =  %d
                            AND p.fid = 1

                            ORDER BY n.created DESC 
                            LIMIT 1",$node->uid,$node->uid);
        if($latestn = db_fetch_object($latestr))
        {
            print "<div class='blog_author_name'>".l(strtolower($latestn->value), 'blog/' . $node->uid);
            print "<div class='blog_teaser'>" . $latestn->teaser . "</div>";
            print "<div class='blog_link'>".l("Read ". $latestn->value ."'s blog", 'node/'.$latestn->nid)."</div>\n";
            
            print "</div>\n";
        }
    }

    
?>

</div>