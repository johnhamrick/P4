@extends('_master')

@section('title')
		tasks
@stop

@section('content')
	
	<h1>Tasks</h1>

	<div>

		View as:
		<a href='/task/?format=json' target='_blank'>JSON</a> |
		<a href='/task/?format=pdf' target='_blank'>PDF</a>

	</div>

	@if($query)
	
		<h2>You searched for {{{ $query }}}</h2>
	
	@endif
	
	@if(sizeof($tasks) == 0)
			No results
	@else
	
		@foreach($tasks as $task)
			<section class='task'>
	
				<h2>{{ $task['title'] }}</h2>
	
				<p>
					<a href='/task/edit/{{$task['id']}}'>Edit</a>
				</p>
	
				<p>
					{{ $task['user']['name'] }} ({{$task['created']}})
				</p>
	
				<p>
					@foreach($task['tags'] as $tag)
						<span class='tag'>{{{ $tag->name }}}</span>
					@endforeach
				</p>

			</section>
		@endforeach

	@endif

@stop