<?php

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
	}

}

class TeamsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('Teams')->truncate();

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