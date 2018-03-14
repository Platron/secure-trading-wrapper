<?php

namespace Platron\securetrading;

use Securetrading\Stpp\JsonInterface\Response as WrappedResponse;

class UpdateRequest extends BaseRequest {

	/**
	 * @param string $siteReference
	 * @param string $transactionReference
	 */
	public function __construct(
		string $siteReference,
		string $transactionReference
	) {

		parent::__construct();
		$this->requiredData['filter']['sitereference'] = ['value' => $siteReference];
		$this->requiredData['filter']['transactionreference'] = ['value' => $transactionReference];
	}

	/**
	 * Клиринг
	 */
	public function clearing() {
		$this->optionalData['updates']['settlestatus'] = '1';
	}

	/**
	 * Отмена
	 */
	public function cancel() {
		$this->optionalData['updates']['settlestatus'] = '3';
	}

	/**
	 * @param string $amount
	 */
	public function setAmount(string $amount) {
		$this->optionalData['updates']['settlebaseamount'] = $amount;
	}

	/**
	 * @inheritdoc
	 */
	public function createResponse(WrappedResponse $wrappedResponse) {
		$response = new UpdateResponse($wrappedResponse);
		return $response;
	}

	/**
	 * @inheritdoc
	 */
	public function requestTypeDescription() {
		return 'TRANSACTIONUPDATE';
	}
}