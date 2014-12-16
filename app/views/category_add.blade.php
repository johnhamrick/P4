@extends('_master')

@section('title')

Add a New Category

@stop

@section('head')

@stop

@section('content')

	<h1>Add a New Category</h1>

		{{ Form::open(array('url' => '/category/create')) }}
		{{ Form::label('name','Category') }}
		{{ Form::text('name'); }}
		{{ Form::submit('Add'); }}
		{{ Form::close() }}

@stop