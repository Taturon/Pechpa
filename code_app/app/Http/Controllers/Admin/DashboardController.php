<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Task\TaskRepositoryInterface AS Task;
use App\Repositories\Inquiry\InquiryRepositoryInterface AS Inquiry;

class DashboardController extends Controller {

	protected $task;

	protected $inquiry;

	public function __construct(Task $task, Inquiry $inquiry) {
		$this->task = $task;
		$this->inquiry = $inquiry;
	}

	public function __invoke() {
		$tasks['approved'] = $this->task->recentApprovedTasks(config('limits.admin_approved_tasks'));
		$tasks['unapproved'] = $this->task->recentUnapprovedTasks(config('limits.admin_unapproved_tasks'));
		$inquiries = $this->inquiry->recentInquiries(config('limits.admin_inquiries'));
		return view('admin.dashboard', compact('tasks', 'inquiries'));
	}
}
