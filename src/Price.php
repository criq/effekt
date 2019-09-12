<?php

namespace Effekt;

<<<<<<< HEAD
class Price extends Base {
=======
class Price {
>>>>>>> 4ffa6ccb8f59a954d791ca3a4ba8e525d25c0241

	public $amount;
	public $currencyCode;

	public function __construct($amount, $currencyCode) {
<<<<<<< HEAD
		$this->amount = static::convertToFloat($amount);
=======
		$this->amount = $amount;
>>>>>>> 4ffa6ccb8f59a954d791ca3a4ba8e525d25c0241
		$this->currencyCode = $currencyCode;
	}

}
