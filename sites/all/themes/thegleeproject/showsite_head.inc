      <div id="micrositeHeader">
		<img src="<?php print $pot;?>/images/GP-Header_notune-in.jpg" />
      </div>

      <div id="micrositeMenu" class="<?php print $node->type;?>">
		<div id="micrositeMenuCenter">

<!-- update to schedule casting -->		
		
<?php
$tstampStart = strtotime("2011-08-14 21:00:00");
if ($tstampStart < time()) {
echo '
<style type="text/css">
#micrositeMenu #navHome a {
  background:transparent url(/sites/all/themes/thegleeproject/images/GP-Nav-Refresh-072911.jpg) no-repeat scroll 0px -87px;
  width:81px;
}
 
#micrositeMenu #navHome a:hover {
  background-position: 0px -29px;
}

#micrositeMenu.homepage_shw #navHome a, #micrositeMenu.homepage_shw #navHome a:visited, #micrositeMenu.homepage_shw #navHome a:active, #micrositeMenu.homepage_shw #navHome a:hover {
 background-position: 0px -58px;
}

#micrositeMenu #navMeet a {
  background:transparent url(/sites/all/themes/thegleeproject/images/GP-Nav-Refresh-072911.jpg) repeat scroll -81px -87px;
  width:73px;
}
  
#micrositeMenu #navMeet a:hover {
    background-position: -81px -29px;
}

#micrositeMenu.bios_cast #navMeet a, #micrositeMenu.bios_cast #navMeet a:visited, #micrositeMenu.bios_cast #navMeet a:active, #micrositeMenu.bios_cast #navMeet a:hover {
    background-position: -81px -58px;
}
 
#micrositeMenu.bios #navMeet a, #micrositeMenu.bios #navMeet a:visited, #micrositeMenu.bios #navMeet a:active, #micrositeMenu.bios #navMeet a:hover {
    background-position: -81px -58px;
}

#micrositeMenu #navPhotos a {
  background:transparent url(/sites/all/themes/thegleeproject/images/GP-Nav-Refresh-072911.jpg) no-repeat scroll -154px -87px;
  width:93px;
}
 
#micrositeMenu #navPhotos a:hover {
  background-position: -154px -29px;
 
}
#micrositeMenu.photos #navPhotos a, #micrositeMenu.photos #navPhotos a:visited, #micrositeMenu.photos #navPhotos a:active, #micrositeMenu.photos #navPhotos a:hover {
 background-position: -154px -58px;
}

#micrositeMenu #navVideos a {
  background:transparent url(/sites/all/themes/thegleeproject/images/GP-Nav-Refresh-072911.jpg) no-repeat scroll -247px -87px;
  width:88px;
}
 
#micrositeMenu #navVideos a:hover {
  background-position: -247px -29px;
}

#micrositeMenu #navBlogs a {
  background:transparent url(/sites/all/themes/thegleeproject/images/GP-Nav-Refresh-072911.jpg) no-repeat scroll -335px -87px;
  width:80px;
}
 
#micrositeMenu #navBlogs a:hover {
  background-position: -335px -29px;
}

#micrositeMenu #navOxy a {
  background:transparent url(/sites/all/themes/thegleeproject/images/GP-Nav-Refresh-072911.jpg) no-repeat scroll -415px -87px;
  width:117px;
}
#micrositeMenu #navOxy a:hover {
  background-position: -415px -29px;
}
#micrositeMenu #navOxy div.navPlaceHolder {
  background:transparent url(/sites/all/themes/thegleeproject/images/GP-Nav-Refresh-072911.jpg) no-repeat scroll -415px 0px;
  width:117px;
}

#micrositeMenu #navFanFav a {
  background:transparent url(/sites/all/themes/thegleeproject/images/GP-Nav-Refresh-072911.jpg) no-repeat scroll -532px -87px;
  width:120px;
}
 #micrositeMenu #navFanFav a:hover {
   background-position: -532px -29px;
}
#micrositeMenu #navFanFav div.navPlaceHolder {
  background:transparent url(/sites/all/themes/thegleeproject/images/GP-Nav-Refresh-072911.jpg) no-repeat scroll -532px 0px;
  width:120px;
}

#micrositeMenu #navHomework a {
  background:transparent url(/sites/all/themes/thegleeproject/images/GP-Nav-Refresh-072911.jpg) no-repeat scroll -652px -87px;
  width:115px;
}
 #micrositeMenu #navHomework a:hover {
   background-position: -652px -29px;
}
#micrositeMenu #navHomework div.navPlaceHolder {
  background:transparent url(/sites/all/themes/thegleeproject/images/GP-Nav-Refresh-072911.jpg) no-repeat scroll -652px 0px;
  width:115px;
}

