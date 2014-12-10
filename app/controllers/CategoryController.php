<?php

class CategoryController extends \BaseController {

		/**
		*
		*/

		public function __construct() {
		
			# Make sure BaseController construct gets called
			parent::__construct();

			# Only logged in users are allowed here
			$this->beforeFilter('auth');
}

		/**
		* Display a listing of the resource.
		*
		* @return Response
		*/

		public function index() {
			
			$categories = Category::all();
			return View::make('category_index')->with('categories',$categories);
}

		/**
		* Show the form for creating a new resource.
		*
		* @return Response
		*/
		
		public function create() {
			return View::make('category_create');
}

		/**
		* Store a newly created resource in storage.
		*
		* @return Response
		*/

		public function store() {
			
			$category = new category;
			$category->name = Input::get('name');
			$category->save();
			
			return Redirect::action('CategoryController@index')->with('flash_message','Your category been added.');
}

		/**
		* Display the specified resource.
		*
		* @param int $id
		* @return Response
		*/

		public function show($id) {

			try {
			$category = category::findOrFail($id);
	}
			catch(Exception $e) {
			return Redirect::to('/category')->with('flash_message', 'category not found');
	}
			return View::make('category_show')->with('category', $category);
}

		/**
		* Show the form for editing the specified resource.
		*
		* @param int $id
		* @return Response
		*/

		public function edit($id) {
			
			try {
				$category = category::findOrFail($id);
	}

			catch(Exception $e) {
				return Redirect::to('/category')->with('flash_message', 'category not found');
	}

			# Pass with the $category object so we can do model binding on the form
			return View::make('category_edit')->with('category', $category);
}

		/**
		* Update the specified resource in storage.
		*
		* @param int $id
		* @return Response
		*/

		public function update($id) {
			
			try {
				$category = category::findOrFail($id);
	}
			catch(Exception $e) {
				return Redirect::to('/category')->with('flash_message', 'category not found');
	}
			$category->name = Input::get('name');
			$category->save();
			
			return Redirect::action('CategoryController@index')->with('flash_message','Your category has been saved.');
}

		/**
		* Remove the specified resource from storage.
		*
		* @param int $id
		* @return Response
		*/

		public function destroy($id) {
			
			try {
				$category = category::findOrFail($id);
	}
			catch(Exception $e) {
				return Redirect::to('/category')->with('flash_message', 'category not found');
	}

		# Note there's a `deleting` Model event which makes sure book_category entries are also destroyed
		# See category.php for more details
			category::destroy($id);

			return Redirect::action('CategoryController@index')->with('flash_message','Your category has been deleted.');
	}
}