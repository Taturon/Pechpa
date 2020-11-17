<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AnswerController extends Controller {

	public function check(Request $request, $id) {
		$path = config('app.path') . '/storage/app/public/answer' . $id . '/';
		$path .= $request->user()->id . '/';
		if (!File::exists($path)) {
			File::makeDirectory($path, 0755, true);
		}
		$path .= floor(microtime(true)) . '.php';
		File::put($path, $request->source);
	}
}
