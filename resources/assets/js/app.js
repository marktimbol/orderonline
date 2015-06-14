$(document).ready( function() {

	$("#mobile").intlTelInput({
		autoFormat: true,
		nationalMode: false,
		autoHideDialCode: false,
		utilsScript: "/lib/libphonenumber/build/utils.js"

	});
});

var app = angular.module('orderOnline', []);
app.controller('restaurantController', function($scope, $http) {

	//$scope.hasDelivery = false;

});
