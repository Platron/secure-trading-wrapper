<?php

namespace Platron\securetrading;

use Securetrading\Stpp\JsonInterface\Response as WrappedResponse;

class ThreeDSecureRequest extends BaseRequest {

	/**
	 * @param string $siteReference
	 * @param string $orderId
	 * @param string $amount
	 * @param string $returnUrl
	 * @param CardData $cardData
	 */
	public function __construct(
		string $siteReference,
		string $orderId,
		string $amount,
		string $returnUrl,
		CardData $cardData
	) {
		parent::__construct();
		$this->requiredData['sitereference'] = $siteReference;
		$this->requiredData['orderreference'] = $orderId;
		$this->requiredData['baseamount'] = $amount;
		$this->requiredData['termurl'] = $returnUrl;
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
		$response = new ThreeDSecureResponse($wrappedResponse);
		return $response;
	}

	/**
	 * @inheritdoc
	 */
	public function requestTypeDescription() {
		return 'THREEDQUERY';
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