<?php

use Illuminate\Database\Migrations\Migration;
use Emenendez\CustomTypes\CustomSchema;

class CreateIncidentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		CustomSchema::create('incidents', function($table) {
			$table->increments('id');
			$table->string('name')->nullable();
			$table->string('number');
			$table->dateTimeRange('last_known_time');
			$table->dateTimeRange('reported_time');
			$table->text('point_last_seen')->nullable();
			$table->text('find_location')->nullable();
			$table->string('find_team_kind')->nullable();
			$table->string('find_resource_kind')->nullable();
			$table->dateTimeRange('441_time');
			$table->dateTimeRange('442_time');
			$table->dateTimeRange('443_time');
			$table->dateTimeRange('445_time');
			$table->string('subject_transportation')->nullable();
			$table->integer('subject_age')->nullable();
			$table->string('subject_name')->nullable();
			$table->string('subject_gender')->nullable();
			$table->string('subject_mental_status')->nullable();
			$table->integer('subject_group_size')->nullable();
			$table->string('subject_activity')->nullable();
			$table->string('subject_category')->nullable();
			$table->text('subject_destination')->nullable();
			$table->string('subject_behavior_hindsight')->nullable();
			$table->dateTimeRange('subject_lost_time');
			$table->dateTimeRange('subject_injury_time');
			$table->dateTimeRange('subject_injury_kind');
			$table->dateTimeRange('subject_immobile_time');
			$table->dateTimeRange('subject_death_time');
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
		Schema::drop('incidents');
	}

}
