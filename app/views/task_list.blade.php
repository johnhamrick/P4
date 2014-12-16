
@extends('_master')

@section('title')

		All Tasks
@stop

@section('content')

		<h1>All Items</h1>

@foreach($tasks as $task)

		<section class='task'>
		<h2>{{ $task['id'] }} {{ $task['description'] }}</h2>

	Due Date: {{ $task['due'] }}
<br/>Completion Date: {{$task['completed']}}<br/>
	
	@if ($task['complete'] == '1')

		*Completed*
	
	@else

		*Not Completed*
	
	@endif

			<p>
				<a href='/task/edit/{{$task['id']}}'>Edit</a>
				<a href='/task/delete/{{$task['id']}}'>Delete</a>
			</p>
		
		</section>
	@endforeach
@stop