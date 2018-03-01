<?php

namespace Platron\securetrading;

use Securetrading\Stpp\JsonInterface\Response as WrappedResponse;

abstract class BaseRequest {

	/**
	 * @var array $optionalData
	 */
	protected $optionalData;

	/**
	 * @var array $requiredData
	 */
	protected $requiredData;

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->initDefaultValues();
	}

	/**
	 * @param array $optionalData
	 */
	public function setOptionalData(array $optionalData) {
		$this->optionalData = $optionalData;
	}

	/**
	 * @return array
	 */
	public function getRequestData() {
		$requestData = [];
		$requestData = array_merge($requestData, $this->requiredData);
		$requestData = array_merge($requestData, $this->optionalData);
		$requestData['requesttypedescription'] = $this->requestTypeDescription();
		return $requestData;
	}

	/**
	 * @param WrappedResponse $wrappedResponse
	 * @return BaseResponse
	 */
	abstract public function createResponse(WrappedResponse $wrappedResponse);

	/**
	 * @return string
	 */
	abstract public function requestTypeDescription();

	/**
	 * Initializes default values.
	 * This method is invoked of the constructor.
	 */
	protected function initDefaultValues() {
		$this->requiredData = [];
		$this->optionalData = [];
	}
}