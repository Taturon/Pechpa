<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model {

	protected $guarded = ['id'];

	public function task() {
		return $this->belongsTo('App\Models\Task');
	}

	public function testing() {
		return $this->hasMany('App\Models\Testing');
	}
}
