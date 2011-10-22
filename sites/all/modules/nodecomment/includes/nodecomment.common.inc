<?php

/**
 * @file
 * Helper functions of the Node Comments module.
 */

/**
 * Accepts a submission of new or changed comment content.
 *
 * @param $node
 *   The node that is serving as a comment to another node.
 *
 * @return
 *   If the comment is successfully saved the node ID of the comment is returned. If the comment
 *   is not saved, FALSE is returned.
 */
function nodecomment_save($node) {
  global $user;

  if (!isset($node->thread)) {
    $node->thread = nodecomment_get_thread($node);
  }

  // Try an update first, do not change the original submitted IP Address.
  db_query(
    "UPDATE {node_comments} 
     SET nid = %d, pid = %d, thread = '%s', name = '%s', uid = %d, mail = '%s', homepage = '%s'
     WHERE cid = %d",
    $node->comment_target_nid, $node->comment_target_cid, $node->thread, 
    $node->name, $node->uid, $node->mail, $node->homepage, $node->nid
  );
  // If not updated, insert a new comment.
  if (db_affected_rows() == 0) {
    // Ignore insert errors as a workaround for db_affected_rows() inconsistent
    // results caused by php's MySQL driver bugs.
    @db_query(
      "INSERT INTO {node_comments}
       (cid, nid, pid, hostname, thread, name, uid, mail, homepage) 
       VALUES (%d, %d, %d, '%s', '%s', '%s', %d, '%s', '%s')",
      $node->nid, $node->comment_target_nid, $node->comment_target_cid, 
      ip_address(), $node->thread, $node->name, $node->uid, $node->mail, 
      $node->homepage
    );
  }

  _nodecomment_update_node_statistics($node->comment_target_nid);

  // Explain the approval queue if necessary, and then
  // redirect the user to the node he's commenting on.
  if ($node->moderate == 1) {
    drupal_set_message(t('Your comment has been queued for moderation by site administrators and will be published after approval.'));
  }
  return $node->nid;
}


/**
 * Set the breadcrumb trail to include another node.
 *
 * This is used when viewing or adding a comment so that the parent node's
 * breadcrumb trail is used instead of the normal breadcrumb paths.
 *
 * @param $node
 *   The node to use.
 */
function nodecomment_set_breadcrumb($node) {
  // If the node had any breadcrumb changes, they will be made via nodeapi('view')
  // as a general rule, so this will make them happen.
  node_invoke_nodeapi($node, 'view', FALSE, TRUE);

  // Then add the parent node to the trail.
  $breadcrumb = drupal_get_breadcrumb();
  $breadcrumb[] = l($node->title, "node/$node->nid");
  drupal_set_breadcrumb($breadcrumb);
}

/**
 * Get number of new comments for current user and specified node
 *
 * @param $nid node-id to count comments for
 * @param $timestamp time to count from (defaults to time of last user access
 *   to node)
 */
function nodecomment_num_new($nid, $timestamp = 0) {
  global $user;

  if ($user->uid) {
    // Retrieve the timestamp at which the current user last viewed the
    // specified node.
    if (!$timestamp) {
      $timestamp = node_last_viewed($nid);
    }
    $timestamp = ($timestamp > NODE_NEW_LIMIT ? $timestamp : NODE_NEW_LIMIT);

    // Use the timestamp to retrieve the number of new comments.
    $result = db_result(db_query(
      "SELECT COUNT(cn.nid) FROM {node} n
       INNER JOIN {node_comments} c ON n.nid = c.nid
       INNER JOIN {node} cn ON c.cid = cn.nid
       WHERE n.nid = %d AND (cn.created > %d OR cn.changed > %d) AND cn.status = %d",
      $nid, $timestamp, $timestamp, 1
    ));

    return $result;
  }
  else {
    return 0;
  }
}

/**
 * Calculate page number for any given comment.
 *
 * @param $comment
 *   The comment.
 * @return
 *   The page number.
 */
