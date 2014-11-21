<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */

	public function up()
	{
		// Creates Table
		Schema::create('users', function($table) {
		    	$table->increments('user_id');
		    	
		// This generates two columns: `created_at` and `updated_at` to
        // keep track of changes to a row
		    	$table->timestamps();
				$table->string('name', 100);
		    	$table->string('email')->unique();
        		$table->string('password');
		    	$table->string('user_name');
		    	$table->boolean('remember_token');
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
		Schema::drop('users');
	}
}
