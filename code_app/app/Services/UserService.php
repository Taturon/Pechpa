<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserService {

	protected $user;

	public function __construct(User $user) {
		$this->user = $user;
	}

	public function calculateCorrectRate($all_answers, $correct_answers) {
		if ($all_answers === 0) {
			return '0%';
		}
		return sprintf('%03.1f', $correct_answers / $all_answers * 100) . '%';
	}
}
