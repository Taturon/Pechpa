<?php

namespace App\Repositories\Task;

use Carbon\Carbon;
use App\Models\Task;
use Illuminate\Support\Facades\DB;

class TaskRepository implements TaskRepositoryInterface {

	protected $task;

	public function __construct(Task $task) {
		$this->task = $task;
	}

	public function all() {
		return $this->task->all();
	}

	public function allReviewedTasks() {
		return $this->task->whereNotNull('reviewed_at')->get();
	}

	public function allUnreviewedTasks() {
		return $this->task->whereNull('reviewed_at')->get();
	}

	public function findById($id) {
		return $this->task->whereNotNull('reviewed_at')->find($id);
	}

	public function storeTask($request) {
		return $this->task->create([
			'title' => $request->title,
			'statement' => $request->statement,
			'constraints' => $request->constraints,
			'input' => $request->input,
			'input_code' => $request->input_code,
			'output' => $request->output,
			'output_code' => $request->output_code,
			'difficulty' => $request->difficulty
		]);
	}

	public function storeSampleCases($task_id, $request) {
		$datetime = Carbon::now();
		$samples = [
			[
				'task_id' => $task_id,
				'input_code' => $request->sample_input_1,
				'output_code' => $request->sample_output_1,
				'created_at' => $datetime,
				'updated_at' => $datetime,
			]
		];
		if (!is_null($request->sample_input_2) && !is_null($request->sample_output_2)) {
			$samples[] = [
				'task_id' => $task_id,
				'input_code' => $request->sample_input_2,
				'output_code' => $request->sample_output_2,
				'created_at' => $datetime,
				'updated_at' => $datetime,
			];
		}
		if (!is_null($request->sample_input_3) && !is_null($request->sample_output_3)) {
			$samples[] = [
				'task_id' => $task_id,
				'input_code' => $request->sample_input_3,
				'output_code' => $request->sample_output_3,
				'created_at' => $datetime,
				'updated_at' => $datetime,
			];
		}
		DB::table('samples')->insert($samples);
	}

	public function storeTestCases($task_id, $request) {
		$datetime = Carbon::now();
		$tests = [
			[
				'task_id' => $task_id,
				'input' => $request->test_input_1,
				'output' => $request->test_output_1,
				'created_at' => $datetime,
				'updated_at' => $datetime,
			], [
				'task_id' => $task_id,
				'input' => $request->test_input_2,
				'output' => $request->test_output_2,
				'created_at' => $datetime,
				'updated_at' => $datetime,
			], [
				'task_id' => $task_id,
				'input' => $request->test_input_3,
				'output' => $request->test_output_3,
				'created_at' => $datetime,
				'updated_at' => $datetime,
			], [
				'task_id' => $task_id,
				'input' => $request->test_input_4,
				'output' => $request->test_output_4,
				'created_at' => $datetime,
				'updated_at' => $datetime,
			],
		];
		DB::table('tests')->insert($tests);
	}

}
