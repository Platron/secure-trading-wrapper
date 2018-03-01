<?php

namespace Platron\securetrading;

class ConnectionSettingData {

	/**
	 * @var array $configData
	 */
	protected $configData;

	/**
	 * Constructor.
	 * @param string $login
	 * @param string $password
	 */
	public function __construct(string $login, string $password) {
		$configData = [];
		$this->configData['username'] = $login;
		$this->configData['password'] = $password;
	}

	/**
	 * @return array
	 */
	public function getConfigData() {
		return $this->configData;
	}
}