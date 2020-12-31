<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Inquiry\InquiryRepositoryInterface AS Inquiry;

class InquiryController extends Controller {

	protected $inquiry;

	public function __construct(Inquiry $inquiry) {
		$this->inquiry = $inquiry;
	}

	public function index() {
		$inquiries = $this->inquiry->all()->paginate(config('pageings.admin_inquiries'));
		return view('admin.inquiry.index', compact('inquiries'));
	}

	public function show($id) {
		$inquiry = $this->inquiry->findById($id);
		if (!$inquiry) {
			return redirect()->route('admin.inquiries.index')->with('error', __('words.flashes.no_inquiry'));
		} else {
			return view('admin.inquiry.show', compact('inquiry'));
		}
	}
}
