@extends('_master')

@section('title')
		Edit

@stop

@section('head')

@stop

@section('content')

		<h1>Edit</h1>
		<h2>{{{ $task['title'] }}}</h2>

		{{---- EDIT -----}}
		{{ Form::open(array('url' => '/task/edit')) }}

			{{ Form::hidden('id',$task['id']); }}

			<div class='form-group'>
				{{ Form::label('title','Title') }}
				{{ Form::text('title',$task['title']); }}
			</div>

			<div class='form-group'>
				{{ Form::label('user_id', 'User') }}
				{{ Form::select('user_id', $users, $task->user_id); }}
			</div>

			<div class='form-group'>
				{{ Form::label('created','Y-m-d H:i:s') }}
				{{ Form::text('created',$task['created']); }}
			</div>

			<div class='form-group'>
				@foreach($tags as $id => $tag)
				{{ Form::checkbox('tags[]', $id, $task->tags->contains($id)); }} {{ $tag }}
				&nbsp;&nbsp;&nbsp;
				@endforeach
			</div>

			{{ Form::submit('Save'); }}
		
		{{ Form::close() }}

	<div>
		
		{{---- DELETE -----}}
		{{ Form::open(array('url' => '/task/delete')) }}
			
			{{ Form::hidden('id',$task['id']); }}
				<button onClick='parentNode.submit();return false;'>Delete</button>
			
		{{ Form::close() }}
	
	</div>

@stop