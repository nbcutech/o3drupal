/*
 * Handles client side scripting for BPLV Registration Page
 */
 
var BPLVReg = {};

$(document).ready(function() {
	//Initial Variables
	//BPLVReg.currentPage = $('.current-page-url').html();
	//BPLVReg.appId = '193761710688528';
	BPLVReg.appId = '271762439524232';
	BPLVReg.clickPermissions = false;
	BPLVReg.userObject = null;
	BPLVReg.pageLoad = true;
	//Load social tools
	BPLVReg.loadTwitterButton();
	BPLVReg.initFb();
	
	//Fb Like Logic
	//BPLVReg.checkIfUserLiked();
	
	BPLVReg.shareButton();
	if($.cookie("bplv_reg")) {
		BPLVReg.hideRegForm();
		alert("Thank You for Registering");
		$.cookie("bplv_reg", null);
	}
});

BPLVReg.shareButton = function() {
	$('.fb-share-button-friends').click(function(event) {
		BPLVReg.getFriends();
	});
}

BPLVReg.validateFormOnSubmit = function() {

	$('#bplv-registration-form').bind('submit',function(event) {
		
		var firstname = BPLVReg.handleFields('edit-firstname',"First Name is required");
		var lastname = BPLVReg.handleFields('edit-lastname',"Last Name is required");
		var city = BPLVReg.handleFields('edit-city',"City is required");
		var state = BPLVReg.handleFields('edit-state',"Choose a state");
		var address = BPLVReg.handleFields('edit-address',"Address is required");
		var zip = BPLVReg.handleZip("edit-zipcode","ZipCode", 5, true);
		var age = BPLVReg.handleZip("edit-age","Age", 3, false);
		var email = BPLVReg.handleEmail("edit-email");
		var rules = BPLVReg.handleCheckbox("edit-rules","You must agree to the rules to register");
		var phone = BPLVReg.handlePhoneNumber("edit-phone", "Enter a Valid Phone number");
		
		if(firstname && lastname && city && state && zip && age && email && rules && phone) {
			$.cookie('bplv_reg', "true");
		} 
		else {
			/*
			alert("firstname" + firstname);
			alert("lastname" + firstname);
			alert("firstname" + lastname);
			alert("address" + address);
			alert("city" + city);
			alert("state" + state);
			alert("zip" + zip);
			alert("age" + age);
			alert("email" + email);
			alert("rules" + rules);
			alert("phone" + phone);
			*/
			alert('Please correct the errors on the form');
			event.preventDefault();
		}
	});
}

BPLVReg.validateForm = function() {
	BPLVReg.handleRequiredFields('edit-firstname',"First Name is required");
	BPLVReg.handleRequiredFields('edit-lastname',"Last Name is required");
	BPLVReg.handleRequiredFields('edit-city',"City is required");
	BPLVReg.handleRequiredFields('edit-state',"Choose a state");
	BPLVReg.handleRequiredFields('edit-address',"Address is required");
	BPLVReg.handleZiponBlur("edit-zipcode","ZipCode", 5, true);
	BPLVReg.handleZiponBlur("edit-age","Age", 3, false);
	BPLVReg.handleEmailonBlur("edit-email");
	BPLVReg.handleCheckboxonBlur("edit-rules","You must agree to the rules to register");
	BPLVReg.handlePhoneNumberonBlur("edit-phone", "Enter a Valid Phone number");
}

BPLVReg.handleRequiredFields = function(classname, fieldname) {
	$('#' + classname).bind('blur', function(event) {
		BPLVReg.handleFields(classname, fieldname);
	});
}

BPLVReg.handlePhoneNumberonBlur = function(classname, message) {
	$('#' + classname).bind('blur', function(event) {
		BPLVReg.handlePhoneNumber(classname, message);
	});
}

BPLVReg.handlePhoneNumber = function(classname, message) {
	var newclass = classname+'_status';
	$('.'+newclass).remove();
	var selector = '#'+classname;
	var val = $(selector).val();
	if(!BPLVReg.validatePhone(val) && val!='') {
		$(selector).parent().append("<div class='"+classname+"_status status error'><span class='form-error-icon'></span>" + message + "</div>");
		return false;
	}
	else if(val == '') {
		return true;
	}
	else{
		$(selector).parent().append(BPLVReg.correctHtml(classname));
		return true;
	}
}

BPLVReg.validatePhone = function(subjectString) {
	var regexObj = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
	return regexObj.test(subjectString);
}

