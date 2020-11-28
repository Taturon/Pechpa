<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTask extends FormRequest {

	public function authorize() {
		return true;
	}

	public function rules() {
		return [

			// Basic
			'title' => 'required|unique:tasks|max:50',
			'statement' => 'required|max:500',
			'constraints' => 'required|max:500',
			'input' => 'required|max:500',
			'input_code' => 'required|max:500',
			'output' => 'required|max:500',
			'output_code' => 'nullable|max:500',

			// Samples
			'sample_input_1' => 'required|max:500',
			'sample_output_1' => 'required|max:500',
			'sample_input_2' => 'nullable|max:500',
			'sample_output_2' => 'nullable|max:500',
			'sample_input_3' => 'nullable|max:500',
			'sample_output_3' => 'nullable|max:500',

			// Tests
			'test_input_1' => 'required|max:500',
			'test_output_1' => 'required|max:500',
			'test_input_2' => 'required|max:500',
			'test_output_2' => 'required|max:500',
			'test_input_3' => 'required|max:500',
			'test_output_3' => 'required|max:500',
			'test_input_4' => 'required|max:500',
			'test_output_4' => 'required|max:500',

		];
	}
}
