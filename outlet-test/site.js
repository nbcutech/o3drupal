// oxygen  
CLIP_PLAY_COUNT=0;
var endCardOn = 0;
var metadataGlobal = {};
metadataGlobal['next'] = {};
metadataGlobal['current'] = {};
var endCardImageURL = '';
var endCardPromoTxt = '';
var endCardPromoTxtLeft = '';
var endCardPromoURL = '';
var seasons = {};
function onOutletEvent(e)
{
	if(e.type == "outletInited")
	{
		// Set the number of target val calls by the ad engine to 0.
		var embeddedPlayer = Outlet.getOutletExtension("embeddedPlayer");
		embeddedPlayer.addEventListener("Player.end", endClipHandler);
		loadCurrentVideoData();
		loadNextVideoData();
		//loadShareMenuEvents();
		if (embeddedPlayer == null) {
			alert("Embedded Player not found.  Please ensure name matches id in video player config.");
			return;
		}
		var adData = { numberOfAdCalls:0};
		embeddedPlayer.updateAdData(adData);
		
	}
}
function fixOnMouseOut(element, event, JavaScript_code){
	var current_mouse_target = null;
	if (event.toElement) {
		current_mouse_target = event.toElement;
	} else if (event.relatedTarget) {
		current_mouse_target = event.relatedTarget;
	}
	if (!is_child_of(element, current_mouse_target) && element != current_mouse_target) {
		setTimeout("hideSeasonOptions()", 250);
	}
}
function is_child_of(parent, child){
	if (child != null) {
		while (child.parentNode) {
			if ((child = child.parentNode) == parent) {
				return true;
			}
		}
	}
	return false;
}


function endClipHandler(e){ 	//alert('clip end');
	endCardImageURL = '';
	endCardPromoTxt = '';
	endCardPromoURL = '';
	endCardPromoTxtLeft = '';
	var data = {};
	data = metadataGlobal['current']; 
	if (typeof data.metadata != "undefined" && typeof data.metadata.custommetadata != "undefined" && typeof data.metadata.custommetadata.customkeyValuePair != "undefined" ){
        	for (var i=0; i < data.metadata.custommetadata.customkeyValuePair.length; i++){
                	if (typeof data.metadata.custommetadata.customkeyValuePair[i].customkey != "undefined" && data.metadata.custommetadata.customkeyValuePair[i].customkey != ""){
                        	switch (data.metadata.custommetadata.customkeyValuePair[i].customkey){
                                	case 'end card image url':
                                        	if (typeof data.metadata.custommetadata.customkeyValuePair[i].customvalue != "undefined"){
                                                	endCardImageURL = data.metadata.custommetadata.customkeyValuePair[i].customvalue;
                                                }
                                                break;
                                        case 'promo text':
                                        	if (typeof data.metadata.custommetadata.customkeyValuePair[i].customvalue != "undefined"){
                                                	endCardPromoTxt = data.metadata.custommetadata.customkeyValuePair[i].customvalue;
                                                }
                                                break;
                                        case 'promo url':
                                        	if (typeof data.metadata.custommetadata.customkeyValuePair[i].customvalue != "undefined"){
                                                	endCardPromoURL = data.metadata.custommetadata.customkeyValuePair[i].customvalue;
                                                }
                                                break;
                                        case 'Lower Left Promo':
                                                if (typeof data.metadata.custommetadata.customkeyValuePair[i].customvalue != "undefined"){
                                                        endCardPromoTxtLeft = data.metadata.custommetadata.customkeyValuePair[i].customvalue;
                                                }

                                        default:
                                        	break;
                               	}
                 	}
       		}
	}
	
	// if (endCardImageURL != '' && endCardImageURL != 'undefined' && endCardPromoTxt != '' && endCardPromoTxt != 'undefined' && endCardPromoURL != '' && endCardPromoURL != 'undefined') {
	if (endCardImageURL != '' && endCardImageURL !== undefined && endCardPromoURL != '' && endCardPromoURL !== undefined) {
		loadEndCardData();
	} else {
		playNext();
	}
}
function loadVideoData(clipId, index)
{
	if (typeof metadataGlobal[index].metadata != "undefined" && (metadataGlobal[index].metadata.clipid == clipId)){
		return '';
	}
        var videoId = clipId;
        var fullURL = 'getEndcard.php';
        var queryParams = {'clipId':videoId};

        $.ajax(
        {
                type :"GET",
                url :fullURL,
                data :queryParams,
                dataType :"json",
                success : function(data)
                {
                        metadataGlobal[index] = data;
       	          //loadShareMenuEvents();
                },
                error : function(request, textStatus, thrownError)
                {
                }
        });	
}
function showSeasonOptions(){
$('#seasonOptions').css({display:'block'});
$('#selectedSeason').css({display:'none'});
}
function hideSeasonOptions(){
$('#selectedSeason').css({display:'block'});
$('#seasonOptions').css({display:'none'});
}

