<?php

namespace Platron\securetrading;

use Securetrading\Stpp\JsonInterface\Response as WrappedResponse;

class AuthRequest extends BaseAuthRequest {

	/**
	 * @param string $siteReference
	 * @param string $orderId
	 * @param string $amount
	 * @param CardData $cardData
	 */
	public function __construct(
		string $siteReference,
		string $orderId,
		string $amount,
		CardData $cardData
	) {
		parent::__construct();
		$this->requiredData['sitereference'] = $siteReference;
		$this->requiredData['orderreference'] = $orderId;
		$this->requiredData['baseamount'] = $amount;
		$this->requiredData = array_merge(
			$this->requiredData,
			$cardData->getRequestData()
		);
	}

	/**
	 * @param string $currency
	 */
	public function setCurrency(string $currency) {
		$this->requiredData['currencyiso3a'] = $currency;
	}

	/**
	 * Включить рекуренты
	 */
	public function allowRecurring() {
		$this->optionalData['subscriptiontype'] = 'RECURRING';
		$this->optionalData['subscriptionnumber'] = '1';
	}

	/**
	 * @inheritdoc
	 */
	public function getRequestData() {
		$requestData = parent::getRequestData();
		$requestData['accounttypedescription'] = $this->getAccountTypeDescription();
		return $requestData;
	}

	/**
	 * @inheritdoc
	 */
	public function createResponse(WrappedResponse $wrappedResponse) {
		$response = new AuthResponse($wrappedResponse);
		return $response;
	}

	/**
	 * @return string
	 */
	protected function getAccountTypeDescription() {
		return 'ECOM';
	}

	/**
	 * @inheritdoc
	 */
	protected function initDefaultValues() {
		parent::initDefaultValues();
		$this->requiredData['currencyiso3a'] = 'GBP';
	}
}