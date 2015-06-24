$(document).ready( function() {

	$("#mobile").intlTelInput({
		autoFormat: true,
		nationalMode: false,
		autoHideDialCode: false,
		defaultCountry: "auto",
		geoIpLookup: function(callback) {
			$.get('http://ipinfo.io', function() {}, "jsonp").always(function(resp) {
			  var countryCode = (resp && resp.country) ? resp.country : "";
			  callback(countryCode);
			});
		},		
		utilsScript: "/lib/libphonenumber/build/utils.js"

	});

	$('.timepicker').timepicker();
});

// CKEDITOR.editorConfig = function( config )
// {
// 	config.extraPlugins = 'image2';
// };