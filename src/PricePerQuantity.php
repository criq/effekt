<?php

namespace Effekt;

class PricePerQuantity
{
	protected $price;
	protected $quantity;

	public function __construct(Price $price, Quantity $quantity)
	{
		$this->setPrice($price);
		$this->setQuantity($quantity);
	}

	public function setPrice(Price $price): PricePerQuantity
	{
		$this->price = $price;

		return $this;
	}

	public function getPrice(): Price
	{
		return $this->price;
	}

	public function setQuantity(Quantity $quantity): PricePerQuantity
	{
		$this->quantity = $quantity;

		return $this;
	}

	public function getQuantity(): Quantity
	{
		return $this->quantity;
	}

	public function getInCurrency(string $currencyCode): PricePerQuantity
	{
		if ($this->getPrice()->getCurrencyCode() == $currencyCode) {
			return $this;
		} else {
			$url = "http://api.fixer.io/latest?base={$this->getPrice()->getCurrencyCode()}";
			$data = (new \Curl\Curl)->get($url);

			if (!isset($data->rates->$currencyCode)) {
				throw new Exceptions\UnsupportedCurrencyException;
			}

			return new static(new Price($this->getPrice()->getAmount() * $data->rates->$currencyCode, $currencyCode), $this->getQuantity());
		}
	}
}
