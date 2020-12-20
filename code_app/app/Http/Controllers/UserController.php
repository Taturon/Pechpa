<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\UserService;
use App\Http\Requests\UserProfileUpdateRequest;
use App\Repositories\User\UserRepositoryInterface AS User;

class UserController extends Controller {

	protected $service;

	public function __construct(User $repository, UserService $service) {
		$this->repository = $repository;
		$this->service = $service;
	}

	public function show($user_id) {
		$user = $this->repository->findById($user_id);
		if (!$user) {
			return redirect()->route('users.show', ['user_id' => Auth::user()->id])->with('error', __('words.flashes.no_user'));
		}
		$statics['approved_tasks'] = $this->repository->countApprovedTasks($user_id);
		$statics['all_answers'] = $this->repository->countAllAnswers($user_id);
		$statics['correct_answers'] = $this->repository->countCorrectAnswers($user_id);
		$statics['correct_rate'] = $this->service->calculateCorrectRate($statics['all_answers'], $statics['correct_answers']);
		return view('user.show', compact(['user', 'statics']));
	}

	public function edit($user_id) {
		if ($user_id != Auth::user()->id) {
			return redirect()->route('users.show', ['user_id' => Auth::user()->id])->with('danger', __('words.flashes.invalid_access'));
		}
		$user = $this->repository->findById($user_id);
		return view('user.edit', compact('user'));
	}

	public function update(UserProfileUpdateRequest $request, $user_id) {
		if ($user_id != Auth::user()->id || $user_id === 1 || Auth::user()->id === 1) {
			return redirect()->route('users.show', ['user_id' => Auth::user()->id])->with('danger', __('words.flashes.invalid_access'));
		}
		$user = $this->repository->findById($user_id);
		if ($request->icon) {
			if ($user->icon !== config('limits.default_icon_filename')) {
				$this->repository->destroyIcon($user->icon);
			}
			$request->icon = $this->repository->updateIcon($user_id, $request->file('icon'));
		}
		if ($request->name) {
			$this->repository->updateName($user_id, $request->name);
		}
		return redirect()->route('users.show', ['user_id' => $user_id])->with('success', __('words.flashes.profile_updated'));
	}
}
