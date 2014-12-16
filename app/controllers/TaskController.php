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
return Redirect::action('IndexController@getIndex')->with('flash_message','No Tasks to display.');;
}
}
/**
* Show the "Add a task form"
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
/*
* The code in the below foreach loop is to add a pivot table to reflect the many-to-many
* relationship of the "items" to "categories" using the category_item table. This feature may
* be implemented at a later date but for now is not going to be in this initial scope of the
* project.
*
foreach(Input::get('categories') as $category) {
# This enters a new row in the category_item table
#$item->categories()->save(Category::find($category));
$item->categories()->attach($category);
#echo $category;
#echo Category::find($category);
}
*/
return Redirect::action('IndexController@getIndex')->with('flash_message','Your book has been added.');
}
/**
* Show the "Edit a task form"
* @return View
*/
public function getEdit($id) {
try {
$item = Task::findOrFail($id);
#$authors = Author::getIdNamePair();
}
catch(exception $e) {
return Redirect::to('/task')->with('flash_message', 'Task not found');
#return Redirect::to('/task')->with('flash_message', 'Task not found');
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
return Redirect::to('/task')->with('flash_message', 'Task not found');
}
$item->due = $_POST['due'];
$item->description = $_POST['description'];
$item->save();
return Redirect::action('IndexController@getIndex')->with('flash_message','Your changes have been saved.');
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
return Redirect::back()->with('flash_message', 'Task deleted');
#return Redirect::to('/task')->with('flash_message', 'Task deleted');
}
else {
return Redirect::back()->with('flash_message', 'Could not delete task.');
#return Redirect::to('/task')->with('flash_message', 'Could not delete task.');
}
}
}