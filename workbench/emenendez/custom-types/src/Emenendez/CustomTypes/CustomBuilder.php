<?php

namespace Emenendez\CustomTypes;

use Illuminate\Database\Schema\MySqlBuilder;

class CustomBuilder extends MySqlBuilder {

	/**
	 * Create a new command set with a Closure.
	 *
	 * @param  string   $table
	 * @param  Closure  $callback
	 * @return \Illuminate\Database\Schema\Blueprint
	 */
	protected function createBlueprint($table, Closure $callback = null)
	{
		return new CustomBlueprint($table, $callback);
	}

}