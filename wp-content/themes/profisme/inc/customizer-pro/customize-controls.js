( function( api ) {

	// Extends our custom "profisme" section.
	api.sectionConstructor['profisme'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
