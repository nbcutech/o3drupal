<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $language ?>" xml:lang="<?php print $language ?>">
<head>
  <title><?php print strip_tags($print['title']) ?></title>

	<style type="text/css" media="all">@import "/sites/all/themes/bravotv/css/print.css";</style>
	
	<script type="text/javascript" src="/misc/jquery.js"></script>
	<script type="text/javascript">var rand_no = Math.random(); rand_no = rand_no * 10000000000; rand_no = Math.ceil(rand_no);</script>
</head>
<body>
	<style>
		#recipe-print {font-size: 9pt; width: 728px; margin: 0 auto;}
		#recipe-print img {margin: 0; padding: 0;}
		#recipe-print h3,
		#recipe-print h4,
		#recipe-print h5 {text-transform: uppercase;}
		#recipe-print h4 {border-bottom: 1px dashed #ccc;}
		#recipe-print .ad-728x90 {width: 728px; height: 90px; overflow: hidden;}
		#recipe-print .ad-300x250 {width: 300px; height: 250px; float: right; position: relative; margin: 15px 0;}
		#recipe-print .title {margin: 10px 0 0;}
		#recipe-print .subtitle {margin: 0; border: none;}
		#recipe-print .recipe-metadata {margin-right:300px; padding-right:10px;}
		#recipe-print .recipe-metadata p,
		#recipe-print .recipe-metadata h5 {margin: 0;}
		#recipe-print .recipe-body {clear: both; display: block;}
	</style>
	<?php 
		global $newadtagvars;
	?>
	<div id="recipe-print">
		<div class="ad-728x90">
			<script type="text/javascript">document.write('<scr'+'ipt language=\'JavaScript1.1\' src="http://iv.doubleclick.net/adj/<?php print $newadtagvars['site_name']; ?>/<?php print $newadtagvars['page_name']; ?>;site=<?php print $newadtagvars['site_keyval']; ?>;sect=<?php print $newadtagvars['section_keyval']; ?>;<?php if ($newadtagvars['sub']) { print 'sub='.$newadtagvars['sub'].';';} ?><?php if ($newadtagvars['sub2']) { print 'sub2='.$newadtagvars['sub2'].';';} ?>pageid=<?php print arg(1); ?>;<?php if ($newadtagvars['season']) { print 'season='.$newadtagvars['season'].';';} ?><?php if ($newadtagvars['aff']) { print 'aff='.$newadtagvars['aff'].';';} ?>daypart=primetime;genre=reality;<?php print $newadtagvars['category_excludes']; ?>;dcopt=ist;pos=1;tile=1;sz=728x90;ord='+rand_no+'?;"><\/scr'+'ipt>');</script>
			<noscript>
			<a href="http://iv.doubleclick.net/jump/<?php print $newadtagvars['site_name']; ?>/<?php print $newadtagvars['page_name']; ?>;site=bravo;sect=<?php print $newadtagvars['section_keyval']; ?>;<?php if ($newadtagvars['sub']) { print 'sub='.$newadtagvars['sub'].';';} ?><?php if ($newadtagvars['sub2']) { print 'sub2='.$newadtagvars['sub2'].';';} ?>pageid=<?php print arg(1); ?>;<?php if ($newadtagvars['season']) { print 'season='.$newadtagvars['season'].';';} ?><?php if ($newadtagvars['aff']) { print 'aff='.$newadtagvars['aff'].';';} ?>daypart=primetime;genre=reality;<?php print $newadtagvars['category_excludes']; ?>;dcopt=ist;pos=1;tile=1;sz=728x90;ord=<?php print $newadtagvars['ord']; ?>?" > <img src="http://iv.doubleclick.net/ad/<?php print $newadtagvars['site_name']; ?>/<?php print $newadtagvars['page_name']; ?>;site=<?php print $newadtagvars['site_keyval']; ?>;sect=<?php print $newadtagvars['section_keyval']; ?>;<?php if ($newadtagvars['sub']) { print 'sub='.$newadtagvars['sub'].';';} ?><?php if ($newadtagvars['sub2']) { print 'sub2='.$newadtagvars['sub2'].';';} ?>pageid=<?php print arg(1); ?>;<?php if ($newadtagvars['season']) { print 'season='.$newadtagvars['season'].';';} ?><?php if ($newadtagvars['aff']) { print 'aff='.$newadtagvars['aff'].';';} ?>daypart=primetime;genre=reality;<?php print $newadtagvars['category_excludes']; ?>;dcopt=ist;pos=1;tile=1;sz=728x90;ord=<?php print $newadtagvars['ord']; ?>?" border="0" alt="Click Here!" /></a>
			</noscript>
		</div>
		<div class="ad-300x250">
			<script type="text/javascript">
			document.write('<scr'+'ipt language=\'JavaScript1.1\' src="http://iv.doubleclick.net/adj/<?php print $newadtagvars['site_name']; ?>/<?php print $newadtagvars['page_name']; ?>;site=<?php print $newadtagvars['site_keyval']; ?>;sect=<?php print $newadtagvars['section_keyval']; ?>;<?php if ($newadtagvars['sub']) { print 'sub='.$newadtagvars['sub'].';';} ?><?php if ($newadtagvars['sub2']) { print 'sub2='.$newadtagvars['sub2'].';';} ?>pageid=<?php print arg(1); ?>;<?php if ($newadtagvars['season']) { print 'season='.$newadtagvars['season'].';';} ?><?php if ($newadtagvars['aff']) { print 'aff='.$newadtagvars['aff'].';';} ?>daypart=primetime;genre=reality;<?php print $newadtagvars['category_excludes']; ?>;pos=9;tile=9;sz=300x250;ord='+rand_no+'"><\/scr'+'ipt>');</script>
			<noscript>
			<a href="http://iv.doubleclick.net/jump/<?php print $newadtagvars['site_name']; ?>/<?php print $newadtagvars['page_name']; ?>;site=<?php print $newadtagvars['site_keyval']; ?>;sect=<?php print $newadtagvars['section_keyval']; ?>;<?php if ($newadtagvars['sub']) { print 'sub='.$newadtagvars['sub'].';';} ?><?php if ($newadtagvars['sub2']) { print 'sub2='.$newadtagvars['sub2'].';';} ?>pageid=<?php print arg(1); ?>;<?php if ($newadtagvars['season']) { print 'season='.$newadtagvars['season'].';';} ?><?php if ($newadtagvars['aff']) { print 'aff='.$newadtagvars['aff'].';';} ?>daypart=primetime;genre=reality;<?php print $newadtagvars['category_excludes']; ?>;pos=9;tile=9;sz=300x250;ord=<?php print $newadtagvars['ord']; ?>?" > <img src="http://iv.doubleclick.net/ad/nbcu.bravo/<?php print $newadtagvars['page_name']; ?>;site=bravo;sect=<?php print $newadtagvars['section_keyval']; ?>;<?php if ($newadtagvars['sub']) { print 'sub='.$newadtagvars['sub'].';';} ?><?php if ($newadtagvars['sub2']) { print 'sub2='.$newadtagvars['sub2'].';';} ?>pageid=<?php print arg(1); ?>;<?php if ($newadtagvars['season']) { print 'season='.$newadtagvars['season'].';';} ?><?php if ($newadtagvars['aff']) { print 'aff='.$newadtagvars['aff'].';';} ?>daypart=primetime;genre=reality;<?php print $newadtagvars['category_excludes']; ?>;pos=9;tile=9;sz=300x250;ord=<?php print $newadtagvars['ord']; ?>?" border="0" alt="Click Here!" /></a>
			</noscript>
		</div>
		<?php print $print['content']; ?>
	</div>
	<?php include_once('/sites/all/themes/bravotv/include/omniture.php'); ?>
</body>
	<script type="text/javascript" src="<?php print $themePath ?>js/s_code.js"></script>
</html>