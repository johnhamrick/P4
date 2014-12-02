<!DOCTYPE html>
<html lang="en">
	<head>
		<title>
			@yield('title')
		</title>
		<meta charset="utf-8" />
		
		
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" />
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css" />
	</head>
	<body>
		@yield('nav')
		@include('jumbotron')
		@yield('body')
		@yield('content')
		@yield('footer')
	</body>
</html>