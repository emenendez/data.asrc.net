<?php

namespace Emenendez\CustomTypes;

use JsonSerializable;
use Carbon\Carbon;

class DateTimeRange implements JsonSerializable {
	
	private $begin;
	private $end;

	public function __construct($begin, $end) {
		$this->begin = new Carbon($begin);
		$this->end = new Carbon($end);
	}
	
	public function getBegin() {
		return $this->begin;
	}

	public function getEnd() {
		return $this->end;
	}

	public function __toString() {
		return $this->begin->toDateTimeString() . ' - ' . $this->end->toDateTimeString();
	}

	public function jsonSerialize()
	{
		return array(
			'begin' => $this->begin->toDateTimeString(),
			'end' => $this->end->toDateTimeString(),
			);
	}
}