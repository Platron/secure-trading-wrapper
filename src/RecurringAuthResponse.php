<?php

namespace Platron\securetrading;

class RecurringAuthResponse extends BaseAuthResponse {

	/**
	 * @return string
	 */
	public function getAcquirerAdviceCode() {
		return $this->getRawResponseData()['acquireradvicecode'] ?? null;
	}

	/**
	 * @return string
	 */
	protected function getAccountTypeDescription() {
		return 'RECUR';
	}
}