<?php

namespace App\Repositories\User;

interface UserRepositoryInterface {

	public function findById($user_id);

	public function countUnapprovedTasks($user_id);

	public function unapprovedTasks($user_id);

	public function countApprovedTasks($user_id);

	public function approvedTasks($user_id);

	public function countAllAnswers($user_id);

	public function countCorrectAnswers($user_id);

	public function destroyIcon($file);

	public function updateIcon($user_id, $file);

	public function updateName($user_id, $name);
}