#micrositeMenu #navCheckin a {
  background:transparent url(/sites/all/themes/thegleeproject/images/GP-Nav-Refresh-072911.jpg) no-repeat scroll -767px -87px;
  width:100px;
}
 #micrositeMenu #navCheckin a:hover {
   background-position: -767px -29px;
}
#micrositeMenu #navCheckin div.navPlaceHolder {
  background:transparent url(/sites/all/themes/thegleeproject/images/GP-Nav-Refresh-072911.jpg) no-repeat scroll -767px 0px;
  width:100px;
}

#micrositeMenu #navCasting a {
  background:transparent url(/sites/all/themes/thegleeproject/images/GP-Nav-Refresh-072911.jpg) no-repeat scroll -867px -87px;
  width:95px;
}
#micrositeMenu #navCasting a:hover {
  background-position: -867px -29px;
}
#micrositeMenu #navCasting div.navPlaceHolder {
  background:transparent url(/sites/all/themes/thegleeproject/images/GP-Nav-Refresh-072911.jpg) no-repeat scroll -867px 0px;
  width:95px;
}

</style>
		<div id="navHome">
		<a href="/">The Glee Project Home</a>
		</div>
		<div id="navMeet">
		<a href="http://thegleeproject.oxygen.com/bios-enhanced-listerine">The Glee Project Cast Bios</a>
		</div>
		<div id="navPhotos">
		<a href="http://thegleeproject.oxygen.com/thegleeproject-gallery-redirect-page">Glee Project Photo Gallery</a>
		</div>
		<div id="navVideos">
		<a href="http://video.oxygen.com/shows/the_glee_project">Glee Project Videos</a>
		</div>
		<div id="navBlogs">
		<a href="http://thegleeproject.oxygen.com/blogs/gleeproj">Glee Project Blogs</a>
		</div>
		<div id="navOxy">
		<a href="http://www.oxygenlive.com/event.php?show=TheGleeProject&coast=EC">The Glee Project on OxygenLive</a>
		</div>
		<div id="navFanFav">
		<a href="http://thegleeproject.oxygen.com/fan-favorite-bing">The Glee Project Bing Fan Favorite</a>
		<!-- <div class="navPlaceHolder"> </div> -->
		</div>
		<div id="navHomework">
		<a href="http://thegleeproject.oxygen.com/homework-neutrogena">The Glee Project Neutrogena Homework</a>
		</div>
		<div id="navCheckin">
		<a href="http://thegleeproject.oxygen.com/check-in-verizon">The Glee Project Verizon Check-In</a> 
		</div>
		<div id="navCasting">
		<a href="http://www.thegleeprojectcasting.com/" target="_blank">The Glee Project Casting Call</a> 
		</div>
';
} else {
echo '
		<div id="navHome">
		<a href="/">The Glee Project Home</a>
		</div>
		<div id="navMeet">
		<a href="http://thegleeproject.oxygen.com/bios-enhanced-listerine">The Glee Project Cast Bios</a>
		</div>
		<div id="navPhotos">
		<a href="http://thegleeproject.oxygen.com/thegleeproject-gallery-redirect-page">Glee Project Photo Gallery</a>
		</div>
		<div id="navVideos">
		<a href="http://video.oxygen.com/shows/the_glee_project">Glee Project Videos</a>
		</div>
		<div id="navBlogs">
		<a href="http://thegleeproject.oxygen.com/blogs/gleeproj">Glee Project Blogs</a>
		</div>
		<div id="navOxy">
		<a href="http://www.oxygenlive.com/event.php?show=TheGleeProject&coast=EC">The Glee Project on OxygenLive</a>
		</div>
		<div id="navFanFav">
		<a href="http://thegleeproject.oxygen.com/fan-favorite-bing">The Glee Project Bing Fan Favorite</a>
		<!-- <div class="navPlaceHolder"> </div> -->
		</div>
		<div id="navHomework">
		<a href="http://thegleeproject.oxygen.com/homework-neutrogena">The Glee Project Neutrogena Homework</a>
		</div>
		<div id="navCheckin">
		<a href="http://thegleeproject.oxygen.com/check-in-verizon">The Glee Project Verizon Check-In</a> 
		</div>
';
};
?>


		</div>
	</div>