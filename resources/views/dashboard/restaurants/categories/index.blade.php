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
						<!-- Single button -->
						<div class="btn-group">
							<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Action <span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<li>
									<a href="{{route('dashboard.restaurants.categories.edit', [$restaurant->id, $category->id])}}">Edit</a>
								</li>
								<li>
									{!! Form::open(['method' => 'DELETE', 'route' => ['dashboard.restaurants.categories.destroy', $restaurant->id, $category->id]]) !!}
										{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm btn-block']) !!}				
									{!! Form::close() !!}
								</li>
							</ul>
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