BPLVReg.handleFields = function(classname, fieldname) {
	var newclass = classname+'_status';
	$('.'+newclass).remove();
	var selector = '#'+classname;
	var val = $(selector).val(); 
	if(BPLVReg.validateRequiredFields(classname)) {
		$(selector).parent().append("<div class='"+classname+"_status status error'><span class='form-error-icon'></span>" + fieldname + "</div>");
		return false;
	}
	else {
		$(selector).parent().append(BPLVReg.correctHtml(classname));
		return true;
	}
}

BPLVReg.validateRequiredFields = function(classname) {
	var val = $('#'+classname).val();
	return (val == '' || val == 0);
}

BPLVReg.handleZiponBlur = function(classname, fieldname, fieldlength, required) {
	$('#' + classname).bind('blur', function(event) {
		BPLVReg.handleZip(classname, fieldname, fieldlength, required);
	});
}
BPLVReg.handleZip = function (classname, fieldname, fieldlength, required) {
	var selector = '#'+classname;
	var newclass = classname+'_status';
	$('.'+newclass).remove();
	var val = $(selector).val();
	if(val == '' && required) {
		$(selector).parent().append("<div class='"+classname+"_status status error'><span class='form-error-icon'></span>"+fieldname+" is required</div>");
		return false;
	}
	else if(isNaN(val) || (val.length < fieldlength && required)) {
		$(selector).parent().append("<div class='"+classname+"_status status error'><span class='form-error-icon'></span>Enter a Valid "+fieldname+"</div>");
		return false;
	}
	else if(val != ''){
		$(selector).parent().append(BPLVReg.correctHtml(classname));
		return true;
	}
	else if(val == '' && !required) {
		return true;
	}
}
BPLVReg.handleCheckboxonBlur = function (classname, message) {
	$('#' + classname).bind('blur', function(event) {
		BPLVReg.handleCheckbox(classname, message);
	});
}

BPLVReg.handleCheckbox = function (classname, message) {
	var selector = '#'+classname;
	var newclass = classname+'_status';
	$('.'+newclass).remove();
	var val = $(selector).is(":checked");
	if(!val) {
		$(selector).parent().append("<div class='"+classname+"_status status error'><span class='form-error-icon'></span>"+message+"</div>");
		return false;
	}
	else{
		$(selector).parent().append(BPLVReg.correctHtml(classname));
		return true;
	}
}

BPLVReg.handleEmailonBlur = function(classname) {
	$('#' + classname).bind('blur', function(event) {
		BPLVReg.handleEmail(classname);
	});
}

BPLVReg.handleEmail = function(classname) {
	var selector = '#'+classname;
	var val = $(selector).val();
	var newclass = classname+'_status';
	$('.'+newclass).remove();
	if(val == '') {
		$(selector).parent().append("<div class='"+classname+"_status status error'><span class='form-error-icon'></span>Email is required</div>");
		return false;
	}
	else if(!BPLVReg.validateEmail(val)) {
		$(selector).parent().append("<div class='"+classname+"_status status error'><span class='form-error-icon'></span>Enter a Valid Email</div>");
		return false;
	}
	else if(!BPLVReg.ajaxValidateEmail(val)) {
		$(selector).parent().append("<div class='"+classname+"_status status error'><span class='form-error-icon'></span>Email already in use</div>");
		return false;
	}
	else {
		$(selector).parent().append(BPLVReg.correctHtml(classname));
		return true;
	}
}

BPLVReg.ajaxValidateEmail = function(email) {
	var isvalid = true;
	$.ajax({
		url: '/bplv/services/email/'+email, 
		async: false,
		dataType: "json",
		type: "post",
		success:function (data){
			isvalid = data.data;
		}
	});
	return isvalid;
}

BPLVReg.validateEmail = function($email) { 	
 	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 	
 	if( !emailReg.test( $email ) ) { 		
 		return false; 	
 	}
 	 else { 		
 	 	return true; 	
 	 } 
 } 

BPLVReg.correctHtml = function(classname) {
	return '<div class="'+classname+'_status status success"><span class="form-correct-icon"></span></div>';
}

// Loads fb init js and intial setup
BPLVReg.initFb = function() {
	
	//Load facebook script dynamically
	var fbjssrc = 'http://connect.facebook.net/en_US/all.js';
	$('#fb-root').html('<script src="' + fbjssrc + '" type="text/javascript"></script>');
	
	//Init fb
	window.fbAsyncInit = function() {
		FB.init({ 
			appId:BPLVReg.appId, 
			cookie:true, 
			status:true, 
			xfbml:true,
			oauth : true
		});
		//FB.Canvas.setAutoResize();
		FB.Event.subscribe('edge.create', function(response) {
			  BPLVReg.fblike(response);
		});
		FB.Event.subscribe('auth.statusChange', function(response) {
		  BPLVReg.handleStatusChange(response);
		});
		FB.Canvas.setSize({ width: 640, height: 1050 });
		$('.fb-not-authorized > a').click(function(event) {
			BPLVReg.clickPermissions = true;
		  FB.login(function(response) {
		  	
		  });
		});
		
		if(BPLVReg.pageLoad ) {
			BPLVReg.pageLoad = false;
			FB.getLoginStatus(function(response) {
	    	BPLVReg.handleStatusChange(response);
	  	});
	  }
		
		
	
	}
}

