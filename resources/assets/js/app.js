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


var app = angular.module('orderOnline', []);
app.controller('restaurantController', function($scope, $http) {

	$scope.days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
	
});
