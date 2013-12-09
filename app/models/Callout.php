<?php

use \Emenendez\CustomTypes\CustomModel;

class Callout extends CustomModel {

	protected $guarded = array('id');

	protected static $dateTimeRanges = array(
		'111_time',
		'222_time',
		'331_time',
		'332_time',
		'333_time',
		);

	public static $rules = array();

	public function team() {
		return $this->belongsTo('Team');
	}

	public function incident() {
		return $this->belongsTo('Incident');
	}

	public function responders() {
		return $this->hasMany('Responder');
	}

}

?>