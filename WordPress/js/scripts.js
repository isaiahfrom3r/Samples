jQuery(document).ready(function() {

	themeURL = WPURLS.themeurl;
    siteURL = WPURLS.siteurl;

	jQuery('ul#primary li.menu-item-has-children > a').append('<i class="fas fa-angle-down"></i>');
	jQuery('#mobile-menu li.menu-item-has-children > a').append('<i class="fas fa-angle-down"></i>');
	jQuery('.nav-button > a').append('<i class="fas fa-angle-right"></i>');

	jQuery('ul#primary li.menu-item ul.sub-menu li a').wrapInner( "<span></span>");

	jQuery('iframe').wrap( "<div class='embed-container'></div>");


	//Fade in hero text
	jQuery('.hero-text-wrapper').removeClass('off')

	//Show mobile menu
    jQuery(".openmenu").click(function() {

    });
	jQuery("#mobile-menu a[href='#']").click(function(event) {
		event.preventDefault();
	});
	jQuery(".menu-item-has-children").click(function(event) {
		//jQuery('.sub-menu').removeClass('opened');
		jQuery(this).find('.sub-menu').toggleClass('opened');
	});

	//Show mobile menu
    jQuery(".openmenu").click(function() {
        jQuery("body").toggleClass('menu-opened');
		jQuery("#mobile-menu-container").toggleClass('hide');
		jQuery(".openmenu .hamburger").toggleClass('is-active');
    });
	jQuery("#mobile-menu a[href='#']").click(function(event) {
		event.preventDefault();
	});
	jQuery(".menu-item-has-children").click(function(event) {
		//jQuery('.sub-menu').removeClass('opened');
		jQuery(this).find('a i').toggleClass('opened');
		jQuery(this).find('.sub-menu').toggleClass('opened');
	});


	//Open Search
	jQuery(".search-trigger").click(function() {
		jQuery(".navsearch").toggleClass('search-opened');
	});

	// Search appear
    jQuery(".navsearch, .search-box .close-x").click(function(event) {
		event.preventDefault();
		jQuery(".mega-menu").hide();
		jQuery(".login-box").hide();
		jQuery(".search-box").toggle();
	});



	//Process tabs
	jQuery(".process-step").click(function() {
		jQuery(".process-step").removeClass('active');
		jQuery(this).addClass('active');
		var videoSlide = jQuery(this).data('video');
		jQuery(".process-video").removeClass('active');
		jQuery("#process-"+videoSlide).addClass('active');
	});



	jQuery('.btt').on('click', function(){
        jQuery('html,body').animate({scrollTop:jQuery('html,body').offset().top}, 500);
    });
    jQuery(window).on('scroll resize', bttScroll);

    function bttScroll() {
        if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
           jQuery('.btt').addClass('on');
        } else {
           jQuery('.btt').removeClass('on');
        }
    }

	//Get Querystring values
	function GetParameterValues(param) {
		var url = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
		for (var i = 0; i < url.length; i++) {
			var urlparam = url[i].split('=');
			if (urlparam[0] == param) {
				return urlparam[1];
			}
		}
	}


	jQuery.fn.extend({
		toggleText: function(a, b){
			return this.text(this.text() == b ? a : b);
		}
	});



	    // =========== ANIMATIONS ============== //
		// Init controller
		var controller = new ScrollMagic.Controller({
		  globalSceneOptions: {
			//duration: $('section').height(),
			//duration: "100%",
			//triggerHook: .025,
			reverse: true
		  }
		});


		// Change behaviour of controller
		// to animate scroll instead of jump
		controller.scrollTo(function(target) {

		  TweenMax.to(window, 0.5, {
			scrollTo : {
			  y : target,
			  autoKill : true // Allow scroll position to change outside itself
			},
			ease : Cubic.easeInOut
		  });

		});

		// show mic stand
		var scene = new ScrollMagic.Scene({
			triggerElement: "#intro",
			triggerHook: 0.5,
		})
			.setClassToggle(".mic-stand", "active")
			//.addIndicators({name: "trigger"}) // add indicators (requires plugin)
			.addTo(controller);

	// show gears
		var scene = new ScrollMagic.Scene({
			triggerElement: "#process",
			triggerHook: 0.7,
		})
			.setClassToggle("#process .gears", "active")
			//.addIndicators({name: "trigger"}) // add indicators (requires plugin)
			.addTo(controller);

		var scene = new ScrollMagic.Scene({
			triggerElement: "#statistics",
			triggerHook: 0.7,
		})
			.setClassToggle("#statistics .gears", "active")
			//.addIndicators({name: "trigger"}) // add indicators (requires plugin)
			.addTo(controller);

	// show starburst
		var scene = new ScrollMagic.Scene({
			triggerElement: ".process-videos-wrapper",
			triggerHook: 0.5,
		})
			.setClassToggle(".starburst", "active")
			//.addIndicators({name: "trigger"}) // add indicators (requires plugin)
			.addTo(controller);

	var scene = new ScrollMagic.Scene({
			triggerElement: "#engagement",
			triggerHook: 0.5,
		})
			.setClassToggle(".starburst", "active")
			//.addIndicators({name: "trigger"}) // add indicators (requires plugin)
			.addTo(controller);

	// show pennants
		var scene = new ScrollMagic.Scene({
			triggerElement: "#engagement",
			triggerHook: 1,
		})
			.setClassToggle(".pennants", "active")
			//.addIndicators({name: "trigger"}) // add indicators (requires plugin)
			.addTo(controller);

	 // show super pennant
		var scene = new ScrollMagic.Scene({
			triggerElement: "#transformation",
			triggerHook: 0.5,
		})
			.setClassToggle("#transformation .super-pennant", "active")
			//.addIndicators({name: "trigger"}) // add indicators (requires plugin)
			.addTo(controller);

	// show bird on branch
		var scene = new ScrollMagic.Scene({
			triggerElement: "#transformation",
			triggerHook: 0,
		})
			.setClassToggle("#transformation .bird-on-branch", "active")
			//.addIndicators({name: "trigger"}) // add indicators (requires plugin)
			.addTo(controller);

	// show megaphone
		var scene = new ScrollMagic.Scene({
			triggerElement: "#engagement",
			triggerHook: 0.5,
		})
			.setClassToggle(".megaphone", "active")
			//.addIndicators({name: "trigger"}) // add indicators (requires plugin)
			.addTo(controller);

	// show lightbulb
		var scene = new ScrollMagic.Scene({
			triggerElement: "#community",
			triggerHook: 1,
		})
			.setClassToggle("#community .lightbulb", "active")
			//.addIndicators({name: "trigger"}) // add indicators (requires plugin)
			.addTo(controller);

		var scene = new ScrollMagic.Scene({
			triggerElement: "#statistics",
			triggerHook: 0.5,
		})
			.setClassToggle("#statistics .lightbulb", "active")
			//.addIndicators({name: "trigger"}) // add indicators (requires plugin)
			.addTo(controller);

	// show trophy
		var scene = new ScrollMagic.Scene({
			triggerElement: "#final-band",
			triggerHook: 1,
		})
			.setClassToggle(".trophy", "active")
			//.addIndicators({name: "trigger"}) // add indicators (requires plugin)
			.addTo(controller);

	// show play board
		var scene = new ScrollMagic.Scene({
			triggerElement: "#experience",
			triggerHook: 0.5,
		})
			.setClassToggle("#experience .play-board", "active")
			//.addIndicators({name: "trigger"}) // add indicators (requires plugin)
			.addTo(controller);

	// final band images
		var scene = new ScrollMagic.Scene({
			triggerElement: "#final-band",
			triggerHook: 0.5,
		})
			.setClassToggle(".cloud1", "active")
			//.addIndicators({name: "trigger"}) // add indicators (requires plugin)
			.addTo(controller);

		var scene = new ScrollMagic.Scene({
			triggerElement: "#final-band",
			triggerHook: 0.5,
		})
			.setClassToggle(".cloud2", "active")
			//.addIndicators({name: "trigger"}) // add indicators (requires plugin)
			.addTo(controller);

		var scene = new ScrollMagic.Scene({
			triggerElement: "#final-band",
			triggerHook: 0.5,
		})
			.setClassToggle(".final-band-image", "active")
			//.addIndicators({name: "trigger"}) // add indicators (requires plugin)
			.addTo(controller);

	// show giftbox
		var scene = new ScrollMagic.Scene({
			triggerElement: "#solutions-intro",
			triggerHook: 0.5,
		})
			.setClassToggle("#solutions-intro .giftbox", "active")
			//.addIndicators({name: "trigger"}) // add indicators (requires plugin)
			.addTo(controller);


	// show foam finger
		var scene = new ScrollMagic.Scene({
			triggerElement: "#commitment",
			triggerHook: 0.5,
		})
			.setClassToggle("#commitment .foam-finger", "active")
			//.addIndicators({name: "trigger"}) // add indicators (requires plugin)
			.addTo(controller);

	// show champagne
		var scene = new ScrollMagic.Scene({
			triggerElement: ".row-2",
			triggerHook: 0.5,
		})
			.setClassToggle(".row-2 .champagne", "active")
			//.addIndicators({name: "trigger"}) // add indicators (requires plugin)
			.addTo(controller);

	// show gift card
		var scene = new ScrollMagic.Scene({
			triggerElement: ".row-3",
			triggerHook: 0.5,
		})
			.setClassToggle(".row-3 .gift-card", "active")
			//.addIndicators({name: "trigger"}) // add indicators (requires plugin)
			.addTo(controller);


/*
	// Lock btt when footer is revealed
		var scene = new ScrollMagic.Scene({
			triggerElement: "#footer",
			triggerHook: 1,
		})
			.setClassToggle(".btt", "bottomed")
			//.addIndicators({name: "trigger"}) // add indicators (requires plugin)
			.addTo(controller);
*/


});
