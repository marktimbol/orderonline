<?php

View::composer( [
			'pages.restaurants.create',
			'pages.restaurants.edit',
			'dashboard.restaurants.edit',
		], 'App\Composers\RestaurantComposer');