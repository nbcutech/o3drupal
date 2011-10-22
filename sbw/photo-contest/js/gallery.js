var Gallery;
function sleep(milliSeconds){
	var startTime = new Date().getTime(); // get the current time
	while (new Date().getTime() < startTime + milliSeconds); // hog cpu
}
(function($) {
	Gallery = {
		data: new Object(),
		loaderFull: new Image(),
		loaderThumb: new Image(),
		currentPage: 1,
		total: 0,
		limit: 9,
		thumbContainers: null,
		currentThumb: null,
		descFullScreen: false,
		descCollapsed: false,
		currentImage: {
			thumbLink: null,
			title: null,
			description: null,
			permLink: null
		},
		init: function () {
			// Setup opacity rollovers
			this.loaderFull.src = "images/ajax-loader_full.gif";
			this.loaderThumb.src = "images/ajax-loader_thumb.gif";
			$(".thumb").opacityrollover({
				mouseOutOpacity:   .50,
				mouseOverOpacity:  1.0,
				fadeSpeed:         'fast',
				exemptionSelector: '.selected'
			});
			
			// Setup opacity rollovers
			$("#page_previous_container, #page_next_container").opacityrollover({
				mouseOutOpacity:   .50,
				mouseOverOpacity:  1.0,
				fadeSpeed:         'fast',
				exemptionSelector: '.selected'
			});
			
			// Hide the controls initially
			$("#viewer_next").hide();
			$("#viewer_previous").hide();
			
			if(showUpload){
				this.openUpload();
			}
			
			if(typeof init_page != "undefined") {
				this.currentPage = parseInt(init_page);
				this.loadData(this.currentPage-1, this, true);
			}
			
			// Load the data for page 1 and page 2
			this.loadData(this.currentPage, this, false);
			this.loadData(this.currentPage+1, this, true);
			
			this.bindControls();

		},
		bindViewerControls: function (scope) {
			$(".viewer_read_more_button").bind('click', {scope: scope}, function (e) {
				var top = null;
				var height = null;
				if(e.data.scope.descFullScreen) {
					top = '0px';
					height = '108px';
					e.data.scope.descFullScreen = false;
				} else {
					top = 0-(568-$("div.desc_box").height())+'px';
					height = '576px';
					e.data.scope.descFullScreen = true;
				}
				$(".desc_box").animate({
				    top: top,
				    height: height
				}, 'fast');
			});
			
			$(".viewer_photo_desc_toggle").bind('click', {scope: scope}, function (e) {
				var top = null;
				var height = null;
				if(e.data.scope.descCollapsed) {
					$(".viewer_photo_desc").show();
					top = '0px';
					height = '108px';
					e.data.scope.descCollapsed = false;
				} else {
					$(".viewer_photo_desc").hide();
					top = '75px';
					height = '33px';
					e.data.scope.descCollapsed = true;
				}
				$(".desc_box").animate({
				    top: top,
				    height: height
				}, 'fast');
			});		
		},
		bindThumbControls: function(scope) {
			// The image is selected by clicking on a thumbnail
			$(".thumb").bind('click', {scope: scope}, function (e) {
				e.data.scope.thumbSelect($(e.currentTarget));
			});
			
			//Show the controls when hovering image
			$("#gallery_viewer").bind('mouseover', {scope: scope}, function (e) {
				$("#viewer_next").show();
				$("#viewer_previous").show();
			});
			
			//Hide the controls when not over the main image
			$("#gallery_viewer").bind('mouseout', {scope: scope}, function (e) {
				$("#viewer_next").hide();
				$("#viewer_previous").hide();
			});
		},
		bindNavControls: function (scope) {
			// Clicking on the image takes you to the next image
			$("#gallery_viewer img").bind('click', {scope: scope}, function (e) {
				e.data.scope.nextImg();
			});
			
			// Clicking the next button to move to the next Image
			$("#viewer_next").bind('click', {scope: scope}, function(e) {
				e.data.scope.nextImg();
			});
			
			// Clicking the prev button to move to the prev Image
			$("#viewer_previous").bind('click', {scope: scope}, function(e) {
				e.data.scope.prevImg();
			});
			
			// Keypress navigation
			$(document).bind('keydown', {scope: scope}, function(e){
			    if (e.keyCode == 37) { 
			    	e.data.scope.prevImg();
			    } else if(e.keyCode == 39) {
			    	e.data.scope.nextImg();
			    }
			});
			
			// Page next navigation
			$("#page_next_container").bind('click', {scope: scope}, function(e) {
				e.data.scope.nextPage();
			});
			
			// Page prev navigation
			$("#page_previous_container").bind('click', {scope: scope}, function(e) {
				e.data.scope.prevPage();
			});		
		},
		bindControls: function () {
			scope = this;
			this.bindThumbControls(scope);
			this.bindNavControls(scope);
			this.bindViewerControls(scope);
			$(".sbw_photo_upload_button").bind("click", {scope: scope}, function (e) {
				e.data.scope.openUpload();
			});
			$(".viewer_upload_button").bind("click", {scope: scope}, function (e) {
				e.data.scope.openUpload();
			});
			$(".terms_header").bind("click", {scope: scope}, function (e) {
				$(".terms_body").toggle("fast");
			});
		},
		loadData: function (page, scope, preload) {
			$.ajax("./data.php", {
				data: 'page='+page,
				dataType: 'json',
				success: function(resp) {
					if(resp.total != scope.total) {
						if(scope.data.length > 0) {
							delete scope.data;
							scope.data = new Object();
						}
						scope.total = resp.total;
					}
					if(typeof scope.data["page_"+page] == "undefined") {
						scope.data["page_"+page] = new Array();
					}
					for(i in resp.data) {
						data = {
							image: new Image(),
							name: resp.data[i].name,
							title: resp.data[i].title,
							caption: resp.data[i].caption
						};
						data.image.src = "./ugc/generated/thumbs/" + resp.data[i].name + ".jpeg";
						scope.data["page_"+page].push(data);
					}
					scope.loadCallback(preload);
				}
			});
		},
		loadCallback: function (preload) {
			if(!preload) {
				this.populateThumbs();
				if(typeof init_page != "undefined") {
					var index = null;
					var data = this.data["page_"+this.currentPage];
					for(i = 0; i < data.length; i++) {
						if(data[i].name == photoId) {
							index = i;
							break;
						}
					}
					if(index !== null) {
						this.thumbSelect($("#gallery_thumb_"+(index+1)));
					}
				} else {
					this.thumbSelect($("#gallery_thumb_1"));
				}
			}
			
		},
		thumbSelect: function (el) {
			$(".desc_box").animate({
				top: '0px',
				height: '108px'
			}, 'fast');
			$(".viewer_photo_desc").show();
			if(this.currentThumb != null) {
				$("#"+this.currentThumb).removeClass("selected");
				$("#"+this.currentThumb).css("opacity", .50);
			}
			
			this.currentThumb = el.attr("id");
			data = this.data["page_"+parseInt(this.currentPage)][this.getThumbIndex()-1];
			if(typeof data == "undefined") {
				return false;
			}
			this.currentImage.thumbLink = el.find("img").attr("src");
			this.currentImage.title = data.title;
			this.currentImage.description = data.caption;
			this.currentImage.permLink = window.location.protocol + "//" + window.location.host + window.location.pathname + "?pphotoId=" + data.name;
			
			this.updateShare();
			
			$("#gallery_viewer img").attr({src: this.loaderFull.src});
			
			$(".viewer_photo_title").html(data.title);
			$(".viewer_photo_desc_text").html(data.caption);
			el.css("opacity", 1.0);
			el.addClass("selected");
			img = new Image();
			img.src = "./ugc/generated/" + data.name + ".jpeg";
			$("#gallery_viewer img").attr({src: img.src})
		},
		updateShare: function () {
			facebook = {
				url: "http://www.facebook.com/plugins/like.php",
				params: 8,
				parts: {
					href: this.currentImage.permLink,
					layout: 'button_count',
					show_faces: 'true',
					width: '450',
					action: 'like',
					font: '',
					colorscheme: 'light',
					height: '21'
				}
			};
			twitter = {
				url: "http://platform.twitter.com/widgets/tweet_button.html",
				parts: {
					url: this.currentImage.permLink,
					text: "I entered the #sTORIbook #Weddings #Photo #Contest for a chance to win a dream vacation! You can enter too: http://bit.ly/sTORIbook #sweeps",
					count: "horizontal"
				}
			};
			fb_src = facebook.url + '?' + $.param(facebook.parts);
			tw_src = twitter.url + '?' + $.param(twitter.parts);
			$("#fb_share_frame").attr({src: fb_src});
			$(".twitter-share-button").attr({src: tw_src});
		},
		populateThumbs: function () {
			data = this.data["page_"+this.currentPage];
			for(j = 0; j < this.limit; j++) {
				$("#gallery_thumb_"+ (j+1) +" img").attr({src: "images/trans.gif"});
			}
			for(i = 0; i < data.length; i++) {
				$("#gallery_thumb_"+ (i+1) +" img").attr({src: data[i].image.src});
			}
		},
		getThumbIndex: function () {
			current = new String(this.currentThumb);
			parsed = current.split("_");
			index = parseInt(parsed[2]);
			return index;
		},
		nextImg: function () {
			index = this.getThumbIndex();
			next = index+1;
			if(index < this.limit) {
				data = this.data["page_"+parseInt(this.currentPage)][next-1];
				if(typeof data == "undefined") {
					return false;
				}
				this.thumbSelect($("#gallery_thumb_"+next));
			} else {
				this.nextPage();
			}
		},
		prevImg: function() {
			index = this.getThumbIndex();
			prev = index-1;
			if(index > 1) {
				this.thumbSelect($("#gallery_thumb_"+prev));
			} else {
				pageMoved = this.prevPage(false);
				if(pageMoved !== false) {
					this.thumbSelect($("#gallery_thumb_"+parseInt(this.limit)));
				}
			}
		},
		nextPage: function (){
			next = parseInt(this.currentPage) + 1;
			if(typeof this.data["page_"+next] == "undefined" || this.data["page_"+next].length < 1) {
				return false;
			}
			this.currentPage += 1;
			this.populateThumbs();
			this.thumbSelect($("#gallery_thumb_1"));
			if(typeof this.data["page_"+(parseInt(this.currentPage)+1)] == "undefined") {
				this.loadData(this.currentPage+1, this, true);
			}
			if(typeof this.data["page_"+(parseInt(this.currentPage)-1)] == "undefined") {
				this.loadData(this.currentPage-1, this, true);
			}
		},
		prevPage: function (selectThumb){
			if(this.currentPage == 1) {
				return false;
			}
			this.currentPage -= 1;
			this.populateThumbs();
			if(selectThumb != false) {
				this.thumbSelect($("#gallery_thumb_1"));
			}
			if(typeof this.data["page_"+(parseInt(this.currentPage)+1)] == "undefined") {
				this.loadData(this.currentPage+1, this, true);
			}
			if(typeof this.data["page_"+(parseInt(this.currentPage)-1)] == "undefined" && this.currentPage > 1) {
				this.loadData(this.currentPage-1, this, true);
			}
		},
		openLogin: function (e) {
		},
		closeLogin: function (e) {
		},
		openUpload: function () {
			if(!authenticated) {
				$(".login_box").slideDown("fast");
			} else {
				$(".photo_upload_box").slideDown('fast');
				$(".terms_body").hide();
				scope = this;
				
				$('#photo_upload_form').fileUploadUI({
					scope: scope,
					uploadTable: $('#files'),
					downloadTable: $('#files'),
					buildUploadRow: function (files, index) {
						return $('<tr><td>' + files[index].name + '<\/td>' +
								'<td class="file_upload_progress"><div><\/div><\/td>' +
								'<td class="file_upload_cancel">' +
								'<button class="ui-state-default ui-corner-all" title="Cancel">' +
								'<span class="ui-icon ui-icon-cancel">Cancel<\/span>' +
								'<\/button><\/td><\/tr>');
					},
					onComplete: function (event, files, index, xhr, handler) {
						resp = (typeof xhr.responseText != "undefined") ? $.parseJSON(xhr.responseText) : handler.response;
						handler.scope.closeUpload();
						handler.scope.openCropper(resp.uploaded, resp.resizeRatio);
					}
				});
			}
		},
		closeUpload: function (e) {
			$(".photo_upload_box").slideUp('fast');
		},
		openCropper: function (file, ratio) {
			scope = this;
			$("#photo_ratio").val(ratio);
			$("#photo_editor").ajaxForm({
				scope: scope,
				success: function (resp, status, xhr, form) {
					data = $.parseJSON(resp);
					if(data.success == true) {
						$(".photo_crop_box").slideUp('fast');
						$(".photo_thankyou_box").slideDown('fast');
						$(".photo_thankyou_box .thankyou_button").click(function () {
							window.location = "index.php";
						});
					} else {
						fields = data.fields;
						for(field in fields) {
							$("#photo_"+fields[field]+"_label").css({color: 'red', font:'bold'});
						}
					}
				}
			});
			$(".photo_crop_box").slideDown('fast');
			
			$(".photo_div_closer_box").click(function() {
				window.location = "index.php";
			});
			img = new Image();
			img.src = file;
			$("#photo_path").val(file);
			$("#photo_cropper img").attr({src: img.src});
			$("#photo_cropper img").Jcrop({
				onChange: function (c) {
					if(typeof console != "undefined") {
						console.dir(c);
					}
				},
				onSelect: function (c) {
					if(typeof console != "undefined") {
						console.dir(c);
					}
					$("#photo_width").val(c.w);
					$("#photo_height").val(c.h);
					$("#photo_top").val(c.y);
					$("#photo_left").val(c.x);
				},
				bgColor: 'black',
				bgOpacity: .4,
				aspectRatio: Math.round((374/567)*100)/100,
				setSelect: [100, 100, 50] 
			});
		}
		
		
	};
}(jQuery));
$(document).ready(function () {
	Gallery.init();
	
			$(".photo_div_closer_box").bind('click', function () {
			$('div.photo_div_closer_box').parent().css('display', 'none');
		});
	
});