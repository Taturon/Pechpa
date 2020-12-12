<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\StoreTask;
use App\Http\Controllers\Controller;
use App\Repositories\Task\TaskRepositoryInterface AS Task;

class TaskController extends Controller {

	protected $task;

	public function __construct(Task $task) {
		$this->task = $task;
	}

	public function index() {
		$tasks = $this->task->allUnreviewedTasks(config('pagings.admin_unapproved_tasks'));
		return view('admin.task.index', compact('tasks'));
	}

	public function show($id) {
		$task = $this->task->findReviewedTask($id);
		return view('admin.task.show', compact('task'));
	}

	public function edit($id) {
		$task = $this->task->findUnreviewedTask($id);
		return view('admin.task.edit', compact('task'));
	}

	public function update(StoreTask $request, $task_id) {
		$this->task->destroySampleCases($task_id);
		$this->task->storeSampleCases($task_id, $request);
		$this->task->destroyTestCases($task_id);
		$this->task->storeTestCases($task_id, $request);
		if ($request->has('approval')) {
			$this->task->updateTaskWithApproval($task_id, $request);
			return redirect()->route('admin.tasks.index')->with('success', __('flash.task_approved'));
		} elseif ($request->has('update')) {
			$this->task->updateTaskWithoutApproval($task_id, $request);
			return redirect()->route('admin.tasks.index')->with('success', __('flash.task_updated'));
		}
	}
}
