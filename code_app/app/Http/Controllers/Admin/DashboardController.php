<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Task\TaskRepositoryInterface AS Task;

class DashboardController extends Controller {

	protected $task;

	public function __construct(Task $task) {
		$this->task = $task;
	}

	public function __invoke() {
		$tasks['approved'] = $this->task->recentApprovedTasks(config('limits.admin_approved_tasks'));
		$tasks['unapproved'] = $this->task->recentUnapprovedTasks(config('limits.admin_unapproved_tasks'));
		return view('admin.dashboard', compact('tasks'));
	}
}
