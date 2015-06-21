@extends('layouts.admin')

@section('content')

	<p>
		<a href="{{ route('dashboard') }}"><i class="fa fa-long-arrow-left"></i> Go Back</a>
	</p>

	<div class="well">

		<p class="lead">The dark side I sense in you. Due to a disturbance in the force I couldn't find the page you were looking for.</p>


		<p>Trust in the force, clear your mind, unclean what you have learned, and find your missing page you will. Alternatively you could just <a href="{{ route('dashboard') }}">return to the homepage.</a></p>

		
	</div>


@endsection