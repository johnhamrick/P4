@extends('_master')

@section('title')
		Add a New Task
@stop

@section('head')

@stop

@section('content')

		<h1>Add a New Task</h1>

		{{ Form::open(array('url' => '/task/create')) }}
			
			{{ Form::label('description','Task') }}
			{{ Form::text('description'); }}

			{{ Form::label('due', 'Due') }}
			{{ Form::text('due'); }}
			<br/>
			<br/>
			@foreach($categories as $id => $category)
				{{ Form::checkbox('categories[]', $id); }} {{ $category->name }}
			@endforeach

			{{ Form::submit('Add'); }}

	{{ Form::close() }}

@stop