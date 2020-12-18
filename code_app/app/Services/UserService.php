<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class UserService {

	public function getUserStatistics() {
		$statics['approved_tasks'] = isset(Auth::user()->task) ? Auth::user()->task->count() : 0;
		$statics['all_answers'] = isset(Auth::user()->answer) ? Auth::user()->answer->count() : 0;
		$statics['correct_answers'] = isset(Auth::user()->answer) ? Auth::user()->answer->where('judge', 'AC')->count() : 0;
		$statics['correct_answer_rate'] = !isset(Auth::user()->answer) ? '0%' : sprintf('%03.1f', $statics['correct_answers'] / $statics['all_answers'] * 100) . '%';
		return $statics;
	}

	public function calculateLevel() {
	}
}
