<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserProfileUpdateRequest extends FormRequest {

	public function authorize() {
		return true;
	}

	public function rules() {
		return [
			'name' => [
				'nullable',
				'string',
				'max:255',
				Rule::unique('users')->ignore($this->user),
			],
			'icon' => 'file|image|max:5000|dimensions:'
				. 'min_width=' . config('limits.user_icon_size.min')
				. ',min_height=' . config('limits.user_icon_size.min')
				. ',max_width=' . config('limits.user_icon_size.max')
				. ',max_height=' . config('limits.user_icon_size.max'),
		];
	}
}
