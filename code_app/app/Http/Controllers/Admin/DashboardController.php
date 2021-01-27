<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Task\TaskRepositoryInterface AS Task;
use App\Repositories\User\UserRepositoryInterface AS User;
use App\Repositories\Answer\AnswerRepositoryInterface AS Answer;
use App\Repositories\Inquiry\InquiryRepositoryInterface AS Inquiry;

class DashboardController extends Controller {

	protected $task;

	protected $user;

	protected $inquiry;

	public function __construct(Task $task, User $user, Inquiry $inquiry, Answer $answer) {
		$this->task = $task;
		$this->user = $user;
		$this->inquiry = $inquiry;
		$this->answer = $answer;
	}

	public function __invoke() {
		$tasks['approved'] = $this->task->recentApprovedTasks(config('configs.limits.admin_approved_tasks'));
		$tasks['unapproved'] = $this->task->recentUnapprovedTasks(config('configs.limits.admin_unapproved_tasks'));
		$inquiries = $this->inquiry->recentInquiries(config('configs.limits.admin_inquiries'));
		$users = $this->user->recentRegisteredUsers(config('configs.limits.admin_users'));
		$answers = $this->answer->recentAnswers(config('configs.limits.admin_answers'));
		return view('admin.dashboard', compact('tasks', 'inquiries', 'users', 'answers'));
	}
}