function loadCurrentVideoData()
{
	loadVideoData(videoID,'current');
}
function loadNextVideoData()
{
        var atVideo=0;
        var atPage=0;
        var broke=false;
        for(var i=0;i<videoPlaylist.length;i++){
                for(j=0;j<videoPlaylist[i].length;j++){
                        if(videoPlaylist[i][j]==videoID){
                                atVideo=j+1;
                                atPage=i;
                                broke=true;
                                break;
                        }
                        if(broke){
                                break;
                        }
                }
        }
        if(atVideo>=videoPlaylist[atPage].length){
                atVideo=0;
        }
	loadVideoData(videoPlaylist[atPage][atVideo], 'next');
}
function loadEndCardData(){
	var data = {};
	data = metadataGlobal['next'];
	var videoId = data.metadata.clipid;
	var watchAgainContent = '';
	var showNextContent = '';
	var nextVideoTitle = data.metadata.headline;
	nextVideoTitle = (nextVideoTitle.length > 33) ? nextVideoTitle.substr(0,32)+'...' : nextVideoTitle; 
	endCardPromoTxtLeft = (endCardPromoTxtLeft.length > 40) ? endCardPromoTxtLeft.substr(0,37)+'...' : endCardPromoTxtLeft;
	endCardOn = 1;			
	$('div.share-icons').css({display:"none"});
	$('#videoEndCard').css({display:"block"});
	$('#promoImageEC').html('<a href="'+endCardPromoURL+'" target="_blank"><div id="promoTxtEC">'+endCardPromoTxt+'</div><img src="'+ endCardImageURL +'" border="0"></img></a>');
	watchAgainContent += '<div id="replayBtnRC"><img src="/_images/endCard/circular_icon.png" border="0" onclick="playAgain();return false;"></img></div>';
	watchAgainContent += '<div id="watchAgainTxt"><a href="#" onclick="playAgain();return false;">watch again</a><br>'+ endCardPromoTxtLeft +'</div>';
	showNextContent += '<div id="arrowBtnsEC" onclick="playNext();return false;"><img src="/_images/endCard/single_arrow.png" border="0"></img></div> <div id="showNextTxt" onclick="playNext();return false;">'+ nextVideoTitle +'</div>  <div id="counter"></div>';
	$('#watchAgainEC').html(watchAgainContent);
	$('#showNextEC').html(showNextContent);
        /*	$('#videoEndCard').html('End Card here....'+' <br><br><a href="#" onclick="playAgain();return false;">Play Again</a> <br><br> Next: '+ data.metadata.headline + '<br><br> <div id="counter"></div>');*/
		  
//	$("#counter").everyTime(1000,function(i) {
//		if (i == 12) {
//			if (endCardOn) {
//				playVideo(data);		
//			}
//		}
//		if (i < 10) {
//			$(this).html(11-i+' secs');
//		} else {
//			$(this).html(11-i+' sec');
//		}
//	},12);
}
function playNext(){
	playVideo(metadataGlobal['next']);
}
function playVideo(data){
	endCardOn = 0;
	videoID = data.metadata.clipid;
	$('#videoEndCard').css({display:"none"});
	$('div.share-icons').css({display:"block"});
        changeMetadata(data);
	Outlet.getOutletExtension('embeddedPlayer').playVideo(videoID);
	if (typeof metadataGlobal['next'].metadata != "undefined" && (metadataGlobal['next'].metadata.clipid == videoID)) {
		 metadataGlobal['current'] =  metadataGlobal['next'];
	} else {	
		loadCurrentVideoData();
	}
	loadNextVideoData();
}
function changeMetadata(data){
	CLIP_PLAY_COUNT++;
	if(CLIP_PLAY_COUNT<2){
		//return;
	}

	
	var metadata = data.metadata;
	videoID = metadata.clipid;
        $('div#featured_video_module div.featured_video_info h3').html('');
        $('div#featured_video_module div.featured_video_info p').html('');

	$('div#featured_video_module div.featured_video_info h3').html(metadata.headline);
	$('div#featured_video_module div.featured_video_info p').html(metadata.description);
	//$('.featured_video_info h3').drawFont({wordWrap:true,postReady:true});

	

	selectPlayingClip(videoID);	

	set_title(metadata.title);
	set_omniture();
	set_hash(videoPlaylistMetaData[metadata.clipid].link);
	
	// $('div#loomia_recs div.module_content').loomia({itemGUID:videoID});
	load_new_fb(videoID, curr);
}
function selectPlayingClip(videoID){
	$('div#playlist_module ul.image_items li').removeClass('now_playing');
	$('div#playlist_module ul.image_items li h2').remove();
	var curr=findClipInVideoList(videoID);
	if(curr){
		$(curr).addClass('now_playing');
		$('.image_item_text',curr).prepend('<h2>Now Playing</h2>');
	}
}
function playAgain()
{
	endCardOn = 0;
	$('#videoEndCard').css({display:"none"});
	$('div.share-icons').css({display:"block"});
	Outlet.getOutletExtension('embeddedPlayer').play();
}

