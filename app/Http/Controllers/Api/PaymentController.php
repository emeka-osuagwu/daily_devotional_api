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
		$response_data = [
			'data' => $this->paymentService->initializePayment($request->all()),
			'status' => 200
		];

		return SendResponse($response_data, 200);
	}

	public function initializePaymentCallback(Request $request)
	{
		return $request->all();
	}

	public function addCard($value='')
	{
		# code...
	}

	public function saveCardInfo($value='')
	{
		# code...
	}

	public function deleteCard()
	{
		# code...
	}

}
