<?php
// $Id: smartcrop_actions.inc,v 1.1.2.3 2010/09/10 00:19:37 grendzy Exp $

/**
 * @file
 * Imagecache actions.
 */

/**
 * Build the settings form.
 */
function smartcrop_scale_and_crop_form($data = array()) {
  module_load_include('inc', 'imagecache', 'imagecache_actions');
  return imagecache_scale_form($data);
}

/**
 * Theme a cropped image.
 */
function theme_smartcrop_scale_and_crop($element) {
  module_load_include('inc', 'imagecache', 'imagecache_actions');
  return theme_imagecache_scale($element);
}

/**
 * Crop the image.
 */
function smartcrop_scale_and_crop_image(&$image, $data) {
  if (imageapi_toolkit_invoke('smartcrop_scale', $image, $data)) {
    return TRUE;
  }
}

/**
 * Build the settings form.
 */
function smartcrop_crop_form($data = array()) {
  module_load_include('inc', 'imagecache', 'imagecache_actions');
  return imagecache_resize_form($data);
}

/**
 * Theme a cropped image.
 */
function theme_smartcrop_crop($element) {
  module_load_include('inc', 'imagecache', 'imagecache_actions');
  return theme_imagecache_resize($element);
}

/**
 * Crop the image.
 */
function smartcrop_crop_image(&$image, $data) {
  if (imageapi_toolkit_invoke('smartcrop_crop', $image, $data)) {
    return TRUE;
  }
}