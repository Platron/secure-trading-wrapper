<?php

namespace Platron\securetrading;

use Securetrading\Stpp\JsonInterface\Response as WrappedResponse;

class RecurringAuthRequest extends BaseAuthRequest {

	/**
	 * @param string $siteReference
	 * @param string $parentTransactionReference
	 * @param string $orderCount
	 */
	public function __construct(
		string $siteReference,
		string $parentTransactionReference,
		string $orderCount
	) {
		parent::__construct();
		$this->requiredData['sitereference'] = $siteReference;
		$this->requiredData['parenttransactionreference'] = $parentTransactionReference;
		$this->requiredData['subscriptionnumber'] = $orderCount;
	}

	/**
	 * @param string $currency
	 */
	public function setCurrency(string $currency) {
		$this->optionalData['currencyiso3a'] = $currency;
	}

	/**
	 * @param string $amount
	 */
	public function setAmount(string $amount) {
		$this->optionalData['baseamount'] = $amount;
	}

	/**
	 * @inheritdoc
	 */
	public function createResponse(WrappedResponse $wrappedResponse) {
		$response = new RecurringAuthResponse($wrappedResponse);
		return $response;
	}

	/**
	 * @inheritdoc
	 */
	public function getRequestData() {
		$requestData = parent::getRequestData();
		$requestData['subscriptiontype'] = $this->getSubscriptionType();
		$requestData['accounttypedescription'] = $this->getAccountTypeDescription();
		return $requestData;
	}

	/**
	 * @return string
	 */
	protected function getSubscriptionType() {
		return 'RECURRING';
	}

	/**
	 * @return string
	 */
	protected function getAccountTypeDescription() {
		return 'RECUR';
	}
}