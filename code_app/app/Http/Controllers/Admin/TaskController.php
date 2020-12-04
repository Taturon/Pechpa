<?php

namespace App\Http\Controllers\Admin;

use App\Models\Task;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller {

	public function index() {
		$tasks = Task::all();
		return view('admin.task.index', compact('tasks'));
	}
}
