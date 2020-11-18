<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class AnswerController extends Controller {

	public function check(Request $request, $id) {
		$path = config('app.path') . '/storage/app/public/answer/' . $id . '/';
		$path .= $request->user()->id . '/';
		if (!File::exists($path)) {
			File::makeDirectory($path, 0755, true);
		}
		$path .= floor(microtime(true)) . '.php';
		File::put($path, $request->source);
		$tests = Task::find($id)->tests;
		$mismatches = 0;
		foreach ($tests as $test) {
			$process = new Process(['php', $path]);
			$process->setInput($test->input);
			$process->run();
			$user_output = $process->getOutput();
			if ($user_output !== $test->output) {
				$mismatches++;
			}
		}
	}
}
