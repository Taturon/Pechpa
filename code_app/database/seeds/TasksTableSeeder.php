<?php

use Modles\Task;
use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder {

	public function run() {
		DB::table('tasks')->insert([[
			'title' => '標準入力の受け取り',
			'statement' => '入力Nが与えられるのでそのままNを出力して下さい。',
			'constraints' => 'Nは整数かつ\( 1 \leqq N \leqq 100 \)',
			'input' => '入力は以下の形式で標準入力から与えられます。',
			'input_code' => 'N',
			'output' => 'Nを出力して下さい。',
			'output_code' => 'N',
			'difficulty' => 1,
			'created_at' => '2020-11-01 00:00:00',
			'updated_at' => '2020-11-01 00:00:00',
		], [
			'title' => '半角スペース区切りの標準入力の受け取り',
			'statement' => '個数Nの文字\( C_i \)が半角スペース区切りで与えられるので改行区切りで出力して下さい。',
			'constraints' => 'Nは\( 1 \leqq N \leqq 100 \)かつ\( C_i \)は全て小文字英字',
			'input' => '入力は以下の形式で標準入力から与えられます。',
			'input_code' => "N\nC_1 C_i C_N",
			'output' => '\( C_i \)を改行区切りで出力して下さい。',
			'output_code' => "C_1\nC_i\nC_N\n",
			'difficulty' => 1,
			'created_at' => '2020-11-01 00:00:01',
			'updated_at' => '2020-11-01 00:00:01',
		], [
			'title' => '繰り返し処理',
			'statement' => '入力Nが与えられるので1からNまでを改行区切りで出力して下さい。',
			'constraints' => 'Nは整数かつ\( 1 \leqq N \leqq 100 \)',
			'input' => '入力は以下の形式で標準入力から与えられます。',
			'input_code' => 'N',
			'output' => '1からNまでの数字（文字列）を改行区切りで出力して下さい。',
			'output_code' => NULL,
			'difficulty' => 1,
			'created_at' => '2020-11-01 00:00:02',
			'updated_at' => '2020-11-01 00:00:02',
		], [
			'title' => '場合分け',
			'statement' => '入力Nが与えられるのでNが10以上の場合は「Yes」、10未満の場合は「No」を出力して下さい。',
			'constraints' => 'Nは整数かつ\( 1 \leqq N \leqq 100 \)',
			'input' => '入力は以下の形式で標準入力から与えられます。',
			'input_code' => 'N',
			'output' => '文字列「Yes」または「No」を出力して下さい。',
			'output_code' => NULL,
			'difficulty' => 1,
			'created_at' => '2020-11-01 00:00:03',
			'updated_at' => '2020-11-01 00:00:03',
		], [
			'title' => '三角形の面積',
			'statement' => '底辺の長さBと高さHが与えられるので三角形の面積Sを文字列で出力して下さい。',
			'constraints' => 'BとHは共に整数かつ\( 1 \leqq B, H \leqq 100 \)',
			'input' => '入力は以下の形式で標準入力から与えられます。',
			'input_code' => 'B H',
			'output' => '面積Sを出力して下さい。',
			'output_code' => 'S',
			'difficulty' => 1,
			'created_at' => '2020-11-01 00:00:04',
			'updated_at' => '2020-11-01 00:00:04',
		], [
			'title' => '文字の結合',
			'statement' => '個数Nの文字\( C_i \)が改行区切りで与えられるので全て結合した文字列Sを出力して下さい。',
			'constraints' => 'Nは\( 1 \leqq N \leqq 100 \)かつ\( C_i \)は全て英字',
			'input' => '入力は以下の形式で標準入力から与えられます。',
			'input_code' => "N\nC_1\nC_i\nC_N\n",
			'output' => '文字を全て結合した文字列Sを出力して下さい。',
			'output_code' => 'S',
			'difficulty' => 1,
			'created_at' => '2020-11-01 00:00:05',
			'updated_at' => '2020-11-01 00:00:05',
		], [
			'title' => 'FizzBuzz',
			'statement' => "入力Nが与えられるので、1からNの範囲でNが\n3の倍数の時は「Fizz」\n5の倍数の時は「Buzz」\n15の倍数の時は「FizzBuzz」\nこれら以外の場合は数字\nをそれぞれ改行区切りで出力して下さい。",
			'constraints' => 'Nは整数かつ\( 1 \leqq N \leqq 100 \)',
			'input' => '入力は以下の形式で標準入力から与えられます。',
			'input_code' => 'N',
			'output' => '「Fizz」、「Buzz」、「FizzBuzz」、「数値」のいずれかを改行区切りで出力してください。',
			'output_code' => NULL,
			'difficulty' => 2,
			'created_at' => '2020-11-01 00:00:06',
			'updated_at' => '2020-11-01 00:00:06',
		], [
			'title' => 'フィボナッチ数列',
			'statement' => 'フィボナッチ数列を入力Nまで出力して下さい。',
			'constraints' => 'Nは整数かつ\( 1 \leqq N \leqq 50 \)',
			'input' => '入力は以下の形式で標準入力から与えられます。',
			'input_code' => 'N',
			'output' => '指定された個数のフィボナッチ数列を改行区切りで出力してください。',
			'output_code' => NULL,
			'difficulty' => 2,
			'created_at' => '2020-11-01 00:00:07',
			'updated_at' => '2020-11-01 00:00:07',
		]]);
	}
}
