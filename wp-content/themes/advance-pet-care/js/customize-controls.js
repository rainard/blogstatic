( function( api ) {

	// Extends our custom "advance-pet-care" section.
	api.sectionConstructor['advance-pet-care'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );