<?php

namespace App\Mail;

use App\Models\Admin;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TaskCreated extends Mailable {

	use Queueable, SerializesModels;

	public $request;

	public $user;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct($request, $user) {
		$this->request = $request;
		$this->user = $user;
	}

	/**
	 * Build the task created notify.
	 *
	 * @return $this
	 */
	public function build() {
		$to = Admin::get(['email'])->toArray();
		return $this->to($to)
			->subject(__('mail.subject_task_created'))
			->markdown('mail.task_created')
			->with(['request' => $this->request, 'user' => $this->user]);
	}
}
