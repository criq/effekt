<?php

namespace Effekt;

class Quantity extends Base implements QuantityInterface
{
	protected $amount;
	protected $unit;

	public function __construct(string $amount, string $unit)
	{
		$this->setAmount($amount);
		$this->setUnit($unit);
	}

	public function __toString(): string
	{
		return (string)(implode(" ", [
			(new \NumberFormatter("cs_CZ", \NumberFormatter::DECIMAL))->format($this->getAmount()),
			$this->getUnit(),
		]));
	}

	public function setAmount(string $amount): Quantity
	{
		$this->amount = static::convertToFloat($amount);

		return $this;
	}

	public function getAmount(): float
	{
		return $this->amount;
	}

	public function getAmountFloat(): float
	{
		return $this->getAmount();
	}

	public function getJoules(): Joules
	{
		return new Joules($this->getAmount(), $this->getUnit());
	}

	public function setUnit(string $unit): Quantity
	{
		$this->unit = trim($unit);

		return $this;
	}

	public function getUnit(): string
	{
		return $this->unit;
	}

	public function getUnitString(): string
	{
		return $this->getUnit();
	}

	public function multiply(float $multiplier): Quantity
	{
		return new static($this->getAmount() * $multiplier, $this->getUnit());
	}
}
