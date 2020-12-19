<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Repositories\User\UserRepositoryInterface AS User;

class UserController extends Controller {

	protected $service;

	public function __construct(User $repository, UserService $service) {
		$this->repository = $repository;
		$this->service = $service;
	}

	public function show($user_id) {
		$user = $this->repository->findById($user_id);
		$statics['approved_tasks'] = $this->repository->countApprovedTasks($user_id);
		$statics['all_answers'] = $this->repository->countAllAnswers($user_id);
		$statics['correct_answers'] = $this->repository->countCorrectAnswers($user_id);
		$statics['correct_rate'] = $this->service->calculateCorrectRate($statics['all_answers'], $statics['correct_answers']);
		return view('profile.show', compact(['user', 'statics']));
	}

	public function edit() {
	}

	public function update() {
	}
}
