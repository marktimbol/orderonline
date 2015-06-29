@extends('layouts.admin')

@section('content')
	
	<h1>Categories
		<a href="{{route('dashboard.restaurants.categories.create', $restaurant->id)}}" class="btn btn-default btn-sm"><i class="fa fa-plus-circle"></i> New</a>
	</h1>

	<hr />
		
	<table class="table table-bordered" border="0">
		<thead>
			<tr>
				<th>Name</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			@if($categories->count() > 0)
				@foreach($categories as $category)
				<tr>
					<td>{{$category->name}}</td>
					<td>
						<div class="btn-group">
							<a href="{{route('dashboard.restaurants.categories.edit', [$restaurant->id, $category->id])}}" class="btn btn-default btn-sm">Edit</a>

							{!! Form::open(['method' => 'DELETE', 'route' => ['dashboard.restaurants.categories.destroy', $restaurant->id, $category->id]]) !!}
								{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}							
							{!! Form::close() !!}
						</div>
					</td>
				</tr>
				@endforeach
			@else
				<tr>
					<td colspan="2">No Record</td>
				</tr>
			@endif
		</tbody>
	</table>
@endsection