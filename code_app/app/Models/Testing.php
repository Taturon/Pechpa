<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testing extends Model {

	protected $guarded = ['id'];

	public function test() {
		return $this->belongsTo('App\Models\Test');
	}
}
