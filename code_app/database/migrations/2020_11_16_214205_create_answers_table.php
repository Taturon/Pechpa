<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration {

	public function up() {
		Schema::create('answers', function (Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('task_id');
			$table->unsignedInteger('user_id');
			$table->string('answer_code', 500);
			$table->string('judge', 50);
			$table->timestamps();
		});
	}

	public function down() {
		Schema::dropIfExists('answers');
	}
}
