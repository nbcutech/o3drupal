<?

Class ContenderCall {
	
	function validate(){
		$error = array();
		
		$firstName = trim($_POST['first-name']);
		$lastName = trim($_POST['last-name']);
		$address = trim($_POST['address']);
		$city = trim($_POST['city']);
		$state = trim($_POST['state']);
		$zipcode = trim($_POST['zipcode']);
		$email = trim($_POST['email']);
		$phone = trim($_POST['phone']);
		$age = trim($_POST['age']);
		$tv_service_provider = trim($_POST['tv-service-provider']);
		$watch_oxygen = trim($_POST['watch-oxygen']);
		$internet = trim($_POST['interet-access']);
		$code_word = trim($_POST['code-word']);
		
		if(empty($firstName)) $error['firstName'] = 'background-color:red'; 
		if(empty($lastName)) $error['lastName'] = 'background-color:red'; 
		if(empty($address)) $error['address'] = 'background-color:red'; 
		if(empty($city)) $error['city'] = 'background-color:red'; 
		if(empty($state)) $error['state'] = 'background-color:red'; 
		if(empty($zipcode)) $error['zipcode'] = 'background-color:red'; 
		if(empty($email)) $error['email'] = 'background-color:red'; 
		if(empty($phone)) $error['phone'] = 'background-color:red'; 
		
		if(count($error) > 1){
			return $error;
		}else{
			return true;
		}
	}
	
	function submit(){
		include_once 'mysql.php';
		
		$firstName = mysql_real_escape_string(trim($_POST['first-name']));
		$lastName = mysql_real_escape_string(trim($_POST['last-name']));
		$address = mysql_real_escape_string(trim($_POST['address']));
		$city = mysql_real_escape_string(trim($_POST['city']));
		$state = mysql_real_escape_string(trim($_POST['state']));
		$zipcode = mysql_real_escape_string(trim($_POST['zipcode']));
		$email = mysql_real_escape_string(trim($_POST['email']));
		$phone = mysql_real_escape_string(trim($_POST['phone']));
		$age = mysql_real_escape_string(trim($_POST['age']));
		$tv_service_provider = mysql_real_escape_string(trim($_POST['tv-service-provider']));
		$watch_oxygen = mysql_real_escape_string(trim($_POST['watch-oxygen']));
		$internet = mysql_real_escape_string(trim($_POST['interet-access']));
		$code_word = mysql_real_escape_string(trim($_POST['code-word']));
		
		if($_POST['signup'] == 1) $newsletter = 1; else $newsletter = 0;
		
		$sql = "Insert into bgc_call_sweepstakes (`firstName` , `lastName` , `address` , `city` , `state` , `zipcode` , `email` , `phone` , `age` , `tv_service_provider` , `watch_oxygen` , `internet` , `code_word` , `newsletter`) values ('$firstName' , '$lastName' , '$address' , '$city' , '$state' , '$zipcode' , '$email' , '$phone' , '$age' , '$tv_service_provider' , '$watch_oxygen' , '$internet' , '$code_word' , '$newsletter')";
		mysql_query($sql);
		
		mysql_close();
	}

}

?>