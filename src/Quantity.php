<?php

namespace Effekt;

class Quantity extends Base implements QuantityInterface
{
	protected $amount;
	protected $unit;

	public function __construct($amount, $unit)
	{
		$this->setAmount($amount);
		$this->setUnit($unit);
	}

	public function __toString(): string
	{
		return (string)(implode(" ", [
			$this->getNumberFormatter()->format($this->getAmount()),
			$this->getUnitString(),
		]));
	}

	public function setAmount($amount): Quantity
	{
		$this->amount = static::getFloat($amount);

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

	public function setUnit($unit): Quantity
	{
		$unit = Unit::createFromInput($unit);
		if (!$unit) {
			throw new \Effekt\Exceptions\UnsupportedUnitException;
		}

		$this->unit = $unit;

		return $this;
	}

	public function getUnit(): Unit
	{
		return $this->unit;
	}

	public function getUnitString(): string
	{
		return $this->getUnit()->getAbbr();
	}

	public function getMultiplied(float $multiplier): Quantity
	{
		return new static($this->getAmount() * $multiplier, $this->getUnit());
	}

	public function getInUnit($unit): ?Quantity
	{
		$unit = Unit::createFromInput($unit);
		if (!$unit) {
			throw new \Effekt\Exceptions\UnsupportedUnitException;
		}

		if ($unit == $this->getUnit()) {
			return $this;
		}

		$conversion = $this->getUnit()->getConversion($unit);
		if ($conversion) {
			return new static($this->getAmount() * $conversion->getRatio(), $unit);
		}

		return null;
	}

	public function getInUnits($units): QuantityCollection
	{
		return new QuantityCollection(array_values(array_filter(array_map(function (Unit $unit) {
			return $this->getInUnit($unit);
		}, UnitCollection::createFromInput($units)->getArrayCopy()))));
	}
}
