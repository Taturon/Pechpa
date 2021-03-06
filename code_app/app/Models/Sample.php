<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sample extends Model {

	protected $guarded = ['id'];

	public function task() {
		return $this->belongsTo('App\Models\Task');
	}
}
