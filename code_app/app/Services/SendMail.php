<?php

namespace App\Services;

use App\Mail\TaskCreated;
use Illuminate\Support\Facades\Mail;

class SendMail {

	public function sendTaskCreationNotification($user, $request) {
		Mail::queue(new TaskCreated($request->all(), $user));
	}
}
