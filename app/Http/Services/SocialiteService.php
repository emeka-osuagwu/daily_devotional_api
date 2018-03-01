<?php

namespace App\Http\Services;

use Laravel\Socialite\Facades\Socialite;

class SocialiteService
{    
	public function redirect($platform)
    {
        return Socialite::driver($platform)->redirect();   
    }   

    public function callback($platform)
    {
		return Socialite::driver($platform)->user();   
    }

}

?>