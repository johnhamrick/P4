<?php

class TaskController extends \BaseController {

		/**
		*
		*/

		public function __construct() {

			# Make sure BaseController construct gets called
			parent::__construct();

			$this->beforeFilter('auth', array('except' => 'getIndex'));
	}
		/**
		* Process the searchform
		* @return View
		*/
		public function getSearch() {
			
			return View::make('task_search');
	}

		/**
		* Display all tasks
		* @return View
		*/

		public function getIndex() {
			# Format and Query are passed as Query Strings
			$format = Input::get('format', 'html');
			
			$query = Input::get('query');

			$tasks = Task::search($query);

			# Decide on output method...
			# Default - HTML
			if($format == 'html') {
				return View::make('task_index')
					->with('tasks', $tasks)
					->with('query', $query);
	}

			# JSON
			elseif($format == 'json') {
				return Response::json($tasks);
	}

}

		/**
		* Show the "Add a task form"
		* @return View
		*/

		public function getCreate() {
			
			$users = User::getIdNamePair();
		
		return View::make('task_add')->with('users',$users);
}

		/**
		* Process the "Add a task form"
		* @return Redirect
		*/
		
		public function postCreate() {
			
			# Instantiate the task model
			
			$task = new Task();
			$task->fill(Input::all());
			$task->save();

			# Magic: Eloquent
			$task->save();
			
			return Redirect::action('TaskController@getIndex')->with('flash_message','Your task has been added.');
}


		/**
		* Show the "Edit a task form"
		* @return View
		*/
		
		public function getEdit($id) {
			
			try {
				$task = Task::findOrFail($id);
				$users = Userr::getIdNamePair();
	}
			catch(exception $e) {
				return Redirect::to('/task')->with('flash_message', 'Task not found');
	}

			return View::make('task_edit')
				->with('task', $task)
				->with('users', $users);
}

		/**
		* Process the "Edit a task form"
		* @return Redirect
		*/
		
		public function postEdit() {
			
			try {
			$task = Task::findOrFail(Input::get('id'));
	}
			catch(exception $e) {
				return Redirect::to('/task')->with('flash_message', 'Task not found');
	}

			# http://laravel.com/docs/4.2/eloquent#mass-assignment
			$task->fill(Input::all());
			$task->save();
			
				return Redirect::action('TaskController@getIndex')->with('flash_message','Your changes have been saved.');
}

		/**
		* Process task deletion
		*
		* @return Redirect
		*/

		public function postDelete() {
			
			try {
			$task = Task::findOrFail(Input::get('id'));
	}
			catch(exception $e) {
			return Redirect::to('/task/')->with('flash_message', 'Could not delete task - not found.');
	}

			Task::destroy(Input::get('id'));
			return Redirect::to('/task/')->with('flash_message', 'Task deleted.');
}

		/**
		* Process a task search
		* Called w/ Ajax
		*/

		public function postSearch() {

			if(Request::ajax()) {
			
				$query = Input::get('query');
				
				# We're demoing two possible return formats: JSON or HTML
				$format = Input::get('format');
				
				# Do the actual query
				$tasks = Task::search($query);

				# If the request is for JSON, just send the tasks back as JSON
			if($format == 'json') {
					return Response::json($tasks);
	}

				# Otherwise, loop through the results building the HTML View we'll return
					elseif($format == 'html') {

				$results = '';
					foreach($tasks as $task) {
				# Created a "stub" of a view called task_search_result.php; it's simply a stub of code to display a task
				# For each task, we'll add a new stub to the results
				$results .= View::make('task_search_result')->with('task', $task)->render();
	}
				# Return the HTML/View to JavaScript...
					return $results;
			}
		}	
	}
}