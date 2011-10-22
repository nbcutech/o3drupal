<?
$xml = '';
//$ch = curl_init("http://video.oxygen.com/endCard/endCard.php?clipId=1332986");
$ch = curl_init("http://video.oxygen.com/endCard/endCard.php?clipId=".$_GET['clipId']);
curl_setopt ($ch, CURLOPT_HEADER, 0);
curl_setopt ($ch, CURLOPT_POSTFIELDS, $xml);
curl_setopt ($ch, CURLOPT_HTTPHEADER, Array("Content-Type: text/xml"));
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt ($ch, CURLOPT_VERBOSE, false);

$return = curl_exec($ch);

echo $return;

?>