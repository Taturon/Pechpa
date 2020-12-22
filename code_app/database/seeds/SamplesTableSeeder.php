<?php

use Modles\Sample;
use Illuminate\Database\Seeder;

class SamplesTableSeeder extends Seeder {

	public function run() {
		DB::table('samples')->insert([[
			'task_id' => '1',
			'input_code' => '1',
			'output_code' => '1',
			'created_at' => '2020-11-01 00:00:00',
			'updated_at' => '2020-11-01 00:00:00',
		], [
			'task_id' => '1',
			'input_code' => '100',
			'output_code' => '100',
			'created_at' => '2020-11-01 00:00:00',
			'updated_at' => '2020-11-01 00:00:00',
		], [
			'task_id' => '2',
			'input_code' => "3\na b c",
			'output_code' => "a\nb\nc\n",
			'created_at' => '2020-11-01 00:00:01',
			'updated_at' => '2020-11-01 00:00:01',
		], [
			'task_id' => '3',
			'input_code' => '5',
			'output_code' => "1\n2\n3\n4\n5\n",
			'created_at' => '2020-11-01 00:00:02',
			'updated_at' => '2020-11-01 00:00:02',
		], [
			'task_id' => '4',
			'input_code' => '3',
			'output_code' => 'No',
			'created_at' => '2020-11-01 00:00:03',
			'updated_at' => '2020-11-01 00:00:03',
		], [
			'task_id' => '4',
			'input_code' => '99',
			'output_code' => 'Yes',
			'created_at' => '2020-11-01 00:00:03',
			'updated_at' => '2020-11-01 00:00:03',
		], [
			'task_id' => '5',
			'input_code' => '3 6',
			'output_code' => '9',
			'created_at' => '2020-11-01 00:00:04',
			'updated_at' => '2020-11-01 00:00:04',
		], [
			'task_id' => '5',
			'input_code' => '50 60',
			'output_code' => '1500',
			'created_at' => '2020-11-01 00:00:04',
			'updated_at' => '2020-11-01 00:00:04',
		], [
			'task_id' => '6',
			'input_code' => "5\nH\ne\nl\nl\no\n",
			'output_code' => 'Hello',
			'created_at' => '2020-11-01 00:00:05',
			'updated_at' => '2020-11-01 00:00:05',
		], [
			'task_id' => '7',
			'input_code' => '1',
			'output_code' => '2',
			'created_at' => '2020-11-01 00:00:06',
			'updated_at' => '2020-11-01 00:00:06',
		], [
			'task_id' => '7',
			'input_code' => '25',
			'output_code' => '50',
			'created_at' => '2020-11-01 00:00:06',
			'updated_at' => '2020-11-01 00:00:06',
		], [
			'task_id' => '8',
			'input_code' => '1',
			'output_code' => "1\n",
			'created_at' => '2020-11-01 00:00:07',
			'updated_at' => '2020-11-01 00:00:07',
		], [
			'task_id' => '8',
			'input_code' => '10',
			'output_code' => "1\n2\nFizz\n4\nBuzz\nFizz\n7\n8\nFizz\nBuzz\n",
			'created_at' => '2020-11-01 00:00:07',
			'updated_at' => '2020-11-01 00:00:07',
		], [
			'task_id' => '9',
			'input_code' => '10',
			'output_code' => "1\n1\n2\n3\n5\n8\n13\n21\n34\n55\n",
			'created_at' => '2020-11-01 00:00:08',
			'updated_at' => '2020-11-01 00:00:08',
		], [
			'task_id' => '10',
			'input_code' => "3\nfoo bar buz\nQux quux corge\ngrault garply waldo\n",
			'output_code' => "Foo bar buz\nQux quux corge\nGrault garply waldo\n",
			'created_at' => '2020-11-01 00:00:08',
			'updated_at' => '2020-11-01 00:00:08',
		]]);
	}
}
