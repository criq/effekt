<?php

namespace Effekt;

class AmountWithUnit extends Base {

	public $amount;
	public $unit;

	public function __construct($amount, $unit) {
		$this->amount = static::convertToFloat($amount);
		$this->unit = trim($unit);
	}

	public function __toString() {
		return (string)(implode(' ', [
			$this->amount,
			$this->unit,
		]));
	}

	public function getJoules() {
		return new Joules($this->amount, $this->unit);
	}

	public function multiply($multiplier) {
		return new static($this->amount * $multiplier, $this->unit);
	}

	public function setUnit($unit) {
		return new static($this->amount, $unit);
	}

}
