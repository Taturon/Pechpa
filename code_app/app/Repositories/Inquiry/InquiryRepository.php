<?php

namespace App\Repositories\Inquiry;

use App\Models\Inquiry;

class InquiryRepository implements InquiryRepositoryInterface {

	protected $inquiry;

	public function __construct(Inquiry $inquiry) {
		$this->inquiry = $inquiry;
	}

	public function all() {
		return $this->inquiry;
	}

	public function storeInquiry($request, $user_id) {
		return $this->inquiry->create([
			'user_id' => $user_id,
			'title' => $request->inquiry_title,
			'category' => $request->category,
			'contents' => $request->contents,
		]);
	}
}
