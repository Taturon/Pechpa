<?php

namespace App\Repositories\Inquiry;

interface InquiryRepositoryInterface {

	public function all();

	public function findById($id);

	public function recentInquiries($count);

	public function storeInquiry($request, $user_id);
}
