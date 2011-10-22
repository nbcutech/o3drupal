<?php

/**
 * @file
 * Admin UI of the nodecomment module.
 */

function nodecomment_admin_settings_form() {
  $form = array();
  $names = node_get_types('names');
  if (!$names) {
    // No content types at all.
    $form['notice']['#value'] = t("You don't have content types.");
    return $form;
  }
  
  $help_items[] = '<strong>' . t('Content type') . '</strong>' . ': ' . 
    t('If set to "Drupal comments" the normal Drupal comment system will be used. Otherwise, set this to a node type for the node comment system to be used.') .
    t("It's strongly recommended that you configure the setting once and then don't touch it.");
  $help_items[] = '<strong>' . t('Is content') . '</strong>' . ': ' . 
    t("If enabled, the content type will work as full featured content type, even if it's set as comment.") . ' ' . t('Only applicable for node comments.');
  $help_items[] = '<strong>' . t('Comment view') . '</strong>' . ': ' . 
    t('The view to use when displaying comments for this node type.') . ' ' . t('Only applicable for node comments.');
  $help_items[] = '<strong>' . t('Plural form of comment type') . '</strong>' . 
    ': ' . t('The plural form of the comment node-type name, like <em>comments</em> or <em>replies</em>. The singular form is taken from the node type selected above. Only applicable for node comments.');
  $help  = theme('item_list', $help_items);
  
  $warning = t("Changing comment type when comments of that type already exist 
can turn them into orphans, and break the database consistency. You have been 
warned!");
  
  $form['top']['#value'] =
    '<div id="nodecomment-admin-settings-help">
       <div class="status">' . $help . '</div>
       <div class="warning"><strong>' . $warning . '</strong></div>
     </div>';

  $view_options = array('' => t('Disabled'));
  $default_views = views_get_all_views();
  if (is_array($default_views)) {
    foreach ($default_views as $key => $view) {
      if (isset($view->display['nodecomment_comments_1'])) {
        $view_options[$key] = $view->name;
      }
    }
  }
  foreach ($names as $type => $name) {
    $comment_type = nodecomment_get_comment_type($type);
    $form['#header'] = array(t('Content type'), t('Is content'), t('Comment type'), t('Comment view'), t('Plural form of comment type'));
    $type_edit_path = "admin/content/node-type/" . str_replace('_', '-', $type);
    $type_edit_link = l($name, $type_edit_path, array('fragment' => 'comment'));
    $form['rows'][$type]['name']['#value'] = $type_edit_link;
    $form['rows'][$type]['is_content']['node_comment_is_content_' . $type] = array(
      '#type' => 'checkbox',
      '#default_value' => nodecomment_is_content($type)
    );
    $form['rows'][$type]['select']['node_comment_type_' . $type] = array(
      '#type' => 'select',
      '#options' => array('' => t('Drupal comments')) + $names,
      '#default_value' => $comment_type
    );
    $form['rows'][$type]['view']['node_comment_view_' . $type] = array(
      '#type' => 'select',
      '#options' => $view_options,
      '#default_value' => $comment_type ? variable_get('node_comment_view_'. $type, 'nodecomments') : '',
    );
    // TODO: find a better way to deal with these strings.
    $form['rows'][$type]['plural']['node_comment_plural_' . $type] = array(
      '#type' => 'textfield',
      '#size' => 20,
      '#default_value' => variable_get('node_comment_plural_'. $type, 'comments'),
    );
  }
  $form['bottom']['#value'] = '';
  $form = system_settings_form($form);
  $form['#theme'] = 'nodecomment_admin_settings_form';
  return $form;
}

/**
 * Validate the nodecomment settings form.
 */
function nodecomment_admin_settings_form_validate($form, &$form_state) {
  foreach(node_get_types('names') as $type => $blank) {
    if ($form_state['values']['node_comment_type_' . $type]) {
      // Node comments are enabled for the type.
      $id = 'node_comment_view_' . $type;
      if (!$form_state['values'][$id]) {
        form_set_error($id, t("You must choose a comment view."));
      }
    }
  }
}

/**
 * Submit callback for the nodecomment settings form.
 */
function nodecomment_admin_settings_form_submit($form, &$form_state) {
  // Rebuild menu so that our menu access callbacks work properly.
  // TODO: track configuration changes and rebuild only when needed.
  menu_router_build(1);
}
