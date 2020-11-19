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

	public function check(Request $request, $id) {
		$path = config('app.path') . '/storage/app/public/answer/';
		if (!File::exists($path)) {
			File::makeDirectory($path, 0755, true);
		}
		$path .= floor(microtime(true)) . '.php';
		File::put($path, $request->source);
		$process = new Process(['php', '-l', $path]);
		$process->run();
		$output = $process->getOutput();
		$no_syntax_error = 'No syntax errors detected in ' . $path . "\n";
		$tests = Task::find($id)->tests;
		if ($no_syntax_error === $output) {
			$mismatches = 0;
			foreach ($tests as $test) {
				$process = new Process(['php', $path]);
				$process->setInput($test->input);
				$process->run();
				$user_output = $process->getOutput();
				if ($user_output !== $test->output) {
					$mismatches++;
					$test_judge = 'WA';
				} else {
					$test_judge = 'AC';
				}
				$testing = new Testing;
				$testing->test_id = $test->id;
				$testing->user_id = $request->user()->id;
				$testing->output = $user_output;
				$testing->judge = $test_judge;
				$testing->save();
			}
			if ($mismatches === 0) {
				$judge = 'AC';
			} else {
				$judge = 'WA';
			}
		} else {
			$judge = 'CE';
			$mismatches = count($tests);
		}
		File::delete($path);
		$answer = new Answer;
		$answer->task_id = $id;
		$answer->user_id = $request->user()->id;
		$answer->answer_code = $request->source;
		$answer->judge = $judge;
		$answer->mismatches = $mismatches;
		$answer->save();
		return redirect()->back();
	}
}
