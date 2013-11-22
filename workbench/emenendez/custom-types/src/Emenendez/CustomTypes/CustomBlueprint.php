<?php

namespace Emenendez\CustomTypes;

use Illuminate\Database\Schema\Blueprint;

class CustomBlueprint extends Blueprint {

	/**
	 * Create a new date-time range column on the table.
	 *
	 * @param  string  $column
	 * @return \Illuminate\Support\Fluent
	 */
	public function dateTimeRange($column)
	{
		$this->addColumn('dateTime', $column . '_begin')->nullable();
		$this->addColumn('dateTime', $column . '_end')->nullable();
	}

}