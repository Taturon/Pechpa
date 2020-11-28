<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Task;
use App\Http\Requests\StoreTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller {

	public function index() {
		$tasks = Task::all();
		return view('task.index', compact('tasks'));
	}

	public function create() {
		return view('task.create');
	}

	public function store(StoreTask $request) {
		$task = new Task;
		$task->title = $request->title;
		$task->statement = $request->statement;
		$task->constraints = $request->constraints;
		$task->input = $request->input;
		$task->input_code = $request->input_code;
		$task->output = $request->output;
		$task->output_code = $request->output_code;
		$task->difficulty = $request->difficulty;
		$task->save();

		$datetime = Carbon::now();
		$samples = [
			[
				'task_id' => $task->id,
				'input_code' => $request->sample_input_1,
				'output_code' => $request->sample_output_1,
				'created_at' => $datetime,
				'updated_at' => $datetime,
			]
		];
		if (!is_null($request->sample_input_2) && !is_null($request->sample_output_2)) {
			$sample[] = [
				'task_id' => $task->id,
				'input_code' => $request->sample_input_2,
				'output_code' => $request->sample_output_2,
				'created_at' => $datetime,
				'updated_at' => $datetime,
			];
		}
		if (!is_null($request->sample_input_3) && !is_null($request->sample_output_3)) {
			$sample[] = [
				'task_id' => $task->id,
				'input_code' => $request->sample_input_3,
				'output_code' => $request->sample_output_3,
				'created_at' => $datetime,
				'updated_at' => $datetime,
			];
		}
		DB::table('samples')->insert($samples);

		$tests = [
			[
				'task_id' => $task->id,
				'input' => $request->test_input_1,
				'output' => $request->test_output_1,
				'created_at' => $datetime,
				'updated_at' => $datetime,
			], [
				'task_id' => $task->id,
				'input' => $request->test_input_2,
				'output' => $request->test_output_2,
				'created_at' => $datetime,
				'updated_at' => $datetime,
			], [
				'task_id' => $task->id,
				'input' => $request->test_input_3,
				'output' => $request->test_output_3,
				'created_at' => $datetime,
				'updated_at' => $datetime,
			], [
				'task_id' => $task->id,
				'input' => $request->test_input_4,
				'output' => $request->test_output_4,
				'created_at' => $datetime,
				'updated_at' => $datetime,
			],
		];
		DB::table('tests')->insert($tests);
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
