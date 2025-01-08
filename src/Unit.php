<?php

namespace Effekt;

abstract class Unit
{
	abstract public function getAbbr(): string;

	public static function createFromInput($input): ?Unit
	{
		if ($input instanceof static) {
			return $input;
		} elseif (is_string($input)) {
			return static::createFromString($input);
		}

		return null;
	}

	public static function createFromString(string $string): ?Unit
	{
		return UnitCollection::createDefault()->filterByString($string)->getPrimary();
	}

	public function matches(string $string): bool
	{
		return $string == $this->getAbbr();
	}

	public function getFactors(): FactorCollection
	{
		return new FactorCollection;
	}

	public function getConversions(): ConversionCollection
	{
		return new ConversionCollection(array_merge([new Conversion($this, $this, 1)], ...array_map(function (Factor $factor) {
			return $factor->getConversions()->getArrayCopy();
		}, $this->getFactors()->getArrayCopy())));
	}

	public function getConversion(Unit $targetUnit): ?Conversion
	{
		return (new ConversionCollection(array_values(array_filter(array_map(function (Conversion $baseConversion) use ($targetUnit) {
			$extendedConversion = ConversionCollection::createDefault()->filterBySourceUnit($baseConversion->getTargetUnit())->filterByTargetUnit($targetUnit)->getFirst();
			if ($extendedConversion) {
				return new Conversion($this, $targetUnit, $baseConversion->getRatio() * $extendedConversion->getRatio());
			}

			return null;
		}, $this->getConversions()->filterBySourceUnit($this)->getArrayCopy())))))->getFirst();
	}
}
