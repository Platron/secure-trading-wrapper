<?php

namespace Platron\securetrading;

abstract class BaseAuthResponse extends BaseResponse {

	/**
	 * @inheritdoc
	 */
	public function requestTypeDescription() {
		return 'AUTH';
	}

	/**
	 * @return string
	 */
	public function getTransactionReference() {
		return $this->getRawResponseData()['transactionreference'];
	}

	/**
	 * @return string
	 */
	public function getSettleStatus() {
		return $this->getRawResponseData()['settlestatus'];
	}

	/**
	 * @return string
	 */
	public function getAuthCode() {
		return $this->getRawResponseData()['authcode'] ?? null;
	}

	/**
	 * @return string
	 */
	public function getAcquirerResponseCode() {
		return $this->getRawResponseData()['acquirerresponsecode'] ?? null;
	}
}