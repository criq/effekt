<?php

namespace Effekt;

class Base
{
	public static function getNumberFormatter(): \NumberFormatter
	{
		return new \NumberFormatter("cs_CZ", \NumberFormatter::DECIMAL);
	}

	public static function getFloat($string): float
	{
		return (float)floatval(trim(strtr(preg_replace("/\s/u", "", $string), ",", ".")));
	}
}
