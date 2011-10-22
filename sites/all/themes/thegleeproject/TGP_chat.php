<?

class TGP_Twitter {
	
	function validate(){
		
	}
	
	function add(){
		extract($_REQUEST);
		
		$comment = trim($comment);
		if(empty($comment)) return false;
		
		$comment = substr($comment, 0, 102);
								
		$comment = mysql_real_escape_string($comment);
		$week = mysql_real_escape_string($week);
		$timestamp = date("Y-m-d H:i:s");
		
		$sql = "Insert into tgp_comments (`type`, username, icon, comment, week, timestamp) values ('twitter','{$_SESSION['twitter']['screen_name']}','{$_SESSION['twitter']['profile_image_url']}','$comment','{$_GET['week']}','$timestamp');";
		mysql_query($sql);
		
		//TGP_Twitter::post();
	}
	
	function comment(){
		extract($_REQUEST);
		$sql = "Select * from tgp_comments where tgp_commentID='$ID' order by tgp_commentID DESC";
		$Qresult = mysql_query($sql) or die('getPage Died');
		while($row = mysql_fetch_array($Qresult)){
			extract($row);
		}
		
		return $comment; 
	}
	
	function post(){
		require 'tgp/tmhOAuth.php';
		
		$comment = TGP_Twitter::comment();
		
		$comment = substr($comment, 0, 102);
		
		$tmhOAuth = new tmhOAuth(array(
		  'consumer_key'    => '5msf8gRthg2UPqaQ6udq8A',
		  'consumer_secret' => 'jidFO3aJ5bA23n6MuCjErI0roZrgVUPbYSfMHOh5k',
		  'user_token'      => $_SESSION['access_token']['oauth_token'],
		  'user_secret'     => $_SESSION['access_token']['oauth_token_secret'],
		));
		
		$code = $tmhOAuth->request('POST', $tmhOAuth->url('1/statuses/update'), array(
		  'status' => $comment. ' http://bit.ly/TGPHWT #TheGleeProject'//.' http://thegleeproject.oxygen.com/homework-neutrogena#homework-neutrogena?week=week-1&comment='.$_GET['ID'].''
		));
	}
	
}

class TGP_Facebook {
	
	function validate(){
		
	}
	
	function add(){
		extract($_REQUEST);
		
		$comment = trim($comment);
		if(empty($comment)) return false;
		
		$comment = substr($comment, 0, 240);
		
		$comment = mysql_real_escape_string($comment);
		$week = mysql_real_escape_string($week);
		$timestamp = date("Y-m-d H:i:s");
		
		$sql = "Insert into tgp_comments (`type`, username, icon, comment, week, timestamp) values ('facebook','{$_SESSION['facebook']['screen_name']}','{$_SESSION['facebook']['profile_image_url']}','$comment','{$_GET['week']}','$timestamp');";
		mysql_query($sql);
		
		//TGP_Facebook::post();
	}
	
	function post(){
		require_once 'tgp/facebook/src/facebook.php';
		
		$facebook = new Facebook(array(
			'appId'  => '229203110427066',
			'secret' => '3305c49668d784684742e65312308033'
		));
		
		switch($_GET['week']){
			case 'week-2':
				$week = 2;
				break;
			case 'week-1':
			default:
				$week = 1;
				break;
		}
		
		$attachment = array(
			'name' => 'The Glee Project wants to help YOU develop your natural talent with our weekly homework assignment.',
			'caption' => "TheGleeProject Homework Week $week",
			'link' => 'http://bit.ly/TGPHWF',
			'description' => $_REQUEST['comment']
		);
		$result = $facebook->api('/me/feed/','post',$attachment);
	}
	
	
	//DEPRECATED USING OPEN GRAPH ON PAGE METATAGS
	function share(){
		require_once 'tgp/facebook/src/facebook.php';
		
		$facebook = new Facebook(array(
			'appId'  => '229203110427066',
			'secret' => '3305c49668d784684742e65312308033'
		));
		
		$attachment = array(
			'link' => 'http://thegleeproject.oxygen.com/homework-neutrogena',
			'picture' => 'http://thegleeproject.oxygen.com/sites/all/themes/thegleeproject/images/tgp-icon.jpg',
			'name' => 'I submitted my homework assignment!',
			'caption' => "TheGleeProject Homework Week 1",
			'description' => 'The Glee Project wants to help YOU develop your natural talent with our weekly homework assignment.'
		);
		
		$result = $facebook->api('/me/feed/','post',$attachment); 
		
	}
}

class TGP_Email {
	
	function validate(){
		
	}
	
	function add(){
		extract($_REQUEST);
		$comment = trim($comment);
		if(empty($comment)) return false;
		
		$screenName = mysql_real_escape_string($screenName);
		$comment = mysql_real_escape_string($comment);
		$week = mysql_real_escape_string($week);
		$timestamp = date("Y-m-d H:i:s");
		
		$sql = "Insert into tgp_comments (`type`, username, icon, comment, week, timestamp) values ('email','$screenName','default','$comment','{$_GET['week']}','$timestamp');";
		mysql_query($sql);
		
		//TGP_Email::send();
	}
	
