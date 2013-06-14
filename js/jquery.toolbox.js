/*	***************************************

gwtt 0.1
JQuery Plugin

Author: Matt Lantz
Purpose: A nice little tool to alert the user
to update their outdated browser. ASAP!
 
****************************************** */

(function($){
 	var result = false,
		browserTitle = "",
		versionNumber = 0,
		browser = navigator.userAgent,
		version = navigator.appVersion,
		platform = navigator.platform,
		IEpattern = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})"),
		FFpattern = new RegExp("Firefox/([0-9]{1,}[0-9]{1,}[\.0-9]{0,})"),
		Cpattern = new RegExp("Chrome/([0-9]{1,}[0-9]{1,}[\.0-9]{0,})");

		if(IEpattern.test(browser)){
			browserTitle = "Internet Explorer";
		}
		if(FFpattern.test(browser)){
			browserTitle = "Firefox";
		}
		if(Cpattern.test(browser)){
			browserTitle = "Chrome";
		}

	function blocked(versionNumber){

		document.body.innerHTML = "";

		var blankpage = document.createElement('div');
		blankpage.setAttribute('id', '_____blankpage');
		blankpage.style.width = "100%";
		blankpage.style.height = "100%";
		blankpage.style.position= 'absolute';
		blankpage.style.top = '0';
		blankpage.style.left = '0';
		blankpage.style.margin = '0px';
		blankpage.style.padding = '0px';
		blankpage.style.background = '#333';
		blankpage.style.textAlign = 'center';

		document.body.appendChild(blankpage);

		var blockerbox = document.createElement('div');
		blockerbox.setAttribute('id', '_____blockerbox');
		blockerbox.style.width = '300px';
		blockerbox.style.height = '320px';
		blockerbox.style.margin = '100px auto';
		blockerbox.style.background = '#EEE';
		blockerbox.style.border = '10px solid #666';
		blockerbox.style.borderRadius = '15px';					// There is a huge joke in this
		blockerbox.style.boxShadow = '0px 0px 15px #111';		// Same here, what do you think it is?
		blockerbox.style.textAlign = 'center';
		blockerbox.style.fontFamily = "Arial";

		document.getElementById('_____blankpage').appendChild(blockerbox);

		document.getElementById('_____blockerbox').innerHTML = '<p style="margin-top: 20px; padding: 5px 15px; line-height: 1.5em;">Whoa slow down! <br /> We\'re not trying to be rude but you need to upgrade your browser.</p><p style="line-height: 1.5em;">You\'re currently using <br style="line-height: 1.5em;" /> '+browserTitle+' '+versionNumber+'</p><p style="line-height: 1.5em;"><br style="line-height: 1.5em;" />: (</p><br style="line-height: 1.5em;" /><p style="line-height: 1.5em;"><a style="line-height: 1.5em;" href="http://windows.microsoft.com/ie"><b>Internet Explorer</b></a></p><p><b><a style="line-height: 1.5em;" href="http://getfirefox.com">Firefox</a><b></p><p><b><a href="http://google.com/chrome">Chrome</a><b></p>';

		console.log("Your browser is too old my friend. Time to get a new one perhaps.")
	}

	if(IEpattern.test(browser)){
		var versionNumber = RegExp.$1;
		if(versionNumber == '4.0'){
			blocked(versionNumber);
		}
		if(versionNumber == '5.0'){
			blocked(versionNumber);
		}
		if(versionNumber == '6.0'){
			blocked(versionNumber);
		}
		if(versionNumber == '7.0'){
			blocked(versionNumber);
		}
	}

	if(FFpattern.test(browser)){
		versionNumber = RegExp.$1;
		if(versionNumber <= '14.0'){
			blocked(versionNumber);
		}
	}

	if(Cpattern.test(browser)){
		versionNumber = RegExp.$1;
		if(versionNumber <= '17.0'){
			blocked(versionNumber);
		}
	}

})(jQuery);

/*	***************************************

bgsizer 0.1.2
JQuery Plugin

Author: Matt Lantz
Purpose: This is a much needed tool for implimenting large image backgrounds, 
yet ensuring that they consume the users window size.
 
****************************************** */

(function($){  
    $.fn.bgsizer = function(options) {  
      	var defaults = {  
       		img: '',  
      		color: ''
      	};  
      	var options, thisWindow, timeStamp, aspectRatio;
      
	  	options = $.extend(defaults, options);  
	  	thisWindow = $(window);
	  	timeStamp = new Date().getTime();
	  	$(document.body).prepend('<img id="'+timeStamp+'_bgsizer" src="'+defaults.img+'" style="display: none;" />');
		aspectRatio = $('#'+timeStamp+'_bgsizer').width() / $('#'+timeStamp+'_bgsizer').height();
		  
      	$(window).load(function() {

	        function resizeBg() {

			  	$('#'+timeStamp+'_bgsizer').css({
					position: 'fixed',
					top: 0,
					left: 0,
					zIndex: -1,
					width: '100%',
					display: 'block'
				});
	        }

	       	thisWindow.resize(function() {
	        	resizeBg();
	        }).trigger("resize");

		});
	};  
})(jQuery);

/*	***************************************

jquery.mob.js 0.1
JQuery Plugin

Author: Matt Lantz
Purpose: A client side mobile checker enabling
a couple options for handling such an event.
 
****************************************** */

(function($){
	$.fn.mob = function(options) {

		var defaults = {  
       		url: '',
       		stylesheet: ''
      	};  
      
	  	var options = $.extend(defaults, options); 

		var browser = navigator.userAgent,
			version = navigator.appVersion,
			platform = navigator.platform,
			MobilePattern = new RegExp("Mobile");

		if(MobilePattern.test(browser)){
			console.log("You have a mobile browser");
			if(defaults.stylesheet > ''){
				document.getElementsByTagName("head")[0].innerHTML += defaults.stylesheet;
			}
			if(defaults.url > ''){
				window.location = defaults.url;
			}
		}
	}

})(jQuery);