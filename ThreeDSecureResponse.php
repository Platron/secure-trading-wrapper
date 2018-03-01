<?php

namespace Platron\securetrading;

class ThreeDSecureResponse extends BaseResponse {

	const ENROLLED = 'Y';

	/**
	 * @inheritdoc
	 */
	public function requestTypeDescription() {
		return 'THREEDQUERY';
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
	public function getEnrolled() {
		return $this->getRawResponseData()['enrolled'];
	}

	/**
	 * @return string
	 */
	public function getPaReq() {
		return $this->getRawResponseData()['pareq'] ?? null;
	}

	/**
	 * @return string
	 */
	public function getMd() {
		return $this->getRawResponseData()['md'] ?? null;
	}

	/**
	 * @return string
	 */
	public function getAcsUrl() {
		return $this->getRawResponseData()['acsurl'] ?? null;
	}

	/**
	 * @return boolean
	 */
	public function isEnrolled() {
		if ($this->getEnrolled() == self::ENROLLED) {
			return true;
		} else {
			return false;
		}
	}
}