<?php

namespace Effekt;

class Price extends Base
{
	public $amount;
	public $currencyCode;

	public function __construct($amount, $currencyCode)
	{
		$this->amount = static::convertToFloat($amount);
		$this->currencyCode = $currencyCode;
	}
}
