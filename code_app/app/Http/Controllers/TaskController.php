<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\SendMail;
use App\Http\Requests\StoreTask;
use App\Repositories\Task\TaskRepositoryInterface AS Task;

class TaskController extends Controller {

	protected $task;

	protected $sand_mail;

	public function __construct(Task $task, SendMail $send_mail) {
		$this->task = $task;
		$this->send_mail = $send_mail;
	}

	public function index() {
		$tasks = $this->task->allReviewedTasks();
		return view('task.index', compact('tasks'));
	}

	public function create() {
		return view('task.create');
	}

	public function store(StoreTask $request) {
		$task = $this->task->storeTask($request);
		$task_id = $task->id;
		$this->task->storeSampleCases($task_id, $request);
		$this->task->storeTestCases($task_id, $request);
		$this->send_mail->sendTaskCreationNotification(Auth::user(), $request);
		return redirect()->route('tasks.index');
	}

	public function show($id) {
		$task = $this->task->findById($id);
		if ($task) {
			return view('task.show', compact('task'));
		} else {
			return redirect()->route('tasks.index')->with('error', __('flash.no_task'));
		}
	}

	public function edit($id) {
	}

	public function update(Request $request, $id) {
	}

	public function destroy($id) {
	}
}
