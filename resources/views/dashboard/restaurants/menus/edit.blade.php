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

					<div class="row" ng-repeat="choice in choices">
					
						<div class="col-md-5">
							<div class="form-group">
								{!! Form::label('choice', null, ['class' => 'control-label']) !!}
								{!! Form::text("choice[@{{choice.id}}][name][title]", 'Your Choice of ', ['class' => 'form-control']) !!}
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<p>&nbsp;</p>
								<label class="checkbox-inline">
									{!! Form::hidden("choice[@{{choice.id}}][name][multiple]", 0) !!}
									{!! Form::checkbox("choice[@{{choice.id}}][name][multiple]", 1, null) !!}
									Multiple selection?
								</label>
							</div>
						</div>					

						<div class="col-md-3" ng-show="$last">
							<a ng-click="addChoice()" class="btn btn-default option-plus"><i class="fa fa-plus-circle"></i></a>

							<a ng-click="removeChoice()" class="btn btn-default option-plus"><i class="fa fa-remove"></i></a>
						</div>

						<div class="clearfix"></div>

						<div class="col-md-12" ng-repeat="option in choice.options">
							<div class="col-md-6">
								<div class="form-group">
									{!! Form::label('option', 'Option', ['class' => 'control-label']) !!}
									{!! Form::text("choice[@{{choice.id}}][name][options][@{{option.id}}][option][name]", null, ['class' => 'form-control']) !!}
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									{!! Form::label('optionPrice', 'Price', ['class' => 'control-label']) !!}
									<div class="input-group">
										{!! Form::text("choice[@{{choice.id}}][name][options][@{{option.id}}][option][price]", null, ['class' => 'form-control']) !!}
										<div class="input-group-addon">{{$restaurant->currency}}</span></div>
									</div>		
								</div>
							</div>

							<div class="col-md-2">
								<a ng-click="addOption(choice.id)" ng-show="$last" class="btn btn-default option-plus"><i class="fa fa-plus-circle"></i></a>
							</div>
						</div>	

						<div class="clearfix"></div>
						
						<hr />

					</div>	


					<div>
						<pre>@{{ choices }}</pre>
					</div>
			

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