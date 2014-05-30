/*

	----------------------------------------------------------------------------------------------------
	Accessible News Slider
	----------------------------------------------------------------------------------------------------
	
	Author:
	Brian Reindel
	
	Author URL:
	http://blog.reindel.com

	License:
	Unrestricted. This script is free for both personal and commercial use.

*/

jQuery.fn.accessNews = function( settings ) {
	settings = jQuery.extend({
        headline : "Top Stories",
        speed : "normal",
		slideBy : 2
    }, settings);
    return this.each(function() {
		jQuery.fn.accessNews.run( jQuery( this ), settings );
    });
};
jQuery.fn.accessNews.run = function( $this, settings ) {
	jQuery( ".javascript_css", $this ).css( "display", "none" );
	var ul = jQuery( "ul:eq(0)", $this );
	var li = ul.children();
	if ( li.length > settings.slideBy ) {
		var $next = jQuery( ".next", $this );
		var $back = jQuery( ".back", $this );
		var liWidth = jQuery( li[0] ).width();
		var animating = false;
		ul.css( "width", ( li.length * liWidth ) );
		$next.click(function() {
			if ( !animating ) {
				animating = true;
				offsetLeft = parseInt( ul.css( "left" ) ) - ( liWidth * settings.slideBy );
				if ( offsetLeft + ul.width() > 0 ) {
					$back.css( "display", "block" );
					ul.animate({
						left: offsetLeft
					}, settings.speed, function() {
						if ( parseInt( ul.css( "left" ) ) + ul.width() <= liWidth * settings.slideBy ) {
							$next.css( "display", "none" );
						}
						animating = false;
					});
				} else {
					animating = false;
				}
			}
			return false;
		});
		$back.click(function() {
			if ( !animating ) {
				animating = true;
				offsetRight = parseInt( ul.css( "left" ) ) + ( liWidth * settings.slideBy );
				if ( offsetRight + ul.width() <= ul.width() ) {
					$next.css( "display", "block" );
					ul.animate({
						left: offsetRight
					}, settings.speed, function() {
						if ( parseInt( ul.css( "left" ) ) == 0 ) {
							$back.css( "display", "none" );
						}
						animating = false;
					});
				} else {
					animating = false;
				}
			}
			return false;
		});
		$next.css( "display", "block" )
			//.parent().after( [ "<p class=\"view_all\">", settings.headline, " - ", li.length, " total ( <a href=\"#\">view all</a> )</p>" ].join( "" ) );
		jQuery( ".view_all > a, .skip_to_news > a", $this ).click(function() {
			var skip_to_news = ( jQuery( this ).html() == "Skip to News" );
			if ( jQuery( this ).html() == "view all" || skip_to_news ) {
				ul.css( "width", "auto" ).css( "left", "0" );
				$next.css( "display", "none" );
				$back.css( "display", "none" );
				if ( !skip_to_news ) {
					jQuery( this ).html( "view less" );
				}
			} else {
				if ( !skip_to_news ) {
					jQuery( this ).html( "view all" );
				}
				ul.css( "width", ( li.length * liWidth ) );
				$next.css( "display", "block" );
			}
			return false;
		});
	}
};