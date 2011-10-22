<?

Class MeeboCheckin {
	
	function validate(){
		
		$email = mysql_real_escape_string(trim($_REQUEST['email']));
		
		$today = date("Y-m-d");
		
		$sql = "Select * from meebo_checkin where `email`='$email' AND `date`='$today' limit 0,1";
		$Qresult = mysql_query($sql) or die('validate Died');
		while($row = mysql_fetch_array($Qresult)){
			//Person already registered today return false
			return false;
		}
		
		return true;
	}
	
	function submit(){
		include_once 'mysql.php';
		
		$first = mysql_real_escape_string(trim($_REQUEST['first-name']));
		$last = mysql_real_escape_string(trim($_REQUEST['last-name']));
		$state = mysql_real_escape_string(trim($_REQUEST['state']));
		$email = mysql_real_escape_string(trim($_REQUEST['email']));
		$timestamp = date("Y-m-d H:i:s");
		$today = date("Y-m-d");
		
		$raw = serialize($_REQUEST);
		
		if(MeeboCheckin::validate()){
			$sql = "Insert into meebo_checkin (`first` , `last` , `state` , `email` , `timestamp`, `date` , `raw`) values ('$first' , '$last' , '$state' , '$email' , '$timestamp' , '$today' , '$raw')"; 
			mysql_query($sql);
		}
		
		echo '<p style="text-align:center"><br><br><strong><em>Thank you for entering.</em></strong></p>';
		mysql_close();
	}
}

if($_REQUEST['action'] == 'add'){
	MeeboCheckin::submit();
}

?>