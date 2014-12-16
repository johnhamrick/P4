@extends('_master')

@section('title')
		Add a new task
@stop

@section('head')

@stop

@section('content')

		<h1>Add a new task</h1>

		{{ Form::open(array('url' => '/task/create')) }}
			
			{{ Form::label('task','Task') }}
			{{ Form::text('task'); }}

			{{ Form::label('user_id', 'User') }}
			{{ Form::select('user_id', $users); }}

			{{ Form::label('created','Created (Y-m-d)') }}
			{{ Form::text('created'); }}

			@foreach($tags as $id => $tag)
				{{ Form::checkbox('tags[]', $id); }} {{ $tag }}
			@endforeach

			{{ Form::submit('Add'); }}

	{{ Form::close() }}

@stop