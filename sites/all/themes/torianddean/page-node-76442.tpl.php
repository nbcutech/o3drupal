<?php require_once("/var/www/html/sites/all/themes/oxygen/global_head.inc"); ?>
<?php require_once("showsite_head.inc"); ?>
    <?php if ($header): ?>
      <?php print $header ?>
    <?php endif; ?>
    <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block" style="background-color;white;">'. $tabs .'</div>'; endif; ?>
    <?php if (isset($tabs2)): print $tabs2; endif; ?>   
<style type="text/css">
	#wrapper{ position:relative;background:#FFFFFF url(/<?php print $directory; ?>/images/highway/interior_content_BG.jpg) no-repeat scroll left top;}
	.destinationBlock{position:relative;display:none;width:280px;padding:150px 0 0 680px;}
	.destCopy{padding-top:10px;font-size:11px; line-height:18px;}
	.destHeader {font-size:13px; font-weight:bold; }
	.galleryLink{position:absolute; top:490px; left:720px;}
	#utilityLinks{position:absolute; left:880px; top:480px;}
	#everGreenLinks{position:absolute; top:470px;}	
	#everGreenLinks a{font-size:12px; font-weight:bold; color:black; display:block;}
	#everGreenLinks #siteLink{padding:0 0 12px 110px;}
	#everGreenLinks #sneakPeakLink{padding:0 0 20px 165px;}
	#everGreenLinks #oxyliveLink{padding:0 0 20px 185px;}

</style>
<div id="container">
    <div id="wrapper">
       
            <?php print $content; ?>
<script type="text/javascript">

	function updateCopy(locationIndex)
	{
		$(".destinationBlock").hide();
		$(".destinationBlock:eq(" + locationIndex + ")").fadeIn();

 		$("#flag").css("left", hshObject.destinations[locationIndex].left);
		$("#flag").css("top", hshObject.destinations[locationIndex].top + "px");
	}
	
	hshObject= {"destinations" :[
	 {"top": "-12228", "left" : "-11165px" },
        {"top": "228", "left" : "165px" },
        {"top": "248", "left" : "170px"},
        {"top": "240", "left" : "195px"},
        {"top": "272", "left" : "239px"},
        {"top": "272", "left" : "272px"},
        {"top": "272", "left" : "295px"},
        {"top": "278", "left" : "318px"},
        {"top": "282", "left" : "360px"},
        {"top": "292", "left" : "375px"},
        {"top": "305", "left" : "398px"},
        {"top": "298", "left" : "415px"},
        {"top": "308", "left" : "479px"},
        {"top": "278", "left" : "527px"}

       ]
	};



</script>
<a style="position:absolute;z-index:1000;top:95px; left:36px;" href="http://tori-and-dean.oxygen.com/tori-dean-home-sweet-highway"><img src="/sites/all/themes/oxygen/images/spacer.gif" width="229" height="145"/></a>
<div class="destinationBlock">
	<div class="destCopy">The Spelling-McDermott cross-country family road trip was a big first for everyone. What started as a way to bring the family closer became a once-in-a-lifetime chance to see America and meet some great new friends.  Everyone -- including Liam, Stella, the Guncles, and even the dogs -- piled into a cross-country RV trip to visit our dear friend, Patsy. And along the way, there were plenty of fun detours to some outlandish pit stops, like an ostrich farm, a Cadillac graveyard and a 72-ounce steak family challenge. It was quite an adventure. We hope you enjoy our travel guide!</div>
	<a  class="galleryLink" href="/td/photos/road-trip-favs">Photo Gallery</a>
</div>	

<div class="destinationBlock">
	<div class="destHeader">Peggy Sue's Diner & Dinosaur Park (Needles, CA)</div>
	<div class="destCopy">On our first stop along the way, we stopped for lunch at Peggy Sue's Diner and the kids loved the "dinosaurs" and I loved the gift shop! It's a fun, 50s-themed diner along the I-40 -- an easy stop for all of us and they had a kid-friendly menu. Dean, the kids and I watched the ducks and turtles swim in the pond they have near the dinosaur sculptures and I even got to meet Peggy Sue herself. The kids had a great time and so did we!</div>
	<a  class="galleryLink" href="/td/photos/peggy-sues-diner-and-dinosaur-park">Photo Gallery</a>
</div>	

<div class="destinationBlock">	
	<div class="destHeader">Shoe Tree (Route 66, CA)</div>
	<div class="destCopy">Along Route 66, we stumbled upon a tree with tons of shoes hanging off the branches. Mostly tennis shoes -- and sadly, I didn't spy any Louboutins -- but we took some photos and Monkey loved it!</div>
	<a  class="galleryLink" href="/td/photos/shoe-tree">Photo Gallery</a>
