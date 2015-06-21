$(document).ready( function() {

	$("#mobile").intlTelInput({
		autoFormat: true,
		nationalMode: false,
		autoHideDialCode: false,
		utilsScript: "/lib/libphonenumber/build/utils.js"

	});

	$('.timepicker').timepicker();
});

CKEDITOR.editorConfig = function( config )
{
	config.extraPlugins = 'image2';
};