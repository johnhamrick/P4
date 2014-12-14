@extends('_master')

@section('title')
	Task Manager
@stop

@section('body')
	

<div class="container">
	<br>
	<div class="row">
	<div class="col-md-4">

		<h2>About Task Manager</h2>
			<p>
Tasks can be categorized numerically from 1 - 9, enabling better management of to-do items.
Once you've made a practical list of tasks you can accomplish today, or over the next week,
start with your first item and work your way down the list.
	<br>
	<br>
Tasks can also be assigned to categories for grouping items.
	<br>
	<br>
			</p>
	<div class="col-md-4">

		<h2>Manage Tasks</h2>
		@include('num_list')
	</div>
	</div>
	</div>
	</div>

@stop