<?php

namespace Effekt;

class Quantity extends Base implements QuantityInterface
{
	public $amount;
	public $unit;

	public function __construct(float $amount, string $unit)
	{
		$this->amount = static::convertToFloat($amount);
		$this->unit = trim($unit);
	}

	public function __toString(): string
	{
		return (string)(implode(" ", [
			$this->amount,
			$this->unit,
		]));
	}

	public function getJoules(): Joules
	{
		return new Joules($this->amount, $this->unit);
	}

	public function multiply(float $multiplier): Quantity
	{
		return new static($this->amount * $multiplier, $this->unit);
	}

	public function getAmount(): float
	{
		return $this->amount;
	}

	public function getAmountFloat(): float
	{
		return $this->getAmount();
	}

	public function setUnit(string $unit): Quantity
	{
		return new static($this->amount, $unit);
	}

	public function getUnit(): string
	{
		return $this->unit;
	}

	public function getUnitString(): string
	{
		return $this->getUnit();
	}
}
