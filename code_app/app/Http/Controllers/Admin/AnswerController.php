<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\AnswerService;
use App\Http\Controllers\Controller;
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
		$answers = $this->answer->allUsersAnswers(config('configs.pagings.admin_answers'));
		return view('admin.answer.index', compact('answers'));
	}

	public function show($id) {
		$answer = $this->answer->findById($id);
		if ($answer) {
			return view('admin.answer.show', compact('answer'));
		} else {
			return redirect()->route('admin.dashboard')->with('error', __('words.flashes.no_answer'));
		}
	}
}
