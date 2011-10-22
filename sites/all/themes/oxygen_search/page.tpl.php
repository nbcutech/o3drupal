<?php require_once("/var/www/html/sites/all/themes/oxygen/global_head.inc"); ?>

    <?php if ($header): ?>
      <?php print $header ?>
    <?php endif; ?>
    <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block" style="background-color;white;">'. $tabs .'</div>'; endif; ?>
    <?php if (isset($tabs2)): print $tabs2; endif; ?>   
	<style type="text/css">	
		div#container{margin-top:10px;}
		.search-results{padding:0px;}
		.search-results .title{font-weight:bold;padding-left:15px;}
		.search-snippet{margin-top:3px; margin-bottom:3px;}
		dd{margin-left:20px;margin-bottom:15px;}
		#google-appliance-search-form{padding-top:10px;padding-left:20px;}
		#edit-keys-wrapper{display:inline;}
		#searchHeader{font-size:15px; font-weight: bold; margin:10px 0 10px 20px;}
		.search-result-url{color:gray;}
		#wideLeft{padding-bottom:10px; }
		/*Overriding page styles */    
		  .item-list .pager {margin:0px;padding:12px 0 10px 0;}
		  .item-list .pager li{font-weight:bold;}

	</style>

<div id="container">
    <div id="wrapper">
		
		<div id="wideLeft" >
			<img class="png" src="<? print $pot ?>/images/search_header.png" width="672" height="88" border="0">	
			<div id="wideLeftContent">
						
				<span style="display:none;"><h2>Oxygen Search results</h2><h1>Oxygen</h1></span>
				<div class="copy">
			
					
					<?php print $content; ?>
					<div style="clear:both;"></div>					
				</div>

				<div style="clear:both;"></div>

			</div>
			<img class="png" src="<? print $pot ?>/images/content_footer.png" border="0"/>	
		</div>


		
	    <div id="right"><?php print $right; ?></div>
    </div>
    <div style="clear:both;"></div>
</div>

<?php require_once "/var/www/html/sites/all/themes/oxygen/global_footer.inc"; ?>
