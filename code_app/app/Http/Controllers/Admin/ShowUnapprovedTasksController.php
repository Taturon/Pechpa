<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Task\TaskRepositoryInterface AS Task;

class ShowUnapprovedTasksController extends Controller {

	protected $task;

	public function __construct(Task $task) {
		$this->task = $task;
	}

	public function __invoke() {
		$tasks = $this->task->allUnreviewedTasks(config('pagings.admin_unapproved_tasks'));
		return view('admin.task.unapproved', compact('tasks'));
	}
}
