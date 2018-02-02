<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Services\UserService;
use App\Http\Services\PaymentService;
use App\Http\Services\SubscriptionService;

class PaymentController extends Controller
{

	protected $userService;
	protected $paymentService;
	protected $subscriptionService;

	function __construct
	(
		UserService $userService,
		PaymentService $paymentService,
		SubscriptionService $subscriptionService
	)
	{
		$this->userService = $userService;
		$this->paymentService = $paymentService;
		$this->subscriptionService = $subscriptionService;
	}

	public function initializePayment(Request $request)
	{

		$request['callback_url'] = Url('/api/v1/payment/initialize_callback');

		$request['metadata'] = [
			"user_id" => $request['user_id'],
			'user_email' => $request['user_email']
		];

		$response_data = [
			'data' => $this->paymentService->initializePayment($request->all()),
			'status' => 200
		];

		return SendResponse($response_data, 200);
	}

	public function initializePaymentCallback(Request $request)
	{
		$payment_response = $this->paymentService->varifyPayment($request->reference);

		if ($payment_response['data']['status'] === 'success' && $payment_response['data']['gateway_response'] === 'Successful') 
		{

			$active_subscription_id = $this->subscriptionService->activeSubscription()->first();

			$active_subscription = $this->subscriptionService->getSubscriptionBy('id', $active_subscription_id->subscription_id)->get()->first();

			$transaction = [
				'user_id' => $payment_response['data']['metadata']['user_id'],
				
				'amount' => $payment_response['data']['amount'],
				'currency' => $payment_response['data']['currency'],
				'status' => $payment_response['data']['status'],
				'channel' => $payment_response['data']['channel'],
				'message' => $payment_response['data']['message'],
				
				'payment_refrence' => $payment_response['data']['reference'],
				'authorization_code' => $payment_response['data']['authorization']['authorization_code'],
				'customer_code' => $payment_response['data']['customer']['customer_code'],
				'customer_email' => $payment_response['data']['customer']['email'],
				'subscription_token' => $active_subscription->subscription_token,
				
				'transaction_date' => $payment_response['data']['transaction_date'],
				'transaction_id' => $payment_response['data']['id'],
			];

			$this->userService->updateSubscriptionToken($payment_response['data']['metadata']['user_id'], $active_subscription->subscription_token);
			$this->paymentService->saveTransaction($transaction);

			return redirect('exp://localhost:19000/+authToken=23xbdbb21b3&gsgdsd=dkjsdfj');
		}
		else 
		{
			return 'invalid payment';
		}

	}


}
