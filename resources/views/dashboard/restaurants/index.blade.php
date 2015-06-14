@extends('layouts.admin')

@section('content')
	
	<h1>Restaurants</h1>

	<table class="table table-hover restaurants" border="0">
		<tbody>
			@foreach( $userRestaurants as $restaurant )
			<tr>
				<td width="130">
					<img src="http://placehold.it/100x100" class="img-circle" title="" alt="" />
				</td>
				<td>
					<h3>{{ $restaurant->name }}</h3>
					<p>Description</p>
				</td>
				<td class="text-right">
					<a href="{{ route('dashboard.restaurants.edit', $restaurant->id) }}" class="btn btn-default"><i class="fa fa-pencil"></i></a>
					<a href="#" class="btn btn-default"><i class="fa fa-eye"></i></a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection