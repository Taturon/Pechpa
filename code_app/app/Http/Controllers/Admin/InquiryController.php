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
}
