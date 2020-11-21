<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestingsTable extends Migration {

	public function up() {
		Schema::create('testings', function (Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('test_id');
			$table->unsignedInteger('user_id');
			$table->unsignedInteger('answer_id');
			$table->string('output', 500);
			$table->string('judge', 50);
			$table->timestamps();
		});
	}

	public function down() {
		Schema::dropIfExists('testings');
	}
}
