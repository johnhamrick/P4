@extends('_master')

@section('title')
	Task Manager
@stop

@section('body')
	

<div class="container">
	<br>
	<div class="row">
		<div class="col-md-4">
			<h2>About</h2>
			<p>
"Tasks that are categorized in A, B & C categories, then further prioritized numerically, allow you to see the most important groups of items.
Once you've made a practical list of tasks you can accomplish today, or over the next week, prioritize them by urgency using A, B, or C, and then
add numbers to indicate the order for doing these tasks."
			</p>
			<br>Source: <a href="http://www.daytimer.com/daytimerstore/common/static.jsp?pageId=ManagingTasksAndCalendarsInYourPlanner">Daytimer <span class="glyphicon glyphicon-new-window min"></span></a>
		</div>
	<div class="col-md-2">&nbsp;</div>
	<div class="col-md-4">
		<h2>Create Task</h2>
		@include('alpha_num_buttons')
	</div>
	</div>
	</div>

@stop