function nodecomment_page_count($comment, $node = NULL) {
  if (!$node) {
    if (empty($comment->comment_target_nid)) {
      return '';
    }

    $node = node_load($comment->comment_target_nid);
    if (!nodecomment_get_comment_type($node->type)) {
      return '';
    }
  }

  $comments_per_page = _comment_get_display_setting('comments_per_page', $node);
  $mode = _comment_get_display_setting('mode', $node);
  $order = _comment_get_display_setting('sort', $node);

  $flat = in_array($mode, array(COMMENT_MODE_FLAT_COLLAPSED, COMMENT_MODE_FLAT_EXPANDED));

  if ($flat) {
    $field = 'n.nid';
    $value = '%d';
    $arg = $comment->nid;
  }
  else {
    $field = 'nc.thread';
    $value = "'%s'";
    $arg = $comment->thread;
  }

  if ($order == COMMENT_ORDER_NEWEST_FIRST) {
    $op = ' >= ';
  }
  else {
    $op = ' <= ';
  }

  $query = "SELECT COUNT(*) FROM {node_comments} nc
            INNER JOIN {node} n ON n.nid = nc.cid
            WHERE $field $op $value AND n.status <> 0 AND n.nid != %d AND nc.nid = %d";
  $count = db_result(db_query($query, $arg, $comment->nid, $node->nid));
  $pageno =  intval($count / $comments_per_page);

  return $pageno;
}

/**
 * Calculate page number for first new comment.
 *
 * This works for both comments and nodecomments.
 *
 * @param $num_comments
 *   Number of comments.
 * @param $new_replies
 *   Number of new replies.
 * @param $node
 *   The first new comment node.
 * @return
 *   "page=X" if the page number is greater than zero; empty string otherwise.
 */
function nodecomment_new_page_count($num_comments, $new_replies, $node) {
  // Default to normal comments so this function works either way.
  if (!nodecomment_get_comment_type($node->type)) {
    return comment_new_page_count($num_comments, $new_replies, $node);
  }

  $comments_per_page = _comment_get_display_setting('comments_per_page', $node);
  $mode = _comment_get_display_setting('mode', $node);
  $order = _comment_get_display_setting('sort', $node);
  $pagenum = NULL;
  $flat = in_array($mode, array(COMMENT_MODE_FLAT_COLLAPSED, COMMENT_MODE_FLAT_EXPANDED));
  if ($num_comments <= $comments_per_page || ($flat && $order == COMMENT_ORDER_NEWEST_FIRST)) {
    // Only one page of comments or flat forum and newest first.
    // First new comment will always be on first page.
    $pageno = 0;
  }
  else {
    if ($flat) {
      // Flat comments and oldest first.
      $count = $num_comments - $new_replies;
    }
    else {
      // Threaded comments. See the documentation for comment_render().
      if ($order == COMMENT_ORDER_NEWEST_FIRST) {
        // Newest first: find the last thread with new comment
        $thread = db_result(db_query(
          "(SELECT thread FROM {node_comments} nc
            INNER JOIN {node} n ON n.nid = nc.cid
            WHERE nc.nid = %d AND n.status <> 0
            ORDER BY n.created DESC LIMIT %d)
              ORDER BY thread DESC LIMIT 1",
          $node->nid, $new_replies
        ));
        $result_count = db_query(
          "SELECT COUNT(*) FROM {node_comments} nc
           INNER JOIN {node} n ON n.nid = nc.cid
           WHERE nc.nid = %d AND n.status <> 0 AND nc.thread > '%s'",
          $node->nid, $thread
        );
      }
      else {
        // Oldest first: find the first thread with new comment
        $result = db_query(
          '(SELECT thread FROM {node_comments} nc
            INNER JOIN {node} n ON n.nid = nc.cid
            WHERE nc.nid = %d  AND n.status <> 0
            ORDER BY n.created DESC LIMIT %d)
              ORDER BY SUBSTRING(thread, 1, (LENGTH(thread) - 1)) LIMIT 1',
          $node->nid, $new_replies
        );
        $thread = substr(db_result($result), 0, -1);
        $result_count = db_query(
          "SELECT COUNT(*) FROM {comments} nc
           INNER JOIN {node} n ON n.nid = nc.cid
           WHERE nc.nid = %d AND n.status <> 0 AND SUBSTRING(nc.thread, 1, (LENGTH(nc.thread) - 1)) < '%s'",
          $node->nid, $thread
        );
      }
      $count = db_result($result_count);
    }
    $pageno =  $count / $comments_per_page;
  }
  if ($pageno >= 1) {
    $pagenum = "page=". intval($pageno);
  }
  return $pagenum;
}

