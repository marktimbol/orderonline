@extends('layouts.admin')

@section('content')
	
	<h1>Restaurants</h1>

	<table class="table table-hover restaurants" border="0">
		<tbody>
			@foreach( $userRestaurants as $restaurant )
			<tr>
				<td width="130">
					@if($restaurant->logo)
						<img src="/images/uploads/{{$restaurant->logo}}" width="100" height="100" class="img-circle" title="" alt="" />
					@else
						<img src="http://placehold.it/100x100" width="100" height="100" class="img-circle" title="" alt="" />
					@endif
				</td>
				<td>
					<h3>{{ $restaurant->name }}</h3>
					<p>{!! str_limit($restaurant->description,300,'...') !!}</p>
					<a href="{{ route('dashboard.restaurants.edit', $restaurant->id) }}" class="btn btn-default"><i class="fa fa-pencil"></i></a>
					<a href="#" class="btn btn-default"><i class="fa fa-eye"></i></a>
				</td>
				<td class="text-right">
					
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection