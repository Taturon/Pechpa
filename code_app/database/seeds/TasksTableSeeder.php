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
			'reviewed_at' => '2020-11-01 00:00:00',
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
			'reviewed_at' => '2020-11-01 00:00:01',
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
			'reviewed_at' => '2020-11-01 00:00:02',
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
			'reviewed_at' => '2020-11-01 00:00:03',
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
			'reviewed_at' => '2020-11-01 00:00:04',
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
			'reviewed_at' => '2020-11-01 00:00:05',
			'created_at' => '2020-11-01 00:00:05',
			'updated_at' => '2020-11-01 00:00:05',
		], [
			'title' => '倍数',
			'statement' => '入力Nが与えられるので倍数Dを出力して下さい。',
			'constraints' => 'Nは整数かつ\( 1 \leqq N \leqq 100 \)',
			'input' => '入力は以下の形式で標準入力から与えられます。',
			'input_code' => 'N',
			'output' => '入力Nの倍数Dを出力して下さい。',
			'output_code' => 'D',
			'difficulty' => 1,
			'reviewed_at' => '2020-11-01 00:00:06',
			'created_at' => '2020-11-01 00:00:06',
			'updated_at' => '2020-11-01 00:00:06',
		], [
			'title' => '月数計算',
			'statement' => '日数dが与えられるので月数M及び残りの日数Dを出力して下さい。',
			'constraints' => "dは整数かつ\( 1 \leqq N \leqq 1000 \)\n1ヶ月は31日とする",
			'input' => '入力は以下の形式で標準入力から与えられます。',
			'input_code' => 'd',
			'output' => '月数M及び日数Dを半角スペース区切りで出力して下さい。',
			'output_code' => 'M D',
			'difficulty' => 1,
			'reviewed_at' => '2020-11-01 00:00:07',
			'created_at' => '2020-11-01 00:00:07',
			'updated_at' => '2020-11-01 00:00:07',
		], [
			'title' => 'FizzBuzz',
			'statement' => "入力Nが与えられるので、1からNの範囲でNが\n3の倍数の時は「Fizz」\n5の倍数の時は「Buzz」\n15の倍数の時は「FizzBuzz」\nこれら以外の場合は数字\nをそれぞれ改行区切りで出力して下さい。",
			'constraints' => 'Nは整数かつ\( 1 \leqq N \leqq 100 \)',
			'input' => '入力は以下の形式で標準入力から与えられます。',
			'input_code' => 'N',
			'output' => '「Fizz」、「Buzz」、「FizzBuzz」、「数値」のいずれかを改行区切りで出力してください。',
			'output_code' => NULL,
			'difficulty' => 2,
			'reviewed_at' => '2020-11-01 00:00:08',
			'created_at' => '2020-11-01 00:00:08',
			'updated_at' => '2020-11-01 00:00:08',
		], [
			'title' => 'フィボナッチ数列',
			'statement' => 'フィボナッチ数列を入力Nまで出力して下さい。',
			'constraints' => 'Nは整数かつ\( 1 \leqq N \leqq 50 \)',
			'input' => '入力は以下の形式で標準入力から与えられます。',
			'input_code' => 'N',
			'output' => '指定された個数のフィボナッチ数列を改行区切りで出力してください。',
			'output_code' => NULL,
			'difficulty' => 2,
			'reviewed_at' => '2020-11-01 00:00:09',
			'created_at' => '2020-11-01 00:00:09',
			'updated_at' => '2020-11-01 00:00:09',
		], [
			'title' => '文章校正',
			'statement' => "N列の文が与えられるので先頭の単語の頭文字のみ大文字にして全ての文を改行区切りで出力して下さい。\n既に文の先頭の単語の頭文字が大文字になっている場合はそのまま出力して下さい。",
			'constraints' => "文の列数Nは\( 1 \leqq N \leqq 100 \)\nN列の単語W_n_iの数iは\( 1 \leqq i \leqq 50 \)",
			'input' => '入力は以下の形式で標準入力から与えられます。',
			'input_code' => "N\nW_1_1 ... W_1_i\nW_n_1 ... W_n_i",
			'output' => '校正した文章を改行区切りで出力して下さい。',
			'output_code' => NULL,
			'difficulty' => 2,
			'reviewed_at' => '2020-11-01 00:00:10',
			'created_at' => '2020-11-01 00:00:10',
			'updated_at' => '2020-11-01 00:00:10',
		], [
			'title' => '最大公約数',
			'statement' => "整数A, B, Cが与えられるのでこれらの最大公約数Gを出力して下さい。",
			'constraints' => "A, B, Cはいずれも整数かつ\( 1 \leqq A, B, C \leqq 100 \)",
			'input' => '入力は以下の形式で標準入力から与えられます。',
			'input_code' => 'A B C',
			'output' => '入力A, B, Cの最大公約数Gを出力して下さい。',
			'output_code' => 'G',
			'difficulty' => 2,
			'reviewed_at' => '2020-11-01 00:00:11',
			'created_at' => '2020-11-01 00:00:11',
			'updated_at' => '2020-11-01 00:00:11',
		], [
			'title' => '二進数から十進数への変換',
			'statement' => "N桁の二進数Bが与えられるので十進数Dに変換して出力して下さい。",
			'constraints' => "Nは\( 1 \leqq A, B, C \leqq 10 \)",
			'input' => '入力は以下の形式で標準入力から与えられます。',
			'input_code' => 'B',
			'output' => '変換した十進数Dを出力して下さい。',
			'output_code' => 'D',
			'difficulty' => 2,
			'reviewed_at' => '2020-11-01 00:00:12',
			'created_at' => '2020-11-01 00:00:12',
			'updated_at' => '2020-11-01 00:00:12',
		], [
			'title' => 'シーザー暗号',
			'statement' => "シフト数S及び変換前の単語W_iがN個改行区切りで与えられるので変換した単語C_iを出力して下さい。",
			'constraints' => "シフト数Sは整数かつ\( -10 \leqq S \leqq 10 \)\nシフト数が正の場合は右シフト・負の場合は左シフトとする\n単語数Nは\( 1 \leqq N \leqq 10 \)\n単語W_iは全て小文字英字",
			'input' => '入力は以下の形式で標準入力から与えられます。',
			'input_code' => "S\nW_1\nW_i\nW_N\n",
			'output' => 'シフト数だけ変換した単語C_iを改行区切りで出力して下さい。',
			'output_code' => "C_1\nC_i\nC_N\n",
			'difficulty' => 3,
			'reviewed_at' => '2020-11-01 00:00:13',
			'created_at' => '2020-11-01 00:00:13',
			'updated_at' => '2020-11-01 00:00:13',
		]]);
	}
}
