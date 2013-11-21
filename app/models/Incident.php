<?php

use Emenendez\CustomTypes\CustomModel;

class Incident extends CustomModel {

	protected $guarded = array();

	public static $rules = array(
		'number' 				=> 'required',
		'subject_age' 			=> 'integer',
		'subject_group_size'	=> 'integer',
		);

	protected $dateTimeRanges = array(
		'last_known_time',
		'reported_time',
		'441_time',
		'442_time',
		'443_time',
		'445_time',
		'subject_lost_time',
		'subject_injury_time',
		'subject_injury_kind',
		'subject_immobile_time',
		'subject_death_time',
		);

}