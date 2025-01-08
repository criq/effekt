<?php

namespace Effekt\Units;

use Effekt\Factor;
use Effekt\FactorCollection;
use Effekt\Unit;

class CalorieUnit extends Unit
{
	public function getAbbr(): string
	{
		return "cal";
	}

	public function getFactors(): FactorCollection
	{
		return new FactorCollection([
			new Factor($this, new JouleUnit, 4.184),
		]);
	}
}
