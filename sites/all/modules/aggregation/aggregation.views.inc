<?php
function aggregation_views_data() {



$data['aggregation_item']['table']['group'] = t('Aggregation');

$data['aggregation_item']['table']['join'] = array(
  // Index this array by the table name to which this table refers.
  // 'left_field' is the primary key in the referenced table.
  // 'field' is the foreign key in this table.
  'node' => array(
    'left_field' => 'nid',
    'field' => 'nid',
  ),

);

      $data['aggregation_item']['original_author'] = array(
        'title' => t('Original author'),
        'help' => t('Original author of feed item.'),
            'field' => array(
              'handler' => 'views_handler_field',
              'click sortable' => TRUE,
            ),
               'sort' => array(
                'handler' => 'views_handler_sort',
              ),
              'filter' => array(
                'handler' => 'views_handler_filter_string',
              ),
              'argument' => array(
                'handler' => 'views_handler_argument_string',
              ),
      );


      $data['aggregation_item']['url'] = array(
        'title' => t('URL'),
        'help' => t('The URL to the original page for this feed item.'),
            'field' => array(
              'handler' => 'views_handler_field_url',
              'click sortable' => TRUE,
              ),
      );

      $data['aggregation_item']['fid'] = array(
        'title' => t('Parent Feed'),
        'help' => t('This allows feed items to be filtered by their parent feed.'),
              'filter' => array(
                'handler' => 'views_handler_filter_parent_feed',
              ),
      );
  return $data;
}

/**
 * Implementation of hook_views_handlers() to register all of the basic handlers
 * views uses.
 */
function aggregation_views_handlers() {
  return array(
    'handlers' => array(
      'views_handler_filter_parent_feed' => array(
        'parent' => 'views_handler_filter_in_operator',
      ),
    ),
   );
}
 
