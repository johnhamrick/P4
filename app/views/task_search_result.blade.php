<section>
		<img class='cover' src='{{ $book['cover'] }}'>

		<h2>{{ $task['title'] }}</h2>

		<p>
		{{ $task['user']->name }} {{ $task['created'] }}
		</p>

		<p>
			@foreach($task['tags'] as $tag)
					{{ $tag->name }}
			@endforeach
		</p>

		<!-- <a href='{{ $book['cover'] }}'>Purchase this book...</a> -->
		
		<br>
		<a href='/task/edit/{{ $task->id }}'>Edit</a>
		
</section>