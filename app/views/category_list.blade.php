
@extends('_master')

@section('title')

		All Tasks
@stop

@section('content')

		<h1>All Categories</h1>

@foreach($categories as $category)

		<section class='category'>
		<h2>{{ $category['id'] }} {{ $category['name'] }}</h2>

		<p>
			<a href='/category/edit/{{$category['id']}}'>Edit</a>
			<a href='/category/delete/{{$category['id']}}'>Delete</a>
		</p>
		
		</section>
	@endforeach
@stop