</div>

<div class="destinationBlock">	
	<div class="destHeader">Naja's Food Mart (Route 66 / I-40)</div>
	<div class="destCopy">I couldn't really tell you exactly where we stopped, because it really felt like we were in the middle of nowhere for miles. This was my very first truck stop -- ever -- and I fell instantly in love. They had everything from fountain drinks to Route 66 souvenirs, and so I shopped while Dean gassed up the RV. Plus, the dogs had a place to run around and stretch their legs. Super fun!</div>	
	<a class="galleryLink" href="/td/photos/najas-food-mart">Photo Gallery</a>
</div>

<div class="destinationBlock">	
	<div class="destHeader">JB's Restaurant (Kingman, AZ)</div>
	<div class="destCopy">Before we got back on the road, we grabbed breakfast at the closest diner. Not only did they have a hot and cold breakfast buffet -- which made things easy -- but they also had a tapioca pudding to die for. Monkey and Buggy had so much fun and were free to roam (within reason). Monkey made a major mess with his cereal and the waitress took care of it for us! I was slightly embarrassed, but the people were so nice! Billy, Scouty and I took a photo in front of a Route 66 Motel sign, but I think Scouty's hand might be blocking it. Oh well, you get the idea! </div>	
	<a class="galleryLink" href="/td/photos/jbs-restaurant">Photo Gallery</a>
</div>

<div class="destinationBlock">	
	<div class="destHeader">Stewart's Petrified Wood Shop (Holbrook, AZ)</div>
	<div class="destCopy">Possibly one of my favorite stops along the way was Stewart's Petrified Wood Shop. When we arrived, we met the owner, Gazelle, and became fast friends. She told us about meteorites and how they find them -- which still blows my mind -- and we even got ourselves some awesome bookends made out of petrified wood! The best were the ostriches -- they were so much fun to watch and feed. I wanted to buy one and bring it on the RV, but Dean thought that was a bad idea. Meteorites, yes. Ostrich, no!  We learned a lot from Gazelle. Apparently, ostriches are very easy to breed! Hmmm. </div>	
	<a class="galleryLink" href="/td/photos/stewarts-petrified-wood-shop">Photo Gallery</a>
</div>

<div class="destinationBlock">	
	<div class="destHeader">Old Town (Albuquerque, NM)</div>
	<div class="destCopy">Where to start? There wasn't enough time for me in Old Town, Albuquerque. Although it only spans a few blocks around, I could have shopped all day. Cute store after cute store with everything from beaded bags to dried chilis! We shopped mostly at a store called the Covered Wagon. That's where I spent the bulk of my time and found the most adorable tiny pair of moccasins and vest for Stella. Okay, maybe I bought more than one pair of moccasins, but can ya blame me!? </div>	
	<a class="galleryLink" href="/td/photos/old-town">Photo Gallery</a>
</div>

<div class="destinationBlock">	
	<div class="destHeader">Joseph's Restaurant (Santa Rosa, NM)</div>
	<div class="destCopy">After several hours on the road, we stopped in Santa Rosa at an adorable restaurant called Joseph's. They were not expecting the likes of us -- with one woman serving as waitress and gift shop manager. Even though the food took a bit of time, I took advantage of the gift shop. The kids and I took pictures in the stand-up faceless cutouts outside the restaurant. </div>
	<a class="galleryLink" href="/td/photos/josephs-restaurant">Photo Gallery</a>
</div>

<div class="destinationBlock">	
	<div class="destHeader">Cadillac Ranch (Amarillo, TX)</div>
	<div class="destCopy">One of the places I wished I could have seen more of was this one. How often do you get to witness a row of half buried, graffiti'd Cadillacs sticking vertically out of the ground? When we arrived, the fog was thick like pea soup and it was far too cold for baby Stella. Dean, Bill and Liam ventured out; they said it was too windy to spray paint as planned, so Dean left his mark by carving our initials. It was definitely a boy's stop and I think we should go back when the sun is shining to find our names!</div>	
	<a class="galleryLink" href="/td/photos/cadillac-ranch">Photo Gallery</a>
</div>

<div class="destinationBlock">	
	<div class="destHeader">Big Texan (Amarillo, TX)</div>
	<div class="destCopy">This place was a blast and home of the 72-ounce steak challenge. They have everything from oversized rocking chairs to stuffed grizzlies and an old-school shooting gallery (not to mention a fully stocked gift shop!). I won't tell you what happened, but I will say we had the best waitress in all of Texas. Hi, Joy!</div>	
	<a class="galleryLink" href="/td/photos/big-texan">Photo Gallery</a>
