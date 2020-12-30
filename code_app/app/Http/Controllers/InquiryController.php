<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\InquiryStoreRequest;
use App\Repositories\Inquiry\InquiryRepositoryInterface AS Inquiry;

class InquiryController extends Controller {

	protected $inquiry;

	public function __construct(Inquiry $inquiry) {
		$this->inquiry = $inquiry;
	}

	public function create() {
		return view('inquiry.create');
	}

	public function store(InquiryStoreRequest $request) {
		$this->inquiry->storeInquiry($request, Auth::user()->id);
		return redirect()->route('tasks.index')->with('success', __('words.flashes.inquiry_recived'));
	}
}
