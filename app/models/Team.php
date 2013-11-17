<?php

class Team extends Eloquent {
	protected $hidden = array('api_key', 'private_key');

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