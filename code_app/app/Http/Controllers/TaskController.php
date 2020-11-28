<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTask;
use Illuminate\Http\Request;

class TaskController extends Controller {

	public function index() {
		$tasks = Task::all();
		return view('task.index', compact('tasks'));
	}

	public function create() {
		return view('task.create');
	}

	public function store(StoreTask $request) {
	}

	public function show($id) {
		$task = Task::find($id);
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