function findClipInVideoList(id){
	var re=new RegExp('v'+id+'$');
	var found=false;
	$('div#playlist_module ul.image_items li').each(function(){
		var link=$('a.image_item_image',this).attr('href');
		if(link.match(re)){
			found=this;
		}
	});
	return found;
	
}
// site specific javascript
if(!$.browser.safari)
{
	$(document).ready(function(){
		behavior_binder();
	});
}
else
{
	$(window).load(function(){
		behavior_binder();
	});
}

function getCleanShowName(){
	var reg_ex = / - Season [1-9]/g;
	var showName = VA_SHOWNAME.replace("&","&amp;");
	return showName.replace(reg_ex,"");
}

function loadSelectedSeason(obj) { 
	var showName = getCleanShowName();
	var selectedSeason = '';
	for (var i=0; i < seasons[showName].length; i++){
		if (seasons[showName][i].indexOf($.trim(obj.innerHTML)) != -1) {
			selectedSeason = seasons[showName][i];
			break;
		}
	}
	selectedSeason = selectedSeason.split('">');
	$('div#playlist_module div.loading').remove();
        var link = selectedSeason[0].replace('<a href="','').replace('<A href="','');
        if(link != ''){
                $('div#playlist_module .module_content').prepend('<div class="loading"></div>');
                var w=$('div#playlist_module .module_content').width();
                var h=$('div#playlist_module .module_content').height();
                $('div#playlist_module .module_content .loading').css({width:w,height:h});
                $('div#playlist_module div.loading').fadeIn('slow');
                //$('div.module_playlist').load('/video_list'+link+' div#playlist_module', function(responseText, textStatus, req){
		$.get('/video_list'+link, function(data) {
			$('div#playlist_module').html(data);
                        //$('div#playlist_module .module_tabs li a').drawFont();
                        //$('div#playlist_module .module_title:not(#player_title)').drawFont();
                        set_internal_tabs();
                        set_module_tabs();
                        set_omniture();
                        handleSeasonDropdown(obj.innerHTML);
                        set_hash(link);
                });
        }

}

function handleSeasonDropdown(preSel) {
        var currShowName = VA_SHOWNAME;
        var stripAnchorRegExp = /<\S[^><]*>/g;
        if (currShowName.indexOf("Season") != -1) {
                var showName = getCleanShowName();
                var seasonCount = seasons[showName].length;
                for (var i=0; i < seasonCount; i++) {
                        var optValue = seasons[showName][i].replace(showName+" - ","");
                        optValue = optValue.replace(stripAnchorRegExp,"");
                        var optObj = document.createElement('option');
			
                        optObj.text = optValue;
                        optObj.value = optValue;
			if (preSel.indexOf(optValue) != -1) {
				optObj.selected = true;
			}
                        try {
                                document.getElementById("season_selection_dropdown").add(optObj,null);
                        } catch (ex) {
                                document.getElementById("season_selection_dropdown").add(optObj);
                        }
                }

                $('#season_selection_container').css({display:"block"});
                // style drop down
                $('#season_selection_dropdown').styledSelect({callback:loadSelectedSeason});
		$('#module_tab_container').css({width:"395px"});
        } else {
                $('#season_selection_container').css({display:"none"});
		$('#module_tab_container').css({width:"594px"});
        }
}

/*
Binds behaviors
** can be re-run whenever there are DOM changes
*/

