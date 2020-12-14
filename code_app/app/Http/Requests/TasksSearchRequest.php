<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TasksSearchRequest extends FormRequest {

	public function authorize() {
		return true;
	}

	public function rules() {
		return [
			'title' => 'nullable|max:500',
			'difficulty' => [
				'nullable',
				Rule::in(range(0, config('tasks.max_difficulty')))
			],
			'lower_validity' => [
				'nullable',
				Rule::in(array_keys(config('tasks.lower_validity')))
			],
			'upper_validity' => [
				'nullable',
				Rule::in(array_keys(config('tasks.upper_validity')))
			]
		];
	}
}
