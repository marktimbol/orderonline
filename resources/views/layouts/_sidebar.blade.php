@if(Route::is('dashboard.restaurants.menus.index'))
	<div id="sidebar-wrapper">
		<ul class="sidebar-nav">
			<li class="text-center">
				<img src="/images/uploads/{{$restaurant->logo}}" width="150" class="img-thumbnail" alt="" title="" />
			</li>
			<li class="sidebar-brand text-center"><a href="#">{{$restaurant->name}}</a></li>	
			<li>Address</li>	
			<li><a href="{{ route('dashboard.restaurants.categories.index', $restaurant->id) }}">Categories</a></li>
		    <li><a href="#">Products</a></li>
		   
		</ul>
	</div>
@else

	<div id="sidebar-wrapper">
		<ul class="sidebar-nav">
			<li class="sidebar-brand"><a href="#">Dashboard</a></li>		
		    <li><a href="#">My Account</a></li>
		    <li><a href="{{ route('dashboard.restaurants.index') }}">My Restaurants</a> </li>
		</ul>
	</div>

@endif