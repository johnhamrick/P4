@extends('_master')

@section('title')
		Add a new task
@stop

@section('content')

		<h1>Add a new task</h1>

		{{ Form::open(array('url' => '/task/create')) }}
			
			{{ Form::label('description','Task') }}
			{{ Form::text('description'); }}

			{{ Form::label('due', 'User') }}
			{{ Form::text('due'); }}


			@foreach($categories as $id => $category)
				{{ Form::checkbox('categories[]', $id); }} {{ $category }}
			@endforeach

			{{ Form::submit('Add'); }}

	{{ Form::close() }}

@stop