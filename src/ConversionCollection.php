<?php

namespace Effekt;

class ConversionCollection extends \ArrayObject
{
	public static function createDefault(): ConversionCollection
	{
		return UnitCollection::createDefault()->getConversions();
	}

	public function filterBySourceUnit(Unit $unit): ConversionCollection
	{
		return new static(array_values(array_filter($this->getArrayCopy(), function (Conversion $conversion) use ($unit) {
			return $conversion->getSourceUnit() == $unit;
		})));
	}

	public function filterByTargetUnit(Unit $unit): ConversionCollection
	{
		return new static(array_values(array_filter($this->getArrayCopy(), function (Conversion $conversion) use ($unit) {
			return $conversion->getTargetUnit() == $unit;
		})));
	}

	public function getFirst(): ?Conversion
	{
		return array_values($this->getArrayCopy())[0] ?? null;
	}
}
