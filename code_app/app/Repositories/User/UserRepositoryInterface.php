<?php

namespace App\Repositories\User;

interface UserRepositoryInterface {

	public function findById($user_id);

	public function countApprovedTasks($user_id);

	public function countAllAnswers($user_id);

	public function countCorrectAnswers($user_id);
}
