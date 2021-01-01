<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepositoryInterface AS User;

class UserController extends Controller {

	protected $user;

	protected $user_service;

	public function __construct(User $user, UserService $user_service) {
		$this->user = $user;
		$this->user_service = $user_service;
	}

	public function index() {
		$users = $this->user->all()->paginate(config('configs.pageings.admin_users'));
		return view('admin.user.index', compact('users'));
	}

	public function show($user_id) {
		$user = $this->user->findById($user_id);
		if (is_null($user)) {
			return redirect()->route('admin.users.index')->with('error', __('words.flashes.no_user'));
		}
		$statics['unapproved_tasks'] = $this->user->countUnapprovedTasks($user_id);
		$statics['approved_tasks'] = $this->user->countApprovedTasks($user_id);
		$statics['all_answers'] = $this->user->countAllAnswers($user_id);
		$statics['correct_answers'] = $this->user->countCorrectAnswers($user_id);
		$statics['correct_rate'] = $this->user_service->calculateCorrectRate($statics['all_answers'], $statics['correct_answers']);
		return view('user.show', compact(['user', 'statics']));
	}
}
