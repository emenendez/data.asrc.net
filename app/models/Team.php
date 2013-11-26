<?php

use Emenendez\CustomTypes\CustomModel;

class Team extends CustomModel {

	protected $hidden = array('private_key');

	protected static $json = array('primary_area');

	public static $rules = array(
		'name' 			=> 'required',
		'state' 		=> 'exists:states,acronym',
		'zip' 			=> 'integer|size:5',
	);

	public function callouts() {
		return $this->hasMany('Callout');
	}

	public function users() {
		return $this->belongsToMany('User')->withPivot('is_admin');
	}

}

?>