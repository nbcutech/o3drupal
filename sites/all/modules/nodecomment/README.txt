ABOUT THE NODE COMMENTS
=======================

With this module comments can be full nodes. For every content type you can 
choose to use different content type as comment, or to continue using Drupal 
core comments.
Thanks to this module, comments can have fields, revisions, taxonomy, 
uploaded files, access control and anything else that comes from the goodness 
of nodeapi.

Current maintainer: Andrey Tretyakov http://drupal.org/user/169459

REQUIREMENTS
============

Views module.

USAGE AND TECHNICAL DETAILS
===========================

Node Comments module has settings page at admin/settings/nodecomment. There you 
can get overview of your content types and their Node Comment settings.
The module also uses Comment module settings, configured per content type.

Comment types can have own comments. For example, a site can have 
products, commented by reviews, commented by comments.

Comment types can be enabled to work as "content", meaning they will have own
pages, full node titles (independently from the comment settings) and generally
behave as content. The only requirement currently is they must be added in 
comment context, i.e. via "Add new <type>" link for their target node.

Node Comments displays comments using "nodecomments" view. You can configure 
the view to tweak some options, but "Nodecomments" (second) display is always 
used, and you can switch display style (e.g. set it to "table") only when node 
comments are configured as flat in content type configuration. In threaded mode 
Node Comments module forces usage of own display style.

When deleting a node with node comments, or a node comment, child node comments
will be automatically deleted even if the user performing the delete doesn't 
have delete permission for them. This may be surprise for you if you previously
used 2.x branch. This is needed not to leave orphan nodes in the database and is 
generally in line with the core Comment module logics.
This behavior can be changed programmatically (see Node Comments API).

To theme the node comments, use general node templates. There are some tricks, 
in terms of theming, though.
First, because we generally repeat comment module stuff, we use "comment-123" 
anchors (where 123 is node id). You must add these anchors to your nodecomment 
templates for consistent scrolling.
When previewing a nodecomment on the same page with the thread, the module
will try to scroll to preview zone using "#preview" anchor. This
anchor is missing from the original theme_node_preview() function so you need 
to add it using theme override.

KNOWN ISSUES
============

This module may consume more resources and run slower than the core Comment 
module. To increase performance there is special Views caching plugin which 
caches the view output (a list of node comments). It can cause problems with 
modules expecting to modify node output in the list dynamically.
There are 2 solutions to this problem:
- the caching can be disabled via Views UI
- using hook_views_post_render() one can insert dynamic values in the cached 
  output. This is similar to what Node Comments module itself does. 

To render node comments, the module overrides node view menu callback. This can
conflict with other modules doing the same. This is a limitation of Drupal: only
one function can process menu item. To deal with this problem, you can use 
Panels module and output combined data from both Node Comments and conflicting 
module. For more information, see http://drupal.org/node/477518.

Unlike 2.x branch, 3.x doesn't have comment conversion tool anymore. It had too
many bugs and could lose data. Current maintainer is not comfortable supporting 
it. It can be revived as a separate module anytime, if someone is willing to do 
that.
This means that changing comment type when comments of that type already exist 
can turn them into orphans, and break the database consistency. You are STRONGLY
recommended to configure comment types only once.

COMPATIBILITY WITH COMMENT MODULE
=================================

Previous branches of Node Comments had various issues with Comment module:
- 1.x branch was not compatible at all
- 2.x branch had many hacks, resulting in lots of bugs and compatibility issues 
  with other contributed modules

3.x branch has exactly one hack: when loading a node with node comments enabled,
it moves "commentability" setting to own variable, so other modules 
think the node can't be commented using Drupal core comments. When saving 
the node, Node Comments restores that setting. Thus we fully re-use Comment 
module default "commentability" setting and per-node "commentability" setting.
