<?php

use \Emenendez\CustomTypes\CustomModel;

class Responder extends CustomModel {

	protected $guarded = array();

	protected static $dateTimeRanges = array('time_on_scene');

	public static $rules = array(
		'miles_traveled' => 'integer'
		);

	public function callout() {
		return $this->belongsTo('Callout');
	}

	public function tasks() {
		return $this->belongsToMany('Task');
	}

}
