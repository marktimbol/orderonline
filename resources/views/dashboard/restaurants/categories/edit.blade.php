@extends('layouts.admin')

@section('content')
	
	<h1>Edit Category</h1>

	<hr />
	
	<div class="col-md-6">
		{!! Form::model($category, ['method' => 'PUT', 'route' => ['dashboard.restaurants.categories.update', $restaurant->id, $category->id]]) !!}

			@include('dashboard.restaurants.categories._form', ['btnText' => 'Update Category'])

		{!! Form::close() !!}
	</div>
	
@endsection