@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-8">
				
			<h1>Update Restaurant Information</h1>
	
			{!! Form::model( $restaurant, ['method' => 'PUT', 'route' => ['restaurants.store', $restaurant->id]]) !!}
				
				<div class="form-group">
					{!! Form::label('name','Restaurant Name', ['class' => 'control-label']) !!}
					{!! Form::text('name', null, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('contactName','Contact Name', ['class' => 'control-label']) !!}
					{!! Form::text('contactName', null, ['class' => 'form-control']) !!}
				</div>											

				<div class="form-group">
					{!! Form::label('country', null, ['class' => 'control-label']) !!}
					{!! Form::select('country', $countries, $restaurant->countryCode, ['class' => 'form-control']) !!}
				</div>	

				<div class="form-group">
					{!! Form::label('telephone', null, ['class' => 'control-label']) !!}
					{!! Form::text('telephone', null, ['class' => 'form-control', 'id' => 'mobile']) !!}
				</div>	

				<div class="form-group">
					{!! Form::label('address',null, ['class' => 'control-label']) !!}
					{!! Form::textarea('address', null, ['class' => 'form-control', 'rows' => 3]) !!}
				</div>	
	
				<div class="form-group">
					{!! Form::label('cuisine', 'Primary Cuisine', ['class' => 'control-label']) !!}
					{!! Form::select('cuisine', $cuisines, null, ['class' => 'form-control']) !!}
				</div>	

				<div class="form-group">
					<label class="checkbox-inline">
					{!! Form::checkbox('hasDelivery', 1) !!} Does your restaurant have delivery?
					</label>
				</div>	

				<div class="form-group">
					{!! Form::submit('Submit Restaurant', ['class' => 'btn btn-primary']) !!}
				</div>

			{!! Form::close() !!}

		</div>

		<div class="col-md-4">

		</div>

	</div>
@endsection