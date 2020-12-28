<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\User\UserRepositoryInterface AS User;
use App\Repositories\Task\TaskRepositoryInterface AS Task;

class ShowUserCreatedTasksController extends Controller {

	protected $user_repository;

	protected $task_repository;

	public function __construct(User $user_repository, Task $task_repository) {
		$this->user = $user_repository;
		$this->task = $task_repository;
	}

	public function __invoke($user_id) {
		$user = $this->user->findById($user_id);
		if (is_null($user)) {
			return redirect()->route('users.tasks', ['user_id' => Auth::user()->id])->with('error', __('words.flashes.no_user'));
		}
		$approved_tasks = $this->task->userCreatedApprovedTasks($user_id)->paginate(config('pagings.user_created_tasks'), ['*'], 'approved');
		$unapproved_tasks = $this->task->userCreatedUnapprovedTasks($user_id)->paginate(config('pagings.user_created_tasks'), ['*'], 'unapproved');
		return view('user.task.index', compact(['user', 'approved_tasks', 'unapproved_tasks']));
	}
}
