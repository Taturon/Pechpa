<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Testing;
use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class AnswerController extends Controller {

	public function index() {
		$answers = Answer::all();
		return view('answer.index', compact('answers'));
	}

	public function show($id) {
		$answer = Answer::find($id);
		if ($answer) {
			$testings = $answer->testing;
			return view('answer.show', compact('answer', 'testings'));
		} else {
			return redirect()->route('tasks.index')->with('error', __('flash.no_answer'));
		}
	}

	public function check(Request $request, $id) {

		// 回答ファイルの作成
		$path = config('app.path') . '/storage/app/public/answer/';
		if (!File::exists($path)) {
			File::makeDirectory($path, 0755, true);
		}
		$path .= floor(microtime(true)) . '.php';
		File::put($path, $request->source);

		// 構文チェック
		$process = new Process(['php', '-l', $path]);
		$process->run();
		$output = $process->getOutput();
		$byte = filesize($path);
		$compile_message = str_replace($path, 'your_answer.php', $output);

		// DB保存処理
		$answer = new Answer;
		$answer->task_id = $id;
		$answer->user_id = $request->user()->id;
		$answer->answer_code = $request->source;
		$answer->compile_message = $compile_message;
		$answer->byte = $byte;
		$answer->save();

		// 各テストケースの判定
		$tests = Task::find($id)->tests;
		$mismatches = 0;
		foreach ($tests as $test) {
			$process = new Process(['php', $path]);
			$process->setInput($test->input);
			$process->run();
			if ($process->getOutput() !== $test->output) {
				$mismatches++;
				$test_judge = 'WA';
			} else {
				$test_judge = 'AC';
			}
			$testing = new Testing;
			$testing->test_id = $test->id;
			$testing->user_id = $request->user()->id;
			$testing->answer_id = $answer->id;
			$testing->output = str_replace($path, 'your_answer.php', $process->getOutput());
			$testing->judge = $test_judge;
			$testing->save();
		}
		if ($mismatches === 0) {
			$judge = 'AC';
		} else {
			$judge = 'WA';
		}

		// 回答ファイルの削除
		File::delete($path);

		// DB保存処理
		$answer->judge = $judge;
		$answer->mismatches = $mismatches;
		$answer->save();

		if ($judge === 'AC') {
			return redirect()->route('answers.show', ['answer' => $answer->id])->with('success', __('flash.correct_answer'));
		} else {
			return redirect()->route('answers.show', ['answer' => $answer->id])->with('error', __('flash.wrong_answer'));
		}
	}
}
