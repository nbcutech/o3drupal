<?

//http://www.verizonwireless.com/b2c/LNPControllerServlet?path=lnppromo1

//http://api.vibes.com/WebApi/queryMdnCarrier

$phone = preg_replace("/[^0-9]/","", $_GET['phonenumber']); 

$ch = curl_init("http://www.verizonwireless.com/b2c/LNPControllerServlet?path=friend&mobilePhone1=$phone&mobilePhone2=&mobilePhone3=");
curl_setopt ($ch, CURLOPT_HEADER, 0);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt ($ch, CURLOPT_VERBOSE, false);

$results = strtolower(curl_exec($ch));

if(strpos($results, 'number is included') !== false){
	echo 'true';
}else{
	echo 'false';	
}

?>