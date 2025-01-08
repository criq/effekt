<?php

namespace Effekt\Units;

use Effekt\Factor;
use Effekt\FactorCollection;
use Effekt\Unit;

class KiloCalorieUnit extends Unit
{
	public function getAbbr(): string
	{
		return "kcal";
	}

	public function getFactors(): FactorCollection
	{
		return new FactorCollection([
			new Factor($this, new JouleUnit, 4184),
		]);
	}
}
