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

		<a href='/'><img class='logo' src='/images/laravel-foobooks-logo@2x.png' alt='Foobooks logo'></a>
	<nav>
		<ul>
			@if(Auth::check())
				<li><a href='/logout'>Log out {{ Auth::user()->email; }}</a></li>
				<li><a href='/book'>All Books</a></li>
				<li><a href='/book/search'>Search Books (w/ Ajax)</a></li>
				<li><a href='/tag'>All Tags</a></li>
				<li><a href='/book/create'>+ Add Book</a></li>
				<li><a href='/debug/routes'>Routes</a></li>
		
			@else
				<li><a href='/signup'>Sign up</a> or <a href='/login'>Log in</a></li>
		@endif
		</ul>
	</nav>

		<a href='https://github.com/susanBuck/foobooks'>View on Github</a>
		
		@yield('content')
	
	</body>

</html>