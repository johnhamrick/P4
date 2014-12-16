<?php

	class TaskController extends \BaseController {
		
		/**
		*
		*/

	public function __construct() {

		# Make sure BaseController construct gets called
	
	parent::__construct();
		$this->beforeFilter('auth', array('except' => ['getIndex','getDigest']));
	}

		/**
		* Display all tasks
		* @return View
		*/

	public function getIndex() {
		$tasks = Task::all();
		if($tasks->isEmpty() != TRUE) {
		return View::make('task_list')->with('tasks',$tasks);
	}
		else {
		return Redirect::action('IndexController@getIndex')->with('flash_message','No Tasks to Display.');;
	}
	}

		/**
		* Show the "Add a Task Form"
		* @return View
		*/

	public function getCreate() {
		$categories =Category::all();
		return View::make('task_add')->with('categories',$categories);
	}

		/**
		* Process the "Add a task form"
		* @return Redirect
		*/

	public function postCreate() {
		
		# Instantiate the task model
		$item = new Task();
		$item->due = $_POST['due'];
		$item->description = $_POST['description'];
		$item->save();

		return Redirect::action('IndexController@getIndex')->with('flash_message','Your Task has been Added.');
	}

		/**
		* Show the "Edit a Task Form"
		* @return View
		*/

	public function getEdit($id) {
		try {
		$item = Task::findOrFail($id);

	}
		catch(exception $e) {
		return Redirect::to('/task')->with('flash_message', 'Task not Found');
	}
		return View::make('task_edit')
		->with('item', $item);
	}

		/**
		* Process the "Edit a task form"
		* @return Redirect
		*/
	
	public function postEdit() {
		try {
		$item = Task::findOrFail(Input::get('id'));
	}
		catch(exception $e) {
		return Redirect::to('/task')->with('flash_message', 'Task not Found');
	}
		$item->due = $_POST['due'];
		$item->description = $_POST['description'];
		$item->save();
		return Redirect::action('IndexController@getIndex')->with('flash_message','Your Changes have been Saved.');
	}
		/**
		* Process task deletion
		*
		* @return Redirect
		*/

	public function getDelete($id) {
		$item = Task::where('id', '=', $id)->get();
		if($item) {
		Task::destroy($id);
		return Redirect::back()->with('flash_message', 'Task Deleted');
	}
		else {
		return Redirect::back()->with('flash_message', 'Could not Delete Task.');
	}
}
}