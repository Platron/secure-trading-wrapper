<?php

namespace Platron\securetrading;

class UpdateResponse extends BaseResponse {

	/**
	 * @inheritdoc
	 */
	public function requestTypeDescription() {
		return 'TRANSACTIONUPDATE';
	}
}