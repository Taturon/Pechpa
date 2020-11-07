<?php

use Modles\Task;
use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder {

	public function run() {
		DB::table('tasks')->insert([[
			'title' => 'FizzBuzz',
			'statement' => "入力Nが与えられるので、1からNの範囲でNが\n3の倍数の時は「Fizz」\n5の倍数の時は「Buzz」\n15の倍数の時は「FizzBuzz」\nこれら以外の場合は数字\nをそれぞれ改行区切りで出力して下さい。",
			'input' => '入力は以下の形式で標準入力から与えられる。',
			'input_code' => 'N',
			'output' => '「Fizz」、「Buzz」、「FizzBuzz」、「数値」のいずれかを改行区切りで出力してください。',
			'output_code' => NULL,
			'difficulty' => 1,
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s'),
		], [
			'title' => 'フィボナッチ数列',
			'statement' => 'フィボナッチ数列を入力Nまで出力して下さい。',
			'input' => '入力は以下の形式で標準入力から与えられる。',
			'input_code' => 'N',
			'output' => '指定された個数のフィボナッチ数列を改行区切りで出力してください。',
			'output_code' => NULL,
			'difficulty' => 1,
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s'),
		]]);
	}

}
