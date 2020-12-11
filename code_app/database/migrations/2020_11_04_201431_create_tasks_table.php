<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration {

	public function up() {
		Schema::create('tasks', function (Blueprint $table) {
			$table->increments('id');
			$table->string('title', 50);
			$table->string('statement', 500);
			$table->string('constraints', 500);
			$table->string('input', 500);
			$table->string('input_code', 500);
			$table->string('output', 500);
			$table->string('output_code', 500)->nullable($value = true);
			$table->unsignedTinyInteger('difficulty');
			$table->dateTime('reviewed_at')->nullable($value = true);
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down() {
		Schema::dropIfExists('tasks');
	}
}
