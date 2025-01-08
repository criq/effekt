<?php

namespace Effekt;

class Conversion
{
	protected $ratio;
	protected $sourceUnit;
	protected $targetUnit;

	public function __construct(Unit $sourceUnit, Unit $targetUnit, float $ratio)
	{
		$this->setRatio($ratio);
		$this->setSourceUnit($sourceUnit);
		$this->setTargetUnit($targetUnit);
	}

	public function setSourceUnit(Unit $sourceUnit): Conversion
	{
		$this->sourceUnit = $sourceUnit;

		return $this;
	}

	public function getSourceUnit(): Unit
	{
		return $this->sourceUnit;
	}

	public function setTargetUnit(Unit $targetUnit): Conversion
	{
		$this->targetUnit = $targetUnit;

		return $this;
	}

	public function getTargetUnit(): Unit
	{
		return $this->targetUnit;
	}

	public function setRatio(float $ratio): Conversion
	{
		$this->ratio = $ratio;

		return $this;
	}

	public function getRatio(): float
	{
		return $this->ratio;
	}
}
