<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::create('categories', function($table)	{

		# Increments method will make a Primary, Auto-Incrementing field.
		$table->increments('id');

		# This generates two columns:  'created_at' and 'updated_at' to keep track of changes to a row.
		$table->timestamps();

		# The rest of the fields...
		$table->string('work');
		$table->string('personal');
		$table->string('miscellaneous');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		# Undo action - drops the table
		Schema::drop('categories');

	}

}
