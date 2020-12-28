<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSamplesTable extends Migration {

	public function up() {
		Schema::create('samples', function (Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('task_id');
			$table->string('input_code', 500);
			$table->string('output_code', 500);
			$table->timestamps();
		});
	}

	public function down() {
		Schema::dropIfExists('samples');
	}
}
