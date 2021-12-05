(function($) {
	$('.entry-header .circle').click(function() {
        $('html, body').animate({
            scrollTop: jQuery('.entry-content').offset().top
        });
    });
})( jQuery );
