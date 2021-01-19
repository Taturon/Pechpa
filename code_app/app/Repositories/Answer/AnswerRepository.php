<?php

namespace App\Repositories\Answer;

use App\Models\Answer;
use App\Models\Testing;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AnswerRepository implements AnswerRepositoryInterface {

	protected $answer;

	public function __construct(Answer $answer, Testing $testing) {
		$this->answer = $answer;
		$this->testing = $testing;
	}

	public function all($paging) {
		return Auth::user()->answers()->orderBy('created_at', 'desc')->paginate($paging);
	}

	public function findById($id) {
		return $this->answer->find($id);
	}

	public function isNotAnswered($task_id, $user_id) {
		if ($this->answer->where('task_id', $task_id)->where('user_id', $user_id)->first()) {
			return false;
		}
		return true;
	}

	public function isNotSolved($task_id, $user_id) {
		if ($this->answer->where('task_id', $task_id)->where('user_id', $user_id)->where('judge', 'AC')->first()) {
			return false;
		}
		return true;
	}

	public function isSolved($user_id, $task_id) {
		if ($this->answer->where('task_id', $task_id)->where('user_id', $user_id)->where('judge', 'AC')->first()) {
			return true;
		}
		return false;
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
