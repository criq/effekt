<?php

namespace Effekt;

class Joules extends Quantity
{
	const CONVERSION_CALORIES = 4.184;

	public function __construct(string $amount, string $unit)
	{
		$this->setUnit("J");

		$amount = static::convertToFloat($amount);

		switch (strtoupper($unit)) {
			case "KCAL":
				$this->setAmount($amount * static::CONVERSION_CALORIES * 1000);
				break;
			case "CAL":
				$this->setAmount($amount * static::CONVERSION_CALORIES);
				break;
			case "KJ":
				$this->setAmount($amount * 1000);
				break;
			default:
				$this->setAmount($amount);
				break;
		}
	}

	public function toCal(): Quantity
	{
		return new Quantity($this->getAmount() / static::CONVERSION_CALORIES, "cal");
	}

	public function toKCal(): Quantity
	{
		return new Quantity($this->getAmount() / static::CONVERSION_CALORIES / 1000, "kcal");
	}

	public function toJ(): Quantity
	{
		return new Quantity($this->getAmount(), "J");
	}

	public function toKJ(): Quantity
	{
		return new Quantity($this->getAmount() / 1000, "kJ");
	}
}
