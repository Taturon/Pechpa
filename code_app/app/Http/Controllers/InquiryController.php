<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InquiryController extends Controller {

	public function create() {
		return view('inquiry.create');
	}

	public function store(Request $request) {
	}
}
