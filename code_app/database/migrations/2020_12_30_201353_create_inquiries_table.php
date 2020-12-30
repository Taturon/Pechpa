<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInquiriesTable extends Migration {

	public function up() {
		Schema::create('inquiries', function (Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('user_id');
			$table->string('title', 50);
			$table->unsignedInteger('category');
			$table->string('contents', 1000);
			$table->timestamps();
		});
	}

	public function down() {
		Schema::dropIfExists('inquiries');
	}
}
