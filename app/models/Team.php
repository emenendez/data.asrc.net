<?php

class Team extends Eloquent {

	protected $hidden = array('api_key', 'private_key');

	public static $rules = array(
		'name' 			=> 'required',
		'state' 		=> 'exists:states,acronym',
		'zip' 			=> 'integer|size:5',
		'email' 		=> 'required|email',
	);

	public function getPrimaryAreaAttribute($value)
	{
		return json_decode($value);
	}

	public function setPrimaryAreaAttribute($value)
	{
		$this->attributes['primary_area'] = json_encode($value);
	}
}

?>