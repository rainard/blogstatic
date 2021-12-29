( function( $ ){
// Admin Notice For Premium Version
 $( document ).on( 'click', '.notice-ct-premium-class .notice-dismiss', function () {
	  // Read the "data-notice" information to track which notice
	  // is being dismissed and send it via AJAX
	  var type = $( this ).closest( '.notice-ct-premium-class' ).data( 'notice' );
	  // Make an AJAX call
	  $.ajax( ajaxurl,
		 {
			type: 'POST',
			data: {
			  action: 'ct_premium_notice_handler',
			  type: type,
			}
		 } );
	} );
}( jQuery ) )