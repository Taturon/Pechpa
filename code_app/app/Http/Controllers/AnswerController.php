<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AnswerService;
use App\Repositories\Task\TaskRepositoryInterface AS Task;
use App\Repositories\Answer\AnswerRepositoryInterface AS Answer;

class AnswerController extends Controller {

	protected $answer;

	protected $task;

	protected $answer_service;

	public function __construct(Answer $answer, Task $task, AnswerService $answer_service) {
		$this->answer = $answer;
		$this->task = $task;
		$this->answer_service = $answer_service;
	}

	public function index() {
		$answers = $this->answer->all(config('pagings.user_answers'));
		return view('answer.index', compact('answers'));
	}

	public function show($id) {
		$answer = $this->answer->findById($id);
		if ($answer) {
			$testings = $answer->testing;
			return view('answer.show', compact('answer', 'testings'));
		} else {
			return redirect()->route('answers.index')->with('error', __('words.flashes.no_answer'));
		}
	}

	public function check(Request $request, $task_id) {
		$user_id = $request->user()->id;
		if (is_null($this->task->findReviewedTask($task_id))) {
			return redirect()->route('tasks.show', ['task' => $task_id])->with('danger', __('words.notices.no_task'));
		} elseif ($this->task->isCreated($user_id, $task_id)) {
			return redirect()->route('tasks.show', ['task' => $task_id])->with('danger', __('words.notices.can_not_self_answer'));
		} elseif ($this->answer->isSolved($user_id, $task_id)) {
			return redirect()->route('tasks.show', ['task' => $task_id])->with('danger', __('words.notices.can_not_duplicate_answer'));
		}
		if ($this->answer->isNotAnswered($task_id, $user_id)) {
			$this->task->inincrementExaminees($task_id);
		}
		$path = $this->answer_service->makeAnswerFile($request);
		$syntax_check_result = $this->answer_service->syntaxCheck($path);
		$answer = $this->answer->storeSyntaxCheckResult($request->source, $syntax_check_result, $user_id, $task_id);
		$tests = $this->task->findReviewedTask($task_id)->tests;
		$test_results = $this->answer_service->tryTestCases($path, $tests, $answer->id, $user_id);
		$this->answer->storeTestingResults($test_results);
		$mismatches = $this->answer_service->countMismatches($test_results);
		if ($mismatches === 0) {
			$judge = 'AC';
			if ($this->answer->isNotSolved($task_id, $user_id)) {
				$this->task->inincrementSolved($task_id);
			}
		} else {
			$judge = 'WA';
		}
		$this->answer_service->deleteAnswerFile($path);
		$this->answer->updateAnswerResults($answer->id, $judge, $mismatches);
		if ($judge === 'AC') {
			return redirect()->route('answers.show', ['answer' => $answer->id])->with('success', __('words.flashes.correct_answer'));
		} else {
			return redirect()->route('answers.show', ['answer' => $answer->id])->with('error', __('words.flashes.wrong_answer'));
		}
	}
}
