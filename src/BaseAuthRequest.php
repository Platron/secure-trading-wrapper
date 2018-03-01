<?php

namespace Platron\securetrading;

use Securetrading\Stpp\JsonInterface\Response as WrappedResponse;

abstract class BaseAuthRequest extends BaseRequest {

	/**
	 * Отложенный клиринг
	 */
	public function suspendClearing() {
		$this->optionalData['settlestatus'] = '2';
	}

	/**
	 * @inheritdoc
	 */
	public function requestTypeDescription() {
		return 'AUTH';
	}
}