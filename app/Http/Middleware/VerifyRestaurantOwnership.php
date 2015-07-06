<?php namespace App\Http\Middleware;

use Closure;
use Auth;

class VerifyRestaurantOwnership {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$restaurant = $request->route()->parameter('restaurants');
		if( Auth::user()->hasAccessTo($restaurant) ) {
			return $next($request);
		}

		return redirect()->route('forbidden');
	}

}
