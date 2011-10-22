IMPORTANT ANNOUNCEMENT FOR ALL PREVIOUS/CURRENT aggregator2 USERS!!!
======================================================================
If your database contains these two tables, aggregator2_item & aggregator2_feed tables (remnants of the aggregator2 module). Installing this module or running the update.php script (for those who are updating to this release) will initiate an import process to import the feeds and items from the extinct aggregator2 module.

So before installing this module or updating to this release, BACKUP YOUR DATABASE! If you don't have these two tables simply disregard this section altogether and continue to install or update your aggregation module. Deleting the tables is a way to prevent the importing process from occuring.

Once an import is successful, you MUST perform step 6 of the section "Upgrading from DRUPAL 4.6's aggregator2 to the DRUPAL 4.7/5's aggregation module" below. That section contains details for updating from drupal 4.6's aggregator2 module to 4.7 OR 5's aggregation module.

Introduction
=============
This module is an XML aggregator. It currently supports RSS 2.0, ATOM 1.0 & RDF 1.0 (RDF contributed by vito_swat!) but it is designed to aggregate from any XML format by adding feed_handlers... More on that below...

Requirements
=============
This module REQUIRES PHP 5.0 or later and CURL support to function properly. Furthermore, if you plan to aggregate from custom feeds that contain and image with every article then the IMAGE module is requiered as well.

Installation
=============
Simply enable the module and you're set to go. Upon enabling this module, you'll have access to 2 new node types, Feed and Feed Item. A vocabulary will also be created called "Aggregation Feed Types", this vocabulary contains terms corresponding to the feed types that can be aggregated from. Adding terms here is the starting point for developing new handlers for your custom XML feeds. Adding a feed_handler is the next step.

Configuration
==============
You can configure the module from (administer -> settings -> aggregation) in drupal 4.7 or (administer -> site configuration -> aggregation) in drupal 5.

Use
====
For every feed type in the system (i.e. ATOM, RSS, RDF, MY_CUSTOM_FEED_TYPE, etc), a term needs to be created under the vocabulary "Aggregation Feed Types". This term, when assigned to a feed, will cause a file corresponding to the term name to be called (ex. RSS20.inc), the file should reside in the feed_handlers directory. See example.inc for detailed API and RSS20.inc, ATOM10.inc & RDF10.inc for examples on parsing feeds.

Notes
======
Please add an issue in the project's page as soon as you start working on a handler for a public XML feed type (ex. NEWSML, etc) that you would like to contribute to this project. This is necessary to avoid everyone re-working the same feed types over and over. The contributed feed_handler will be tested and incorporated into the next release later on. Creating custom feeds and contributing feed handlers for them is also welcome (provide new spec document, XML sample and feed_handler).

Upgrading from DRUPAL 4.6's aggregator2 to the DRUPAL 4.7/5's aggregation module
=================================================================================
   1 BACKUP! BACKUP! BACKUP! your database and ALL your site files. If you don't backup then it's your mistake!
   2 Disable the aggregator2 module.
   3 I would recommend you delete the xtemplate folder in the themes/engines.
   4 Upgrade to drupal 4.7, and if you wish, further upgrade your 4.7 to 5. (I doubt you can jump from 4.6 to 5 in one go)
   5 Enable the aggregation module for 4.7 (if you stopped at 4.7), or to 5 (if you stopped at 5), your aggregator2 data should have now been imported.
   6 Finally, your imported feeds will be 1)disabled 2)Original author field may be empty 3)After importing, the feeds will not be recognized if they are RSS, RDF or ATOM. SOLUTION: Edit every imported feed, enable it if you want to, provide a feed author, and choose what format it is i.e. RSS, RDF, ATOM

Contact information
====================
Please contribute your suggestions, bugs and issues at the project's page http://drupal.org/project/aggregation
For paid module customizations, drupal development, deployment, troubleshooting or general consultation contact me at

mistknight AT gmail DOT com