<?php

use Illuminate\Database\Migrations\Migration;
use Emenendez\CustomTypes\CustomSchema;

class CreateCalloutsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		CustomSchema::create('callouts', function($table) {
			$table->increments('id');
			$table->integer('incident_id')->unsigned();
			$table->integer('team_id')->unsigned();
			$table->dateTimeRange('111_time');
			$table->dateTimeRange('222_time');
			$table->dateTimeRange('331_time');
			$table->dateTimeRange('332_time');
			$table->dateTimeRange('333_time');
			$table->timestamps();

			$table->foreign('incident_id')
				  ->references('id')->on('incidents')
				  ->onUpdate('cascade')
				  ->onDelete('cascade');

			$table->foreign('team_id')
				  ->references('id')->on('teams')
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
		Schema::drop('callouts');
	}

}
