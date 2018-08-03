'use strict';
var $         = require( 'gulp-load-plugins' )(),
	glob      = require( 'glob' ),
	files     = glob( 'src/*', { sync: true } ),
	mainTheme = files[ 0 ].replace( 'src/', '' )

module.exports = function( error ) {
	$.notify( {
		title: mainTheme + ' | ' + error.plugin,
		subtitle: 'Failed!',
		message: 'See console for more info.',
		sound: true
	} ).write( error )

	$.util.log( $.util.colors.red( error.message ) )

	// Prevent the 'watch' task from stopping
	this.emit( 'end' )
};