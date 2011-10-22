// JavaScript Document
var $jQuery15 = jQuery.noConflict();

function contender_call_validate(){
	
	$jQuery15('div.contender-call-wrapper div.contender-call-right div.inner form').submit( function (){ 
		var formGood = true;
		
		$jQuery15('div.contender-call-wrapper div.contender-call-right div.inner form p input.req').each( function (){
			var thisVal = $jQuery15(this).val();
			//thisVal = contender_call_trim(thisVal);
			
			if(thisVal == ''){
				$jQuery15(this).css('background-color','red');
				formGood = false;
			}else{
				$jQuery15(this).css('background-color','#999');
			}
		});
		
		return formGood;
	});
}

$jQuery15(document).ready( function (){
	contender_call_validate();
});
