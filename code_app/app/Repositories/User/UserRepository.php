<?php

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserRepository implements UserRepositoryInterface {

	protected $user;

	public function __construct(User $user) {
		$this->user = $user;
	}

	public function findById($user_id) {
		return $this->user->find($user_id);
	}

	public function countApprovedTasks($user_id) {
		return isset($this->user->find($user_id)->task) ? $this->user->find($user_id)->task->count() : 0;
	}

	public function countAllAnswers($user_id) {
		return isset($this->user->find($user_id)->answer) ? $this->user->find($user_id)->answer->count() : 0;
	}

	public function countCorrectAnswers($user_id) {
		return isset($this->user->find($user_id)->answer) ? $this->user->find($user_id)->answer->where('judge', 'AC')->count() : 0;
	}

	public function destroyIcon($file) {
		 Storage::delete('public/icons/' . $file);
	}

	public function updateIcon($user_id, $file) {
		$path = basename($file->store('public/icons'));
		$this->user->find($user_id)->update(['icon' => $path]);
	}

	public function updateName($user_id, $name) {
		$this->user->find($user_id)->update(['name' => $name]);
	}
}
