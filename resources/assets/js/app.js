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


// var app = angular.module('orderOnline', [], function($interpolateProvider) {
// 	$interpolateProvider.startSymbol('<%');
// 	$interpolateProvider.endSymbol('%>');
// });

var app = angular.module('orderOnline', []);

app.controller('restaurantController', function($scope, $http) {

	//$scope.days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
	//$scope.timings = [{"day":"Sunday","open":"11:30 AM","close":"11:30 AM","dayoff":"0"},{"day":"Monday","open":"11:30 AM","close":"11:30 AM","dayoff":"0"},{"day":"Tuesday","open":"11:30 AM","close":"11:30 AM","dayoff":"0"},{"day":"Wednesday","open":"11:30 AM","close":"11:30 AM","dayoff":"0"},{"day":"Thursday","open":"11:30 AM","close":"11:30 AM","dayoff":"0"},{"day":"Friday","open":"11:30 AM","close":"11:30 AM","dayoff":"1"},{"day":"Saturday","open":"11:30 AM","close":"11:30 AM","dayoff":"1"}];

	$scope.restaurantId = 25;
	$scope.restaurantTimings = [];
	
	$scope.timings = ['8:00 AM', '8:00PM'];



	$http.get('http://order-online.dev/dashboard/restaurants/' + $scope.restaurantId + '/timings') //change the id
			.success(function(response,status,header,config) {
				$scope.restaurantTimings = JSON.parse(response.data.schedule);
			});
	
});
