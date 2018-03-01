<?php

namespace Platron\securetrading;

class NonThreeDSecureAuthResponse extends BaseAuthResponse {

	/**
	 * @return string
	 */
	public function getEnrolled() {
		return $this->getRawResponseData()['enrolled'];
	}
}