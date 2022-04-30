<?php

namespace Effekt;

class Base
{
	public static function convertToFloat(string $string): float
	{
		return (float)floatval(trim(strtr(preg_replace("/\s/u", "", $string), ",", ".")));
	}
}
