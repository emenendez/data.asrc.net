<?php

namespace Emenendez\CustomTypes;

use JsonSerializable;
use Carbon\Carbon;

class DateTimeRange implements JsonSerializable {
	
	private $begin;
	private $end;

	public function __construct($begin = null, $end = null) {
		$this->begin = $begin ? new Carbon($begin) : null;
		$this->end = $end ? new Carbon($end) : null;
	}
	
	public function getBegin() {
		return $this->begin;
	}

	public function getEnd() {
		return $this->end;
	}

	public function __toString() {
		return $this->begin ?
			( $this->begin->toDateTimeString() . ' - ' . $this->end->toDateTimeString() )
			: null;
	}

	public function jsonSerialize()
	{
		return $this->begin ? array(
			'begin' => $this->begin->toDateTimeString(),
			'end' => $this->end->toDateTimeString(),
			) : null;
	}
}