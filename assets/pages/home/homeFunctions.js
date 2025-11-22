import Carousel from '../../common-sass/bootstrap/js/dist/carousel';
import owlCarousel from '../../common-sass/owl.carousel/dist/owl.carousel';

window.IsotopeMB = require('../../common-sass/media-boxes/plugin/components/Isotope/jquery.isotope');

require('../../common-sass/media-boxes/plugin/components/imagesLoaded/jquery.imagesLoaded.min');
require('../../common-sass/media-boxes/plugin/components/Transit/jquery.transit.min');
require('../../common-sass/media-boxes/plugin/components/jQuery Easing/jquery.easing');
require('../../common-sass/media-boxes/plugin/components/jQuery Visible/jquery.visible.min');
require('../../common-sass/media-boxes/plugin/components/Modernizr/modernizr.custom.min');
require('../../common-sass/media-boxes/plugin/components/Magnific Popup/jquery.magnific-popup.min');

require('../../common-sass/media-boxes/plugin/js/jquery.mediaBoxes.dropdown');
require('../../common-sass/media-boxes/plugin/js/jquery.mediaBoxes');

let homeFunctions = new(function() {
    //CAROUSEL HOME BOOTSTRAP CON ANIMACION CSS3 ANIMATE
    this.carouselHomeBootstrapAnimateCSS3 = function() {
        //Function to animate slider captions
        function doAnimations(elems) {
            //Cache the animationend event in a variable
            var animEndEv = "webkitAnimationEnd animationend";

            elems.each(function() {
              var $this = $(this),
                $animationType = $this.data("animation");
              $this.addClass($animationType).one(animEndEv, function() {
                $this.removeClass($animationType);
              });
            });
        }

        //Variables on page load
        var $myCarousel = $("#carouselHome"),
            $firstAnimatingElems = $myCarousel
                .find(".carousel-item:first")
                .find("[data-animation ^= 'animated']");

        //Initialize carousel
        $myCarousel.carousel();

        //Animate captions in first slide on page load
        doAnimations($firstAnimatingElems);

        //Other slides to be animated on carousel slide event
        $myCarousel.on("slide.bs.carousel", function(e) {
            var $animatingElems = $(e.relatedTarget).find(
              "[data-animation ^= 'animated']"
            );
            doAnimations($animatingElems);
        });
    }
    //Carrousel Home Owl
    this.carouselHomeOwl = function(){
        let owlCarouselHome = $('.owl-carousel-slider');
        $(owlCarouselHome).owlCarousel({
            animateOut: 'fadeOut',
            //animateOut: 'slideOutDown',
            //animateIn: 'flipInX',
            items:1,
            dots:false,
            //navText:['<i class="fa-solid fa-arrow-left fa-fw fa-2xl"></i>','<i class="fa-solid fa-arrow-right fa-fw fa-2xl"></i>'],
            autoplay:true,
            autoplayTimeout:1600,
            autoplayHoverPause:true
        });
    };
    //Media Boxes Todos los productos
    this.mediaBoxesHome = function(){
        $('#gridProductHome').mediaBoxes({
            filterContainer: '#filter',
	    	search: '#search',
            sortContainer: '#sort',
	    	overlayEffect: 'push-up',
	    	columns: 3,
	    	boxesToLoadStart: 6,
	    	boxesToLoad: 6,
	    	horizontalSpaceBetweenBoxes: 30,
        	verticalSpaceBetweenBoxes: 30,
        	getSortData: {
	          title: '.media-box-title',
	          categories: '.media-box-carbon-footprint'
	        },
            minBoxesPerFilter: 999,
        	deepLinkingOnFilter: false,
        	popup: 'magnificpopup'
        });
    };
    //función de arranque
    this.init = function() {
        homeFunctions.carouselHomeBootstrapAnimateCSS3();
        homeFunctions.carouselHomeOwl();
        homeFunctions.mediaBoxesHome();
    }
});
$(document).ready(function() {
    homeFunctions.init();
});