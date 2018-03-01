<?php

namespace Platron\securetrading;

use Securetrading\Stpp\JsonInterface\Response as WrappedResponse;

class ThreeDSecureAuthRequest extends BaseAuthRequest {

	/**
	 * @param string $md
	 * @param string $paRes
	 */
	public function __construct(
		string $md,
		string $paRes
	) {
		parent::__construct();
		$this->requiredData['md'] = $md;
		$this->requiredData['pares'] = $paRes;
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
		$response = new ThreeDSecureAuthResponse($wrappedResponse);
		return $response;
	}
}