<?php

namespace Effekt;

class Factor
{
	protected $sourceUnit;
	protected $targetUnit;
	protected $factor;

	public function __construct(Unit $sourceUnit, Unit $targetUnit, float $factor)
	{
		$this->setSourceUnit($sourceUnit);
		$this->setTargetUnit($targetUnit);
		$this->setFactor($factor);
	}

	public function setSourceUnit(Unit $sourceUnit): Factor
	{
		$this->sourceUnit = $sourceUnit;

		return $this;
	}

	public function getSourceUnit(): Unit
	{
		return $this->sourceUnit;
	}

	public function setTargetUnit(Unit $targetUnit): Factor
	{
		$this->targetUnit = $targetUnit;

		return $this;
	}

	public function getTargetUnit(): Unit
	{
		return $this->targetUnit;
	}

	public function setFactor(float $factor): Factor
	{
		$this->factor = $factor;

		return $this;
	}

	public function getFactor(): float
	{
		return $this->factor;
	}

	public function getConversions(): ConversionCollection
	{
		return new ConversionCollection([
			new Conversion($this->getSourceUnit(), $this->getTargetUnit(), $this->getFactor()),
			new Conversion($this->getTargetUnit(), $this->getSourceUnit(), 1 / $this->getFactor()),
		]);
	}
}
