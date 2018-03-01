<?php

namespace Platron\securetrading;

use Securetrading\Stpp\JsonInterface\Response as WrappedResponse;

abstract class BaseResponse {

	/**
	 * @var WrappedResponse $wrappedResponse
	 */
	protected $wrappedResponse;

	/**
	 * @return string
	 */
	abstract public function requestTypeDescription();

	/**
	 * @param WrappedResponse $wrappedResponse
	 */
	public function __construct(WrappedResponse $wrappedResponse) {
		$this->wrappedResponse = $wrappedResponse;
	}

	/**
	 * @return WrappedResponse
	 */
	public function getWrappedResponse() {
		return $this->wrappedResponse;
	}

	/**
	 * @return string
	 */
	public function getRequestReference() {
		return $this->getRawData()['requestreference'];
	}

	/**
	 * @return string
	 */
	public function getVersion() {
		return $this->getRawData()['version'];
	}

	/**
	 * @return string
	 */
	public function getErrorCode() {
		return $this->getRawResponseData()['errorcode'];
	}

	/**
	 * @return string
	 */
	public function getErrorMessage() {
		return $this->getRawResponseData()['errormessage'];
	}

	/**
	 * @return string
	 */
	public function getRequestTypeDescription() {
		return $this->getRawResponseData()['requesttypedescription'];
	}

	/**
	 * @return boolean
	 */
	public function isSuccess(){
		if ($this->getErrorCode() === '0') {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * @return boolean
	 */
	public function isValid() {
		if ($this->getRequestTypeDescription() == $this->requestTypeDescription()) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * @return array
	 */
	public function getRawData() {
		return $this->wrappedResponse->toArray();
	}

	/**
	 * @return array
	 */
	public function getRawResponseData() {
		return $this->getRawData()['responses'][0];
	}
}