<?php

/**
 * Node Comment terminology:
 * 
 *  "target node"
 *   node which is being commented on
 *   
 *  "target comment"
 *   nodecomment which is being replied to
 */

/**
 * Implementation of hook_form_alter().
 */
function nodecomment_form_alter(&$form, &$form_state, $form_id) { 
  global $user;

  // Make sure we alter node form.
  if (!isset($form['type']) ||
      !isset($form['type']['#value']) ||
      $form['type']['#value'] .'_node_form' != $form_id) {
    return;
  }
  
  $node = &$form['#node'];
  $mode = _comment_get_display_setting('mode', $node);
  $flat = in_array($mode, array(COMMENT_MODE_FLAT_COLLAPSED, COMMENT_MODE_FLAT_EXPANDED));
  
  // Convert dashes to underscores as we get type from menu path.
  $type = str_replace('-', '_', arg(2));

  // Prepare nodecomment data for a newly created node.
  if (arg(0) == 'node'
      && arg(1) == 'add'
      && is_numeric(arg(3))
      && !empty($type)
      && in_array($type, nodecomment_get_comment_types())
     ) {
       
    $node_context = arg(3);
    $comment_context = arg(4);
    
    $node->comment_target_nid = $node_context;
    // If the parrent comment context is not set, use 0 (thread root).
    $node->comment_target_cid = is_numeric($comment_context) ? $comment_context : 0;
    
    $target_node    = node_load($node_context);
    $target_comment = node_load(is_numeric($comment_context) ? $comment_context : $node_context);

    // Show the node which this comment is replying to. 
    if (!isset($form['#prefix'])) {
      $form['#prefix'] = '';
    }
    // In flat mode we use target comment context to store the data, but
    // still show the target node.    
    $form['#prefix'] .= node_view($flat ? $target_node : $target_comment);
  }
      
  if (isset($node->comment_target_nid)) {
    // We're altering a nodecomment form.
    _nodecomment_alter_nodecomment_form($form, $node, $target_node, $target_comment);
  }

  if (nodecomment_get_comment_type($node->type)) {
    // This is node edit form for a content type with nodecomments.
        
    // Make sure that node_comment property is set up, if the node wasn't 
    // loaded using node_load(), e.g. if it was passed from API call.
    if (!isset($node->node_comment) && isset($node->comment)) {
      $node->node_comment = $node->comment;
    }
        
    // Load real value because it's the form to change it.
    $form['comment_settings']['comment']['#default_value'] = $node->node_comment;
    
    // Add workaround for fake forms: some modules (for example, Node Gallery) 
    // use node form id in their special forms. They don't always copy comment
    // setting form element from the real node form, which can lead to breakage
    // of our logics.
    // To protect against these fake forms, we insert special marker
    // into form which will continue its life in node object. Fake forms won't 
    // have the marker, which will allow us to detect them in 
    // hook_nodeapi('presave') and to react properly.
    // This is not bullet-proof though, cause if the faked form decided to 
    // change the setting, we would overwrite it's values in 'presave'.
    // This will stay for now, until better solution replaces it.
    $form['comment_settings']['nodecomment_real_node_form'] = array(
      '#type' => 'value',
      '#value' => 1
    );
  }
}

