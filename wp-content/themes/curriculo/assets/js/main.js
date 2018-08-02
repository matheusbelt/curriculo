jQuery(document).ready(function($) {
	// fitVids.
	$( '.entry-content' ).fitVids();

	// Responsive wp_video_shortcode().
	$( '.wp-video-shortcode' ).parent( 'div' ).css( 'width', 'auto' );

	/**
	 * Odin Core shortcodes
	 */

	// Tabs.
	$( '.odin-tabs a' ).click(function(e) {
		e.preventDefault();
		$(this).tab( 'show' );
	});

	// Tooltip.
	$( '.odin-tooltip' ).tooltip();

	$(window).scroll(function(){
        if ($(window).scrollTop() > 300){
            $('.true-header').css('background', 'white');
            $('.true-header').css('transition', '.3s');
            $('.site-title').css('color', '#333333');
            $('.nav-menu__li').css('color', '#333333');
        }
        else{
        	$('.true-header').css('background', 'rgba(0,0,0,.0)');
            $('.true-header').css('transition', '.3s');
            $('.site-title').css('color', 'white');
            $('.nav-menu__li').css('color', 'white');
        }
    });


});
