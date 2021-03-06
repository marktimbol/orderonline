@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			
			<h1>Add Your Restaurant</h1>

			<p class="lead">To enroll your restaurant with us, fill up this form below and our sales team will contact you shortly.</p>

			{!! Form::open(['route' => 'restaurant.store']) !!}
				
				<h3 class="form-title">Restaurant Information</h3>
			
				<div class="form-group">
					{!! Form::label('name','Restaurant Name', ['class' => 'control-label']) !!}
					{!! Form::text('name', null, ['class' => 'form-control']) !!}
				</div>
		
				<div class="form-group">
					{!! Form::label('country', null, ['class' => 'control-label']) !!}
					<select name="country" class="form-control bfh-countries chosen-select" data-flags="true" data-country="<?=getClientCountry(getClientIp())?>"></select>
				</div>	
				
				<div class="form-group">
					{!! Form::label('telephone', null, ['class' => 'control-label']) !!}
					{{-- {!! Form::text('telephone', null, ['class' => 'form-control', 'id' => 'mobile']) !!} --}}
					<input type="tel" name="telephone" class="form-control" id="mobile" />
				</div>	

				<h3 class="form-title">Create Account</h3>
			
				<div class="form-group">
					{!! Form::label('contactName','Name', ['class' => 'control-label']) !!}
					{!! Form::text('contactName', null, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('email', 'eMail', ['class' => 'control-label']) !!}
					{!! Form::text('email', null, ['class' => 'form-control']) !!}
				</div>	

				
				<div class="form-group">
					{!! Form::label('password', null, ['class' => 'control-label']) !!}
					{!! Form::password('password', ['class' => 'form-control']) !!}
				</div>	

{{-- 				<div class="form-group">
					{!! Form::label('password_confirmation', 'Confirm Password', ['class' => 'control-label']) !!}
					{!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
				</div>	 --}}		

				{!! Form::hidden('hasRestaurant', 1) !!}
				{!! Form::hidden('role', 'user') !!}		

				<div class="form-group">
					{!! Form::submit('Submit Restaurant', ['class' => 'btn btn-primary']) !!}
				</div>

			{!! Form::close() !!}

		</div>

	</div>
@endsection