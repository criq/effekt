<?php

namespace Effekt;

class QuantityCollection extends \ArrayObject
{
	public function getFirst(): ?Quantity
	{
		return array_values($this->getArrayCopy())[0] ?? null;
	}
}
