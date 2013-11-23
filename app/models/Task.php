<?php

use \Emenendez\CustomTypes\CustomModel;

class Task extends CustomModel {

	protected $guarded = array();

	protected static $json = array('area');

	public static $rules = array();

	public function incident() {
		return $this->belongsTo('Incident');
	}

	public function responders() {
		return $this->belongsToMany('Responder')->withPivot('track');
	}

}