function nodecomment_get_thread($node) {
  // Here we are building the thread field. See the documentation for
  // comment_render().
  if (empty($node->comment_target_cid)) {
    // This is a comment with no parent comment (depth 0): we start
    // by retrieving the maximum thread level.
    $max = db_result(db_query(
      "SELECT MAX(thread) FROM {node_comments} WHERE nid = %d",
      $node->comment_target_nid
    ));

    // Strip the "/" from the end of the thread.
    $max = rtrim($max, '/');

    // Finally, build the thread field for this new comment.
    $thread = int2vancode(vancode2int($max) + 1) .'/';
  }
  else {
    // This is comment with a parent comment: we increase
    // the part of the thread value at the proper depth.

    // Get the parent comment:
    $parent = node_load($node->comment_target_cid);

    // Strip the "/" from the end of the parent thread.
    $parent->thread = (string) rtrim((string) $parent->thread, '/');

    // Get the max value in _this_ thread.
    $max = db_result(db_query(
      "SELECT MAX(thread) FROM {node_comments}
       WHERE thread LIKE '%s.%%' AND nid = %d",
      $parent->thread, $node->comment_target_nid
    ));

    if ($max == '') {
      // First child of this parent.
      $thread = $parent->thread .'.'. int2vancode(0) .'/';
    }
    else {
      // Strip the "/" at the end of the thread.
      $max = rtrim($max, '/');

      // We need to get the value at the correct depth.
      $parts = explode('.', $max);
      $parent_depth = count(explode('.', $parent->thread));
      $last = $parts[$parent_depth];

      // Finally, build the thread field for this new comment.
      $thread = $parent->thread .'.'. int2vancode(vancode2int($last) + 1) .'/';
    }
  }
  return $thread;
}

/**
 * Delete children comments from the same thread as comment.
 */
function _nodecomment_thread_delete_children($cid, $nid) {
  // Delete the comment's replies.
  // We have to be careful here to not delete comments from a separate thread 
  // started by this node, if it has own comments. 
  // To be sure about this, also check node id.
  $result = db_query("SELECT cid FROM {node_comments} WHERE pid = %d AND nid = %d", $cid, $nid);
  $delete = array();
  while ($row = db_fetch_object($result)) {
    $delete[] = $row->cid;
  }
  foreach ($delete as $cid) {
    _nodecomment_delete_comment($cid);
  }
}

/**
 * Delete node comments of a node.
 */
function _nodecomment_delete_comments($nid) {
  $result = db_query('SELECT cid FROM {node_comments} WHERE nid = %d', $nid);
  $delete = array();
  while ($row = db_fetch_object($result)) {
    $delete[] = $row->cid;
  }
  foreach ($delete as $cid) {
    _nodecomment_delete_comment($cid);
  }
}

/**
 * Delete a nodecomment.
 * 
 * Based on code from node_delete() function but has different logics.
 * 
 * Previously, the module used node_delete() which checks permissions.
 * If the user didn't have the permission to delete the comment, the comment 
 * was left in the database as orphan.
 *
 * Having own function is better:
 * 1) We don't check permissions, so we don't create orphans. Usually only 
 *    moderators have the permission to delete other user's comments, so this 
 *    is essential for any community site where users delete own comments. 
 *    This also follows core comment behavior. 
 * 2) We warn other modules about the delete event, if nodeapi delete
 *    event is too late for them to react. They can also veto the deletion, 
 *    provided they allow alternate action.
 * 3) We don't print messages on screen.
 */
function _nodecomment_delete_comment($cid) {
  // Clear the cache before the load, so if multiple nodes are deleted, the
  // memory will not fill up with nodes (possibly) already removed.
  // This also allows to find out easily if the node is already deleted.
  $node = node_load($cid, NULL, TRUE);

  // The node might not exist already for a number of reasons. This is 
  // generally ok.
  if (!$node) {
    return;
  }
  
  // Warn other modules about deletion and let them veto it.
  $delete = TRUE;
  $votes = nodecomment_invoke($node, 'delete_vote');
  foreach ($votes as $vote) {
    if ($vote === FALSE) {
      $delete = FALSE;
      break;
    }
  }

  if ($delete) {
    // Let the modules prepare for deleting.
    nodecomment_invoke($node, 'delete');
    
    db_query('DELETE FROM {node} WHERE nid = %d', $node->nid);
    db_query('DELETE FROM {node_revisions} WHERE nid = %d', $node->nid);
    db_query('DELETE FROM {node_access} WHERE nid = %d', $node->nid);

    // Call the node-specific callback (if any):
    node_invoke($node, 'delete');
    node_invoke_nodeapi($node, 'delete');

    // Clear the page and block caches.
    cache_clear_all();

    // Remove this node from the search index if needed.
    if (function_exists('search_wipe')) {
      search_wipe($node->nid, 'node');
    }
  
    // Log the event, but don't print messages on screen.
    watchdog('content', '@type: deleted %title.', array('@type' => $node->type, '%title' => $node->title));
  }
}

