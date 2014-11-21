<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTaskTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Creates Table
		Schema::create('user_task', function($table) {

			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('user_id')->on('users');
			$table->integer('task_id')->unsigned();
			$table->foreign('task_id')->references('id')->on('tasks');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
			Schema::drop('user_task');
	}

}
