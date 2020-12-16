<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\SendMail;
use App\Http\Requests\StoreTask;
use App\Http\Requests\TasksSearchRequest;
use App\Repositories\Task\TaskRepositoryInterface AS Task;

class TaskController extends Controller {

	protected $task;

	protected $sand_mail;

	public function __construct(Task $task, SendMail $send_mail) {
		$this->task = $task;
		$this->send_mail = $send_mail;
	}

	public function index() {
		$tasks = $this->task->allReviewedTasks(config('pagings.user_tasks'));
		return view('task.index', compact('tasks'));
	}

	public function search(TasksSearchRequest $request) {
		$query = $this->task->makeQuery();
		if (!$request->has('include_no_examinees')) {
			$query = $this->task->withoutNoExaminees($query);
		}
		if (!is_null($request->title)) {
			$query = $this->task->narrowDownWithTitle($query, $request);
		}
		if (!is_null($request->difficulty) && $request->difficulty !== '0') {
			$query = $this->task->narrowDownWithDifficulty($query, $request);
		}
		if (!is_null($request->lower_validity) && $request->lower_validity !== '0') {
			if ($request->has('include_no_examinees')) {
				$query = $this->task->narrowDownWithLowerValidityWithNoExaminees($query, $request);
			} else {
				$query = $this->task->narrowDownWithLowerValidity($query, $request);
			}
		}
		if (!is_null($request->upper_validity) && $request->upper_validity !== '0') {
			if ($request->has('include_no_examinees')) {
				$query = $this->task->narrowDownWithUpperValidityWithNoExaminees($query, $request);
			} else {
				$query = $this->task->narrowDownWithUpperValidity($query, $request);
			}
		}
		$tasks = $query->paginate(config('pagings.user_tasks'));
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
		return redirect()->route('tasks.index')->with('success', __('words.flashes.task_created'));
	}

	public function show($id) {
		$task = $this->task->findReviewedTask($id);
		if ($task) {
			return view('task.show', compact('task'));
		} else {
			return redirect()->route('tasks.index')->with('error', __('words.flashes.no_task'));
		}
	}

	public function edit($id) {
	}

	public function update(Request $request, $id) {
	}

	public function destroy($id) {
	}
}
