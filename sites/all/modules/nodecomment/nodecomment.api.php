<?php

/**
 * Allows modules to vote on deleting child comments. This hook is called for 
 * every child nodecomment when parent node is already deleted, and 
 * Node Comments needs to decide what to do with children comments (own comments
 * of the node and child nodecomments in the same thread).
 * A module returning FALSE will prevent node deletion.
 * 
 * @param object $node
 *  node comment being deleted 
 */
function hook_nodecomment_delete_vote(&$node) {
  
}

/**
 * Allows modules to prepare for deleting child comments. This hook is called 
 * for every child nodecomment when parent node is already deleted, and 
 * Node Comments is going to delete it's children comments (own comments of 
 * the node and child nodecomments in the same thread).
 * 
 * This can be handy if nodeapi delete operation is too late for a module to 
 * react.
 * 
 * @param object $node
 *  node comment being deleted 
 */
function hook_nodecomment_delete(&$node) {
  
}
