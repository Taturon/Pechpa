<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {

	protected $guarded = ['id'];

	public function user() {
		return $this->belongsTo('App\Models\User');
	}

	public function tests() {
		return $this->hasMany('App\Models\Test');
	}

	public function answers() {
		return $this->hasMany('App\Models\Answer');
	}

	public function samples() {
		return $this->hasMany('App\Models\Sample');
	}
}
