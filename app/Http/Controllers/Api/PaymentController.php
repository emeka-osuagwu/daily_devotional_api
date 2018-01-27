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

	public function welcome(Request $request)
	{
		return $this->paymentService->emeka($request->all());
		return "welcome to devotion version 1 api";
	}

	public function varify(Request $request)
	{
		return $this->paymentService->varifyPayment($request['transaction_reference']);
	}
}
