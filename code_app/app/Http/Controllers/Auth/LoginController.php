<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles authenticating users for the application and
	| redirecting them to your home screen. The controller uses a trait
	| to conveniently provide its functionality to your applications.
	|
	*/

	use AuthenticatesUsers;

	/**
	 * Where to redirect users after login.
	 *
	 * @var string
	 */
	protected $redirectTo = '/';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('guest:user')->except('logout');
	}

	protected function guard() {
		return Auth::guard('user');
	}

	public function guestLogin() {
		Auth::loginUsingId(1);
		return redirect()->intended('/')->with('success', __('words.flashes.guest_logged_in'));
	}

	public function logout(Request $request) {
		Auth::guard('user')->logout();
		return redirect()->route('tasks.index');
	}
}
