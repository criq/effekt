<?php

namespace Effekt;

class PricePerAmountWithUnit
{
	public $price;
	public $amountWithUnit;

	public function __construct($price, $amountWithUnit)
	{
		$this->price = $price;
		$this->amountWithUnit = $amountWithUnit;
	}

	public function getInCurrency($currencyCode)
	{
		if ($this->price->currencyCode == $currencyCode) {
			return $this;
		} else {
			$data = \Katu\Utils\Cache::getUrl(\Katu\Types\TUrl::make('http://api.fixer.io/latest', [
				'base' => $this->price->currencyCode,
			]), 86400);

			if (!isset($data->rates->$currencyCode)) {
				throw new Exceptions\UnsupportedCurrencyException;
			}

			return new static(new Price($this->price->amount * $data->rates->$currencyCode, $currencyCode), $this->amountWithUnit);
		}
	}
}
