@extends('layouts.admin')

@section('content')

	<h1>Update Menu</h1>

	<div class="row">
		<div class="col-md-6">

			{!! Form::model( $menu, ['method' => 'PUT', 'files' => true,
							'route' => ['dashboard.restaurants.menus.update', $restaurant->id, $menu->id]] ) !!}
				
				<h3 class="form-title">Menu Information</h3>

				<div class="form-group">
					{!! Form::label('category', null, ['class' => 'control-label']) !!}
					{!! Form::select('category', $categories, $menu->category_id, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('name','Name', ['class' => 'control-label']) !!}
					{!! Form::text('name', null, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('description',null, ['class' => 'control-label']) !!}
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
				
				<h3 class="form-title">Logo</h3>
				
				<div>
					{!! getLogo($menu->image) !!}
				</div>
				
				{!! Form::file('image',['class' => 'form-control']) !!}

				<hr />

				<div class="form-group">
					{!! Form::submit('Update Menu Information', ['class' => 'btn btn-primary']) !!}
				</div>

			{!! Form::close() !!}

		</div>
	</div>
@endsection