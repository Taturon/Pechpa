<?php

namespace App\Services;

use App\Mail\TaskCreated;
use Illuminate\Support\Facades\Mail;

class SendMail {

	public function sendTaskCreationNotification($user, $request) {
		Mail::send(new TaskCreated($request, $user));
	}
}
