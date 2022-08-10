<?php

namespace Effekt;

class PricePerQuantity
{
	public $price;
	public $quantity;

	public function __construct(Price $price, Quantity $quantity)
	{
		$this->price = $price;
		$this->quantity = $quantity;
	}

	public function getPrice(): Price
	{
		return $this->price;
	}

	public function getQuantity(): Quantity
	{
		return $this->quantity;
	}

	public function getInCurrency(string $currencyCode): PricePerQuantity
	{
		if ($this->price->currencyCode == $currencyCode) {
			return $this;
		} else {
			$url = "http://api.fixer.io/latest?base={$this->price->currencyCode}";
			$data = (new \Curl\Curl)->get($url);

			if (!isset($data->rates->$currencyCode)) {
				throw new Exceptions\UnsupportedCurrencyException;
			}

			return new static(new Price($this->price->amount * $data->rates->$currencyCode, $currencyCode), $this->quantity);
		}
	}
}
