@extends('_master')

@section('title')
		Log In

@stop

@section('content')

<h1>Log In</h1>

			{{ Form::open(array('url' => '/login')) }}

			{{ Form::label('email', 'Email:') }}
			{{ Form::text('email', null, array('class' => 'form-control')) }}


			{{ Form::label('password', 'Password:') }}
			{{ Form::password('password', array('class' => 'form-control')) }}


			{{ Form::submit('Log In', array('class' => 'btn btn-primary btn-md')) }}
			<a href="/signup" class="btn btn-link btn-md">Sign up</a>


			{{ Form::close() }}

@stop