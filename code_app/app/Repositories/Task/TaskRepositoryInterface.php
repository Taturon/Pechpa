<?php

namespace App\Repositories\Task;

interface TaskRepositoryInterface {

	public function all();

	public function allReviewedTasks($paging);

	public function recentApprovedTasks($count);

	public function userCreatedApprovedTasks($user_id);

	public function allUnreviewedTasks($paging);

	public function recentUnapprovedTasks($count);

	public function userCreatedUnapprovedTasks($user_id);

	public function findReviewedTask($id);

	public function findUnreviewedTask($id);

	public function makeQuery();

	public function narrowDownWithTitle($query, $request);

	public function narrowDownWithDifficulty($query, $request);

	public function narrowDownWithLowerValidity($query, $request);

	public function narrowDownWithLowerValidityWithNoExaminees($query, $request);

	public function narrowDownWithUpperValidity($query, $request);

	public function narrowDownWithUpperValidityWithNoExaminees($query, $request);

	public function withNoExaminees($query);

	public function withoutNoExaminees($query);

	public function inincrementExaminees($task_id);

	public function inincrementSolved($task_id);

	public function storeTask($request, $user_id);

	public function updateTaskWithApproval($task_id, $request);

	public function updateTaskWithoutApproval($task_id, $request);

	public function destroyTask($task_id);

	public function storeSampleCases($task_id, $request);

	public function destroySampleCases($task_id);

	public function storeTestCases($task_id, $request);

	public function destroyTestCases($task_id);
}
