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

function badgirlsclub_preprocess_page(&$variables) {

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

// this is NOT an API call. It's a utility to get info to add to the $variables array
function badgirlsclub_preprocess_showsite_cast_fields(&$variables) {
  static $accounts;  
  $uid = $variables['fields']['uid']->content;
  if (is_null($accounts[$uid])) {
  	$cast_query = db_query('select * from content_type_bios_cast where field_uid_uid = %d', $uid);
  	$accounts[$uid] = db_fetch_object($cast_query);
  }

    $variables['cast_member_name'] = $accounts[$uid]->field_cast_name_value;  
    $variables['cast_member_picture'] = "sites/all/themes/oxygen/images/blog_photo/uid".$uid."-".strtolower($accounts[$uid]->field_cast_name_value).".jpg"; 
    $variables['cast_member_short_bio'] = $accounts[$uid]->field_short_bio_value;

}

//this is NOT an API call. It's a utility to get info to add to the $variables array
function badgirlsclub_showsite_blog_episode_image(&$variables) {
  $uid = $variables['fields']['uid']->content;
  preg_match('#<img\s+.*src=[\"\']([^>\"\']+)[\"\'].*[^>]*>#i', $variables['fields']['body']->raw, $matched);  
  if ($matched[1]) {
    // $matched[0] is the whole image tag. $match[1] is the captured src attribute "([^>\"\']+)"  	
  		$img_path = $matched[1];  	
  }
  if (is_null($img_path)) {
  	$img_path = "/sites/all/themes/oxygen/images/blog_photo/uid".$uid."-".strtolower($variables['cast_member_name']).".jpg"; 
  }
  $variables['episodic_image'] = $img_path;
}

/**
 * this IS an API call, to make new variables available to the theme the name is constructed:
 * function [theme name]_preprocess_[template name with '-' replaced by '_']
 */
 
function badgirlsclub_preprocess_views_view__showsite_blogs__page_1(&$variables) {
  // the entire view view is in $variables['view'], the array of query result is in $variables['view']->result
  $blog_rec = $variables['view']->result[0];
  $cast_query = db_query('select * from content_type_bios_cast where field_uid_uid = %d', $blog_rec->users_uid);
  $account = db_fetch_object($cast_query);

    $variables['cast_member_name'] = $account->field_cast_name_value;
    $variables['cast_member_picture'] = "sites/all/themes/oxygen/images/blog_photo/uid".$uid."-".strtolower($accounts[$uid]->field_cast_name_value).".jpg"; 
    $variables['cast_member_short_bio'] = $account->field_short_bio_value;

}

/**
 * this IS an API call, to make new variables available to the theme the name is constructed:
 * function [theme name]_preprocess_[template name with '-' replaced by '_']
 */

function badgirlsclub_preprocess_views_view_fields__showsite_blogs__page(&$variables) {
  badgirlsclub_preprocess_showsite_cast_fields($variables);
  badgirlsclub_showsite_blog_episode_image($variables);
}

/**
 * this IS an API call, to make new variables available to the theme the name is constructed:
 * function [theme name]_preprocess_[template name with '-' replaced by '_']
 */

function badgirlsclub_preprocess_views_view_fields__showsite_blogs__page_1(&$variables) {
  badgirlsclub_preprocess_showsite_cast_fields($variables);
  badgirlsclub_showsite_blog_episode_image($variables);
}

/**
 * this IS an API call, to make new variables available to the theme the name is constructed:
 * function [theme name]_preprocess_[template name with '-' replaced by '_']
 */

function badgirlsclub_preprocess_views_view_fields__showsite_blogs__block_1(&$variables) {
  badgirlsclub_preprocess_showsite_cast_fields($variables);
  // Earl D: this builds the link URL as relative to the show site for which the post was written
  //get the nid
  $nid = $variables['fields']['nid']->content;
  // build an absolute url, which will be relative to the show site on which the block is displayed
  $link_url = url('node/'.$nid, array('absolute' => true));
  // get the base url of the show site for which the post was written
  $show_base_url = oxygen_helpers_show_id_to_url($variables['fields']['name_1']->content);
  // replace the base url in the link
  $show_url = preg_replace('|^http://.+\.oxygen.com|', $show_base_url, $link_url);
  $variables['external_url'] = $show_url;
}

/**
 * this IS an API call, to make new variables available to the theme the name is constructed:
 * function [theme name]_preprocess_[template name with '-' replaced by '_']
 */

function badgirlsclub_preprocess_views_view_fields__showsite_blogs__attachment_1(&$variables) {
  badgirlsclub_preprocess_showsite_cast_fields($variables);
}

function badgirlsclub_preprocess_node($variables) {
  $cast_query = db_query('select * from content_type_bios_cast where field_uid_uid = %d', $variables['uid']);
  $account = db_fetch_object($cast_query);

    $variables['cast_member_name'] = $account->field_cast_name_value;
    $variables['cast_member_picture'] = "sites/all/themes/oxygen/images/blog_photo/uid".$variables['uid']."-".strtolower($account->field_cast_name_value).".jpg"; 
    $variables['cast_member_short_bio'] = $account->field_short_bio_value;
   
   $node = $variables['node'];
  if($node->nid == 101718) {
        drupal_add_css(drupal_get_path('theme','badgirlsclub')."/badgirlsclub_contest.css", 'theme');
        drupal_add_js(drupal_get_path('theme','thegleeproject')."/jquery.cookie.js", 'module');
        //drupal_add_js(drupal_get_path('theme','badgirlsclub')."/badgirlsclub_contest.js", 'theme');
        $variables['template_file'] = 'node-'. $node->nid;
        $variables['vote_options'] = json_encode($node->choice);
        drupal_set_header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');
  }   
}
