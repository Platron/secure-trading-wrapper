<?php

namespace Platron\securetrading;

use Securetrading\Stpp\JsonInterface\Response as WrappedResponse;

class NonThreeDSecureAuthRequest extends BaseAuthRequest {

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
	 * Включить рекуренты
	 */
	public function allowRecurring() {
		$this->optionalData['subscriptiontype'] = 'RECURRING';
		$this->optionalData['subscriptionnumber'] = '1';
	}

	/**
	 * @inheritdoc
	 */
	public function createResponse(WrappedResponse $wrappedResponse) {
		$response = new NonThreeDSecureAuthResponse($wrappedResponse);
		return $response;
	}
}