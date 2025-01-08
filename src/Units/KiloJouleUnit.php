<?php

namespace Effekt\Units;

use Effekt\Factor;
use Effekt\FactorCollection;
use Effekt\Unit;

class KiloJouleUnit extends Unit
{
	public function getAbbr(): string
	{
		return "kJ";
	}

	public function getFactors(): FactorCollection
	{
		return new FactorCollection([
			new Factor($this, new JouleUnit, 1000),
		]);
	}
}
