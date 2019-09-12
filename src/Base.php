<?php

namespace Effekt;

class Base {

	static function convertToFloat($string) {
		return (float) floatval(trim(strtr(preg_replace('/\s/u', null, $string), ',', '.')));
	}

}
