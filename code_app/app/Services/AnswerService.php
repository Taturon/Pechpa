<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class AnswerService {

	public function makeAnswerFile($request) {
		$path = config('app.path') . '/storage/app/public/answer/';
		if (!File::exists($path)) {
			File::makeDirectory($path, 0755, true);
		}
		$path .= floor(microtime(true)) . '.php';
		File::put($path, $request->source);
		return $path;
	}

	public function syntaxCheck($path) {
		$process = new Process(['php', '-l', $path]);
		$process->run();
		$check_result['byte'] = filesize($path);
		$check_result['compile_message'] = str_replace($path, 'your_answer.php', $process->getOutput());
		return $check_result;
	}

	public function tryTestCases($path, $tests, $answer_id, $user_id) {
		$datetime = Carbon::now();
		foreach ($tests as $k => $test) {
			$process = new Process(['php', $path]);
			$process->setInput($test->input);
			$process->run();
			if ($process->getOutput() !== $test->output) {
				$test_judge = 'WA';
			} else {
				$test_judge = 'AC';
			}
			$test_results[$k] = [
				'test_id' => $test->id,
				'user_id' => $user_id,
				'answer_id' => $answer_id,
				'output' => str_replace($path, 'your_answer.php', $process->getOutput()),
				'judge' => $test_judge,
				'created_at' => $datetime,
				'updated_at' => $datetime,
			];
		}
		return $test_results;
	}

	public function countMismatches($test_results) {
		$judges = array_column($test_results, 'judge');
		$counts = array_count_values($judges);
		if (array_key_exists('WA', $counts)) {
			return array_count_values($judges)['WA'];
		} else {
			return 0;
		}
	}

	public function deleteAnswerFile($path) {
		File::delete($path);
	}
}
