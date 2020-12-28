<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

	public function run() {
		$this->call([
			AdminsTableSeeder::class,
			UsersTableSeeder::class,
			TasksTableSeeder::class,
			TestsTableSeeder::class,
			SamplesTableSeeder::class,
			AnswersTableSeeder::class,
			TestingsTableSeeder::class,
		]);
	}
}
