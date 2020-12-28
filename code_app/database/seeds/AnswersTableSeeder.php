<?php

use Modles\Answer;
use Illuminate\Database\Seeder;

class AnswersTableSeeder extends Seeder {

	public function run() {
		DB::table('answers')->insert([[
			'task_id' => 1,
			'user_id' => 1,
			'answer_code' => "<?php\n\$n = trim(fgets(STDIN))\necho \$n",
			'compile_message' => 'Errors parsing your_answer.php',
			'byte' => 39,
			'judge' => 'WA',
			'mismatches' => 4,
			'created_at' => '2020-11-02 08:20:21',
			'updated_at' => '2020-11-02 08:20:21',
		], [
			'task_id' => 1,
			'user_id' => 1,
			'answer_code' => "<?php\n\$n = trim(fgets(STDIN));\necho \$n;",
			'compile_message' => 'No syntax errors detected in your_answer.php',
			'byte' => 41,
			'judge' => 'AC',
			'mismatches' => 0,
			'created_at' => '2020-11-02 08:24:32',
			'updated_at' => '2020-11-02 08:24:32',
		]]);
	}
}
