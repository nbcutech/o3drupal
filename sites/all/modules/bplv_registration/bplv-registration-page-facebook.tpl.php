<html>
	<head>
		<title></title>
	
		<link rel="shortcut icon" href="/sites/all/themes/bacheloretteparty/favicon.ico" type="image/x-icon" />
		<link type="text/css" rel="stylesheet" media="all" href="/sites/all/modules/admin_menu/admin_menu.css?f" />
		<link type="text/css" rel="stylesheet" media="all" href="/modules/aggregator/aggregator.css?f" />
		<link type="text/css" rel="stylesheet" media="all" href="/modules/node/node.css?f" />
		<link type="text/css" rel="stylesheet" media="all" href="/modules/poll/poll.css?f" />
		
		<link type="text/css" rel="stylesheet" media="all" href="/modules/system/defaults.css?f" />
		<link type="text/css" rel="stylesheet" media="all" href="/modules/system/system.css?f" />
		<link type="text/css" rel="stylesheet" media="all" href="/modules/system/system-menus.css?f" />
		<link type="text/css" rel="stylesheet" media="all" href="/modules/user/user.css?f" />
		<link type="text/css" rel="stylesheet" media="all" href="/sites/all/modules/cck/theme/content-module.css?f" />
		<link type="text/css" rel="stylesheet" media="all" href="/sites/all/modules/cck/modules/content_multigroup/content_multigroup.css?f" />
		<link type="text/css" rel="stylesheet" media="all" href="/sites/all/modules/date/date.css?f" />
		<link type="text/css" rel="stylesheet" media="all" href="/sites/all/modules/fckeditor/fckeditor/fckeditor.css?f" />
		<link type="text/css" rel="stylesheet" media="all" href="/sites/all/modules/filefield/filefield.css?f" />
		<link type="text/css" rel="stylesheet" media="all" href="/sites/all/modules/fivestar/css/fivestar.css?f" />
		<link type="text/css" rel="stylesheet" media="all" href="/sites/all/modules/img_assist/img_assist.css?f" />
		<link type="text/css" rel="stylesheet" media="all" href="/sites/all/modules/cck/modules/fieldgroup/fieldgroup.css?f" />
		<link type="text/css" rel="stylesheet" media="all" href="/sites/all/modules/bplv_registration/css/bplv_registration.css?58" />
		
		<script type="text/javascript" src="/misc/jquery.js"></script>
		<script type="text/javascript" src="/misc/drupal.js"></script>
		<script type="text/javascript" src="/sites/all/modules/bplv_registration/js/jquery.cookie.js?3"></script>
		<script type="text/javascript" src="/sites/all/modules/bplv_registration/js/bplv_registration.js?13"></script>
		
		<script type="text/javascript">
			
			  function NotInFacebookFrame() {
			    return top === self;
			  }
			  function ReferrerIsFacebookApp() {
			    if(document.referrer) {
			      return document.referrer.indexOf("apps.facebook.com") != -1;
			    }
			    return false;
			  }
			  if (NotInFacebookFrame() || ReferrerIsFacebookApp()) {
			    top.location.replace("http://www.facebook.com/bachelorettes?sk=app_271762439524232");
			  }
			  
			</script>

	</head>
	<body class="fb-body">
		<div class="fb-content">
			<?php print $form; ?>
			
		</div>
	</body>
</html>