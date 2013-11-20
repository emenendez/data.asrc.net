<?php

use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Create teams table
		Schema::create('Teams', function($table){
			$table->increments('id');
			$table->string('name');
			$table->string('acronym');
			$table->string('address');
			$table->string('address2');
			$table->string('city');
			$table->string('state', 2);
			$table->string('zip', 5);
			$table->text('primary_area');
			$table->string('phone');
			$table->string('email');
			$table->string('api_key', 40);
			$table->binary('private_key');
			$table->binary('public_key');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// Drop teams table
		Schema::drop('Teams');
	}

}