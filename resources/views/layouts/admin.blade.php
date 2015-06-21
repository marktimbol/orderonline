<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Online Order</title>

	<link rel="stylesheet" href="{{ elixir('css/all.css') }}" />

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body ng-app="orderOnline">

	@include('layouts._topnav')

    <div id="wrapper">

       	@include('layouts._sidebar')

        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                    	
                        {{--<a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a> --}}
						
						<div class="system-messages">
							@include('messages.list')
						</div>

                      	@yield('content')
                    
                    </div>
                </div>
            </div>
        </div>

    </div>

    {!! Html::script('/js/ckeditor/ckeditor/ckeditor.js') !!}   
    <script type="text/javascript" src="{{ elixir('js/all.js') }}"></script>
    {!! Html::script('/js/angular.js') !!}   
    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
