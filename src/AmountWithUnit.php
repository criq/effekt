<?php

namespace Effekt;

class AmountWithUnit {

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

	static function convertToFloat($string) {
		return (float) floatval(trim(strtr(preg_replace('/\s/u', null, $string), ',', '.')));
	}

	public function getJoules() {
		return new Joules($this->amount, $this->unit);
	}

}
