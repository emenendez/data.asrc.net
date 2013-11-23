<?php

use Illuminate\Database\Migrations\Migration;

class PivotResponderTaskTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('responder_task', function($table) {
			$table->increments('id');
			$table->integer('responder_id')->unsigned()->index();
			$table->integer('task_id')->unsigned()->index();

			$table->foreign('responder_id')
				  ->references('id')->on('responders')
				  ->onUpdate('cascade')
				  ->onDelete('cascade');
			$table->foreign('task_id')
				  ->references('id')->on('tasks')
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
		Schema::drop('responder_task');
	}

}
