<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Task\TaskRepositoryInterface AS Task;

class ShowApprovedTasksController extends Controller {

	protected $task;

	public function __construct(Task $task) {
		$this->task = $task;
	}

	public function __invoke() {
		$tasks = $this->task->allReviewedTasks(config('pagings.admin_approved_tasks'));
		return view('admin.task.approved', compact('tasks'));
	}
}
