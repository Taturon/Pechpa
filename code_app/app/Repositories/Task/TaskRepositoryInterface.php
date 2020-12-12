<?php

namespace App\Repositories\Task;

interface TaskRepositoryInterface {

	public function all();

	public function allReviewedTasks($paging);

	public function recentApprovedTasks($count);

	public function allUnreviewedTasks($paging);

	public function recentUnapprovedTasks($count);

	public function findReviewedTask($id);

	public function findUnreviewedTask($id);

	public function storeTask($request);

	public function updateTaskWithApproval($task_id, $request);

	public function updateTaskWithoutApproval($task_id, $request);

	public function storeSampleCases($task_id, $request);

	public function destroySampleCases($task_id);

	public function storeTestCases($task_id, $request);

	public function destroyTestCases($task_id);
}
