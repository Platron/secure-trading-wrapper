<?php

namespace Platron\securetrading;

class CardData {

	/**
	 * @var array $requiredData
	 */
	protected $requiredData;

	/**
	 * Constructor.
	 * @param string $pan
	 * @param string $expiryMonth
	 * @param string $expiryYear
	 * @param string $securityCode
	 */
	public function __construct(
		string $pan,
		string $expiryMonth,
		string $expiryYear,
		string $securityCode
	) {
		$this->requiredData = [];
		$this->requiredData['pan'] = $pan;
		$this->requiredData['expirymonth'] = $expiryMonth;
		$this->requiredData['expiryyear'] = $expiryYear;
		$this->requiredData['securitycode'] = $securityCode;
	}

	/**
	 * @return array
	 */
	public function getRequestData() {
		return $this->requiredData;
	}
}