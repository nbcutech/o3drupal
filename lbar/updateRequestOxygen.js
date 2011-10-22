var servicePort = window.location.port;
if(servicePort!="") servicePort = ":" + servicePort;
var serviceURL = "http://feeds.oxygen.com/lbar/proxy.php?proxy_url=http://impd.nbcuni.com/u1/";
//var serviceURL = "http://" + document.domain + servicePort + "/u1/";
//var serviceURL = "http://" + document.domain + "/OpenTVRequest/";
var initServlet = "InitialWebUpdateServlet";
var mainServlet = "WebUpdateServlet";
var my_date = new Date();

// get time zone from local computer (for day light saving add 1 e.g. my_date.getTimezoneOffset()/60+1 )
var gmtHours  = my_date.getTimezoneOffset()/60+1;

/* heroes time zone list : 
Est_Oxygen = EST,CST 
Mst_Oxygen = MST 
Pst_Oxygen = PST
All_Oxygen = All (timezone independent)
those are configurable engine Id's to distinguish between time zone/shows/cg destination etc.
*/
var testingKey="Test_Oxygen";//should be encrypted
var userDkey="";
var ekey_arr = ["Est_Oxygen","Mst_Oxygen","Pst_Oxygen","All_Oxygen"];
var cgEngine;
/*
switch(gmtHours){
		case 5:
		case 6:
			cgEngine = ekey_arr[0];
			break;
		case 7:
			cgEngine = ekey_arr[1];
			break;
		case 8:
			cgEngine = ekey_arr[2];
			break;
		case -2:
			cgEngine = ekey_arr[0];
			break;
	}
*/

//Not using timezone data for Oxygen
cgEngine = ekey_arr[3];

var xmlhttp=false;
//create HTTPREQUEST OBJECT
/*@cc_on @*/
/*@if (@_jscript_version >= 5)
// JScript gives us Conditional compilation, we can cope with old IE versions.
// and security blocked creation of the objects.
 try {
  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
 } catch (e) {
  try {
   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  } catch (E) {
   xmlhttp = false;
  }
 }
@end @*/
if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
	try {
		
		xmlhttp = new XMLHttpRequest();
		//netscape.security.PrivilegeManager.enablePrivilege("UniversalBrowserRead");		
		//if (xmlhttp.overrideMimeType) xmlhttp.overrideMimeType("text/html");

	} catch (e) {
		xmlhttp=false;
	}
}
if (!xmlhttp && window.createRequest) {
	try {
		xmlhttp = window.createRequest();
	} catch (e) {
		xmlhttp=false;
	}
}



var lModified = null;
var interval;


/**  
*  
*  Base64 encode / decode  
*  http://www.webtoolkit.info/  
*  
**/  
  
var Base64 = {   
  
    // private property   
    _keyStr : "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",   
    
    // public method for decoding   
    decode : function (input) {   
        var output = "";   
        var chr1, chr2, chr3;   
        var enc1, enc2, enc3, enc4;   
        var i = 0;   
  
        input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");   
  
        while (i < input.length) {   
  
            enc1 = this._keyStr.indexOf(input.charAt(i++));   
            enc2 = this._keyStr.indexOf(input.charAt(i++));   
            enc3 = this._keyStr.indexOf(input.charAt(i++));   
            enc4 = this._keyStr.indexOf(input.charAt(i++));   
  
            chr1 = (enc1 << 2) | (enc2 >> 4);   
            chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);   
            chr3 = ((enc3 & 3) << 6) | enc4;   
  
            output = output + String.fromCharCode(chr1);   
  
            if (enc3 != 64) {   
                output = output + String.fromCharCode(chr2);   
            }   
            if (enc4 != 64) {   
                output = output + String.fromCharCode(chr3);   
            }   
  
        }   
  
        //output = Base64._utf8_decode(output);   
    
        return output;   
  
    },   
  
  
    // private method for UTF-8 decoding   
    utf8_decode : function (utftext) {   
        var string = "";   
        var i = 0;   
        var c = c1 = c2 = 0;  
        while ( i < utftext.length ) {   
  
            c = utftext.charCodeAt(i);   
  
            if (c < 128) {   
                string += String.fromCharCode(c);   
                i++;   
            }   
            else if((c > 191) && (c < 224)) {   
                c2 = utftext.charCodeAt(i+1);   
                string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));   
                i += 2;   
            }   
            else {   
                c2 = utftext.charCodeAt(i+1);   
                c3 = utftext.charCodeAt(i+2);   
                string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));   
                i += 3;   
            }   
  
        }   
  
        return string;   
    }   
  
}  

