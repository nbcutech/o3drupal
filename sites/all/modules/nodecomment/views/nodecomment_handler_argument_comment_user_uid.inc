<?php
/**
 * Argument handler to accept a user id to check for nodes that
 * user posted or commented on (using Nodecomment).
 * 
 * Based on original handler from the Views module.
 */
class nodecomment_handler_argument_comment_user_uid extends views_handler_argument_comment_user_uid {
  function query() {
    $this->ensure_my_table();
    // This copies comment handler query. It could be rewritten in various 
    // different ways, but all variants would suck in terms of performance.     
    $where = "$this->table_alias.uid = %d OR
              ((SELECT COUNT(*) FROM {comments} c WHERE c.uid = %d AND c.nid = $this->table_alias.nid) > 0) OR
              ((SELECT COUNT(*) FROM {node_comments} nc WHERE nc.uid = %d AND nc.nid = $this->table_alias.nid) > 0)";
    $this->query->add_where(0, $where, $this->argument, $this->argument, $this->argument);
  }
}
