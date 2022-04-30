<?php

namespace Effekt;

class Price extends Base
{
	public $amount;
	public $currencyCode;

	public function __construct(float $amount, string $currencyCode)
	{
		$this->amount = static::convertToFloat($amount);
		$this->currencyCode = $currencyCode;
	}

	public function getAmount(): float
	{
		return $this->amount;
	}

	public function getCurrencyCode(): string
	{
		return $this->currencyCode;
	}
}
