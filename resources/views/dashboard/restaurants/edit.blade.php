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
			{!! Form::textarea('description', null, ['class' => 'form-control ckeditor', 'rows' => 15]) !!}
		</div>		

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					{!! Form::label('telephone', null, ['class' => 'control-label']) !!}
					{!! Form::text('telephone', null, ['class' => 'form-control', 'id' => 'mobile']) !!}
				</div>		

				<div class="form-group">
					{!! Form::label('minimumOrderAmount', 'Minimum Order Amount', ['class' => 'control-label']) !!}
					{!! Form::text('minimumOrderAmount', null, ['class' => 'form-control']) !!}
				</div>	

				<div class="form-group">
					<label class="checkbox-inline">
						{!! Form::checkbox('hasDelivery', 1, $restaurant->hasDelivery, ['data-ng-model' => 'itHasDelivery']) !!}
						Does your restaurant have delivery?
					</label>
				</div>					
			</div>

			<div class="col-md-6">
				<div ng-show="itHasDelivery">
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
			</div>
		</div>

		<h3 class="form-title">Restaurant Timings</h3>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">

					{!! Form::label('workingDays', 'Working Days', ['class' => 'control-label']) !!}

					<div class="row" ng-repeat="day in days">

						<div class="col-md-5">
							<div class="form-group">
								<input type="text" name="timings[@{{$index}}][day]" value="@{{day}}" class="form-control" />
							</div>	
						</div>

						<div class="col-md-7">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<div class="input-group bootstrap-timepicker">
											 {!! Form::text('timings[@{{$index}}][open]', null, ['class' => 'form-control timepicker', 'placeholder' => 'To']) !!}
											<div class="input-group-addon">
												<i class="glyphicon glyphicon-time"></i>
											</div>
										</div>
									</div>	
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<div class="input-group bootstrap-timepicker">
											 {!! Form::text('timings[@{{$index}}][close]', null, ['class' => 'form-control timepicker', 'placeholder' => 'To']) !!}
											<div class="input-group-addon"><i class="glyphicon glyphicon-time"></i></div>
										</div>
									</div>	
								</div>
							</div>

						</div>
					</div>	
															
				</div>
			</div>

			<div class="col-md-6">

			</div>
		</div>


		<h3 class="form-title">Location</h3>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					{!! Form::label('country', null, ['class' => 'control-label']) !!}
					{!! Form::select('countryCode', $countries, $restaurant->countryCode, ['class' => 'form-control']) !!}
				</div>	

				<div class="form-group">
					{!! Form::label('city', null, ['class' => 'control-label']) !!}
					{!! Form::text('city', null, ['class' => 'form-control']) !!}
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					{!! Form::label('zip', null, ['class' => 'control-label']) !!}
					{!! Form::text('zip', null, ['class' => 'form-control']) !!}
				</div>
				
				<div class="form-group">
					{!! Form::label('address',null, ['class' => 'control-label']) !!}
					{!! Form::text('address', null, ['class' => 'form-control']) !!}
				</div>	
			</div>
		</div>



		<h3 class="form-title">Cuisine</h3>

		<div class="form-group">
			{!! Form::label('cuisine', 'Primary Cuisine', ['class' => 'control-label']) !!}
			<?php $cuisine_id = 0; ?>
			@foreach( $restaurant->cuisines as $cuisine )
				<?php 
					$cuisine_id = $cuisine->id;
					break;
				?>
			@endforeach
			
			{!! Form::select('cuisine', $cuisines, $cuisine_id, ['class' => 'form-control']) !!}
			
		</div>	

		<div class="form-group">
			{!! Form::submit('Update Restaurant Information', ['class' => 'btn btn-primary']) !!}
		</div>

		{!! Form::hidden('id', $restaurant->id) !!}

	{!! Form::close() !!}
	
@endsection