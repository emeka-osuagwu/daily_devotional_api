<?php

namespace App\Http\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Guzzle\Http\Exception\ClientErrorResponseException;

class PaymentService
{
    protected $http;            
    protected $baseUrl;         

	public function __construct()
	{
	    $this->http = new Client();
	    $this->baseUrl = "https://api.paystack.co/";
	}

	public function makeRequest($method, $endpoint, $data = '')
	{
		$data = json_encode($data);
		$requestTimeout = false;
		$counter = 0;
		do 
		{
			try {
				$request = $this->http->request($method, $this->baseUrl . $endpoint, [
					'headers' => [
						'Accept'       => 'application/json',
						'Content-Type'  => 'application/json',
						'Authorization' => 'Bearer ' . env('PAYSTACK_SECRET_KEY')
					],
					'body' => $data
				]);

				return json_decode($request->getBody(), true);
			} 
			catch (Exception $exception) 
			{
				$counter++;
				\Log::debug('ARM API Error. Attempt No. ' . $counter);
				$requestTimeout = true;
			}
		} 
		while ($requestTimeout === true && $counter < 5);
		throw $exception;
	}

	public function initializePayment($data)
	{
		return $this->makeRequest('POST', 'transaction/initialize', $data);
	}	

	public function varifyPayment($data)
	{
		return $this->makeRequest('GET', 'transaction/verify/'. $data, []);
	}
}




// curl https://api.paystack.co/transaction/initialize \
// -H "Authorization: Bearer SECRET_KEY" \
// -H "Content-Type: application/json" \
// -d '{"reference": "7PVGX8MEk85tgeEpVDtD", "amount": 500000, "email": "customer@email.com"}' \
// -X POST

?>