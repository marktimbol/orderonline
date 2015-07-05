@extends('layouts.admin')

@section('content')
	
	<h1>Menus
		<a href="{{route('dashboard.restaurants.menus.create', $restaurant->id)}}" class="btn btn-default btn-sm"><i class="fa fa-plus-circle"></i> New</a>
	</h1>
		
	<table class="table table-hover restaurants" border="0">
		<tbody>
			@if($menus->count() > 0 )
				@foreach($menus as $menu)
				<tr>
					<td width="180">{!! getLogo($menu->image) !!}</td>
					<td>
						<h3 class="clear-margin-top">{{$menu->name}}</h3>
						<p>{{$menu->description}}</p>
						<a href="{{ route('dashboard.restaurants.menus.edit', [$restaurant->id, $menu->id]) }}" class="btn btn-default"><i class="fa fa-pencil"></i></a>
					</td>
				</tr>
				@endforeach
			@endif
		</tbody>
	</table>
@endsection