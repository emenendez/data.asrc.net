<?php

use Emenendez\CustomTypes\CustomModel;

class Incident extends CustomModel {

	protected $guarded = array('id');

	protected static $dateTimeRanges = array(
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

	protected static $json = array(
		'point_last_seen',
		'find_location',
		'subject_destination',
		);

	public static $rules = array(
		'number' 				=> 'required',
		'subject_age' 			=> 'integer',
		'subject_group_size'	=> 'integer',
		);

	public function callouts() {
		return $this->hasMany('Callout');
	}

	public function tasks() {
		return $this->hasMany('Task');
	}

}