BPLVReg.handleStatusChange = function(response) {
	if (response.authResponse) {
		    BPLVReg.validUser();
	} 
  else {
  	if(response.status == "not_authorized") {
  		BPLVReg.hideRegForm();
    	$('.fb-not-authorized').removeClass('hide');
  	}
    if(response.status == "unknown" ) {
    	if(BPLVReg.clickPermissions) {
    		alert("You must allow access in-order to continue.");
    	}
	    else {
	    	BPLVReg.hideRegForm();
	    	$('.fb-not-logged').removeClass('hide');
	    	alert("You are not logged in to facebook. Please click the login button to continue");
    	}
    }
  }
}

BPLVReg.hideRegForm = function() {
	$('.step2').hide();
	$('.step3-content').hide();
	$('#edit-submit').hide();
}

BPLVReg.showRegForm = function() {
	$('.step2').show();
	$('.step3-content').show();
	$('#edit-submit').show();
	
	//Validation
	BPLVReg.validateForm();
	BPLVReg.validateFormOnSubmit();
}

BPLVReg.loadTwitterButton = function() {
	 $('.popup').click(function(event) {
	 	var datatext = $(this).attr("data-text");
	 	var dataurl = $(this).attr("data-url");
    var width  = 575,
        height = 400,
        left   = ($(window).width()  - width)  / 2,
        top    = ($(window).height() - height) / 2,
        url    = this.href + '?text=' + datatext + "&url="+ dataurl,
        opts   = 'status=1' +
                 ',width='  + width  +
                 ',height=' + height +
                 ',top='    + top    +
                 ',scrollbars=yes'  + 
                 ',left='   + left;
    
    window.open(url, 'twitter', opts);
    return false;
  });

}

BPLVReg.fblike = function() {
	FB.login(function(response) {
   if (response.authResponse) {
     BPLVReg.validUser();
   }
   else {
   	alert('You must allow access to register for Girls Night Out Sweepstakes');
   }
 });
}

BPLVReg.validUser = function() {
	FB.api('/me', function(response) {
 	  BPLVReg.setFbUserId(response);
 	});
}

BPLVReg.setFbUserId = function(response) {
	$('#edit-fb-user-id').val(response.id);
	BPLVReg.userObject = response;
	var isvalid = true;
	var timestamp = new Date().getTime();
	$.ajax({
		url: '/bplv/services/fb_user_id/'+response.id+'?'+timestamp, 
		async: false,
		type: "post",
		dataType: "json",
		success:function (data){
			isvalid = data.data;
			if(isvalid) {
				FB.api('/me/likes/111322152279417',function(response) {
				
					if( response.data != "")  {
						BPLVReg.showRegForm();
					}
					else {
						BPLVReg.hideRegForm();
						$('.fb-not-authorized').hide();
						$('.fb-not-logged').hide();
						$('.fb-not-liked').show();
					}
				});
			}
			else {
				$('.fb-not-logged').hide();
				$('.fb-welcome-text > span').html(response.name);
				BPLVReg.hideRegForm();
				$('.fb-welcome-text').show();
			}
		}
	});
}

BPLVReg.getFriends = function() {
	/*
	FB.api('/me/friends',function(response) {
		console.log(response);
		if(response.data) {
			var htmllist = '';
			var friends_ids = [];
			
			$.each(response.data, function(i, item) {
				
				htmllist += 	'<fb:profile-pic size="square" ' +
                      'uid="' + item.id + '" ' +
                      'facebook-logo="true"' +
          '></fb:profile-pic>';
          
          if(i == 5) return false;
					else{
						friends_ids.push(item.id);
					}
			});
			var friends_list = friends_ids.join(',');
			alert(friends_ids.toSource());
			$('#fb-friends').html(htmllist);
			FB.XFBML.parse(document.getElementById('fb_friends'));
			
			
		}
		
	});
	*/
        FB.ui({method: 'apprequests',
          message: 'Enter the Bachelorette Party: Girls Night Out Sweepstakes!'
        },requestCallback);
}

function requestCallback(response) {
	alert("Thanks you!! Your App request has been successfully sent");
}