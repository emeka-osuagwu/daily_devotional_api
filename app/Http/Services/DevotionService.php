<?php

namespace App\Http\Services;

use Excel;
use App\Models\Devotion;

class DevotionService
{
	public function getAll()
	{
		return Devotion::all();		
	}

	public function bulkUploadDevotion($file)
	{
		Excel::load($file, function($reader) {
			
			$reader->each(function($sheet) {

				$data = [
					"vendor_name" 		=> trim($sheet['businessname']),
					"vendor_phone" 		=> trim($sheet['phoneno']),
					"vendor_sector" 	=> trim($sheet['sector']),
					"vendor_address" 	=> trim($sheet['address']),
					"vendor_username" 	=> trim($sheet['applicantname']),
					"vendor_sub_sector" => trim($sheet['subsector']),
				];

				Devotion::create($data);
			});

		})->get();

		
	}

}

?>