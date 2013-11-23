<?php

use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tasks', function($table) {
			$table->increments('id');
			$table->integer('incident_id')->unsigned();
			$table->string('number')->nullable();
			$table->text('description')->nullable();
			$table->text('area')->nullable();
			$table->text('track')->nullable();
			$table->timestamps();

			$table->foreign('incident_id')
				  ->references('id')->on('incidents')
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
		Schema::drop('tasks');
	}

}
