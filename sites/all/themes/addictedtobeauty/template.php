<?php
/**
 * Return a themed breadcrumb trail.
 *
 * @param $breadcrumb
 *   An array containing the breadcrumb links.
 * @return a string containing the breadcrumb output.
 */
function phptemplate_breadcrumb($breadcrumb) {
  if (!empty($breadcrumb)) {
    return '<div class="breadcrumb">'. implode(' > ', $breadcrumb) .'</div>';
  }
}

function addictedtobeauty_preprocess_page(&$variables) {

    if ($variables['node']->type != "") {
    $variables['template_files'][] = "page-node-" . $variables['node']->type;

  }
}
/**
* Override or insert PHPTemplate variables into the templates.
*/
function _phptemplate_variables($hook, $vars) {
  switch ($hook) {
    case 'page':

      // add from here
      if (preg_match('/^__(.*)__$/', $vars['title'], $regs)) {
        $vars['title'] = '';
        $vars['head_title'] = $regs[1];
      }
      // add to here

      break;
  }
  return $vars;
}

