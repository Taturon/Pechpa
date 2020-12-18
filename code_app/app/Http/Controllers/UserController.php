<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller {

	protected $service;

	public function __construct(UserService $service) {
		$this->service = $service;
	}

	public function showProfile() {
		$statics = $this->service->getUserStatistics();
		return view('user.profile', compact('statics'));
	}
}
