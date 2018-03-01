<?php

namespace Platron\securetrading;

class ThreeDSecureAuthResponse extends BaseAuthResponse {

	const AUTHENTICATED = 'Y';

	/**
	 * @return string
	 */
	public function getEnrolled() {
		return $this->getRawResponseData()['enrolled'];
	}

	/**
	 * @return string
	 */
	public function getXId() {
		return $this->getRawResponseData()['xid'];
	}

	/**
	 * @return string
	 */
	public function getStatus() {
		return $this->getRawResponseData()['status'];
	}

	/**
	 * @return string
	 */
	public function getEci() {
		return $this->getRawResponseData()['eci'];
	}

	/**
	 * @return string
	 */
	public function getCavv() {
		return $this->getRawResponseData()['cavv'];
	}

	/**
	 * @return boolean
	 */
	public function isAuthenticated(){
		if ($this->getStatus() == self::AUTHENTICATED) {
			return true;
		} else {
			return false;
		}
	}
}