<?php

namespace Platron\securetrading;

use Securetrading\Stpp\JsonInterface\Response as WrappedResponse;

class RefundRequest extends BaseRequest {

	/**
	 * @param string $siteReference
	 * @param string $parentTransactionReference
	 */
	public function __construct(
		string $siteReference,
		string $parentTransactionReference
	) {
		parent::__construct();
		$this->requiredData['sitereference'] = $siteReference;
		$this->requiredData['parenttransactionreference'] = $parentTransactionReference;
	}

	/**
	 * @inheritdoc
	 */
	public function createResponse(WrappedResponse $wrappedResponse) {
		$response = new RefundResponse($wrappedResponse);
		return $response;
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
	public function requestTypeDescription() {
		return 'REFUND';
	}

	/**
	 * @inheritdoc
	 */
	protected function initDefaultValues() {
		parent::initDefaultValues();
		$this->optionalData['settlestatus'] = '1';
	}
}