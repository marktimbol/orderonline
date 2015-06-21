// var app = angular.module('orderOnline', [], function($interpolateProvider) {
// 	$interpolateProvider.startSymbol('<%');
// 	$interpolateProvider.endSymbol('%>');
// });

var app = angular.module('orderOnline', []);

app.controller('restaurantController', function($scope, $http) {

	//$scope.days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
	//$scope.timings = [{"day":"Sunday","open":"11:30 AM","close":"11:30 AM","dayoff":"0"},{"day":"Monday","open":"11:30 AM","close":"11:30 AM","dayoff":"0"},{"day":"Tuesday","open":"11:30 AM","close":"11:30 AM","dayoff":"0"},{"day":"Wednesday","open":"11:30 AM","close":"11:30 AM","dayoff":"0"},{"day":"Thursday","open":"11:30 AM","close":"11:30 AM","dayoff":"0"},{"day":"Friday","open":"11:30 AM","close":"11:30 AM","dayoff":"1"},{"day":"Saturday","open":"11:30 AM","close":"11:30 AM","dayoff":"1"}];

	$scope.countryCode = '';
	$scope.countries = [];
	$scope.restaurantId = 24;
	$scope.restaurantTimings = [];
	$scope.timeRange = [];
	$scope.openTime;
	$scope.closeTime;

	$http.get('http://order-online.dev/countries')
			.success(function(response) {
				$scope.countries = response.data;
			});

	$http.get('http://order-online.dev/time-range')
			.success(function(response) {
				$scope.timeRange = response.data;
			});

	$http.get('http://order-online.dev/restaurant-timings/24')
			.success(function(response) {
				$scope.restaurantTimings = JSON.parse(response.data.schedule);
			});
	
});
