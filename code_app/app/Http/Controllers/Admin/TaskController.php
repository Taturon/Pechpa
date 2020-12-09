<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Task\TaskRepositoryInterface AS Task;

class TaskController extends Controller {

	protected $task;

	public function __construct(Task $task) {
		$this->task = $task;
	}

	public function index() {
		$tasks = $this->task->allUnreviewedTasks();
		return view('admin.task.index', compact('tasks'));
	}

	public function edit($id) {
		$task = $this->task->findUnreviewedTask($id);
		return view('admin.task.edit', compact('task'));
	}
}
