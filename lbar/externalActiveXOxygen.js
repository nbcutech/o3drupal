var strObj = "";
strObj +='<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" id="flashObject" width="747" height="383" align="middle">';
strObj +='<param name="allowScriptAccess" value="always" />';
strObj +='<param name="movie" value="oxygen.swf" />';
strObj +='<param name="loop" value="false" />';
strObj +='<param name="menu" value="false" />';
strObj +='<param name="quality" value="high" />';
strObj +='<param name="wmode" value="transparent" />';
strObj +='<param name="flashvars" value="loginType=1" />';
strObj +='<embed flashvars = "loginType=1" src="oxygen.swf" loop="false" menu="false" quality="high" wmode="transparent" width="747" height="383" swLiveConnect="true" name="flashObject" align="middle" allowScriptAccess="always" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />';
strObj +='</object>';
document.write(strObj)