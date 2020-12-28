<?php

use Illuminate\Database\Seeder;

class TestingsTableSeeder extends Seeder {

	public function run() {
		DB::table('testings')->insert([[
			'answer_id' => 1,
			'output' => '',
			'judge' => 'WA',
			'created_at' => '2020-11-02 08:20:21',
			'updated_at' => '2020-11-02 08:20:21',
		], [
			'answer_id' => 1,
			'output' => '',
			'judge' => 'WA',
			'created_at' => '2020-11-02 08:20:21',
			'updated_at' => '2020-11-02 08:20:21',
		], [
			'answer_id' => 1,
			'output' => '',
			'judge' => 'WA',
			'created_at' => '2020-11-02 08:20:21',
			'updated_at' => '2020-11-02 08:20:21',
		], [
			'answer_id' => 1,
			'output' => '',
			'judge' => 'WA',
			'created_at' => '2020-11-02 08:20:21',
			'updated_at' => '2020-11-02 08:20:21',
		], [
			'answer_id' => 2,
			'output' => '1',
			'judge' => 'AC',
			'created_at' => '2020-11-02 08:24:32',
			'updated_at' => '2020-11-02 08:24:32',
		], [
			'answer_id' => 2,
			'output' => '25',
			'judge' => 'AC',
			'created_at' => '2020-11-02 08:24:32',
			'updated_at' => '2020-11-02 08:24:32',
		], [
			'answer_id' => 2,
			'output' => '50',
			'judge' => 'AC',
			'created_at' => '2020-11-02 08:24:32',
			'updated_at' => '2020-11-02 08:24:32',
		], [
			'answer_id' => 2,
			'output' => '100',
			'judge' => 'AC',
			'created_at' => '2020-11-02 08:24:32',
			'updated_at' => '2020-11-02 08:24:32',
		]]);
	}
}
