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
		Schema::create('teams', function($table){
			$table->increments('id');
			$table->string('name');
			$table->string('acronym')->nullable();
			$table->string('address')->nullable();
			$table->string('address2')->nullable();
			$table->string('city')->nullable();
			$table->string('state', 2)->nullable();
			$table->string('zip', 5)->nullable();
			$table->text('primary_area')->nullable();
			$table->string('phone')->nullable();
			$table->string('email');
			$table->string('api_key', 40)->nullable();
			$table->binary('private_key')->nullable();
			$table->binary('public_key')->nullable();
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
		Schema::drop('teams');
	}

}