<?php

namespace Platron\securetrading;

class Client {

	/**
	 * @var ConnectionSettingData $connectionSettingData
	 */
	protected $connectionSettingData;

	/**
	 * Constructor.
	 * @param ConnectionSettingData $connectionSettingData
	 */
	public function __construct(ConnectionSettingData $connectionSettingData) {
		$this->connectionSettingData = $connectionSettingData;
	}

	/**
	 * @param BaseRequest $request
	 * @return BaseResponse $response
	 */
	public function sendRequest(BaseRequest $request) {
		$configData = $this->connectionSettingData->getConfigData();
		$requestData = $request->getRequestData();
		$api = \Securetrading\api($configData);
		$responseData = $api->process($requestData);
		$response = $request->createResponse($responseData);
		return $response;
	}
}