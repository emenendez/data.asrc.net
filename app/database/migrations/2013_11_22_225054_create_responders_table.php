<?php

use Illuminate\Database\Migrations\Migration;
use Emenendez\CustomTypes\CustomSchema;

class CreateRespondersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		CustomSchema::create('responders', function($table) {
			$table->increments('id');
			$table->integer('callout_id')->unsigned();
			$table->string('name')->nullable();
			$table->string('kind')->nullable();
			$table->integer('miles_traveled')->nullable();
			$table->dateTimeRange('time_on_scene');
			$table->timestamps();

			$table->foreign('callout_id')
				  ->references('id')->on('callouts')
				  ->onUpdate('cascade')
				  ->onDelete('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('responders');
	}

}
