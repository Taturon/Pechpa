<?php

use Modles\Sample;
use Illuminate\Database\Seeder;

class SamplesTableSeeder extends Seeder {

	public function run() {
		DB::table('samples')->insert([[
			'task_id' => '1',
			'input_code' => '1',
			'output_code' => "1\n",
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s'),
		], [
			'task_id' => '1',
			'input_code' => '10',
			'output_code' => "1\n2\nFizz\n4\nBuzz\nFizz\n7\n8\nFizz\nBuzz\n",
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s'),
		]]);
	}
}
