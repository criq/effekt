<?php

namespace Effekt\Units;

use Effekt\Factor;
use Effekt\FactorCollection;
use Effekt\Unit;

class KiloGramUnit extends Unit
{
	public function getAbbr(): string
	{
		return "kg";
	}

	public function getFactors(): FactorCollection
	{
		return new FactorCollection([
			new Factor($this, new GramUnit, 1000),
		]);
	}
}
