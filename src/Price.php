<?php

namespace Effekt;

class Price extends Base
{
	protected $amount;
	protected $currencyCode;

	public function __construct(float $amount, string $currencyCode)
	{
		$this->setAmount($amount);
		$this->setCurrencyCode($currencyCode);
	}

	public function setAmount(string $amount)
	{
		$this->amount = static::getFloat($amount);

		return $this;
	}

	public function getAmount(): float
	{
		return $this->amount;
	}

	public function setCurrencyCode(string $currencyCode): Price
	{
		$this->currencyCode = $currencyCode;

		return $this;
	}

	public function getCurrencyCode(): string
	{
		return $this->currencyCode;
	}
}
