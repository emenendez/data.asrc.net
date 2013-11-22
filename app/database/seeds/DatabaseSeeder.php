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
			'phone' 		=> '+1 (888) 333-4282',
			'email' 		=> '',
			'api_key' 		=> 'test api key',
			'private_key' 	=> 'test private key',
			'public_key' 	=> 'test public key',
			));
	}
}

class IncidentsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('incidents')->delete();

		Incident::create(array(
			'name' 							=> 'Incident 1',
			'number'						=> 'VA-001-13',
			'last_known_time' 				=> new DateTimeRange('2013-01-01 00:00:00', '2013-01-02 00:00:00'),
			'reported_time'					=> new DateTimeRange('2013-01-01 00:00:00', '2013-01-02 00:00:00'),
			'point_last_seen'				=> '',
			'find_location'					=> '',
			'find_team_kind'				=> '',
			'find_resource_kind'			=> '',
			'441_time'						=> new DateTimeRange('2013-01-01 00:00:00', '2013-01-02 00:00:00'),
			'442_time'						=> new DateTimeRange('2013-01-01 00:00:00', '2013-01-02 00:00:00'),
			'443_time'						=> new DateTimeRange('2013-01-01 00:00:00', '2013-01-02 00:00:00'),
			'445_time'						=> new DateTimeRange('2013-01-01 00:00:00', '2013-01-02 00:00:00'),
			'subject_transportation'		=> '',
			'subject_age'					=> 18,
			'subject_name'					=> 'John Doe',
			'subject_gender'				=> 'Male',
			'subject_mental_status'			=> '',
			'subject_group_size'			=> 1,
			'subject_activity'				=> '',
			'subject_category'				=> '',
			'subject_destination'			=> '',
			'subject_behavior_hindsight'	=> '',
			'subject_lost_time'				=> new DateTimeRange('2013-01-01 00:00:00', '2013-01-02 00:00:00'),
			'subject_injury_time'			=> new DateTimeRange('2013-01-01 00:00:00', '2013-01-02 00:00:00'),
			'subject_injury_kind'			=> new DateTimeRange('2013-01-01 00:00:00', '2013-01-02 00:00:00'),
			'subject_immobile_time'			=> new DateTimeRange('2013-01-01 00:00:00', '2013-01-02 00:00:00'),
			'subject_death_time'			=> new DateTimeRange('2013-01-01 00:00:00', '2013-01-02 00:00:00'),
			));
	}
}

class CalloutsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('callouts')->delete();

		$callout = new Callout(array(
			'111_time' => new DateTimeRange('2013-01-01 00:00:00', '2013-01-02 00:00:00'),
			'222_time' => new DateTimeRange('2013-01-01 00:00:00', '2013-01-02 00:00:00'),
			'331_time' => new DateTimeRange('2013-01-01 00:00:00', '2013-01-02 00:00:00'),
			'332_time' => new DateTimeRange('2013-01-01 00:00:00', '2013-01-02 00:00:00'),
			'333_time' => new DateTimeRange('2013-01-01 00:00:00', '2013-01-02 00:00:00'),
			));

		$callout->team()->associate(Team::all()->first());
		$callout->incident()->associate(Incident::all()->first());
		$callout->save();
	}

}