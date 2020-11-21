<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {

	protected $guarded = ['id'];

	public function tests() {
		return $this->hasMany('App\Models\Test');
	}

	public function answers() {
		return $this->hasMany('App\Models\Answer');
	}
}
