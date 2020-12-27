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

	public function allReviewedTasks($paging) {
		return $this->task->whereNotNull('reviewed_at')->paginate($paging);
	}

	public function recentApprovedTasks($count) {
		return $this->task->whereNotNull('reviewed_at')->orderBy('reviewed_at', 'desc')->limit($count)->get();
	}

	public function userCreatedUnapprovedTasks($user_id) {
		return $this->task->where('user_id', $user_id)->whereNull('reviewed_at');
	}

	public function allUnreviewedTasks($paging) {
		return $this->task->whereNull('reviewed_at')->paginate($paging);
	}

	public function recentUnapprovedTasks($count) {
		return $this->task->whereNull('reviewed_at')->orderBy('reviewed_at', 'desc')->limit($count)->get();
	}

	public function userCreatedApprovedTasks($user_id) {
		return $this->task->where('user_id', $user_id)->whereNotNull('reviewed_at');
	}

	public function findReviewedTask($id) {
		return $this->task->whereNotNull('reviewed_at')->find($id);
	}

	public function findUnreviewedTask($id) {
		return $this->task->whereNull('reviewed_at')->find($id);
	}

	public function makeQuery() {
		return $this->task->query()->whereNotNull('reviewed_at');
	}

	public function narrowDownWithTitle($query, $request) {
		return $query->where('title', 'like', '%\\' . $request->title . '%');
	}

	public function narrowDownWithDifficulty($query, $request) {
		return $query->where('difficulty', $request->difficulty);
	}

	public function narrowDownWithLowerValidity($query, $request) {
		return $query->whereRaw('solved / examinees * 100 >= ?', [config('tasks.lower_validity')[$request->lower_validity]]);
	}

	public function narrowDownWithLowerValidityWithNoExaminees($query, $request) {
		return $query->where(function ($sub_query) use ($request) {
			$sub_query->whereRaw('solved / examinees * 100 >= ?', [config('tasks.lower_validity')[$request->lower_validity]])->orWhere('examinees', 0);
		});
	}

	public function narrowDownWithUpperValidity($query, $request) {
		return $query->whereRaw('solved / examinees * 100 <= ?', [config('tasks.upper_validity')[$request->upper_validity]]);
	}

	public function narrowDownWithUpperValidityWithNoExaminees($query, $request) {
		return $query->where(function ($sub_query) use ($request) {
			$sub_query->whereRaw('solved / examinees * 100 <= ?', [config('tasks.upper_validity')[$request->upper_validity]])->orWhere('examinees', 0);
		});
	}

	public function withNoExaminees($query) {
		return $query->orWhere('examinees','=', '0');
	}

	public function withoutNoExaminees($query) {
		return $query->Where('examinees','>', '0');
	}

	public function inincrementExaminees($task_id) {
		$this->task->find($task_id)->increment('examinees');
	}

	public function inincrementSolved($task_id) {
		$this->task->find($task_id)->increment('solved');
	}

	public function storeTask($request, $user_id) {
		return $this->task->create([
			'user_id' => $user_id,
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

	public function updateTaskWithApproval($task_id, $request) {
		$this->task->where('id', $task_id)->update([
			'title' => $request->title,
			'statement' => $request->statement,
			'constraints' => $request->constraints,
			'input' => $request->input,
			'input_code' => $request->input_code,
			'output' => $request->output,
			'output_code' => $request->output_code,
			'difficulty' => $request->difficulty,
			'reviewed_at' => Carbon::now()
		]);
	}

	public function updateTaskWithoutApproval($task_id, $request) {
		$this->task->where('id', $task_id)->update([
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

	public function destroySampleCases($task_id) {
		foreach ($this->task->find($task_id)->samples as $sample) {
			$sample->delete();
		}
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

	public function destroyTestCases($task_id) {
		foreach ($this->task->find($task_id)->tests as $test) {
			$test->delete();
		}
	}
}
