jQuery(document).ready(function($){

	// Cache the window object
	var $window = $(window);

	// Parallax background effect
	$('section[data-type="background"]').each(function() {
		var $bgobj = $(this); // assigning the object

		$(window).scroll(function() {

			// scroll the background at var speed
			// the yPos is a negative value because we're scrolling it up

			var yPos = -($window.scrollTop() / $bgobj.data('speed'));

			// Put together our final background position
			var coords = '50% '+ yPos + 'px';

			// Move the background
			$bgobj.css({ backgroundPosition: coords })

		}); // End winsdow scroll

	}); 

	$('.flexslider').flexslider({
		animation: "slide",
		controlNav: false,
		pauseOnHover: true
	});

	loadGallery(true, 'a.show');

	    //This function disables buttons when needed
	    function disableButtons(counter_max, counter_current){
	        $('#show-previous-image, #show-next-image').show();
	        if(counter_max == counter_current){
	            $('#show-next-image').hide();
	        } else if (counter_current == 1){
	            $('#show-previous-image').hide();
	        }
	    }

    /**
     *
     * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
     * @param setClickAttr  Sets the attribute for the click handler.
     */

    function loadGallery(setIDs, setClickAttr){
        var current_image,
            selector,
            counter = 0;

        $('#show-next-image, #show-previous-image').click(function(){
            if($(this).attr('id') == 'show-previous-image'){
                current_image--;
            } else {
                current_image++;
            }

            selector = $('[data-image-id="' + current_image + '"]');
            updateGallery(selector);
        });

        function updateGallery(selector) {
            var $sel = selector;
            current_image = $sel.data('image-id');
            $('#image-gallery-caption').text($sel.data('caption'));
            $('#image-gallery-title').text($sel.data('title'));
            $('#image-gallery-image').attr('src', $sel.data('image'));
            disableButtons(counter, $sel.data('image-id'));
        }

        if(setIDs == true){
            $('[data-image-id]').each(function(){
                counter++;
                $(this).attr('data-image-id',counter);
            });
        }
        $(setClickAttr).on('click',function(){
            updateGallery($(this));
        });
    }

    // duration of animation while going back to top
    var back_duration = 600,
    // scroll position after which 'back to top' button will be visible
    back_offset = 800,
    // store 'back to top' element in variable for easy access
    back_button = $('.tcb-top');
    // animate back to top
    back_button.on('click', function(e){
        e.preventDefault();
        // running jQuery animate function of 
        $('body,html').animate({
			scrollTop: 0 ,
		 	}, back_duration
		);
    })
    // making button direction aware
    var lastScrollTop = 0, delta = 5;
    $(window).on('scroll', function(){
        var scrollTop = $(this).scrollTop();
        if( Math.abs(scrollTop - lastScrollTop) <= delta) return false;
        // show button after offset value
        ( scrollTop > back_offset ) ? back_button.addClass('tcb-top-visible') : back_button.removeClass('tcb-top-visible');
        // check if scrolling down
        if(scrollTop > lastScrollTop){
            back_button.removeClass('tcb-top-fadeIn');
        } else {
            // scrolling up? if yes make it fadeIn
            (back_button.hasClass('tcb-top-visible')) ? back_button.addClass('tcb-top-fadeIn') : back_button.removeClass('tcb-top-fadeIn');
        }
        lastScrollTop = scrollTop;
    });

    $('.screens').flexslider({
		animation: "slide",
	    animationLoop: false,
	    itemWidth: 340,
	    itemMargin: 15,
	    minItems: 1,
	    maxItems: 3
	});

	// store the slider in a local variable
	var $window = $(window),
	  flexslider;

	// tiny helper function to add breakpoints
	function getGridSize() {
	return (window.innerWidth < 600) ? 1 :
	       (window.innerWidth < 1140) ? 2 : 3;
	}

	$window.load(function() {
		$('.screens').flexslider({
		  animation: "slide",
		  animationLoop: false,
		  itemWidth: 340,
		  itemMargin: 15,
		  minItems: getGridSize(), // use function to pull in initial value
		  maxItems: getGridSize() // use function to pull in initial value
		});
	});

	// check grid size on resize event
	$window.resize(function() {
		var gridSize = getGridSize();

		flexslider.vars.minItems = gridSize;
		flexslider.vars.maxItems = gridSize;
	});


});
