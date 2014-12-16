@extends('_master')

@section('title')

Edit

@stop

@section('head')

@stop

@section('content')

<h1>Edit</h1>

<h2>{{{ $item['description'] }}}</h2>

{{---- EDIT -----}}
		{{ Form::open(array('url' => '/task/edit')) }}
		{{ Form::hidden('id',$item['id']); }}

<div class='form-group'>

		{{ Form::label('description','Task') }}
		{{ Form::text('description',$item['description']); }}
</div>

<div class='form-group'>
		{{ Form::label('due','Due Date (mm/dd/yy)') }}
		{{ Form::text('due',$item['due']); }}
</div>
		{{ Form::submit('Save'); }}
		{{ Form::close() }}
@stop