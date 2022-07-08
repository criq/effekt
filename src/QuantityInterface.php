<?php

namespace Effekt;

interface QuantityInterface
{
	public function getAmountFloat(): float;
	public function getUnitString(): string;
}
