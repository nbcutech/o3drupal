<?php

/**
 * Implementation of hook_menu_default_menu_links().
 */
function promo_tools_admin_menu_default_menu_links() {
  $menu_links = array();

  // Exported menu link: primary-links:admin/content/filter
  $menu_links['primary-links:admin/content/filter'] = array(
    'menu_name' => 'primary-links',
    'link_path' => 'admin/content/filter',
    'router_path' => 'admin/content/filter',
    'link_title' => 'Content Management Filter',
    'options' => array(
      'attributes' => array(
        'title' => 'Find content',
      ),
    ),
    'module' => 'menu',
    'hidden' => '0',
    'external' => '0',
    'has_children' => '0',
    'expanded' => '0',
    'weight' => '-47',
  );
  // Exported menu link: primary-links:admin/sortpromo1s
  $menu_links['primary-links:admin/sortpromo1s'] = array(
    'menu_name' => 'primary-links',
    'link_path' => 'admin/sortpromo1s',
    'router_path' => 'admin/sortpromo1s',
    'link_title' => 'Sort Promo 1s',
    'options' => array(
      'query' => 'page=',
      'attributes' => array(
        'title' => '',
      ),
    ),
    'module' => 'menu',
    'hidden' => '0',
    'external' => '0',
    'has_children' => '0',
    'expanded' => '0',
    'weight' => '-45',
  );
  // Exported menu link: primary-links:promo/promo1spreview
  $menu_links['primary-links:promo/promo1spreview'] = array(
    'menu_name' => 'primary-links',
    'link_path' => 'promo/promo1spreview',
    'router_path' => 'promo/promo1spreview',
    'link_title' => 'Preview Promo 1s',
    'options' => array(
      'attributes' => array(
        'title' => '',
      ),
    ),
    'module' => 'menu',
    'hidden' => '0',
    'external' => '0',
    'has_children' => '0',
    'expanded' => '0',
    'weight' => '-44',
  );
  // Exported menu link: primary-links:promos_bulk_operations
  $menu_links['primary-links:promos_bulk_operations'] = array(
    'menu_name' => 'primary-links',
    'link_path' => 'promos_bulk_operations',
    'router_path' => 'promos_bulk_operations',
    'link_title' => 'Search Promos',
    'options' => array(
      'attributes' => array(
        'title' => 'Search promos and perform operations on them',
      ),
    ),
    'module' => 'menu',
    'hidden' => '0',
    'external' => '0',
    'has_children' => '0',
    'expanded' => '0',
    'weight' => '-46',
  );
  // Translatables
  // Included for use with string extractors like potx.
  t('Content Management Filter');
  t('Preview Promo 1s');
  t('Search Promos');
  t('Sort Promo 1s');


  return $menu_links;
}
