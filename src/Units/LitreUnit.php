<?php

namespace Effekt\Units;

use Effekt\Factor;
use Effekt\FactorCollection;
use Effekt\Unit;

class LitreUnit extends Unit
{
	public function getAbbr(): string
	{
		return "l";
	}

	public function getFactors(): FactorCollection
	{
		return new FactorCollection([
			new Factor($this, new MillilitreUnit, 1000),
		]);
	}
}
