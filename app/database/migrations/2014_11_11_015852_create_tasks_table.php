<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			// Creates Table
		Schema::create('tasks', function($table) {
		    	$table->increments('id');
		    	
		// Timestamp generates two columns: `created_at` and `updated_at` to
        // keep track of changes to a row
				$table->timestamps();
				$table->longText('description');
				$table->char('alpha', 1);
				$table->tinyInteger('priority');
        		$table->dateTime('completed');
        		$table->dateTime('due');
				$table->boolean('complete');
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
		Schema::drop('tasks');
	}

}