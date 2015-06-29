@extends('layouts.admin')

@section('content')
	
	<h1>New Category</h1>

	<hr />
		
	<div class="col-md-6">
		{!! Form::open(['route' => ['dashboard.restaurants.categories.store', $restaurant->id]]) !!}
			@include('dashboard.restaurants.categories._form', ['btnText' => 'Store Category'])
		{!! Form::close() !!}
	</div>
	
@endsection