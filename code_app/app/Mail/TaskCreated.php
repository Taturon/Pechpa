<?php

namespace App\Mail;

use App\Models\Admin;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TaskCreated extends Mailable {

	use Queueable, SerializesModels;

	protected $title;

	protected $user_name;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct($title, $user_name) {
		$this->title = $title;
		$this->user_name = $user_name;
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
			->with(['title' => $this->title, 'user_name' => $this->user_name]);
	}
}