	function send(){
		extract($_REQUEST);
		
		$comment = trim($comment);
		$toEmail = trim($toEmail);
		$fromEmail = trim($fromEmail);
		
		if(empty($comment)) return false;
		if(empty($toEmail)) return false;
		if(empty($fromEmail)) return false;
		
		$comments = substr($comments, 0, 145);
		
		$to = $toEmail;
		$subject = 'Shared comment from TGP Homework:';
		$message = "
Shared comment from TGP Homework:

$comment

Read more or post your own comment at
http://thegleeproject.oxygen.com/homework-neutrogena

		";
		$headers = "From: $fromEmail
Bcc: amin.nelson@littlebluerm.com";
		mail($to, $subject, $message, $headers);	
	}
	
}

class TGP_Comments {
	
	function view(){
		$comments = '';
		$sql = "Select * from tgp_comments where week='{$_GET['week']}' order by tgp_commentID DESC";
		$Qresult = mysql_query($sql) or die('getPage Died');
		while($row = mysql_fetch_array($Qresult)){
			extract($row);
			
			switch($type){
				case 'twitter':
					$icon = '<a href="http://www.twitter.com/'.$username.'" target="_blank"><img src="'.$icon.'" width="53" height="53" border="0" /></a>';
					$username = '<a href="http://www.twitter.com/'.$username.'" target="_blank">@'.$username.'</a>';
					break;
				case 'facebook':
					$urlParts = explode('/',$icon);
					if(is_array($urlParts) && count($urlParts) > 2){
						$icon = '<a href="http://www.facebook.com/people/@/'.$urlParts[3].'" target="_blank"><img src="'.$icon.'" width="53" height="53" border="0" /></a>';
						$username = '<a href="http://www.facebook.com/people/@/'.$urlParts[3].'" target="_blank">'.$username.'</a>';
					}else{
						$icon = '<img src="/sites/all/themes/thegleeproject/tgp/images/test-icon.gif" width="53" height="53" border="0" />';
					}
					break;
				case 'email':
				default:
					$icon = '<img src="/sites/all/themes/thegleeproject/tgp/images/test-icon.gif" width="53" height="53" border="0" />';
					break;
			}
			
			$comments .= '
			<div class="comment-entry">
				<div class="icon">'.$icon.'</div>
				<div class="comment">
					<strong>'.$username.':</strong><br />
					'.$comment.'
					<div class="like-share"><a href="#homework-neutrogena?week=week-1&comment='.$tgp_commentID.'" class="like-facebook" id="like-facebook-'.$tgp_commentID.'">like</a> <a href="#week=week-1&comment='.$tgp_commentID.'" class="share-tweet" id="share-tweet-'.$tgp_commentID.'">tweet</a> <span>'.TGP_Comments::shares($tgp_commentID).' people shared this</span></div>
				</div>
				<div class="flasher">&nbsp;</div>
				<div class="clear">&nbsp;</div>
			</div>';
		}
		
		return $comments; 
	}
	
	function share(){
		
		TGP_Twitter::post();
		
		$timestamp = date("Y-m-d H:i:s");
		$sql = "Insert into tgp_comment_shares (tgp_commentID, timestamp) values ('{$_GET['ID']}','$timestamp');";
		mysql_query($sql);
		
		echo TGP_Comments::shares($_GET['ID']);
	}
	
	
	function like(){
		require_once 'tgp/facebook/src/facebook.php';
		
		$facebook = new Facebook(array(
			'appId'  => '229203110427066',
			'secret' => '3305c49668d784684742e65312308033'
		));

		$comment = TGP_Twitter::comment();
		
		switch($_GET['week']){
			case 'week-2':
				$week = 2;
				break;
			case 'week-1':
			default:
				$week = 1;
				break;
		}

		$attachment = array(
			'link' => 'http://thegleeproject.oxygen.com/homework-neutrogena?week='.$week.'&comment='.$_GET['ID'],
			'picture' => 'http://thegleeproject.oxygen.com/sites/all/themes/thegleeproject/images/tgp-icon.jpg',
			'name' => 'I submitted my homework assignment!',
			'caption' => "TheGleeProject Homework Week $week",
			'description' => $comment
		);
		$result = $facebook->api('/me/feed/','post',$attachment); //print_r( $attachment );
		
		TGP_Comments::share($_GET['ID']);
	}
	
	function shares($tgp_commentID){
		$sql = "Select COUNT(ID) as shares from tgp_comment_shares where tgp_commentID='$tgp_commentID'";
		$Qresult = mysql_query($sql);
		while($row = mysql_fetch_array($Qresult)){
			$shares = $row['shares'];	
		}
		
		if(empty($shares)) $shares = 0;
		
		return $shares;
	}
}

?>