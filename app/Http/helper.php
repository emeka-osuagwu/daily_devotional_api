<?php




	function sendResponse($data, $status)
	{
		return response()->json($data, $status);
	}

?>