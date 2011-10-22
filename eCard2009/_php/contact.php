
<?php
$subject = "THIS SEASON, LIVE OUT LOUD WITH OXYGEN!";

$emailPost = $_POST['toEmail'];
$fromName = $_POST['fromName'];
$from = $_POST['fromEmail'];
$messageImage = $_POST['messageImage'];

$path = "http://features.oxygen.com/eCard2009/messages/";

$message = '<html><body><a href="http://www.pandora.com/?sc=sh161790043805213111#/"><img src="'.$path.$messageImage.'" width="640" height="485" /></a><br /><br />This eCard was sent from '.$fromName.'. To reply, please email <a href="mailto:'.$from.'">'.$from.'</a></body></html>';

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
//$headers .= "From: yourfriends@happyholidaysfromoxygen.com";
//$headers .= "\nReply-To: yourfriends@happyholidaysfromoxygen.com";
$headers .= "From: $from";
$headers .= "\nReply-To: $from";

//$fifth = "-f" . "yourfriends@happyholidaysfromoxygen.com";
$fifth = "-f" . $from;

$array = explode(',', $emailPost);
foreach ($array as $to) {
	if(mail($to, $subject, $message, $headers, $fifth)) {
		echo "ok";
		} else {
		echo "error";
	}
}  
?>