/**
 * Updates the comment statistics for a given node. This should be called any
 * time a comment is added, deleted, or updated.
 *
 * The following fields are contained in the node_comment_statistics table:
 * 
 * - last_comment_timestamp: the timestamp of the last comment for this node 
 *   or the node create stamp if no comments exist for the node.
 *   
 * - last_comment_name: the name of the anonymous poster for the last comment.
 * 
 * - last_comment_uid: the uid of the poster for the last comment for this node 
 *   or the node authors uid if no comments exists for the node.
 *   
 * - comment_count: the total number of approved/published comments on this node.
 */
function _nodecomment_update_node_statistics($nid) {
  $count = db_result(db_query(
    'SELECT COUNT(*) FROM {node_comments} nc
     INNER JOIN {node} n ON n.nid = nc.cid
     WHERE nc.nid = %d AND n.status = 1',
    $nid
  ));

  // Comments exist.
  if ($count > 0) {
    $last_reply = db_fetch_object(db_query_range(
      'SELECT nc.cid, nc.name, n.created, n.changed, n.uid
       FROM {node} n LEFT JOIN {node_comments} nc ON n.nid = nc.cid
       WHERE nc.nid = %d AND n.status = 1
       ORDER BY cid DESC',
      $nid, 0, 1
    ));
    $timestamp = max($last_reply->created, $last_reply->changed);
    $name = $last_reply->uid ? '' : $last_reply->name;
    db_query(
      "UPDATE {node_comment_statistics}
       SET comment_count = %d, last_comment_timestamp = %d, last_comment_name = '%s', last_comment_uid = %d
       WHERE nid = %d",
      $count, $timestamp, $name, $last_reply->uid, $nid
    );
  }
  // No comments.
  else {
    // The node might not exist if called from hook_nodeapi($op = 'delete').
    if ($node = db_fetch_object(db_query("SELECT uid, created FROM {node} WHERE nid = %d", $nid))) {
      db_query(
        "UPDATE {node_comment_statistics}
         SET comment_count = 0, last_comment_timestamp = %d, last_comment_name = '', last_comment_uid = %d
         WHERE nid = %d",
        $node->created, $node->uid, $nid
      );
    }
    else {
      db_query("DELETE FROM {node_comment_statistics} WHERE nid = %d", $nid);
    }
  }
}

function nodecomment_form($node) {
  $comment_type = nodecomment_get_comment_type($node->type);
  if ($comment_type) {
    global $user;
    $new_node = array(
      'uid' => $user->uid,
      'name' => $user->name,
      'type' => $comment_type,
      'comment_target_nid' => $node->nid,
      'comment_target_cid' => 0,
    );
    module_load_include('inc', 'node', 'node.pages');
    return drupal_get_form($comment_type .'_node_form', $new_node);
  }
}

/**
 * Menu callback; view a single node.
 */
function nodecomment_node_view($node, $cid = NULL) {
  drupal_set_title(check_plain($node->title));
  $output = node_view($node, FALSE, TRUE);

  if (!empty($node->comment)) {
    $output .= comment_render($node, $cid);
  }
  else if (!empty($node->node_comment)) {
    $output .= nodecomment_render($node, $cid);
  }

  // Update the history table, stating that this user viewed this node.
  node_tag_new($node->nid);

  return $output;
}

/**
 * Node comment's version of comment_render, to render all comments on a node.
 */
