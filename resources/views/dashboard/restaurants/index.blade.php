@extends('layouts.admin')

@section('content')
	
	<h1>Restaurants</h1>

	<table class="table table-hover restaurants" border="0">
		<tbody>
			@foreach( $userRestaurants as $restaurant )
			<tr>
				<td width="130">
					{!! getLogo($restaurant->logo) !!}
				</td>
				<td>
					<h3 class="clear-margin-top">{{ $restaurant->name }}</h3>
					<p>{!! str_limit($restaurant->description,300,'...') !!}</p>
					<a href="{{ route('dashboard.restaurants.edit', $restaurant->id) }}" class="btn btn-default"><i class="fa fa-pencil"></i></a>
					<a href="{{ route('dashboard.restaurants.menus.index', $restaurant->id) }}" class="btn btn-default"><i class="fa fa-eye"></i></a>
				</td>
				<td class="text-right">
					
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection