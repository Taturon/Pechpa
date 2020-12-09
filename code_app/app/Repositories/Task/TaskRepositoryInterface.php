<?php

namespace App\Repositories\Task;

interface TaskRepositoryInterface {

	public function all();

	public function allReviewedTasks();

	public function allUnreviewedTasks();

	public function findById($id);

	public function storeTask($request);

	public function storeSampleCases($task_id, $request);

	public function storeTestCases($task_id, $request);
}