function behavior_binder(){

	$('.module_title:not(#player_title)').drawFont();
	$('.module_title#player_title span.main').drawFont();
	$('.module_title#player_title span.sub').drawFont();
	$('#find_it .module_content h3').drawFont();
	$('.module_title#player_title').css('visibility','visible');
	//$('.module_tabs li a').drawFont();
	alter_find_it();
	// $('.comments_header').drawFont();
	if(window.VA_SHOWNAME!==undefined){
		handleSeasonDropdown(VA_SHOWNAME);
	}
	
	// $('ul.star_rating').talkPodRate();
	// $('#featured_video_module p.featured_video_comments a').talkPodGetNumComments();
	// $('#search_results .image_item_comments span').talkPodGetNumComments();
	// $('div.tP_commenting').talkPodCommenting();
	$('#featured_video_module p.featured_video_comments a').toggle(
		function(e){
			e.preventDefault();
			$('div.tP_commenting').slideDown('fast',function(){$('div.tP_commenting form').slideDown();});
			$('#featured_video_module p.featured_video_comments a').addClass('open');
		},
		function(e){
			e.preventDefault();
			$('div.tP_commenting').slideUp('fast',function(){$('div.tP_commenting').css('display','none');});
			$('#featured_video_module p.featured_video_comments a').removeClass('open');
		}
		);
	
	$('#search_input').focus(function(){ 
		if($(this).val() == $(this).attr('defaultValue'))
		{
		  $(this).val('');
		}
	});

	
	$('form#search_form').submit(function(e){
		if($('input#search_input').val()==''){
			e.preventDefault();
			alert('Please enter a search term');
		}
		else{
			$('form#search_form').attr('action','/search/q/'+escape($('input#search_input').val()));
		}
	});
	set_internal_tabs();
	set_module_tabs();
	
}
function adjust_find_it(){
	var heights=[];
	var total_heights=[];
	var total_height=0;
	if($('div#find_it').length){
		$('div#find_it .module_content .find_it_content *').each(function(){
			if($(this).is('h3') || $(this).is('li')){
				var h=$(this).outerHeight();
				heights.push(h);
				total_height+=h;
				total_heights.push(total_height);
			}
			
		});
		var mid=Math.floor(total_height/2);

		var left='';
		var right='';
		var i=0;
		var in_li=false;
		var midpoint=false;
		$('div#find_it .module_content .find_it_content *').each(function(){
			if($(this).is('h3') || $(this).is('li')){
				var prepend='';
				curr=$(this).html();
				if($(this).is('li')){
          				if(!in_li){
            					in_li=true;
            					prepend='<ul>';
          				}
					curr = '<li>'+curr+'</li>';
				}
				if($(this).is('h3')){
					if(in_li){
						in_li=false;
						prepend='</ul>';
					}
					curr='<h3>'+curr+'</h3>';
				}
				curr=prepend+curr;
				if(total_heights[i]<mid){
					left+=curr;
				}
				else{
					if(midpoint===false){
						midpoint=true;
						left+=curr;
						if(in_li){
							//right="<ul>";
							in_li = false;
						}
					}
					else{
						right += curr;
					}
					
				}
				i++;
			}
			
		});
tempRightData='';
if(endsWith(left,"</h3>")){
lastIndexVal=left.lastIndexOf("<h3>");
tempRightData=left.substring(lastIndexVal,(left.length));
left=left.substring(0,lastIndexVal);
}
		$('div#find_it .module_content .find_it_content').html('<div id="left_find" class="find_it_column">'+left+'</div><div id="right_find" class="find_it_column">'+tempRightData+right+'</div>');
		$('div#find_it .module_content .find_it_content h3').css('visibility','visible');
		
	}
}
function endsWith(testString, endingString){  
if(testString.length-testString.lastIndexOf(endingString)==5){
return true;
}else{
return false;
}
}
function alter_find_it(){
	var heights=[];
	var total_heights=[];
	var total_height=0;
	var reg_ex = / - Season [1-9]/g;
	var stripAnchorRegExp = /<\S[^><]*>/g;
	var showNameArray = new Array();	
	var showName = '';
	//show name without anchor tag
	var showNameClean = '';
	if($('div#find_it').length){
		var innerContent='';
		var right='';
		var i=0;
		var in_li=false;
		$('div#find_it .module_content .find_it_content *').each(function(){
			if($(this).is('h3') || $(this).is('li')){
				var prepend='';
				curr=$(this).html();
				if($(this).is('li')){
					if (curr.indexOf("Season") != -1) {
						showName = curr.replace(reg_ex,"");
						showNameClean = showName.replace(stripAnchorRegExp,"");
						showNameClean = $.trim(showNameClean);
                                                if (showNameClean != '') {
                                                	if ($.isArray(seasons[showNameClean])) {
                                                        	seasons[showNameClean].push(curr);
                                                        } else {
                                                        	seasons[showNameClean] = [];
                                                                seasons[showNameClean].push(curr);
                                                        }
                                                }
						if ($.inArray(showNameClean, showNameArray) == -1){
							showNameArray.push(showNameClean);
							curr='<li>'+showName+'</li>';
    	                                            	if(!in_li){
                                                        	in_li=true;
                                                        	prepend='<ul>';
                                                	}
						} else {
							curr = '';
						}
					} else {
                                        	if(!in_li){
                                                	in_li=true;
                                                	prepend='<ul>';
                                        	}
						curr = '<li>'+curr+'</li>';
					}

				}
				if($(this).is('h3')){
					if(in_li){
						in_li=false;
						prepend='</ul>';
					}
					curr='<h3>'+curr+'</h3>';

				}
				curr=prepend+curr;
				innerContent+=curr;
				
				i++;
			}
			
		});
		$('div#find_it .module_content .find_it_content').html(innerContent);
		$('div#find_it .module_content .find_it_content h3').css('visibility','visible');
		adjust_find_it();	
	}
}
var AT_MODULE_TAB_PAGE=0;
var AT_MODULE_TAB_PIXEL=0;
var MODULE_TAB_PAGE_WIDTH=0;
var MODULE_TAB_PAGES_START=[0];
var MODULE_TAB_PIXELS_START=[0];
var MODULE_TAB_WIDTHS=[];
var TAB_SELECTED = 0;
function set_module_tabs(){
	AT_MODULE_TAB_PAGE=0;
	AT_MODULE_TAB_PIXEL=0;
	MODULE_TAB_PAGE_WIDTH=0;
	MODULE_TAB_PAGES_START=[0];
	MODULE_TAB_PIXELS_START=[0];
	MODULE_TAB_WIDTHS=[];
	if($('#module_tab_holder li').length){
		//$('#module_tab_holder').css('height',50);
		MODULE_TAB_PAGE_WIDTH=$('#module_tab_holder').innerWidth()-164;
		if(MODULE_TAB_PAGE_WIDTH<0){
			return;
		}
		var i=0;
		var ww=0;
		var selected=0;
		var selected_pixel=0;
		var tab_total=0;
              var isselected=false;leftVal=0;
		$('#module_tab_holder li').each(function(){
			if($(this).hasClass('ui-tabs-selected')){
				selected=i;isselected=true;
				TAB_SELECTED = i;
			}
                     if(!isselected){
                      leftVal=leftVal+parseInt($(this).outerWidth());
                     } 
			MODULE_TAB_WIDTHS[i]=parseInt($(this).outerWidth());
			ww+=MODULE_TAB_WIDTHS[i];
			if(ww>=MODULE_TAB_PAGE_WIDTH){
				if((i-1)>0){
					MODULE_TAB_PAGES_START.push(i-1);
					MODULE_TAB_PIXELS_START.push(tab_total)
					ww=MODULE_TAB_WIDTHS[i];
				}
			}
			
			tab_total+=MODULE_TAB_WIDTHS[i];
			
			i++;
		});
		if(ww>MODULE_TAB_PAGE_WIDTH){
			if((i-1)>0){
				MODULE_TAB_PAGES_START.push(i-1);
				MODULE_TAB_PIXELS_START.push(tab_total-MODULE_TAB_WIDTHS[i-1])
				ww=0;
			}
		}

		//the following line is commented to display the disabled arrows even in case of not enough categories
		//if(MODULE_TAB_PAGES_START.length>1){
			if(selected>0){
				for(i=0;i<MODULE_TAB_PAGES_START.length;i++){
					if(selected<MODULE_TAB_PAGES_START[i]){
						break;
					}
				}
				if(i-1>0){
					AT_MODULE_TAB_PAGE=i-1;
					$('ul.module_tabs').css('left',-MODULE_TAB_PIXELS_START[AT_MODULE_TAB_PAGE]);
				}
			}
			$('ul.module_tabs').css('left',-leftVal);
			$('#module_tab_holder ul.module_tabs').css('width',tab_total+160);
			$('#module_tab_container').append('<a class="go_left">prev</a><a class="go_right">next</a>');
			$('#module_tab_container a.go_left').bind('click',function(e){shift_module_tabs_left(e);});
			$('#module_tab_container a.go_right').bind('click',function(e){shift_module_tabs_right(e);});
			//var arrow_w=$('#module_tab_container a.go_left').width();
//			$('.module_tabs').css('margin-left','0');
			set_module_tabs_arrow_status();
		//}
	}
}
function shift_module_tabs_left(e){
	e.preventDefault();
	if(AT_MODULE_TAB_PAGE>0 || TAB_SELECTED != 0){
		if (AT_MODULE_TAB_PAGE > 0){
			AT_MODULE_TAB_PAGE--;
		}
		//to disable the left arrow
		TAB_SELECTED = 0;
		set_module_tabs_arrow_status();
		$('ul.module_tabs').animate({left:-MODULE_TAB_PIXELS_START[AT_MODULE_TAB_PAGE]});
		
	}
}
function shift_module_tabs_right(e){
	e.preventDefault();
	if(AT_MODULE_TAB_PAGE<(MODULE_TAB_PAGES_START.length-1)){
		AT_MODULE_TAB_PAGE++;
		set_module_tabs_arrow_status();
		$('ul.module_tabs').animate({left:-MODULE_TAB_PIXELS_START[AT_MODULE_TAB_PAGE]});
		
	}
}
function set_module_tabs_arrow_status(){
	$('#module_tab_container a.go_left, #module_tab_container a.go_right').removeClass('disabled');
	if(AT_MODULE_TAB_PAGE==0 && TAB_SELECTED == 0){
		$('#module_tab_container a.go_left').addClass('disabled');
	}
	if(AT_MODULE_TAB_PAGE==(MODULE_TAB_PAGES_START.length-1) ){
		$('#module_tab_container a.go_right').addClass('disabled');
	}
}
var AT_INTERNAL_PAGE=0;
var AT_INTERNAL_PIXEL=0;
var PAGE_WIDTH=0;
var PAGES_START=[0];
var PIXELS_START=[0];
var INTERNAL_TAB_WIDTHS=[];
function set_internal_tabs(){
	AT_INTERNAL_PAGE=0;
	AT_INTERNAL_PIXEL=0;
	PAGE_WIDTH=0;
	PAGES_START=[0];
	PIXELS_START=[0];
	INTERNAL_TAB_WIDTHS=[];
	if($('#internal_tab_holder li').length){
		$('#internal_tab_container').show();
		PAGE_WIDTH=$('#internal_tab_holder').innerWidth()-60;
		if(PAGE_WIDTH<0){
			return;
		}
		var i=0;
		var ww=0;
		var selected=0;
		var selected_pixel=0;
		var tab_total=0;
		$('#internal_tab_holder li').each(function(){
			if($(this).hasClass('ui-tabs-selected')){
				selected=i;
			}

			INTERNAL_TAB_WIDTHS[i]=parseInt($(this).outerWidth());
			ww+=INTERNAL_TAB_WIDTHS[i];
			if(ww>=PAGE_WIDTH){
				if((i-1)>0){
					PAGES_START.push(i-1);
					PIXELS_START.push(tab_total)
					ww=INTERNAL_TAB_WIDTHS[i];
				}
			}
			
			tab_total+=INTERNAL_TAB_WIDTHS[i];
			
			i++;
		});
		if(ww>PAGE_WIDTH){
			if((i-1)>0){
				PAGES_START.push(i-1);
				PIXELS_START.push(tab_total-INTERNAL_TAB_WIDTHS[i-1])
				ww=0;
			}
		}
		if(PAGES_START.length>1){
			if(selected>0){
				for(i=0;i<PAGES_START.length;i++){
					if(selected<PAGES_START[i]){
						break;
					}
				}
				if(i-1>0){
					AT_INTERNAL_PAGE=i-1;
					$('ul.internal_tabs').css('left',-PIXELS_START[AT_INTERNAL_PAGE]);
				}
			}
			
			$('#internal_tab_holder ul.internal_tabs').css('width',tab_total+10);
			$('#internal_tab_container').append('<a class="go_left">Left</a><a class="go_right">Right</a>');
			$('#internal_tab_container a.go_left').bind('click',function(e){shift_tabs_left(e);});
			$('#internal_tab_container a.go_right').bind('click',function(e){shift_tabs_right(e);});
			//var arrow_w=$('#internal_tab_holder a.go_left').width();
//			$('.internal_tabs').css('margin-left',arrow_w-18);
			set_arrow_status();
		}
	}else{
		$('#internal_tab_container').hide();
	}
}
function shift_tabs_left(e){
	e.preventDefault();
	if(AT_INTERNAL_PAGE>0){
		AT_INTERNAL_PAGE--;
		set_arrow_status();
		$('ul.internal_tabs').animate({left:-PIXELS_START[AT_INTERNAL_PAGE]});
		
	}
}
function shift_tabs_right(e){
	e.preventDefault();
	if(AT_INTERNAL_PAGE<(PAGES_START.length-1)){
		AT_INTERNAL_PAGE++;
		set_arrow_status();
		$('ul.internal_tabs').animate({left:-PIXELS_START[AT_INTERNAL_PAGE]});
		
	}
}
function set_arrow_status(){
	$('#internal_tab_holder a.go_left, #internal_tab_holder a.go_right').css('opacity',1);
	if(AT_INTERNAL_PAGE==0){
		$('#internal_tab_holder a.go_left').css('opacity',0.2);
	}
	if(AT_INTERNAL_PAGE==(PAGES_START.length-1) ){
		$('#internal_tab_holder a.go_right').css('opacity',0.2);
	}
}

