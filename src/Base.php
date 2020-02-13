<?php

namespace Effekt;

class Base
{
	public static function convertToFloat($string)
	{
		return (float) floatval(trim(strtr(preg_replace('/\s/u', null, $string), ',', '.')));
	}
}
