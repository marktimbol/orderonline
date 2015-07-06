@extends('layouts.admin')

@section('content')

	<h1>Update Menu</h1>

	<div class="row" ng-controller="UpdateMenuController">

		{!! Form::model($menu, ['method' => 'PUT', 'files' => true,
				'route' => ['dashboard.restaurants.menus.update', $restaurant->id, $menu->id]]) !!}

			<div class="col-md-6">
				
				{!! Form::hidden('restaurant_id', $restaurant->id) !!}
				{!! Form::hidden('menu_id', $menu->id) !!}

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
				
				<div class="form-group">
					<div>
						{!! getLogo($menu->image) !!}
					</div>
					<p>&nbsp;</p>
					{!! Form::file('image',['class' => 'form-control']) !!}
				</div>
			</div>

			<div class="col-md-6">
				<h3 class="form-title">Menu Item Choices</h3>

				<div class="row">
					<div class="col-md-10">
						<div class="form-group">
							{!! Form::label('category', null, ['class' => 'control-label']) !!}
							{!! Form::text('category', 'Your Choice of ', ['class' => 'form-control']) !!}
						</div>
					</div>

					<div class="col-md-2">
						<a href="#" class="btn btn-default option-plus"><i class="fa fa-plus-circle"></i></a>
					</div>
				</div>	

				@for($i = 1; $i<=2; $i++)
					<div class="col-md-12">
						<div class="col-md-6">
							<div class="form-group">
								{!! Form::label('optionName', 'Option Name', ['class' => 'control-label']) !!}
								{!! Form::text('optionName', null, ['class' => 'form-control']) !!}
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								{!! Form::label('optionPrice', 'Price', ['class' => 'control-label']) !!}
								<div class="input-group">
									{!! Form::text('optionPrice', null, ['class' => 'form-control']) !!}
									<div class="input-group-addon">{{$restaurant->currency}}</span></div>
								</div>		
							</div>
						</div>

						<div class="col-md-2">
							<a href="#" class="btn btn-default option-plus"><i class="fa fa-plus-circle"></i></a>
						</div>
					</div>
				@endfor


				<div class="row">
					<div class="col-md-10">
						<div class="form-group">
							{!! Form::label('category', null, ['class' => 'control-label']) !!}
							{!! Form::text('category', 'Your Choice of ', ['class' => 'form-control']) !!}
						</div>
					</div>

					<div class="col-md-2">
						<a href="#" class="btn btn-default option-plus"><i class="fa fa-plus-circle"></i></a>
					</div>
				</div>	

				@for($i = 1; $i<=2; $i++)
					<div class="col-md-12">
						<div class="col-md-6">
							<div class="form-group">
								{!! Form::label('optionName', 'Option Name', ['class' => 'control-label']) !!}
								{!! Form::text('optionName', null, ['class' => 'form-control']) !!}
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								{!! Form::label('optionPrice', 'Price', ['class' => 'control-label']) !!}
								<div class="input-group">
									{!! Form::text('optionPrice', null, ['class' => 'form-control']) !!}
									<div class="input-group-addon">{{$restaurant->currency}}</span></div>
								</div>		
							</div>
						</div>

						<div class="col-md-2">
							<a href="#" class="btn btn-default option-plus"><i class="fa fa-plus-circle"></i></a>
						</div>
					</div>
				@endfor







			</div>

			<div class="row">
				<div class="col-md-12">
					<hr />

					<div class="form-group">
						{!! Form::submit('Update Menu Information', ['class' => 'btn btn-primary']) !!}
					</div>

				</div>
			</div>			

			{!! Form::close() !!}

	</div>
@endsection