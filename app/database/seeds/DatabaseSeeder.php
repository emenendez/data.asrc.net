<?php

use Emenendez\CustomTypes\DateTimeRange;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('TeamsTableSeeder');
		$this->call('IncidentsTableSeeder');
		$this->call('CalloutsTableSeeder');
		$this->call('RespondersTableSeeder');
		$this->call('TasksTableSeeder');
		$this->call('UsersTableSeeder');
	}

}

class TeamsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('teams')->delete();

		Team::create(array(
			'name' 			=> 'Allegheny Mountain Rescue Group',
			'acronym' 		=> 'AMRG',
			'address' 		=> 'UPMC Mercy',
			'address2' 		=> '1400 Locust St',
			'city' 			=> 'Pittsburgh',
			'state' 		=> 'PA',
			'zip' 			=> '15219',
			'primary_area' 	=> json_decode('{"type":"FeatureCollection","features":[{"type":"Feature","properties":{},"geometry":{"type":"Polygon","coordinates":[[[-80.15625,41.19518982948959],[-79.29931640625,41.17038447781618],[-79.024658203125,40.60561205826018],[-79.002685546875,40.245991504199026],[-79.29931640625,39.7240885773337],[-79.639892578125,39.715638134796336],[-80.2001953125,39.715638134796336],[-80.43090820312499,39.707186656826565],[-80.540771484375,39.740986355883564],[-80.562744140625,41.14556973100947],[-80.15625,41.19518982948959]]]}}]}'),
			'private_key' 	=> null,
			'public_key' 	=> null,
			));
	}
}

class IncidentsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('incidents')->delete();

		Incident::create(array(
			'name' 							=> null,
			'number'						=> 'VA-001-13',
			'last_known_time' 				=> new DateTimeRange(),
			'reported_time'					=> new DateTimeRange(),
			'point_last_seen'				=> null,
			'find_location'					=> null,
			'find_team_kind'				=> null,
			'find_resource_kind'			=> null,
			'441_time'						=> new DateTimeRange(),
			'442_time'						=> new DateTimeRange(),
			'443_time'						=> new DateTimeRange(),
			'445_time'						=> new DateTimeRange(),
			'subject_transportation'		=> null,
			'subject_age'					=> null,
			'subject_name'					=> 'John Doe',
			'subject_gender'				=> 'Male',
			'subject_mental_status'			=> null,
			'subject_group_size'			=> 1,
			'subject_activity'				=> null,
			'subject_category'				=> null,
			'subject_destination'			=> null,
			'subject_behavior_hindsight'	=> null,
			'subject_lost_time'				=> new DateTimeRange(),
			'subject_injury_time'			=> new DateTimeRange(),
			'subject_injury_kind'			=> new DateTimeRange(),
			'subject_immobile_time'			=> new DateTimeRange(),
			'subject_death_time'			=> new DateTimeRange(),
			));
	}
}

class CalloutsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('callouts')->delete();

		$callout = new Callout(array(
			'111_time' => new DateTimeRange(),
			'222_time' => new DateTimeRange(),
			'331_time' => new DateTimeRange(),
			'332_time' => new DateTimeRange(),
			'333_time' => new DateTimeRange(),
			));

		$callout->team()->associate(Team::all()->first());
		$callout->incident()->associate(Incident::all()->first());
		$callout->save();
	}

}

class RespondersTableSeeder extends Seeder {

	public function run()
	{
		DB::table('responders')->delete();

		$responder = new Responder(array(
			'name' => 'Joe Responder',
			'kind' => null,
			'miles_traveled' => null,
			'time_on_scene' => new DateTimeRange(),
			));

		$responder->callout()->associate(Callout::all()->first());
		$responder->save();
	}

}

class TasksTableSeeder extends Seeder {

	public function run()
	{
		DB::table('tasks')->delete();

		$task = new Task(array(
			'number' => 'T01-01',
			'description' => null,
			'area' => null,
			'track' => null,
			));

		$task->incident()->associate(Incident::all()->first());
		$task->save();
		$task->responders()->attach(Responder::all()->first());
	}

}

class UsersTableSeeder extends Seeder {

	public function run()
	{
		DB::table('users')->delete();

		$user = new User(array(
			'email'           => 'test@email.com',
			'password'        => 'password',
			'name'            => 'Joe SAR',
			'phone'           => '+1 (888) 333-4282',
			'api_key'         => sha1(Str::random(40)),
			'area'            => null,
			'is_global_admin' => true,
			));

		$user->save();
		$user->teams()->attach(Team::all()->first(), array('is_team_admin' => true));
	}

}
