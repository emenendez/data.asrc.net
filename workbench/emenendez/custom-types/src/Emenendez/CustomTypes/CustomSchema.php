<?php

namespace Emenendez\CustomTypes;

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Schema;

class CustomSchema extends Facade {

	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor()
	{
		return new CustomBuilder(Schema::getConnection());
	}

}