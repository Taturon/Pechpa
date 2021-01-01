<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepositoryInterface AS User;

class UserController extends Controller {

	protected $user;

	public function __construct(User $user) {
		$this->user = $user;
	}

	public function index() {
		$users = $this->user->all()->paginate(config('configs.pageings.admin_users'));
		return view('admin.user.index', compact('users'));
	}
}
