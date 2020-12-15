<?php

namespace App\Repositories\Answer;

interface AnswerRepositoryInterface {

	public function all($paging);

	public function findById($id);

	public function isNotAnswered($task_id, $user_id);

	public function isNotSolved($task_id, $user_id);

	public function storeSyntaxCheckResult($source, Array $result, $user_id, $task_id);

	public function storeTestingResults($test_results);
}
