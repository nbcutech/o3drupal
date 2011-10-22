      <div id="micrositeHeader">
		<img src="<?php print $pot;?>/images/TD_header_no-tune-in.jpg" />
      </div>


      <div id="micrositeMenu" class="
      <?php
	  if (preg_match("/meet-the-planners-sbw/i", request_uri()) == 1 ) {
	  print 'planners_nav';
	  } elseif (preg_match("/meet-the-couples-sbw/i", request_uri()) == 1 ) {
	  print 'couples_nav';
	  } else {
	  print $node->type;
	  }
      ?>">
		<div id="micrositeMenuCenter">
		<div id="navHome">
		<a href="/">Tori &amp; Dean sTORIbook Weddings Home</a>
		</div>
		<div id="navPlanners">
		<a href="/meet-the-planners-sbw">Meet the Planners - Tori &amp; Dean sTORIbook Weddings</a>
		</div>
		<div id="navCouples">
		<a href="/meet-the-couples-sbw">Meet the Couples - Tori &amp; Dean sTORIbook Weddings</a>
		</div>		
		<div id="navPhotos">
		<a href="/sbw-photo-gallery-redirect-page">Tori &amp; Dean sTORIbook Weddings Photo Gallery</a>
		</div>
		<div id="navVideos">
		<a href="http://video.oxygen.com/shows/storibook_weddings">Tori &amp; Dean sTORIbook Weddings Videos</a>
		</div>
		<div id="navBlogs">
		<a href="/blogs/sbw">Tori &amp; Dean sTORIbook Weddings Blogs</a>
		</div>
		<div id="navBoards">
		<a href="http://forums.oxygen.com/index.php?showforum=33">Chat On The Tori &amp; Dean sTORIbook Weddings Message Boards</a>
		</div>
		<div id="navOxy">
		<a href="http://www.oxygenlive.com/event.php?show=storibookweddings&coast=EC">Tori &amp; Dean sTORIbook Weddings on OxygenLive</a>
		</div>
		<div id="navPhotoContest">
		<a href="http://storibook-weddings.oxygen.com/storibook-contest-winner">Tori &amp; Dean sTORIbook Weddings Photo Contest</a>
		</div>
		<div id="navAbout">
		<a href="/about-sbw">About Tori &amp; Dean sTORIbook Weddings</a>
		</div>
		<div id="navShop">
		<a href="http://www.shopoholic.com" target="_blank">Tori &amp; Dean sTORIbook Weddings Shop</a>
		</div>

		</div>
	</div>


						
						