//param message is the update response text
//param key is the user input key
//returns the text decrypted
function decryptUpdate(message,key) {

            message=Base64.decode(message);
            var keyBytes = new Array(key.length);
            var i;     
            for(i=0;i<key.length;i++){
                        keyBytes[i] = key.charCodeAt(i);
            }
            var messageBytes = new Array(message.length); 
            for(i=0;i<message.length;i++){
                        messageBytes[i] = message.charCodeAt(i);
            }
            var encryptedBytes=new Array(message.length);  
            for(i=0;i<encryptedBytes.length;++i) {                
                        encryptedBytes[i] = (messageBytes[i] ^ keyBytes[i % keyBytes.length]);
            }
            var returnString="";
            for(i=0;i<encryptedBytes.length;i++) {                  
                        returnString+=  String.fromCharCode(encryptedBytes[i]);
            }
            returnString = Base64.utf8_decode(returnString);
            return returnString;
}




function doRequest(){

	//window.status = "request";
	window.clearInterval(interval)
	//"?" +new Date().getTime() --- is for unique url to cancel IE cache on get reqyest
	
	if(lModified != null){
	 	xmlhttp.open("GET", serviceURL+mainServlet+"?ekey="+cgEngine,true);
		//if last modified exists set it as header request		 	
		xmlhttp.setRequestHeader("If-Modified-Since",lModified)
		
	}else{
	 	xmlhttp.open("GET", serviceURL+initServlet+"?ekey="+cgEngine,true);	
	}
	
	//register function to onReadyStateChange event
 	xmlhttp.onreadystatechange= statusChanged;
	//send the request
 	xmlhttp.send(null)
	
}



/*
keep track on the response status
*/
function statusChanged(){

  if (xmlhttp.readyState==4){
  //valid XML response
  	try{	
  	if (xmlhttp.status==200){		
		// case of empty data -- server restart
   		if(xmlhttp.responseText.length<5){
			lModified=null;
			//delay 15 sec till next call
			interval = window.setInterval(doRequest,15000);
			//alert("No data received, please try again later.")
			return;
		}
		
		//check encryption
		var dataStr = checkKey(xmlhttp.responseText);		
  	 	//update flash				
		if(lModified!=xmlhttp.getResponseHeader("Last-Modified")){		
		
   			window.document["flashObject"].SetVariable("responseData",dataStr);
   			window.document["flashObject"].TCallLabel("/","NewData");			
		}
   		//grab the last modified attribute from server response		
		lModified = xmlhttp.getResponseHeader("Last-Modified");
		if(dataStr=="<UPDATES><FIELDS><FIELD NAME=\"close_show\">dummy</FIELD></UPDATES>")
			return;		
		//call the request function in one scoand		
		interval = window.setInterval(doRequest,1000)
	}	
	//Timeout occurse -- no updates
    else if (xmlhttp.status==304 || (xmlhttp.status==null && navigator.userAgent.toLowerCase().indexOf("safari")>-1)){		 
		interval = window.setInterval(doRequest,0)	
     }
	 //any other HTTP statuses clear last modified value   
	 else{
	 // alert("Status is "+xmlhttp.status)
	  	lModified =null
		interval = window.setInterval(doRequest,3000)
	  }
	}catch(e){
	
	}
  }

}

function checkKey(str){
	var dataStr = str
	if(dataStr.indexOf("UPDATES")==-1){
		window.document["flashObject"].SetVariable("isEnc","true");
		var k = getKey();			
		if(k==""){
			window.document["flashObject"].SetVariable("wrongKey","true");	
			interval = window.setInterval(doRequest,15000);
			return "<UPDATES><FIELDS><FIELD NAME=\"close_show\">dummy</FIELD></UPDATES>";
		}
		dataStr = decryptUpdate(dataStr,k);
		if(dataStr.indexOf("UPDATES")==-1){
			setCookie("");
			//alert("wrong key.")
			window.document["flashObject"].SetVariable("wrongKey","true");
			interval = window.setInterval(doRequest,15000);
			return "<UPDATES><FIELDS><FIELD NAME=\"close_show\">dummy</FIELD></UPDATES>";
		}else
			window.document["flashObject"].SetVariable("wrongKey","false");	
	}else{		
		window.document["flashObject"].SetVariable("isEnc","false");
	}	
	return dataStr;	
}


function getKey(){
	return userDkey;
	/*
	var NameOfCookie="OPTVP";
	if (document.cookie.length > 0){		
		var begin = document.cookie.indexOf(NameOfCookie+"=");
		var end;
		if (begin != -1){
			begin += NameOfCookie.length+1;
			end = document.cookie.indexOf(";", begin);
			if (end == -1) end = document.cookie.length;						
				return unescape(document.cookie.substring(begin, end));				
		}
	}	
	return "";	
	*/
} 

function setKey(){
	var value=prompt("Please enter key:","");
	if (value!=null){    	  
		//setCookie(value)
		lModified=null;
		userDkey = value;
		cgEngine = testingKey;
		doRequest();
	}	
}

function setCookie(value){
	var NameOfCookie="OPTVP";
	var expiredays = 100;
	var ExpireDate = new Date ();
	ExpireDate.setTime(ExpireDate.getTime() + (expiredays * 24 * 3600 * 1000)); 
 	document.cookie = NameOfCookie + "=" + escape(value) + ((expiredays == null) ? "" : "; expires=" + ExpireDate.toGMTString());
}



var jsVersion = "1.0.1.0";