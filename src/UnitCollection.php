<?php

namespace Effekt;

class UnitCollection extends \ArrayObject
{
	public static function createDefault(): UnitCollection
	{
		return new static([
			new \Effekt\Units\CalorieUnit,
			new \Effekt\Units\GramUnit,
			new \Effekt\Units\JouleUnit,
			new \Effekt\Units\KiloCalorieUnit,
			new \Effekt\Units\KiloGramUnit,
			new \Effekt\Units\KiloJouleUnit,
			new \Effekt\Units\LitreUnit,
			new \Effekt\Units\MillilitreUnit,
			new \Effekt\Units\REUnit,
		]);
	}

	public static function createFromInput($input): UnitCollection
	{
		if ($input instanceof static) {
			return $input;
		} elseif (is_array($input)) {
			return new static(array_values(array_filter(array_map(function ($unitInput) {
				return Unit::createFromInput($unitInput);
			}, $input))));
		}

		return new static;
	}

	public function filterByString(string $string): UnitCollection
	{
		return new static(array_values(array_filter($this->getArrayCopy(), function (Unit $unit) use ($string) {
			return $unit->matches($string);
		})));
	}

	public function getFirst(): ?Unit
	{
		return array_values($this->getArrayCopy())[0] ?? null;
	}

	public function getPrimary(): ?Unit
	{
		return $this->getFirst();
	}

	public function getConversions(): ConversionCollection
	{
		return new ConversionCollection(array_merge(...array_map(function (Unit $unit) {
			return $unit->getConversions()->getArrayCopy();
		}, $this->getArrayCopy())));
	}
}
