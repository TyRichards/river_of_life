jQuery(function($) {
	$(document).ready(function() {
		
		// When clicked anywhere, close the dropdown
		$(document).click(function() {
			$('div.subnav-menu').fadeOut(300);
		});
		
		// Don't close dropdown when clicked on the div
		$('#nav-im-new, #nav-mission, #nav-connect, #nav-messages, #nav-give').click(function(e) {
			e.stopPropagation();
		});
		
		function ddSlide(handler, target) {
			$(handler).click(function(e) {
				$(target).fadeToggle(300).siblings("div.subnav-menu").hide();
				e.preventDefault();
				e.stopPropagation();
		  });
		}
		
		// Dropdown
		ddSlide('li#menu-item-337 a', '#nav-im-new');
		ddSlide('li#menu-item-338 a', '#nav-mission');
		ddSlide('li#menu-item-339 a', '#nav-connect');
		ddSlide('li#menu-item-340 a', '#nav-messages');
		ddSlide('li#menu-item-341 a', '#nav-give');
	
		// Initially hide the boxes
		$('.archive-boxes').hide();
		
		// Message Archive Toggle Effect
		$('h2#message-archive').click(function() {
			$this = $(this);
			if ( $this.attr('class') == 'closed' ) {
				$this.removeClass('closed').addClass('opened');
			} else {
				$this.removeClass('opened').addClass('closed');
			}
			
			$('.archive-boxes').slideToggle(300);
		});
		
		// Add last class to 4th element of team members
		$('.team-row .team:nth-child(4n)').addClass('last');
		
		// Add last class to 4th element of ministry boxes
		$('.ministry-boxes .ministry-item:nth-child(4n)').addClass('last');
		
		// Set equal heights on ministry boxes using EqualHeights jQuery Plugin - http://www.cssnewbie.com/equalheights-jquery-plugin/

		$(".ministry-boxes .ministry-item").equalHeights();
		
		$('.boxes .box h4 a').equalHeights();
		
		// Placeholder image functionality on live page
		
		// Hiding the iframe initially - Fixed weird CSS bug
		$('iframe.livestream-video').hide();
		
		// Once the image is clicked lets show the iframe
		$('img.play-image').click(function() {
			$(this).hide();
			$('iframe.livestream-video').show();
		});
		
		// When watch live button is clicked
		$('.watch-live').click(function() {
			$('.live-menu').slideToggle(300);
		});
		
		// Dont slide up when dropdown or links are clicked
		jQuery('.watch-live, .live-menu').click(function(e) {
			e.stopPropagation();
		});
				
		// Slide up when the document is clicked
		jQuery(document).click(function() {
			jQuery('.live-menu').slideUp(300);
		});
		
	});
});