<?php

namespace App\Repositories\Answer;

use App\Models\Answer;
use App\Models\Testing;
use Illuminate\Support\Facades\DB;

class AnswerRepository implements AnswerRepositoryInterface {

	protected $answer;

	public function __construct(Answer $answer, Testing $testing) {
		$this->answer = $answer;
		$this->testing = $testing;
	}

	public function all() {
		return $this->answer::all();
	}

	public function findById($id) {
		return $this->answer::find($id);
	}

	public function storeSyntaxCheckResult($source, Array $result, $user_id, $task_id) {
		return $this->answer->create([
			'task_id' => $task_id,
			'user_id' => $user_id,
			'answer_code' => $source,
			'compile_message' => $result['compile_message'],
			'byte' => $result['byte'],
		]);
	}

	public function storeTestingResults($test_results) {
		DB::table('testings')->insert($test_results);
	}

	public function updateAnswerResults($answer_id, $judge, $mismatches) {
		$this->answer->where('id', $answer_id)->update([
			'judge' => $judge,
			'mismatches' => $mismatches
		]);
	}

}
