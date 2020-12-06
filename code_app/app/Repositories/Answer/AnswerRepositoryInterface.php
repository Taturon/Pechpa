<?php

namespace App\Repositories\Answer;

interface AnswerRepositoryInterface {

	public function all();

	public function findById($id);

	public function storeSyntaxCheckResult($source, Array $result, $user_id, $task_id);

	public function storeTestingResults($test_results);
}
