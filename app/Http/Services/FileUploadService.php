<?php

namespace App\Http\Services;

use JD\Cloudder\Facades\Cloudder;

/**
 * Class FileUploadService
 * @package App\Http\Services
 */
class FileUploadService
{
    /**
     * @param $data
     * @return mixed
     */
    public function toCloudinary($data)
    {
        Cloudder::upload($data, null, []);
        $url = Cloudder::getResult()['url'];
        return $url;
    }

}
