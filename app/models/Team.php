<?php

use Emenendez\CustomTypes\CustomModel;

class Team extends CustomModel {

	protected $hidden = array('api_key', 'private_key');

	protected static $json = array('primary_area');

	public static $rules = array(
		'name' 			=> 'required',
		'state' 		=> 'exists:states,acronym',
		'zip' 			=> 'integer|size:5',
		'email' 		=> 'required|email',
	);

	public function callouts() {
		return $this->hasMany('Callout');
	}

}

?>