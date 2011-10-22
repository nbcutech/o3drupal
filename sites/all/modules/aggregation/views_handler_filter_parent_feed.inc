<?php
/**
 * Filter by parent feed
 */
class views_handler_filter_parent_feed extends views_handler_filter_in_operator {
  function get_value_options() {
    if (!isset($this->value_options)) {
      $this->value_title = t('Parent feeds');
      $options = array();
      $result = db_query("SELECT nid,title FROM {node} WHERE type='aggregation_feed' ORDER BY title");
      while ($obj = db_fetch_object($result)) { 
        $options[$obj->nid] = t($obj->title);
      }
      $this->value_options = $options;
    }
  }
}
