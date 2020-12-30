<?php

namespace App\Repositories\Inquiry;

interface InquiryRepositoryInterface {

	public function storeInquiry($request, $user_id);
}
