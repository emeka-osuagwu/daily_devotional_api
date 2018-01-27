<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Mail;

class MailService
{
	public function sendMessage($data)
	{
	    Mail::send('emails.user.feedback', ['data' => $data], function ($message) use ($data) {
	        $message->from($data['email'], $data['user']['first_name'] . ' ' . $data['user']['last_name'] );
	        $message->to(env('ADMIN_ADDRESS'))->subject('Message from DYD App: ' . $data['subject']);
	    });
	}
}

?>