// $('.search_module ul.pagination li').live('click',function(e){
// 	e.preventDefault();
// 	$('.search_module div.loading').remove();
// 	var link=$('a',this).attr('href');
// 	if(link){
// 		$('.search_module').append('<div class="loading">Please  ..</div>');
// 		$('.search_module .loading').css('opacity','.5');
// 		$('.search_module div.loading').fadeIn('fast');
// 		$('.search_module').load(link+' .search_module > *',function(){
// 			$('.search_module .module_header h2').drawFont();
// 			$('.search_module #search_results .image_item_comments a').talkPodGetNumComments();
// 			$('.search_module ul.star_rating').talkPodRate();
// 		});
// 	}
// });
function set_hash(link){
	var l='/'+link.replace(/^(http:\/\/)?[^\/]+\//,'');
	var p=document.location.pathname;
	var r=new RegExp('^'+p);
	orig=l;
	l=l.replace(r,'');
	if(orig.length==l.length){
		document.location.hash='//'+l
	}
	else{
		document.location.hash=l;
	}
}
var OM_SHOW=null;
var OM_SECTION=null;
function set_omniture(){
	if(window['s']!==undefined && s && typeof(s)=='object' && s.t!==undefined && typeof(s.t)=='function'){
		///Shows: Ghost Hunters: Deleted Scenes: Season 5: Reveal (1090042)

		var om_page_name=[];
		if(s.pageName){
			om_page_name=s.pageName.split(/\s+:\s+/)
		}
		var om_section=[];
		if(s.prop4){
			om_section=s.prop4.split(/\s+:\s+/);
		}
		var folder='';
		var video_title='';
		var video_id='';
		if($('div#playlist_module ul.module_tabs li.ui-state-active').length){
			folder=$('div#playlist_module ul.module_tabs li.ui-state-active a img').attr('alt');
		}
		if($('div#playlist_module ul.internal_tabs li.ui-state-active').length){
			var subsection=$('div#playlist_module ul.internal_tabs li.ui-state-active a img').attr('alt');
			if(subsection){
				folder=subsection;
			}
		}
		if($('div#playlist_module ul.image_items li.now_playing').length){
			var curr=$('div#playlist_module ul.image_items li.now_playing');
			video_title=$('h3 a',curr).html();
			var vid=$('h3 a',curr).attr('href').replace(/^.*\D(\d+)$/,'$1');
			if(vid.length){
				video_id=vid;
			}
		}
		var section=OM_SECTION;
		if(section==null){
			section=om_page_name[1];
			OM_SECTION=section;
		}
		
		var show=OM_SHOW;
		if(show==null){
			show=om_section[om_section.length-1];
			OM_SHOW=show;
		}
		var pn=[];
		var p4=[];
		s.pageName='Oxygen Video: ';
		if(section){
			pn.push(section);
			p4.push(section);
		}
		if(show){
			pn.push(show);
		}
		if(folder){
			pn.push(folder);
		}
		if(video_title){
			pn.push(video_title);
			p4.push(video_title);
		}
		if(folder){
			p4.push(folder);
		}
		s.pageName=pn.join(': ');
		s.prop4=p4.join(': ');
			
		s.t();
	}
}
$('div#playlist_module ul.image_items li.image_item').live('click',function(e){
	endCardOn = 0;
	$('#videoEndCard').css({display:"none"});
	$('div.share-icons').css({display:"block"});
	if(window.location.pathname==='/'){
		return;
	}
	if(e.which!==undefined && e.which!=1){
		return;
	}
	e.preventDefault();
	// GATEWAY_MESSENGER.remove_internal_alertbox('#featured_video_player');
	$('div#playlist_module ul.image_items li').removeClass('now_playing');
	$('div#playlist_module ul.image_items li h2').remove();
	var link=$('a',this).attr('href');

	var video_id=link.replace(/^.*v(\d+)$/,'$1');
	if(window['videoID']!==undefined){
		videoID=""+video_id;
	}
	if(link){
		$(this).addClass('now_playing');
		var header_info=$('h3 a',this).html();
		if($('.image_item_subtitle',this).html()!=''){
			header_info+='<span class="subtitle">: '+$('.image_item_subtitle',this).html()+'</span>';
		}
		$('.image_item_text',this).prepend('<h2>Now Playing</h2>');
		$('div#featured_video_module div.featured_video_info h3').html(header_info);
		$('div#featured_video_module div.featured_video_info p').html($('.image_item_desc',this).html());
		// $.fn.talkPodRate.load_new('div#featured_video_module ul.star_rating',video_id);
		// $.fn.talkPodCommenting.load_new('.tP_commenting',video_id);
		load_new_fb(video_id,this);
		set_internal_tabs();
		set_module_tabs();
		// $('#featured_video_module p.featured_video_comments a').attr('item_guid',video_id);
		// $('#featured_video_module p.featured_video_comments a').talkPodGetNumComments();
		if(window['Outlet']!==undefined && Outlet && typeof(Outlet) =='object'){
			Outlet.getOutletExtension('embeddedPlayer').playVideo(video_id);
		}
		loadCurrentVideoData();
		loadNextVideoData();
		set_omniture();
		document.location.hash = 'content';
		set_hash(link);
		// $('div#loomia_recs div.module_content').loomia({itemGUID:video_id});
	}
});

function set_title(video_title){
	var t=document.title.replace(/\-[^\-]+$/,'');
	document.title=t+' - '+video_title;
}

function load_new_fb(video_id,curr){
       VA_CONTENTURL=$('a',curr).attr('href');
       if(!VA_CONTENTURL.match(/^http/i)){
            VA_CONTENTURL='http://'+window.location.hostname+VA_CONTENTURL;
       }
      VA_ID=video_id;
      VA_TITLE=$('h3 a',curr).html();
      VA_DESCRIPTION = $('.image_item_desc',curr).html();
      if(typeof(clientParams)==='object'){
		embedTag = '<object width="400" height="400" align="middle"><param name="allowScriptAccess" value="always" /><param name="movie" value="http://widget.oxygen.com/singleclip/singleclip_v1.swf?CXNID=1000004.12002NXC&WID=486ba487be882f6f&clipID='+VA_ID+'"/><param name="quality" value="high" /><param name="allowFullScreen" value="true" /><param name="bgcolor" value="#ffffff" /><embed src="http://widget.oxygen.com/singleclip/singleclip_v1.swf?CXNID=1000004.12002NXC&WID=486ba487be882f6f&clipID='+VA_ID+'" quality="high" bgcolor="#ffffff" width="400" height="400" align="middle" allowScriptAccess="always" allowFullScreen="true" type="application/x-shockwave-flash"></embed></object>';
		VA_TITLE=$('h3 a',curr).html();
		VA_IMG=$('img',curr).attr('src');
		if(clientParams.content!==undefined){
			clientParams.content.contentTitle=VA_TITLE;
			clientParams.content.id=VA_ID;
		}
		
		if(clientParams.feed!==undefined){
			if(clientParams.feed.comments!==undefined){
				clientParams.feed.comments.contentType=VA_TITLE;
				clientParams.feed.comments.contentURL=VA_CONTENTURL;
				clientParams.feed.comments.contentImage=VA_IMG;
			}
			if(clientParams.feed.rating!==undefined){
				clientParams.feed.rating.contentType=VA_TITLE;
				clientParams.feed.rating.contentURL=VA_CONTENTURL;
				clientParams.feed.rating.contentImage=VA_IMG;
			}

		}
		if (typeof reloadFBComponents == "function") {
			reloadFBComponents();
		}
		$("#embedtext").val('');
		$("#embedtext").val(embedTag);		
	}
        updateShareIcons(VA_CONTENTURL,VA_TITLE,VA_DESCRIPTION);
}

function updateShareIcons(url,title,desc){ 
   var addthisparams = 'url='+url+'&title='+escape(title)+'&description='+escape(desc)+'&username=ankur79';
   var sharehtml = '<div class="share-icons" id="shareIcons">';
   sharehtml = sharehtml + '<div class="addthis_toolbox toolboxwrap">';
   sharehtml = sharehtml + '<div class="addthis_toolbox addthis_default_style" >';
   sharehtml = sharehtml + '<h4 class="share_this_title">Share:</h4>';
   sharehtml = sharehtml + '<ul class="share_this_btns">';
   sharehtml = sharehtml + '<li><a class="addthis_button_facebook" target="_blank" href ="http://api.addthis.com/oexchange/0.8/forward/facebook/offer?'+addthisparams+'">share on facebook</a></li>';
   sharehtml = sharehtml + '<li><a class="addthis_button_twitter" target="_blank" href ="http://api.addthis.com/oexchange/0.8/forward/twitter/offer?'+addthisparams+'">share on twitter</a></li>';
   sharehtml = sharehtml + '<li><a class="addthis_button_digg" target="_blank" href ="http://api.addthis.com/oexchange/0.8/forward/digg/offer?'+addthisparams+'">share on digg</a></li>';
   sharehtml = sharehtml + '<li><a class="addthis_button_stumbleupon" target="_blank" href ="http://api.addthis.com/oexchange/0.8/forward/stumbleupon/offer?'+addthisparams+'">share on stumbleupon</a></li>';
   sharehtml = sharehtml + '<li><a class="addthis_button_delicious" target="_blank" href ="http://api.addthis.com/oexchange/0.8/forward/delicious/offer?'+addthisparams+'">share on delicious</a></li>';
   sharehtml = sharehtml + '<li><a class="addthis_button_email" target="_blank" href ="http://api.addthis.com/oexchange/0.8/forward/email/offer?'+addthisparams+'">share on email</a></li>';
   sharehtml = sharehtml + '<li><a class="addthis_button_expanded" target="_blank" href ="http://api.addthis.com/oexchange/0.8/offer?'+addthisparams+'">More...</a></li>';
   sharehtml = sharehtml + '</ul>';
   sharehtml = sharehtml + '</div>';
   sharehtml = sharehtml + '</div>';
   sharehtml = sharehtml + '</div>';
   $('#shareIcons').html(sharehtml);
}


$('div#playlist_module ul.module_tabs li,div#playlist_module ul.internal_tabs li,div#playlist_module ul.pagination li').live('click',function(e){
	if(e.which!==undefined && e.which!=1){
		return;
	}
	if($(e.target).hasClass('disabled')){
		return;
	}
	e.preventDefault();
	$('div#playlist_module div.loading').remove();
	var link=$('a',this).attr('href');
	//dont know why the above returns absolute url. to fix this I am adding a code to strip off the domain name from the link
	var currURL = "http://"+document.domain;
	link = link.replace(currURL,"");
	if(link){
		$('div#playlist_module .module_content').prepend('<div class="loading"></div>');
		var w=$('div#playlist_module .module_content').width();
		var h=$('div#playlist_module .module_content').height();
		$('div#playlist_module .module_content .loading').css({width:w,height:h});
		$('div#playlist_module div.loading').fadeIn('slow');
		//$('div.module_playlist').load('/video_list'+link+' div#playlist_module', function(responseText, textStatus, req){
		$.get('/video_list'+link, function(data){
			$('div#playlist_module').html(data);
			
			//$('div#playlist_module .module_tabs li a').drawFont();
			//$('div#playlist_module .module_title:not(#player_title)').drawFont();
			set_internal_tabs();
			set_module_tabs();
			set_omniture();
			handleSeasonDropdown('');
			set_hash(link);
			selectPlayingClip(videoID);	
		});
	}
	
});


__setCookie = function(name,value,days,path) {
	if (!document.cookie || !window.location || !window.location.pathname){
		return;
	}
	if (!path){
		path = '/';
	}
	var cookie = name + "=" + value + ";";
	if (days) {
		var myDate=new Date();
		myDate.setTime(myDate.getTime()+(days*24*60*60*1000));
		cookie += " expires=" + myDate.toGMTString() + ";";
	}   
	cookie += " path="+path;
	document.cookie = cookie;
};
__eraseCookie = function(name,path){
	$.fn.entitlement.setCookie(name,'',-1,path);
};
__getCookie = function(name) {
	if (!document.cookie) return "";
	var nameEQ = name + "=";
	var ca = document.cookie.split(";");
	for(var i = 0; i < ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) == " ") c = c.substring(1, c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return undefined;
};


function addToPlaylist(metaData,playlist){
	for(var i in metaData){
		if(metaData.hasOwnProperty(i)){
			videoPlaylistMetaData[i]=metaData[i];
		}
	}
	videoPlaylist.push(playlist);
}