function nodecomment_render($node, $cid = 0) {
  global $user;

  $output = '';

  if (user_access('access comments')) {
    // Pre-process variables.
    $nid = $node->nid;
    if (empty($nid)) {
      $nid = 0;
    }

    // Render nothing if there are no comments to render.
    if (!empty($node->comment_count)) {
      if ($cid && is_numeric($cid)) {
        // Single comment view.
        if ($comment = node_load($cid)) {
          $output = theme('node', $comment, TRUE, TRUE);
        }
      }
      else {
        $view_name = variable_get('node_comment_view_'. $node->type, 'nodecomments');
        if ($view_name) {
          $output = views_embed_view($view_name, 'nodecomment_comments_1', $nid);
        }
      }
    }

    // If enabled, show new comment form.
    $comment_type = nodecomment_get_comment_type($node->type);
    if (user_access("create $comment_type content") && node_comment_mode($nid) == COMMENT_NODE_READ_WRITE && (variable_get('comment_form_location_'. $node->type, COMMENT_FORM_SEPARATE_PAGE) == COMMENT_FORM_BELOW)) {
      // There is likely a cleaner way to do this, but for now it will have to do. -- JE
      $friendly_name = node_get_types('name', $comment_type);
      $output .= nodecomment_form_box($node, t('Post new !type', array('!type' => $friendly_name)));
    }

    if ($output) {
      $output = theme('comment_wrapper', $output, $node);
    }
  }

  return $output;
}

function nodecomment_form_box($node, $title = NULL) {
  return theme('box', $title, nodecomment_form($node));
}

/**
 * Public API function to retrieve the comment type for a node type.
 *
 * @param $node_type
 *   The name of the node type for which the comment type will be retreived.
 * @return
 *   Returns a string containing the node type which will be used for comments.
 *   If node comments are not used for the passed in type, returns empty string.
 */
function nodecomment_get_comment_type($node_type) {
  return variable_get('node_comment_type_'. $node_type, '');
}

/**
 * Return array of content types which serve as nodecomments.
 */
function nodecomment_get_comment_types() {
  $comment_types = array();
  foreach (node_get_types('names') as $type => $blank) {
    $comment_type = nodecomment_get_comment_type($type);
    if ($comment_type) {
      $comment_types[$comment_type] = $comment_type;
    }
  }
  return $comment_types;
}

/**
 * Redirect to target node page containing a comment. Supports comment threads 
 * spanning multiple pages.
 *  
 * @param $node
 *  node comment object
 */
function _nodecomment_target_node_redirect($node) {
  $pagenum = nodecomment_page_count($node);
  $query = NULL;
  if ($pagenum) {
    $query = array('page' => $pagenum);
  }
  $fragment = 'comment-' . $node->nid;
  drupal_goto("node/" . $node->comment_target_nid, $query, $fragment);
}

/**
 * Check if the content type should be treated as full featured content type,
 * even if it works as comment too.
 */
function nodecomment_is_content($type) {
  // Types which are not comments are always treated as content. 
  if (!in_array($type, nodecomment_get_comment_types())) {
    return TRUE;
  }
  return variable_get('node_comment_is_content_' . $type, FALSE);
}

/**
 * Return list of Node Comments module variables.
 * 
 * @param $type
 *  content type
 */
function _nodecomment_vars() {
  $vars = _nodecomment_type_vars();
  $vars[] = 'node_comment_node_redirect';
  return $vars;
}

/**
 * Return list of Node Comments module variables, associated with a content type.
 * 
 * @param $type
 *  Content type. If not provided, return variables for all content types. 
 */
function _nodecomment_type_vars($type) {
  if ($type) {
    $types = array($type);
  }
  else {
    $types = array_keys(node_get_types('names'));
  }
  $vars = array();
  foreach ($types as $type) {
    $vars[] = 'node_comment_type_' . $type;
    $vars[] = 'node_comment_view_' . $type;
    $vars[] = 'node_comment_plural_' . $type;
    $vars[] = 'node_comment_is_content_' . $type;    
  }
  return $vars;
}

function nodecomment_invoke($node, $op) {
  $results = array();
  $hook = 'nodecomment_' . $op;
  foreach (module_implements($hook) as $module) {
    $function = $module . '_' . $hook;
    $results[] = $function($node);
  }
  return $results;
}

function nodecomment_include($inc) {
  module_load_include('inc', 'nodecomment', "includes/nodecomment.$inc");
}

