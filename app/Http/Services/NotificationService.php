<?php

namespace App\Http\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Guzzle\Http\Exception\ClientErrorResponseException;

class NotificationService
{
    protected $http;            
    protected $baseUrl;         

	public function __construct()
	{
	    $this->http = new Client();
	    $this->baseUrl = "https://exp.host/--/api/v2/push/send";
	}

	public function makeRequest($method, $endpoint, $data = '')
	{
		$data = json_encode($data);
		$requestTimeout = false;
		$counter = 0;
		do 
		{
			try {
				$request = $this->http->request('POST', $this->baseUrl . $endpoint, [
					'headers' => [
						'Accept'       => 'application/json',
						'Content-Type'  => 'application/json',
						'accept-encoding' => 'gzip, deflate'
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

	public function emeka($data)
	{
		return $this->makeRequest('POST', '', $data);
	}	

	public function varifyPayment($data)
	{
		return $this->makeRequest('GET', 'transaction/verify/'. $data, $data);
	}
}

?>