function _nodecomment_alter_nodecomment_form(&$form, $node, $target_node = NULL, $target_comment = NULL) {
  // Store Node Comments additional properties in the form. Otherwise
  // they won't be passed by nodeapi.
  $form['comment_target_nid'] = array(
    '#type' => 'value',
    '#value' => $node->comment_target_nid,
  );
  $form['comment_target_cid'] = array(
    '#type' => 'value',
    '#value' => $node->comment_target_cid,
  );
  $form['thread'] = array(
    '#type' => 'value',
    '#value' => $node->thread,
  );

  // Load our nodes. It's possible they may have been loaded during the
  // node/add discovery above.
  if (!isset($target_node)) {
    $target_node = node_load($node->comment_target_nid);
  }
  if (!isset($target_comment)) {
    $target_comment = node_load(!empty($node->comment_target_cid) ? $node->comment_target_cid : $node->comment_target_nid);
  }

  // Process breadcrumbs for node pages.
  if (arg(1) == 'add' || arg(1) == 'edit') {
    // Reset the breadcrumb trail to get rid of the 'create content' stuff.
    drupal_set_breadcrumb(array(l(t('Home'), NULL)));

    // Then add the target node.
    nodecomment_set_breadcrumb($target_node);

    if (!empty($node->nid)) {
      // And then add the current node:
      $breadcrumb = drupal_get_breadcrumb();
      $breadcrumb[] = l($node->title, "node/$node->nid");
      drupal_set_breadcrumb($breadcrumb);
    }
  }

  // Add fields for anonymous commenting.
  // Use settings of target node, not target comment.
  _nodecomment_add_anon_contact_fields($form, $node, $target_node);

  // Does this nodecomment work as content ?
  if (nodecomment_is_content($node->type)) {
    // This type is full content type. It has title, own page, etc.
    // Do something useful here.
  }
  else {
    // This is a pure comment.
    
    // Remove settings that have no meaning on comments.    
    $form['menu']['#access'] = FALSE;
    $form['path']['#access'] = FALSE;
    $form['comment_settings']['#access'] = FALSE;
    
    // Remove the teaser splitter if body field is present.
    if (isset($form['body_field'])) {
      $teaser_js_build = array_search('node_teaser_js', $form['body_field']['#after_build']);
      unset($form['body_field']['#after_build'][$teaser_js_build]);
      $form['body_field']['teaser_js']['#access'] = FALSE;
      $form['body_field']['teaser_include']['#access'] = FALSE;
    }
  
    // Set up an automatic title in case it's new nodecomment.
    // Use target comment title, not target node.
    if (empty($node->nid)) {
      $re = t('Re: ');
      $re_len = drupal_strlen($re);
      if (drupal_substr($target_comment->title, 0, $re_len) == $re) {
        $form['title']['#default_value'] = $target_comment->title;
      }
      else {
        $form['title']['#default_value'] = $re . $target_comment->title;
      }
    }
    
    // Make the title not required:
    $form['title']['#required'] = FALSE;
    if (variable_get('comment_subject_field_'. $target_node->type, 1) != 1) {
      $form['title']['#access'] = FALSE;
    }
  }

  // File attachments dropdown should remain open:
  $form['attachments']['#collapsed'] = FALSE;

  // If nodecomments are language enabled (but not translation enabled)
  // set the language to that of the parent node.
  if (variable_get('language_content_type_' . $node->type, 1)) {
    $form['language'] = array(
      '#type' => 'value',
      '#value' => $target_node->language
    );
  }
  
  // When previewing nodecomment, scroll to preview.
  // Note that we add anchor for blank node so that scrolling works on first
  // preview too. 
  if ($node->build_mode === NODE_BUILD_PREVIEW || !isset($node->nid)) {
    $form['#action'] .= '#preview';
  }

  $form['buttons']['submit']['#submit'][] = 'nodecomment_node_form_submit';
}

