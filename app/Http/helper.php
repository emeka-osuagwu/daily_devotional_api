<?php

	use Propaganistas\LaravelIntl\Facades\Country;
	use Propaganistas\LaravelIntl\Facades\Currency;

	function sendResponse($data, $status)
	{
		return response()->json($data, $status);
	}

	
	function load_asset($asset_url)
	{
	    return ( env('APP_ENV') === 'production' ) ? secure_asset($asset_url) : asset($asset_url);
	}

	function formatSubscriptionPrice($price, $country)
	{
		return Currency::format($price, 'USD');
	}

?>