@extends('layouts.admin')

@section('content')

	<h1>Update {{ $restaurant->name }}</h1>

	{!! Form::model( $restaurant, ['method' => 'PUT', 'route' => ['dashboard.restaurants.update', $restaurant->id], 'ng-controller' => 'restaurantController']) !!}
		
		<h3 class="form-title">Restaurant Information</h3>

		<div class="form-group">
			{!! Form::label('name','Restaurant Name', ['class' => 'control-label']) !!}
			{!! Form::text('name', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('description',null, ['class' => 'control-label']) !!}
			{!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => 15]) !!}
		</div>		

		<div class="form-group">
			{!! Form::label('telephone', null, ['class' => 'control-label']) !!}
			{!! Form::text('telephone', null, ['class' => 'form-control', 'id' => 'mobile']) !!}
		</div>	

		<div class="form-group">
			{!! Form::label('workingHours', 'Working Hours', ['class' => 'control-label']) !!}
			{!! Form::text('workingHours', null, ['class' => 'form-control']) !!}
		</div>	

		<div class="form-group">
			{!! Form::label('minimumOrderAmount', 'Minimum Order Amount', ['class' => 'control-label']) !!}
			{!! Form::text('minimumOrderAmount', null, ['class' => 'form-control']) !!}
		</div>	

		<div class="form-group">
			<label class="checkbox-inline">
				{!! Form::checkbox('hasDelivery', $restaurant->hasDelivery, null, ['ng-model' => 'hasDelivery']) !!} Does your restaurant have delivery?
			</label>

		</div>	


		<div ng-show="hasDelivery">
			<div class="form-group">
				{!! Form::label('deliveryCharge', 'Delivery Charge', ['class' => 'control-label']) !!}
				{!! Form::text('deliveryCharge', null, ['class' => 'form-control']) !!}
			</div>		
		</div>

		<div class="form-group">
			{!! Form::label('minimumDeliveryTime', 'Minimum Delivery Time', ['class' => 'control-label']) !!}
			{!! Form::text('minimumDeliveryTime', null, ['class' => 'form-control']) !!}
		</div>	
					
		<div class="form-group">
			{!! Form::label('paymentMethod', 'Payment Method', ['class' => 'control-label']) !!}
			{!! Form::text('paymentMethod', null, ['class' => 'form-control']) !!}
		</div>																							

		<h3 class="form-title">Location</h3>

		<div class="form-group">
			{!! Form::label('country', null, ['class' => 'control-label']) !!}
			{!! Form::select('countryCode', $countries, $restaurant->countryCode, ['class' => 'form-control']) !!}
		</div>	

		<div class="form-group">
			{!! Form::label('city', null, ['class' => 'control-label']) !!}
			{!! Form::text('city', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('zip', null, ['class' => 'control-label']) !!}
			{!! Form::text('zip', null, ['class' => 'form-control']) !!}
		</div>				

		<div class="form-group">
			{!! Form::label('address',null, ['class' => 'control-label']) !!}
			{!! Form::textarea('address', null, ['class' => 'form-control', 'rows' => 3]) !!}
		</div>	

		<h3 class="form-title">Cuisine</h3>

		<div class="form-group">
			{!! Form::label('cuisine', 'Primary Cuisine', ['class' => 'control-label']) !!}
			{!! Form::select('cuisine', $cuisines, null, ['class' => 'form-control']) !!}
		</div>	

		<div class="form-group">
			{!! Form::submit('Update Restaurant Information', ['class' => 'btn btn-primary']) !!}
		</div>

		{!! Form::hidden('id', $restaurant->id) !!}

	{!! Form::close() !!}
	
@endsection