function _nodecomment_add_anon_contact_fields(&$form, $node, $target_node) {
  global $user;
  $anon = variable_get('comment_anonymous_'. $target_node->type, COMMENT_ANONYMOUS_MAYNOT_CONTACT);
  if ($user->uid == 0 &&
      ($anon == COMMENT_ANONYMOUS_MAY_CONTACT || $anon == COMMENT_ANONYMOUS_MUST_CONTACT)) {

    $form['comment_info'] = array('#weight' => -10);
    $form['comment_info']['name'] = array(
      '#type' => 'textfield',
      '#title' => t('Your name'),
      '#maxlength' => 60,
      '#size' => 30,
      '#default_value' => $node->name ? $node->name : variable_get('anonymous', t('Anonymous')),
      '#required' => ($anon == COMMENT_ANONYMOUS_MUST_CONTACT)
    );

    $form['comment_info']['mail'] = array(
      '#type' => 'textfield',
      '#title' => t('E-mail'),
      '#maxlength' => 64,
      '#size' => 30,
      '#default_value' => $node->mail,
      '#description' => t('The content of this field is kept private and will not be shown publicly.'),
      '#required' => ($anon == COMMENT_ANONYMOUS_MUST_CONTACT)
    );

    $form['comment_info']['homepage'] = array(
      '#type' => 'textfield',
      '#title' => t('Homepage'),
      '#maxlength' => 255,
      '#size' => 30,
      '#default_value' => $node->homepage,
    );

    // Store target type in the form for the validate callback.
    $form['comment_info']['target_node_type'] = array(
      '#type' => 'value',
      '#value' => $target_node->type,
    );
    // Attach anonymous info validation.
    $form['#validate'][] = 'nodecomment_node_form_validate';
  }
  else {
    $form['comment_info']['mail'] = array(
      '#type' => 'value',
      '#value' => '',
    );
    $form['comment_info']['homepage'] = array(
      '#type' => 'value',
      '#value' => '',
    );
  }
}

/**
 * Validate anonymous info (mail, homepage etc).
 */
function nodecomment_node_form_validate(&$form, &$form_state) {
  $target_node_type = $form['comment_info']['target_node_type']['#value'];
  $requirement = variable_get('comment_anonymous_'. $target_node_type, COMMENT_ANONYMOUS_MAYNOT_CONTACT);

  if ($form_state['values']['name']) {
    $taken = db_result(db_query("SELECT COUNT(uid) FROM {users} WHERE LOWER(name) = '%s'", $form_state['values']['name']));
    if ($taken != 0) {
      form_set_error('name', t('The name you used belongs to a registered user.'));
    }
  }
  else if ($requirement == COMMENT_ANONYMOUS_MUST_CONTACT) {
    form_set_error('name', t('You have to leave your name.'));
  }

  if ($form_state['values']['mail']) {
    if (!valid_email_address($form_state['values']['mail'])) {
      form_set_error('mail', t('The e-mail address you specified is not valid.'));
    }
  }
  else if ($requirement == COMMENT_ANONYMOUS_MUST_CONTACT) {
    form_set_error('mail', t('You have to leave an e-mail address.'));
  }

  if ($form_state['values']['homepage']) {
    if (!valid_url($form_state['values']['homepage'], TRUE)) {
      form_set_error('homepage', t('The URL of your homepage is not valid. Remember that it must be fully qualified, i.e. of the form <code>http://example.com/directory</code>.'));
    }
  }
}

/**
 * Redirect the node form to the right place.
 */
function nodecomment_node_form_submit(&$form, &$form_state) {
  $node = $form['#node'];  
  $nid = $form_state['nid'];
  if (empty($node->nid)) {
    $node->nid = $nid;
  }

  if (nodecomment_is_content($node->type)) {
    // This is a full content type. Do something useful here.
  }
  else {
    // This is a pure comment. Redirect to the target node page which contains
    // the comment.
    _nodecomment_target_node_redirect($node);
  }
}

/**
 * Implementation of hook_form_FORMID_alter().
 */
function nodecomment_form_node_delete_confirm_alter(&$form, &$form_state) {
  // Node delete form.
  if (!isset($_GET['destination'])) {
    $node = node_load($form['nid']['#value']);
    if (isset($node->comment_target_nid)) {
      // Change the redirect and cancel link to the parent node page.
      $form['destination'] = array(
        '#type' => 'hidden',
        '#value' => 'node/'. $node->comment_target_nid,
      );
      $form['actions']['cancel']['#value'] = l(t('Cancel'), 'node/'. $node->comment_target_nid);
    }
  } 
}
