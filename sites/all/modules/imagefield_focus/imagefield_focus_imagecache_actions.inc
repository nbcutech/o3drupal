<?php
// $Id: imagefield_focus_imagecache_actions.inc,v 1.7.2.6 2011/02/12 23:10:12 anrikun Exp $

/**
 * @file
 * Written by Henri MEDOT <henri.medot[AT]absyx[DOT]fr>
 * http://www.absyx.fr
 */

/**
 * Focus Scale and Crop
 */
function imagefield_focus_scale_and_crop_form($data = array()) {
  $form['width'] = array(
    '#type' => 'textfield',
    '#title' => t('Width'),
    '#default_value' => isset($data['width']) ? $data['width'] : '',
    '#description' => t('Enter a value in pixels (e.g. 500).'),
  );
  $form['height'] = array(
    '#type' => 'textfield',
    '#title' => t('Height'),
    '#default_value' => isset($data['height']) ? $data['height'] : '',
    '#description' => t('Enter a value in pixels (e.g. 500).'),
  );
  $form['strength'] = array(
    '#type' => 'radios',
    '#title' => t('Focus strength'),
    '#options' => array(
      'high' => t('High'),
      'medium' => t('Medium'),
      'low' => t('Low'),
    ),
    '#default_value' => isset($data['strength']) ? $data['strength'] : 'high',
  );
  if (module_exists('smartcrop')) {
    $form['fallback'] = array(
      '#type' => 'radios',
      '#title' => t('Fallback action'),
      '#options' => array(
        'imagecache' => t('!module: !action', array('!module' => 'ImageCache', '!action' => t('Scale And Crop'))),
        'smartcrop' => t('!module: !action', array('!module' => 'SmartCrop', '!action' => t('Scale and Smart Crop'))),
      ),
      '#default_value' => isset($data['fallback']) ? $data['fallback'] : 'imagecache',
      '#description' => t('The action to perform when no focus data is available.'),
    );
  }
  return $form;
}



function theme_imagefield_focus_scale_and_crop($element) {
  return theme('imagecache_scale_and_crop', $element) .' '. t('!strength strength', array('!strength' => t($element['#value']['strength'])));
}



function imagefield_focus_scale_and_crop_image(&$image, $data) {
  module_load_include('inc', 'imagecache', 'imagecache_actions');
  if ($imagefield = imagefield_focus_find($image->source)) {
    $xoffset = 0;
    $yoffset = 0;

    if (($rect = @$imagefield->data['crop_rect']) && ($rect = imagefield_focus_parse($rect))) {
      if (!imagecache_crop_image($image, $rect)) {
        return FALSE;
      }
      $xoffset = $rect['xoffset'];
      $yoffset = $rect['yoffset'];
    }

    if (($rect = @$imagefield->data['focus_rect']) && ($rect = imagefield_focus_parse($rect))) {
      $rect['xoffset'] -= $xoffset;
      $rect['yoffset'] -= $yoffset;

      $scale = min(1, $data['width'] / $rect['width'], $data['height'] / $rect['height']);
      $scale_low = min($scale, max($data['width'] / $image->info['width'], $data['height'] / $image->info['height']));
      if ($data['strength'] == 'medium') {
        $scale = ($scale + $scale_low) / 2;
      }
      elseif ($data['strength'] == 'low') {
        $scale = $scale_low;
      }

      $width0 = $image->info['width'] * $scale;
      $height0 = $image->info['height'] * $scale;
      if (($scale < 1) && !imagecache_resize_image($image, array('width' => $width0, 'height' => $height0))) {
        return FALSE;
      }

      foreach ($rect as $key => $value) {
        $rect[$key] = $value * $scale;
      }
      $width = min($width0, $data['width']);
      $height = min($height0, $data['height']);
      $xoffset = min($width0 - $width, max(0, $rect['xoffset'] + ($rect['width'] - $width) / 2));
      $yoffset = min($height0 - $height, max(0, $rect['yoffset'] + ($rect['height'] - $height) / 2));
      return imagecache_crop_image($image, array('xoffset' => $xoffset, 'yoffset' => $yoffset, 'width' => $width, 'height' => $height));
    }
  }

  if ((@$data['fallback'] == 'smartcrop') && module_exists('smartcrop')) {
    module_load_include('inc', 'smartcrop', 'smartcrop_actions');
    return smartcrop_scale_and_crop_image($image, $data);
  }

  return imagecache_scale_and_crop_image($image, $data);
}



/**
 * Focus Crop
 */
function imagefield_focus_crop_form($data = array()) {
  $form['target'] = array(
    '#type' => 'radios',
    '#title' => t('Crop based on'),
    '#options' => array(
      'crop_rect only' => t('Crop rectangle only'),
      'focus_rect only' => t('Focus rectangle only'),
      'crop_rect first' => t('Crop rectangle if available, Focus rectangle otherwise'),
      'focus_rect first' => t('Focus rectangle if available, Crop rectangle otherwise'),
    ),
    '#default_value' => isset($data['target']) ? $data['target'] : 'crop_rect only',
  );
  return $form;
}



function theme_imagefield_focus_crop($element) {
  $form = imagefield_focus_crop_form();
  return t('Crop based on !target', array('!target' => $form['target']['#options'][$element['#value']['target']]));
}



function imagefield_focus_crop_image(&$image, $data) {
  module_load_include('inc', 'imagecache', 'imagecache_actions');
  if ($imagefield = imagefield_focus_find($image->source)) {
    ($crop_rect = @$imagefield->data['crop_rect']) && ($crop_rect = imagefield_focus_parse($crop_rect));
    ($focus_rect = @$imagefield->data['focus_rect']) && ($focus_rect = imagefield_focus_parse($focus_rect));

    $target = $data['target'];
    if ($crop_rect && ($target == 'crop_rect only' || $target == 'crop_rect first' || $target == 'focus_rect first' && !$focus_rect)) {
      return imagecache_crop_image($image, $crop_rect);
    }
    if ($focus_rect && ($target == 'focus_rect only' || $target == 'focus_rect first' || $target == 'crop_rect first' && !$crop_rect)) {
      return imagecache_crop_image($image, $focus_rect);
    }
  }

  return TRUE;
}
