<?php

use Illuminate\Database\Migrations\Migration;

class CreateStates extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Create states table
		Schema::create('states', function($table) {
			$table->increments('id');
			$table->string('name');
			$table->string('acronym');
		});

		// Populate with data
		DB::table('states')->insert(array(
		    array('name' => 'Alabama', 'acronym' => 'AL'),
			array('name' => 'Alaska', 'acronym' => 'AK'),
			array('name' => 'American Samoa', 'acronym' => 'AS'),
			array('name' => 'Arizona', 'acronym' => 'AZ'),
			array('name' => 'Arkansas', 'acronym' => 'AR'),
			array('name' => 'California', 'acronym' => 'CA'),
			array('name' => 'Colorado', 'acronym' => 'CO'),
			array('name' => 'Connecticut', 'acronym' => 'CT'),
			array('name' => 'Delaware', 'acronym' => 'DE'),
			array('name' => 'District of Columbia', 'acronym' => 'DC'),
			array('name' => 'Federated States of Micronesia', 'acronym' => 'FM'),
			array('name' => 'Florida', 'acronym' => 'FL'),
			array('name' => 'Georgia', 'acronym' => 'GA'),
			array('name' => 'Guam Gu', 'acronym' => 'GU'),
			array('name' => 'Hawaii', 'acronym' => 'HI'),
			array('name' => 'Idaho', 'acronym' => 'ID'),
			array('name' => 'Illinois', 'acronym' => 'IL'),
			array('name' => 'Indiana', 'acronym' => 'IN'),
			array('name' => 'Iowa', 'acronym' => 'IA'),
			array('name' => 'Kansas', 'acronym' => 'KS'),
			array('name' => 'Kentucky', 'acronym' => 'KY'),
			array('name' => 'Louisiana', 'acronym' => 'LA'),
			array('name' => 'Maine', 'acronym' => 'ME'),
			array('name' => 'Marshall Islands', 'acronym' => 'MH'),
			array('name' => 'Maryland', 'acronym' => 'MD'),
			array('name' => 'Massachusetts', 'acronym' => 'MA'),
			array('name' => 'Michigan', 'acronym' => 'MI'),
			array('name' => 'Minnesota', 'acronym' => 'MN'),
			array('name' => 'Mississippi', 'acronym' => 'MS'),
			array('name' => 'Missouri', 'acronym' => 'MO'),
			array('name' => 'Montana', 'acronym' => 'MT'),
			array('name' => 'Nebraska', 'acronym' => 'NE'),
			array('name' => 'Nevada', 'acronym' => 'NV'),
			array('name' => 'New Hampshire', 'acronym' => 'NH'),
			array('name' => 'New Jersey', 'acronym' => 'NJ'),
			array('name' => 'New Mexico', 'acronym' => 'NM'),
			array('name' => 'New York', 'acronym' => 'NY'),
			array('name' => 'North Carolina', 'acronym' => 'NC'),
			array('name' => 'North Dakota', 'acronym' => 'ND'),
			array('name' => 'Northern Mariana Islands', 'acronym' => 'MP'),
			array('name' => 'Ohio', 'acronym' => 'OH'),
			array('name' => 'Oklahoma', 'acronym' => 'OK'),
			array('name' => 'Oregon', 'acronym' => 'OR'),
			array('name' => 'Palau', 'acronym' => 'PW'),
			array('name' => 'Pennsylvania', 'acronym' => 'PA'),
			array('name' => 'Puerto Rico', 'acronym' => 'PR'),
			array('name' => 'Rhode Island', 'acronym' => 'RI'),
			array('name' => 'South Carolina', 'acronym' => 'SC'),
			array('name' => 'South Dakota', 'acronym' => 'SD'),
			array('name' => 'Tennessee', 'acronym' => 'TN'),
			array('name' => 'Texas', 'acronym' => 'TX'),
			array('name' => 'Utah', 'acronym' => 'UT'),
			array('name' => 'Vermont', 'acronym' => 'VT'),
			array('name' => 'Virgin Islands', 'acronym' => 'VI'),
			array('name' => 'Virginia', 'acronym' => 'VA'),
			array('name' => 'Washington', 'acronym' => 'WA'),
			array('name' => 'West Virginia', 'acronym' => 'WV'),
			array('name' => 'Wisconsin', 'acronym' => 'WI'),
			array('name' => 'Wyoming', 'acronym' => 'WY'),
		));

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// Drop states table
		Schema::drop('states');
	}

}