</div>

<div class="destinationBlock">	
	<div class="destHeader">Hotel Indigo (Dallas, TX)</div>
	<div class="destCopy">When we pulled into Dallas, we stayed the night at the boutique, Hotel Indigo. The rooms were totally cute and beach-inspired with oversized beds that were big enough for Dean, the kids, and me -- with room to spare. The hotel was dog-friendly and the bathroom products were all by Aveda -- all natural -- love it! </div>
	<a class="galleryLink" href="/td/photos/hotel-indigo">Photo Gallery</a>
</div>

<div class="destinationBlock">	
	<div class="destHeader">It's a Grind Coffee House (Dallas, TX)</div>
	<div class="destCopy">Since my dad grew up in Dallas, we stopped there to meet up with my cousin and visit. We met him in a cute little coffee shop right off the train tracks with artwork of great musicians on the walls. They had a fireplace and games available to all their customers. It was cozy, the coffee was great and the staff was delightful. My only wish is that we could have stayed in Dallas longer to go to the state fair!  </div>
	<a class="galleryLink" href="/td/photos/its-a-grind">Photo Gallery</a>
</div>

<div class="destinationBlock">	
	<div class="destHeader">Ameristar Hotel &amp; Casino (Vicksburg, MS)</div>
	<div class="destCopy">Our last night on our way to Georgia, we were facing some serious weather conditions and pulled into the most unlikely find along the way. This was a pretty cool hotel with super comfy beds, but the coolest part was the casino down the road. Sadly, we didn't have much of a chance to enjoy the casino... maybe next time. </div>
	<a class="galleryLink" href="/td/photos/ameristar-hotel-and-casino">Photo Gallery</a>
</div>

<div class="destinationBlock">	
	<div class="destHeader">Antique Village Mall (Canton, GA)</div>
	<div class="destCopy">I was totally inspired when I walked into this little unassuming antique store. They had so many great things and held pieces from over 70 vendors in that area. Patsy and I went crazy in there, but everything was so reasonably priced -- I kind of couldn't help myself. Monkey had his own little tea party with antique toys and was such a good boy. Being there made me want to travel the country just looking for places like this one! </div>
	<a class="galleryLink" href="/td/photos/antique-village-mall">Photo Gallery</a>
</div>

<div id="flag" style="position:absolute;">
	<img src="/<?php print $directory; ?>/images/highway/flag.png">
</div>
	
<div id="utilityLinks">
	<a id="nextBtn" href="#"><img src="/<?php print $directory; ?>/images/highway/next.gif"></a>
	<br>
	<a id="prevBtn" href="#"><img src="/<?php print $directory; ?>/images/highway/back.gif"></a>
</div>
<div id="everGreenLinks">
	<a id="siteLink" href="/">visit our website</a>
	<a id="sneakPeakLink" href="http://o2.oxygen.com/player/?fid=1212394">watch sneak peeks</a>
	<a id="oxyliveLink" href="http://www.oxygenlive.com/" target="_blank">join our live parties</a>
</div>
<script type="text/javascript">
	currentIndex = 0;
	maxSize = ($(".destinationBlock").size()) - 1;

	$("#nextBtn").click(function(e){
		currentIndex = currentIndex == maxSize ?  0 : (currentIndex + 1);
		updateCopy(currentIndex);
		e.preventDefault();
	});
	$("#prevBtn").click(function(e){
		currentIndex = currentIndex ==  0 ?  maxSize : (currentIndex - 1);
		updateCopy(currentIndex);
		e.preventDefault();
	});	
	updateCopy(0);

$.each(hshObject.destinations, function(i){
   top = parseInt(hshObject.destinations[i].top) + 95;
   left= hshObject.destinations[i].left;
   urlString = "<a style='position:absolute; top:" + top + "px; left:" + left + "' class='mappoint' href='#'><img src='/sites/all/themes/oxygen/images/spacer.gif' width='10' height='10'></a>";
   $("#wrapper").append(urlString);
   });

$(".mappoint").click(function(pointIndex){
	updateCopy($(".mappoint").index(this));
	pointIndex.preventDefault();

});
</script>




    </div>
    <div style="clear:both;"></div>
</div>
<div class="png"><img src="<?php print $pot;?>/images/bottom_spacer.png" style="clear:both;"/>
<?php require_once "/var/www/html/sites/all/themes/oxygen/global_footer.inc"; ?>
 