<?php

/**
 * Implementation of hook_ctools_plugin_api().
 */
function promo_tools_extras_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => 1);
  }
}

/**
 * Implementation of hook_imagecache_default_presets().
 */
function promo_tools_extras_imagecache_default_presets() {
  $items = array(
    'highlights_promo' => array(
      'presetname' => 'highlights_promo',
      'actions' => array(
        '0' => array(
          'weight' => '0',
          'module' => 'imagefield_focus',
          'action' => 'imagefield_focus_scale_and_crop',
          'data' => array(
            'width' => '282',
            'height' => '114',
            'strength' => 'high',
            'fallback' => 'smartcrop',
          ),
        ),
      ),
    ),
    'hotpics_promo' => array(
      'presetname' => 'hotpics_promo',
      'actions' => array(
        '0' => array(
          'weight' => '0',
          'module' => 'imagecache',
          'action' => 'imagecache_scale_and_crop',
          'data' => array(
            'width' => '277',
            'height' => '210',
          ),
        ),
      ),
    ),
    'photohub_promo' => array(
      'presetname' => 'photohub_promo',
      'actions' => array(
        '0' => array(
          'weight' => '0',
          'module' => 'imagecache',
          'action' => 'imagecache_scale_and_crop',
          'data' => array(
            'width' => '196px',
            'height' => '215px',
          ),
        ),
      ),
    ),
    'views_bulk_operations_thumbnail' => array(
      'presetname' => 'views_bulk_operations_thumbnail',
      'actions' => array(
        '0' => array(
          'weight' => '0',
          'module' => 'imagecache',
          'action' => 'imagecache_scale',
          'data' => array(
            'width' => '100',
            'height' => '',
            'upscale' => 1,
          ),
        ),
      ),
    ),
  );
  return $items;
}
