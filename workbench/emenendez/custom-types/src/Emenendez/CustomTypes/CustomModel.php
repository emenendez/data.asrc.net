<?php

namespace Emenendez\CustomTypes;

use Illuminate\Database\Eloquent\Model;

class CustomModel extends Model {
	
	/**
	 * Array to store list of attributes which should be treated as date ranges
	 */
	protected $dateTimeRanges = array();

	/**
	 * Array to store list of attributes which should be treated as json
	 */
	protected static $json = array();

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

	/**
	 * The "booting" method of the model.
	 *
	 * @return void
	 */
	protected static function boot()
	{
		parent::boot();

		$class = get_called_class();

		// Add JSON fields to mutator cache
		foreach (static::$json as $attribute)
		{
			static::$mutatorCache[$class][] = $attribute;
		}
	}

	private function attributeToGetMethod($attribute)
	{
		return 'get' . studly_case($attribute) . 'Attribute';
	}

	private function attributeToSetMethod($attribute)
	{
		return 'set' . studly_case($attribute) . 'Attribute';
	}

	public function __call($name, $arguments)
    {
    	if (preg_match('/^get(.+)Attribute$/', $name, $matches))
    	{
    		$attribute = snake_case($matches[1]);

    		if ($this->isDateTimeRange($attribute))
    		{
    			return new DateTimeRange($this->{$attribute . static::BEGIN}, $this->{$attribute . static::END});
    		}
    	}
    	else if (preg_match('/^set(.+)Attribute$/', $name, $matches))
    	{
    		$attribute = snake_case($matches[1]);
    		
    		if ($this->isJson($attribute))
    		{
    			$this->attributes[$attribute] = json_encode($arguments[0]);
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
	 * Check if a key is a json field.
	 *
	 * @param  string  $key
	 * @return bool
	 */
	private function isJson($key)
	{
		return in_array($key, static::$json);
	}

	/**
	 * Determine if a get mutator exists for an attribute.
	 *
	 * @param  string  $key
	 * @return bool
	 */
	public function hasGetMutator($key)
	{
		return parent::hasGetMutator($key) or $this->isJson($key);
	}

	/**
	 * Determine if a set mutator exists for an attribute.
	 *
	 * @param  string  $key
	 * @return bool
	 */
	public function hasSetMutator($key)
	{
		return parent::hasSetMutator($key) or $this->isJson($key);
	}

	/**
	 * Get the value of an attribute using its mutator.
	 *
	 * @param  string  $key
	 * @param  mixed   $value
	 * @return mixed
	 */
	protected function mutateAttribute($key, $value)
	{
		if($this->isJson($key))
		{
			return json_decode($value);
		}
		return parent::mutateAttribute($key, $value);
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