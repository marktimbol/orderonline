@extends('layouts.admin')

@section('content')
	
	<h1>New Menu</h1>

	<hr />
		
	<div class="row">
		<div class="col-md-6" ng-controller="CreateMenuController">
			{!! Form::open(['route' => ['dashboard.restaurants.menus.store', $restaurant->id], 'files' => true]) !!}

				{!! Form::hidden('restaurant_id', $restaurant->id) !!}
				
				<div class="form-group">
					{!! Form::label('category', null, ['class' => 'control-label']) !!}
					{!! Form::select('category', $categories, null, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('name', null, ['class' => 'control-label']) !!}
					{!! Form::text('name', null, ['class' => 'form-control']) !!}
				</div>	

				<div class="form-group">
					{!! Form::label('description', null, ['class' => 'control-label']) !!}
					{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
				</div>	

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							{!! Form::label('price', null, ['class' => 'control-label']) !!}
							<div class="input-group">
								{!! Form::text('price', null, ['class' => 'form-control']) !!}
								<div class="input-group-addon">{{$restaurant->currency}}</span></div>
								
							</div>
						</div>
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('image', null, ['class' => 'control-label']) !!}
					{!! Form::file('image', ['class' => 'form-control']) !!}
				</div>


				<div class="form-group">
					{!! Form::submit('Save Menu', ['class' => 'btn btn-primary']) !!}
				</div>		
			{!! Form::close() !!}
		</div>
	</div>
@endsection