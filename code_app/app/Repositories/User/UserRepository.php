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
		return $this->user->find($user_id)->tasks()->whereNotNull('reviewed_at')->count();
	}

	public function countAllAnswers($user_id) {
		return $this->user->find($user_id)->answers()->count() > 0 ? $this->user->find($user_id)->answers()->count() : 0;
	}

	public function countCorrectAnswers($user_id) {
		return $this->user->find($user_id)->answers()->count() > 0 ? $this->user->find($user_id)->answers()->where('judge', 'AC')->count() : 0;
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
