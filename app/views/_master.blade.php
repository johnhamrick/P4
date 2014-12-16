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

		@if(Session::get('flash_message'))

			<div class='flash-message'>{{ Session::get('flash_message') }}</div>
		
		@endif

	<nav>
		<ul>
			@if(Auth::check())
				<li><a href='/logout'>Log out {{ Auth::user()->email; }}</a></li>
				<br/>
				<li><a href='/task'>All Tasks</a></li>
				<li><a href='/category'>All Categories</a></li>
				<li><a href='/task/create'>Add Task</a></li>
				<li><a href='/category/create'>Add Category</a></li>
		
			@else

				<li><a href='/signup'>Sign Up</a> or <a href='/login'>Log In</a></li>
			
			@endif
		</ul>
	</nav>

				<a href='https://github.com/johnhamrick/P4'>View on Github</a>
		
		@yield('content')
	
	</body>
</html>