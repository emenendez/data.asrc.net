<?php

namespace Emenendez\CustomTypes;

use Illuminate\Database\Eloquent\Model;

class CustomModel extends Model {
	
	/**
	 * Array to store list of attributes which should be treated as date ranges
	 */
	protected $dateTimeRanges = array();

	/**
	 * dateTimeRange begin postfix
	 *
	 * @var string
	 */
	const BEGIN = '_begin';

	/**
	 * dateTimeRange end postfix
	 *
	 * @var string
	 */
	const END = '_end';

	public function __construct(array $attributes = array())
	{
		parent::__construct($attributes);

		foreach($this->dateTimeRanges as $attribute)
		{
			$this->hidden[] = $attribute . static::BEGIN;
			$this->hidden[] = $attribute . static::END;
		}
		$this->appends = array_merge($this->appends, $this->dateTimeRanges);
	}

	private function attributeToGetMethod($attribute)
	{
		return 'get' . studly_case($attribute) . 'Attribute';
	}

	public function __call($name, $arguments)
    {
    	foreach($this->dateTimeRanges as $attribute)
    	{
    		if($name == $this->attributeToGetMethod($attribute))
    		{
    			return new DateTimeRange($this->{$attribute . static::BEGIN}, $this->{$attribute . static::END});
    		}
    	}
    }

	/**
	 * Check if a key is a datetime range.
	 *
	 * @param  string  $key
	 * @return bool
	 */
	private function isDateTimeRange($key)
	{
		return in_array($key, $this->dateTimeRanges);
	}

	/**
	 * Set a given attribute on the model.
	 *
	 * @param  string  $key
	 * @param  mixed   $value
	 * @return void
	 */
	public function setAttribute($key, $value)
	{
		if($this->isDateTimeRange($key))
		{
			parent::setAttribute($key . static::BEGIN, $value->getBegin());
			parent::setAttribute($key . static::END, $value->getEnd());
		}
		else
		{
			parent::setAttribute($key, $value);
		}
	}

}