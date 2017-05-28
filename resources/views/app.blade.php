<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">

	<link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/bootstrap-theme.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/main.css') }}">

	<script src="{{ asset('/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="{{ asset('/js/vendor/jquery-1.11.2.min.js') }}"><\/script>')</script>
</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<ul class="nav navbar-nav">
					<li><a href="{{ url('/purchases') }}">{{ trans('app.nav.purchases') }}</a></li>
					<li><a href="{{ url('/shops') }}">{{ trans('app.nav.shops') }}</a></li>
				</ul>
			</div>
		</div>
	</nav>
	
	<!-- Main jumbotron for a primary marketing message or call to action -->
	@yield('content')
	
	<div class="container">
		<hr>
	
		<footer>
			<p>&copy; Company 2015</p>
		</footer>
	</div> <!-- /container -->
	
	<script src="{{ asset('/js/vendor/bootstrap.min.js') }}"></script>
	<script src="{{ asset('/js/main.js') }}"></script>
</body>
</html>
