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
		CustomSchema::create('Incidents', function($table) {
			$table->increments('id');
			$table->string('name');
			$table->string('number');
			$table->dateTimeRange('last_known_time');
			$table->dateTimeRange('reported_time');
			$table->text('point_last_seen');
			$table->text('find_location');
			$table->string('find_team_kind');
			$table->string('find_resource_kind');
			$table->dateTimeRange('441_time');
			$table->dateTimeRange('442_time');
			$table->dateTimeRange('443_time');
			$table->dateTimeRange('445_time');
			$table->string('subject_transportation');
			$table->integer('subject_age');
			$table->string('subject_name');
			$table->string('subject_gender');
			$table->string('subject_mental_status');
			$table->integer('subject_group_size');
			$table->string('subject_activity');
			$table->string('subject_category');
			$table->text('subject_destination');
			$table->string('subject_behavior_hindsight');
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
		Schema::drop('Incidents');
	}

}
