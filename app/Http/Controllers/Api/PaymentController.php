<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Services\PaymentService;

class PaymentController extends Controller
{

	protected $paymentService;

	function __construct
	(
		PaymentService $paymentService
	)
	{
		$this->paymentService = $paymentService;
	}

	public function initializePayment(Request $request)
	{

		$request['callback_url'] = Url('/api/v1/payment/initialize_callback');

		$response_data = [
			'data' => $this->paymentService->initializePayment($request->all()),
			'status' => 200
		];

		return SendResponse($response_data, 200);
	}

	public function initializePaymentCallback(Request $request)
	{

		return $this->paymentService->varifyPayment($request->reference);
	}


}
