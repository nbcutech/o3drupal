<?php

/**
 * Implementation of hook_theme().
 */
function nodecomment_theme() {
  $items = array();

  $items['nodecomment_convert_page'] = array(
    'arguments' => array('convert_counts' => NULL, 'form' => NULL),
    'file' => 'includes/nodecomment.convert.inc',
  );
  $items['nodecomment_comment_count'] = array(
    'arguments' => array('count' => NULL, 'type' => NULL),
    'file' => 'includes/nodecomment.theme.inc',
  );
  $items['nodecomment_new_comment_count'] = array(
    'arguments' => array('count' => NULL, 'type' => NULL),
    'file' => 'includes/nodecomment.theme.inc',
  );
  $items['nodecomment_admin_settings_form'] = array(
    'arguments' => array('form' => NULL)
  );

  return $items;
}

/**
 * Add some additional suggestions for comment node templates.
 */
function nodecomment_preprocess_node(&$vars) {
  // Test to see if it's a comment.
  if (isset($vars['node']->comment_target_nid)) {
    $node = &$vars['node'];

    // First comment checking.
    static $first_new = TRUE;

    $vars['new'] = '';
    $vars['new_class'] = '';
    $vars['new_output'] = '';
    $vars['first_new'] = '';

    $node->new = node_mark($node->comment_target_nid, $node->created);
    if ($new) {
      $vars['new'] = t('new');
      $vars['new_class'] = 'comment-new';
      $vars['classes'] = (isset($vars['classes']) ? $vars['classes'] . ' ' : '') . 'comment-new';
      $vars['new_output'] ='<span class="new">' . $vars['new'] . '</span>';
      if ($first_new) {
        $vars['first_new'] = "<a id=\"new\"></a>\n";
        $first_new = FALSE;
      }
    }

    $query = NULL;
    if ($vars['page']) {
      $pagenum = nodecomment_page_count($node);
    }
    else {
      $pagenum = !empty($_GET['page']) ? $_GET['page'] : 0;
    }
    if ($pagenum) {
      $query = array('page' => $pagenum);
    }
    $vars['comment_link'] = l($node->title, 'node/'. $node->comment_target_nid, array('query' => $query, 'fragment' => 'comment-' . $node->nid));
    $vars['signature'] = !empty($node->signature) ? theme('user_signature', $node->signature) : '';
  }
}

/**
 * Return plural form of number of comments.
 *
 * Use $type to provide different strings per nodetype.
 */
function theme_nodecomment_comment_count($count, $type) {
  return format_plural($count, '1 comment', '@count comments');
}

/**
 * Return plural form of number of new comments.
 *
 * Use $type to provide different strings per nodetype.
 */
function theme_nodecomment_new_comment_count($count, $type) {
  return format_plural($count, '1 new comment', '@count new comments');
}

/**
 *  Theme relationships table
 */
function theme_nodecomment_admin_settings_form($form) {
  $rows = array();
  foreach (element_children($form['rows']) as $type) {
    $cells = $form['rows'][$type];   
    foreach (element_children($cells) as $col) {      
      $rows[$type][$col] = drupal_render($cells[$col]);
    }
  }
  unset($form['rows']);
  $header = $form['#header'];
  unset($form['#header']);
  $attributes = array(
    'id' => 'nodecomment-admin-settings-table',
  );
  $output  = drupal_render($form['top']);
  $output .= theme('table', $header, $rows, $attributes);
  $output .= drupal_render($form['bottom']);
  return $output . drupal_render($form);
}

