<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class InquiryStoreRequest extends FormRequest {

	public function authorize() {
		return true;
	}

	public function rules() {
		return [
			'inquiry_title' => 'required|max:50',
			'category' => [
				'required',
				Rule::in(array_keys(config('configs.inquiries.categories')))
			],
			'contents' => 'required|max:1000',
		];
	}
}
